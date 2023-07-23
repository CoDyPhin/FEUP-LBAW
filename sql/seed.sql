-----------------------------------------
-- Drop Old Schmema
-----------------------------------------

DROP TABLE IF EXISTS CommentRatings;
DROP TABLE IF EXISTS ThreadRatings;
DROP TABLE IF EXISTS ReportComments;
DROP TABLE IF EXISTS ReportThreads;
DROP TABLE IF EXISTS Comments;
DROP TABLE IF EXISTS ThreadImages;
DROP TABLE IF EXISTS ThreadCategories;
DROP TABLE IF EXISTS Threads;
DROP TABLE IF EXISTS Friendships;
DROP TABLE IF EXISTS FriendRequests;
DROP TABLE IF EXISTS Users;
DROP TABLE IF EXISTS Categories;
DROP EXTENSION IF EXISTS pgcrypto;

DROP INDEX IF EXISTS Thread_date;
DROP INDEX IF EXISTS Thread_rating;
DROP INDEX IF EXISTS Thread_owner;
DROP INDEX IF EXISTS Thread_images;
DROP INDEX IF EXISTS Comment_owner;
DROP INDEX IF EXISTS Comment_belongs_thread;
DROP INDEX IF EXISTS Comment_belongs_comment;
DROP INDEX IF EXISTS Search_word;


DROP FUNCTION IF EXISTS Update_thread_rating CASCADE;
DROP FUNCTION IF EXISTS Update_comment_rating CASCADE;
DROP FUNCTION IF EXISTS Remove_one_thread_rating CASCADE;
DROP FUNCTION IF EXISTS Remove_one_comment_rating CASCADE;
DROP FUNCTION IF EXISTS Insert_thread_rating CASCADE;
DROP FUNCTION IF EXISTS Insert_comment_rating CASCADE;
DROP FUNCTION IF EXISTS Verifies_comment_date CASCADE;
DROP FUNCTION IF EXISTS Delete_friend_request CASCADE;
DROP FUNCTION IF EXISTS Verify_user_vote_on_thread CASCADE;
DROP FUNCTION IF EXISTS Verify_user_vote_on_comment CASCADE;
DROP FUNCTION IF EXISTS Verify_user_report_on_thread CASCADE;
DROP FUNCTION IF EXISTS Verify_user_report_on_comment CASCADE;
DROP FUNCTION IF EXISTS Verifies_mirrored_friend_request CASCADE;
DROP FUNCTION IF EXISTS Verifies_mirrored_friendship CASCADE;


DROP TRIGGER IF EXISTS Update_thread_rating ON ThreadRatings CASCADE;
DROP TRIGGER IF EXISTS Update_comment_rating ON CommentRatings CASCADE;
DROP TRIGGER IF EXISTS Remove_one_thread_rating ON ThreadRatings CASCADE;
DROP TRIGGER IF EXISTS Remove_one_comment_rating ON CommentRatings CASCADE;
DROP TRIGGER IF EXISTS Insert_thread_rating ON ThreadRatings CASCADE;
DROP TRIGGER IF EXISTS Insert_comment_rating ON CommentRatings CASCADE;
DROP TRIGGER IF EXISTS Verifies_comment_date ON Comments CASCADE;
DROP TRIGGER IF EXISTS Delete_friend_request ON FriendRequests CASCADE;
DROP TRIGGER IF EXISTS Verify_user_vote_on_thread ON ThreadRatings CASCADE;
DROP TRIGGER IF EXISTS Verify_user_vote_on_comment ON CommentRatings CASCADE;
DROP TRIGGER IF EXISTS Verify_user_report_on_thread ON ReportThreads CASCADE;
DROP TRIGGER IF EXISTS Verify_user_report_on_comment ON ReportComments CASCADE;
DROP TRIGGER IF EXISTS Verifies_mirrored_friend_request ON FriendRequests CASCADE;
DROP TRIGGER IF EXISTS Verifies_mirrored_friendship ON Friendships CASCADE;

-----------------------------------------
-- Tables
-----------------------------------------

CREATE EXTENSION pgcrypto;

CREATE TABLE Categories (
	id SERIAL PRIMARY KEY,
	name TEXT UNIQUE NOT NULL
);

CREATE TABLE password_resets(
  reset_id SERIAL NOT NULL,
	email TEXT NOT NULL,
	token TEXT NOT NULL,
  created_at TIMESTAMP

);

CREATE TABLE Users (
	id SERIAL PRIMARY KEY,
	username TEXT UNIQUE NOT NULL,
	email TEXT UNIQUE NOT NULL,
	password TEXT NOT NULL,
	description TEXT DEFAULT '',
	reputation INTEGER NOT NULL DEFAULT 0,
	profile_image BYTEA,
	header_image BYTEA,
	is_banned BOOLEAN NOT NULL DEFAULT false,
	is_admin BOOLEAN NOT NULL DEFAULT false
);

CREATE TABLE FriendRequests(
	id_sender INTEGER NOT NULL REFERENCES Users(id) ON DELETE CASCADE,
	id_receiver INTEGER NOT NULL REFERENCES Users(id) ON DELETE CASCADE CHECK (id_sender != id_receiver),
	PRIMARY KEY (id_sender,id_receiver)

);

CREATE TABLE notifications(
    id SERIAL NOT NULL,
    type VARCHAR(255),
    notifiable_type VARCHAR(255),
    notifiable_id INTEGER,
    data TEXT,
    read_at TIMESTAMP,
    created_at TIMESTAMP,
    updated_at TIMESTAMP,
);

CREATE TABLE Friendships (
	id_user1 INTEGER NOT NULL REFERENCES Users(id) ON DELETE CASCADE,
	id_user2 INTEGER NOT NULL REFERENCES Users(id) ON DELETE CASCADE CHECK (id_user1 != id_user2),
	PRIMARY KEY(id_user1,id_user2)
);


CREATE TABLE Threads (
	id SERIAL PRIMARY KEY,
	title TEXT NOT NULL,
	summary TEXT NOT NULL,
	description TEXT NOT NULL,
	rating INTEGER NOT NULL DEFAULT 0,
	creation_date TIMESTAMP WITH TIME ZONE NOT NULL DEFAULT now(),
	id_user INTEGER NOT NULL REFERENCES Users(id) ON DELETE CASCADE
);

CREATE TABLE ThreadCategories(
	id_thread INTEGER NOT NULL REFERENCES Threads(id) ON DELETE CASCADE,
	id_category INTEGER NOT NULL REFERENCES Categories(id) ON DELETE CASCADE,
	PRIMARY KEY (id_thread,id_category)
);

CREATE TABLE ThreadImages(
	id SERIAL PRIMARY KEY,
	image BYTEA NOT NULL,
	id_thread INTEGER NOT NULL REFERENCES Threads(id) ON DELETE CASCADE
);

CREATE TABLE Comments (
	id SERIAL PRIMARY KEY,
	comment_text TEXT NOT NULL,
	rating INTEGER NOT NULL DEFAULT 0,
	creation_date TIMESTAMP NOT NULL DEFAULT now(),
	id_user INTEGER NOT NULL REFERENCES Users(id) ON DELETE CASCADE,
	id_thread INTEGER REFERENCES Threads(id) ON DELETE CASCADE,
	id_comment INTEGER REFERENCES Comments(id) ON DELETE CASCADE
	CHECK ((id_thread IS NOT NULL AND id_comment IS NULL) OR (id_comment IS NOT NULL AND id_thread IS NULL))
);


CREATE TABLE ReportThreads(
	id_user INTEGER NOT NULL REFERENCES Users(id) ON DELETE CASCADE,
	id_thread INTEGER NOT NULL REFERENCES Threads(id) ON DELETE CASCADE,
	PRIMARY KEY (id_user,id_thread)
);

CREATE TABLE ReportComments(
	id_user INTEGER NOT NULL REFERENCES Users(id) ON DELETE CASCADE,
	id_comment INTEGER NOT NULL REFERENCES Comments(id) ON DELETE CASCADE,
	PRIMARY KEY (id_user,id_comment)
);

CREATE TABLE ThreadRatings(
	id_user INTEGER REFERENCES Users(id) ON DELETE CASCADE,
	id_thread INTEGER REFERENCES Threads(id) ON DELETE CASCADE,
	upvote BOOLEAN NOT NULL,
	PRIMARY KEY (id_user,id_thread)
);

CREATE TABLE CommentRatings(
	id_user INTEGER REFERENCES Users(id) ON DELETE CASCADE,
	id_comment INTEGER REFERENCES Comments(id) ON DELETE CASCADE,
	upvote BOOLEAN NOT NULL,
	PRIMARY KEY (id_user,id_comment)
);


-----------------------------------------
-- INDEXES
-----------------------------------------

CREATE INDEX Thread_date ON Threads USING btree(creation_date);

CREATE INDEX Thread_rating ON Threads USING btree(rating);

CREATE INDEX Thread_owner ON Threads USING hash (id_user);

CREATE INDEX Thread_images ON ThreadImages USING hash (id_thread);

CREATE INDEX Comment_owner ON Comments USING hash (id_user);

CREATE INDEX Comment_belongs_thread ON Comments USING hash (id_thread);

CREATE INDEX Comment_belongs_comment ON Comments USING hash (id_comment);

CREATE INDEX Search_word ON Threads USING gist (to_tsvector('english', description));

-----------------------------------------
-- TRIGGERS and UDFs
-----------------------------------------
CREATE FUNCTION Update_thread_rating() RETURNS TRIGGER AS $BODY$
  DECLARE owner INTEGER;
  BEGIN
	SELECT INTO owner id_user
	FROM Threads
	WHERE id = NEW.id_thread;
    IF NEW.upvote AND NOT OLD.upvote THEN
      UPDATE Threads
        SET rating = rating + 2
        WHERE NEW.id_thread = Threads.id;
      UPDATE Users
        SET reputation = reputation + 2
        WHERE owner = Users.id;

    ELSIF NOT NEW.upvote AND OLD.upvote THEN
      UPDATE Threads
        SET rating = rating - 2
        WHERE NEW.id_thread = Threads.id;
      UPDATE Users
        SET reputation = reputation - 2
        WHERE owner = Users.id;
    END IF;
    RETURN NEW;
  END;
  $BODY$ LANGUAGE plpgsql;

CREATE TRIGGER Update_thread_rating
	AFTER UPDATE ON ThreadRatings
	FOR EACH ROW EXECUTE PROCEDURE Update_thread_rating();


CREATE FUNCTION Update_comment_rating() RETURNS TRIGGER AS $BODY$
  DECLARE owner INTEGER;
  BEGIN
	SELECT INTO owner id_user
	FROM Comments
	WHERE id = NEW.id_comment;
    IF NEW.upvote AND NOT OLD.upvote THEN
      UPDATE Comments
        SET rating = rating + 2
        WHERE NEW.id_comment = Comments.id;
      UPDATE Users
        SET reputation = reputation + 2
        WHERE owner = Users.id;

    ELSIF NOT NEW.upvote AND OLD.upvote THEN
      UPDATE Comments
        SET rating = rating - 2
        WHERE NEW.id_comment = Comments.id;
      UPDATE Users
        SET reputation = reputation - 2
        WHERE owner = Users.id;
    END IF;
    RETURN NEW;
  END;
  $BODY$ LANGUAGE plpgsql;

CREATE TRIGGER Update_comment_rating
	AFTER UPDATE ON CommentRatings
	FOR EACH ROW EXECUTE PROCEDURE Update_comment_rating();


CREATE FUNCTION Remove_one_thread_rating() RETURNS TRIGGER AS $BODY$
  DECLARE owner INTEGER;
  BEGIN
	SELECT INTO owner id_user
	FROM Threads
	WHERE id = OLD.id_thread;
    IF OLD.upvote THEN
      UPDATE Threads
        SET rating = rating - 1
        WHERE OLD.id_thread = Threads.id;
      UPDATE Users
        SET reputation = reputation - 1
        WHERE owner = Users.id;

    ELSIF NOT OLD.upvote THEN
      UPDATE Threads
        SET rating = rating + 1
        WHERE NEW.id_thread = Threads.id;
      UPDATE Users
        SET reputation = reputation + 1
        WHERE owner = Users.id;
    END IF;
    RETURN NEW;
  END;
  $BODY$ LANGUAGE plpgsql;

CREATE TRIGGER Remove_one_thread_rating
	AFTER DELETE ON ThreadRatings
	FOR EACH ROW EXECUTE PROCEDURE Remove_one_thread_rating();


CREATE FUNCTION Remove_one_comment_rating() RETURNS TRIGGER AS $BODY$
  DECLARE owner INTEGER;
  BEGIN
	SELECT INTO owner id_user
	FROM Comments
	WHERE id = OLD.id_comment;
    IF OLD.upvote THEN
      UPDATE Comments
        SET rating = rating - 1
        WHERE OLD.id_comment = Comments.id;
      UPDATE Users
        SET reputation = reputation - 1
        WHERE owner = Users.id;

    ELSIF NOT OLD.upvote THEN
      UPDATE Comments
        SET rating = rating + 1
        WHERE NEW.id_comment = Comments.id;
      UPDATE Users
        SET reputation = reputation + 1
        WHERE owner = Users.id;
    END IF;
    RETURN NEW;
  END;
  $BODY$ LANGUAGE plpgsql;

CREATE TRIGGER Remove_one_comment_rating
	AFTER DELETE ON CommentRatings
	FOR EACH ROW EXECUTE PROCEDURE Remove_one_comment_rating();


CREATE FUNCTION Insert_thread_rating() RETURNS TRIGGER AS $BODY$
  DECLARE owner INTEGER;
  BEGIN
	SELECT INTO owner id_user
	FROM Threads
	WHERE id = NEW.id_thread;
    IF NEW.upvote THEN
      UPDATE Threads
        SET rating = rating + 1
        WHERE NEW.id_thread = Threads.id;
      UPDATE Users
        SET reputation = reputation + 1
        WHERE owner = Users.id;

    ELSIF NOT NEW.upvote THEN
      UPDATE Threads
        SET rating = rating - 1
        WHERE NEW.id_thread = Threads.id;
      UPDATE Users
        SET reputation = reputation - 1
        WHERE owner = Users.id;
    END IF;
    RETURN NEW;
  END;
  $BODY$ LANGUAGE plpgsql;

CREATE TRIGGER Insert_thread_rating
	AFTER INSERT ON ThreadRatings
	FOR EACH ROW EXECUTE PROCEDURE Insert_thread_rating();

CREATE FUNCTION Insert_comment_rating() RETURNS TRIGGER AS $BODY$
  DECLARE owner INTEGER;
  BEGIN
	SELECT INTO owner id_user
	FROM Comments
	WHERE id = NEW.id_comment;
    IF NEW.upvote THEN
      UPDATE Comments
        SET rating = rating + 1
        WHERE NEW.id_comment = Comments.id;
      UPDATE Users
        SET reputation = reputation + 1
        WHERE owner = Users.id;

    ELSIF NOT NEW.upvote THEN
      UPDATE Comments
        SET rating = rating - 1
        WHERE NEW.id_comment = Comments.id;
      UPDATE Users
        SET reputation = reputation - 1
        WHERE owner = Users.id;
    END IF;
    RETURN NEW;
  END;
  $BODY$ LANGUAGE plpgsql;

CREATE TRIGGER Insert_comment_rating
	AFTER INSERT ON CommentRatings
	FOR EACH ROW EXECUTE PROCEDURE Insert_comment_rating();


CREATE FUNCTION Verifies_comment_date() RETURNS TRIGGER AS $BODY$
  DECLARE father_date TIMESTAMP;
  BEGIN
    IF NEW.id_thread IS NOT NULL THEN
		SELECT INTO father_date creation_date
		FROM Threads
		WHERE id = NEW.id_thread;
	ELSE
		SELECT INTO father_date creation_date
		FROM Comments
		WHERE id = NEW.id_comment;
    END IF;
	IF NEW.creation_date <= father_date THEN
		RAISE EXCEPTION 'This Comment has an invalid date';
	END IF;
    RETURN NEW;
  END;
  $BODY$ LANGUAGE plpgsql;

CREATE TRIGGER Verifies_comment_date
	BEFORE INSERT ON Comments
	FOR EACH ROW EXECUTE PROCEDURE Verifies_comment_date();


CREATE FUNCTION Delete_friend_request() RETURNS TRIGGER AS $BODY$
  BEGIN
    DELETE FROM FriendRequests
	WHERE id_sender = NEW.id_user2 AND id_receiver = NEW.id_user1;
    RETURN NEW;
  END;
  $BODY$ LANGUAGE plpgsql;

CREATE TRIGGER Delete_friend_request
	AFTER INSERT ON Friendships
	FOR EACH ROW EXECUTE PROCEDURE Delete_friend_request();


CREATE FUNCTION Verify_user_vote_on_thread() RETURNS TRIGGER AS $BODY$
  DECLARE owner INTEGER;
  BEGIN
	SELECT INTO owner id_user
	FROM Threads
	WHERE id = NEW.id_thread;
	IF owner = NEW.id_user THEN
		RAISE EXCEPTION 'User can''t rate his own Thread';
	END IF;
    RETURN NEW;
  END;
  $BODY$ LANGUAGE plpgsql;

CREATE TRIGGER Verify_user_vote_on_thread
	BEFORE INSERT ON ThreadRatings
	FOR EACH ROW EXECUTE PROCEDURE Verify_user_vote_on_thread();



CREATE FUNCTION Verify_user_vote_on_comment() RETURNS TRIGGER AS $BODY$
  DECLARE owner INTEGER;
  BEGIN
	SELECT INTO owner id_user
	FROM Comments
	WHERE id = NEW.id_comment;
	IF owner = NEW.id_user THEN
		RAISE EXCEPTION 'User can''t rate his own Comment';
	END IF;
    RETURN NEW;
  END;
  $BODY$ LANGUAGE plpgsql;

CREATE TRIGGER Verify_user_vote_on_comment
	BEFORE INSERT ON CommentRatings
	FOR EACH ROW EXECUTE PROCEDURE Verify_user_vote_on_comment();


CREATE FUNCTION Verify_user_report_on_thread() RETURNS TRIGGER AS $BODY$
  DECLARE owner INTEGER;
  BEGIN
	SELECT INTO owner id_user
	FROM Threads
	WHERE id = NEW.id_thread;
	IF owner = NEW.id_user THEN
		RAISE EXCEPTION 'User can''t report his own Thread';
	END IF;
    RETURN NEW;
  END;
  $BODY$ LANGUAGE plpgsql;

CREATE TRIGGER Verify_user_report_on_thread
	BEFORE INSERT ON ReportThreads
	FOR EACH ROW EXECUTE PROCEDURE Verify_user_report_on_thread();


CREATE FUNCTION Verify_user_report_on_comment() RETURNS TRIGGER AS $BODY$
  DECLARE owner INTEGER;
  BEGIN
	SELECT INTO owner id_user
	FROM Comments
	WHERE id = NEW.id_comment;
	IF owner = NEW.id_user THEN
		RAISE EXCEPTION 'User can''t report his own Comment';
	END IF;
    RETURN NEW;
  END;
  $BODY$ LANGUAGE plpgsql;

CREATE TRIGGER Verify_user_report_on_comment
	BEFORE INSERT ON ReportComments
	FOR EACH ROW EXECUTE PROCEDURE Verify_user_report_on_comment();


CREATE FUNCTION Verifies_mirrored_friend_request() RETURNS TRIGGER AS $BODY$
  DECLARE sender INTEGER;
  BEGIN
	SELECT INTO sender id_sender
	FROM FriendRequests
	WHERE id_sender = NEW.id_receiver AND id_receiver = NEW.id_sender;
    IF sender IS NOT NULL THEN
		RAISE EXCEPTION 'There already exists a Friend Request for this Friendship';
    END IF;
    RETURN NEW;
  END;
  $BODY$ LANGUAGE plpgsql;

CREATE TRIGGER Verifies_mirrored_friend_request
	BEFORE INSERT ON FriendRequests
	FOR EACH ROW EXECUTE PROCEDURE Verifies_mirrored_friend_request();


CREATE FUNCTION Verifies_mirrored_friendship() RETURNS TRIGGER AS $BODY$
  DECLARE user1 INTEGER;
  BEGIN
	SELECT INTO user1 id_user1
	FROM Friendships
	WHERE id_user1 = NEW.id_user2 AND id_user2 = NEW.id_user1;
    IF user1 IS NOT NULL THEN
		RAISE EXCEPTION 'The two Users are already Friends';
    END IF;
    RETURN NEW;
  END;
  $BODY$ LANGUAGE plpgsql;

CREATE TRIGGER Verifies_mirrored_friendship
	BEFORE INSERT ON Friendships
	FOR EACH ROW EXECUTE PROCEDURE Verifies_mirrored_friendship();

-----------------------------------------
-- End
-----------------------------------------
