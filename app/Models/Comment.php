<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class Comment extends Model
{
    use HasFactory;

    protected $table = 'comments';

    public $timestamps  = false;

    protected $fillable = [
        'comment_text', 'rating', 'creation_date'
    ];

    /**
     * The reports that belong to the Comment
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function reports()
    {
        return $this->belongsToMany(User::class, 'reportcomments', 'id_comment', 'id_user');
    }

    /**
     * Get all of the comments for the Comment
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function comments()
    {
        return $this->hasMany(Comment::class, 'id_comment')->with('comments');
    }

    /**
     * Get the user that owns the Comment
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function owner()
    {
        return $this->belongsTo(User::class, 'id_user');
    }

    public function hasVoted($idUser)
    {
        return DB::table('commentratings')->where('id_user', '=', $idUser)->where('id_comment', '=', $this->id)->first();
    }

    /**
     * Get the Thread in which the Comment is in
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function inThread()
    {
        return $this->belongsTo(Thread::class, 'id_thread');
    }

    /**
     * Get the Comment in which the Comment is in
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function inComment()
    {
        return $this->belongsTo(Comment::class, 'id_comment');
    }

    /**
     * Upvote on Comment
     *
     */
    public function upVote($idUser, $id)
    {
        $vote = DB::table('commentratings')->where('id_user', '=', $idUser)->where('id_comment', '=', $id)->first();
        $upvote = false;

        if($vote == null){
           DB::table('commentratings')->insert([['id_user' => $idUser, 'id_comment' => $id, 'upvote' => true]]);
           $upvote = true;
        }
        else if($vote->upvote === true){
            DB::table('commentratings')->where('id_user', '=', $idUser)->where('id_comment', '=', $id)->delete();
        }
        else if($vote->upvote === false){
            DB::table('commentratings')->where('id_user', '=', $idUser)->where('id_comment', '=', $id)->update(['upvote' => true]);
            $upvote = true;
        }

        return $upvote;
    }

    /**
     * Downvote on Comment
     *
     */
    public function downVote($idUser, $id)
    {
        $vote = DB::table('commentratings')->where('id_user', '=', $idUser)->where('id_comment', '=', $id)->first();
        $downvote = false;

        if($vote == null){
            DB::table('commentratings')->insert([['id_user' => $idUser, 'id_comment' => $id, 'upvote' => false]]);
            $downvote = true;
        }
        else if($vote->upvote === false){
            DB::table('commentratings')->where('id_user', '=', $idUser)->where('id_comment', '=', $id)->delete();
        }
        else if($vote->upvote === true){
            DB::table('commentratings')->where('id_user', '=', $idUser)->where('id_comment', '=', $id)->update(['upvote' => false]);
            $downvote = true;
        }

        return $downvote;
    }

    /**
     * The votes that belong to the Comment
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function votes()
    {
        return $this->belongsToMany(User::class, 'commentratings', 'user_id', 'id_comment')->withPivot('upvote');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Comment  $comment
     * @param  \App\Models\User  $user
     * @return bool
     */
    public function hasReported(){
        $reported = false;
        if (Auth::check()) $reported = DB::table('reportcomments')
            ->where('id_user', '=', Auth::user()->id)
            ->where('id_comment', '=', $this->id)->first();

        return $reported;
    }

}
