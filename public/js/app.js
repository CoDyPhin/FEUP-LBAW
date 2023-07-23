function addEventListeners() {

    let friends = document.querySelectorAll('div.friend-card div.row div.remove-friend button.delete-button');
    if(friends != null){
        [].forEach.call(friends, function(deleter) {
            deleter.addEventListener('click', addFriendID);
        });
    }

    document.querySelectorAll('div.modal-footer button.delete').forEach(button =>
    { button.addEventListener('click', deleteFriend); });

    document.querySelectorAll('button.ban-user').forEach(button =>
    { button.addEventListener('click', banUser); });

    document.querySelectorAll('button.unban-user').forEach(button =>
    { button.addEventListener('click', unbanUser); });

    document.querySelectorAll('div.modal-footer button.reportConfirm').forEach(button =>
    { button.addEventListener('click', reportThread); });

    document.querySelectorAll('div.modal-footer button.undoReportConfirm').forEach(button =>
    { button.addEventListener('click', undoReportThread); });

    document.querySelectorAll('div.modal-footer button.reportCommentConfirm').forEach(button =>
    { button.addEventListener('click', reportComment); });

    document.querySelectorAll('div.modal-footer button.undoReportCommentConfirm').forEach(button =>
    { button.addEventListener('click', undoReportComment); });

    document.querySelectorAll('.container button.friend-request-button').forEach(button =>
    { button.addEventListener('click', sendFriendRequest); });

    document.querySelectorAll('.container button.friend-removerequest-button').forEach(button =>
    { button.addEventListener('click', undoFriendRequest); });

    document.querySelectorAll('.dropdown-menu button.acceptRequest').forEach(button =>
    { button.addEventListener('click', acceptFriendRequest); });

    document.querySelectorAll('.dropdown-menu button.declineRequest').forEach(button =>
    { button.addEventListener('click', declineFriendRequest); });

    let submitProfilePicture = document.querySelector('input.submit-profile-pic');
    if (submitProfilePicture != null) {
        submitProfilePicture.onchange = function (evt) {
            var tgt = evt.target || window.event.srcElement,
                files = tgt.files;
        
            // FileReader support
            if (FileReader && files && files.length) {
                var fr = new FileReader();
                fr.onload = function () {
                    document.querySelector('img.profile-image').src = fr.result;
                }
                fr.readAsDataURL(files[0]);
            }
        }
    }

    let submitHeaderPicture = document.querySelector('input.submit-header-pic');
    if (submitHeaderPicture != null) {
        submitHeaderPicture.onchange = function (evt) {
            var tgt = evt.target || window.event.srcElement,
                files = tgt.files;
        
            // FileReader support
            if (FileReader && files && files.length) {
                var fr = new FileReader();
                fr.onload = function () {
                    document.querySelector('img.header-image').src = fr.result;
                }
                fr.readAsDataURL(files[0]);
            }
        }
    }

    let deleteFriendButton = document.querySelector('div.modal-footer button.delete-friend');
    if(deleteFriendButton != null){
        deleteFriendButton.addEventListener('click', deleteFriend);
    }

    let banUserButton = document.querySelector('button.ban-user');
    if(banUserButton != null){
        banUserButton.addEventListener('click', banUser);
    }

    let unbanUserButton = document.querySelector('button.unban-user');
    if(unbanUserButton != null){
        unbanUserButton.addEventListener('click', unbanUser);
    }

    let upVote = document.querySelector('div.votes button.upvote');
    let downVote = document.querySelector('div.votes button.downvote');

    if(upVote != null){
        upVote.addEventListener('click', upVoteThread);
    }

    if(downVote != null){
        downVote.addEventListener('click', downVoteThread);
    }

    let commentUpVotes = document.querySelectorAll('div.comment-icons div.comment-votes button.upvote');
    let commentDownVotes = document.querySelectorAll('div.comment-icons div.comment-votes button.downvote');

    if(commentUpVotes != null){
        [].forEach.call(commentUpVotes, function(commentUpVote) {
            commentUpVote.addEventListener('click', upVoteComment);
        });
    }

    if(commentDownVotes != null){
        [].forEach.call(commentDownVotes, function(commentDownVote) {
            commentDownVote.addEventListener('click', downVoteComment);
        });
    }

    let addComment = document.querySelector('form.add-comment');

    if(addComment != null){
        addComment.addEventListener('submit', function(event){
            event.preventDefault();
            let idThread = document.querySelector('form.add-comment div.post-border button.add-comment').getAttribute('data-id');
            let comment = document.querySelector('form.add-comment div.form-group textarea.form-control').value;

            sendAjaxRequest('post', '/api/threads/' + idThread + '/comment', {description: comment}, addCommentHandler);
        });
    }

    let replyButtons = document.querySelectorAll('div.comment div.comment-body div.comment-icons button.comments');

    if(replyButtons != null){
        [].forEach.call(replyButtons, function(replyButton) {
            replyButton.addEventListener('click', addCommentID);
        });
    }

    let addReply = document.querySelector('#reply-form');

    if(addReply != null){
        addReply.addEventListener('submit', function(event){
            event.preventDefault();
            let idComment= document.querySelector('div.modal-footer button.add-reply').getAttribute('data-id');
            let reply = document.querySelector('#reply-form textarea.form-control').value;
            $('#replyModal').modal('hide');

            sendAjaxRequest('post', '/api/comments/' + idComment + '/reply', {description: reply}, addReplyHandler);
        });
    }

    let editCommentButton = document.querySelector('div.comment div.comment-body div.comment-icons button.edit');

    if(editCommentButton != null){
        editCommentButton.addEventListener('click', addComentText);
    }

    let editComment = document.querySelector('#edit-form');

    if(editComment != null){
        editComment.addEventListener('submit', function(event){
            event.preventDefault();
            let idComment= document.querySelector('div.modal-footer button.edit-comment').getAttribute('data-id');
            let reply = document.querySelector('#edit-form textarea.form-control').value;
            $('#editModal').modal('hide');

            sendAjaxRequest('post', '/api/comments/' + idComment + '/edit', {text: reply}, editCommentHandler);
        });
    }

    let deleteCommentButtons = document.querySelectorAll('div.comment div.comment-body div.comment-icons button.delete');

    if(deleteCommentButtons != null){
        [].forEach.call(deleteCommentButtons, function(deleteCommentButton) {
            deleteCommentButton.addEventListener('click', addCommentToDeleteID);
        });
    }

    let deleteCommentButton = document.querySelector('div.modal-footer button.delete-comment');
    if(deleteCommentButton != null){
        deleteCommentButton.addEventListener('click', deleteComment);
    }

}


function upVoteThread(){
    let idThread = this.getAttribute('data-id');

    sendAjaxRequest('post', '/api/threads/' + idThread + '/upvote', null, upVoteThreadHandler);
}

function downVoteThread(){
    let idThread = this.getAttribute('data-id');

    sendAjaxRequest('post', '/api/threads/' + idThread + '/downvote', null, downVoteThreadHandler);
}


function upVoteComment(){
    let idComment = this.getAttribute('data-id');

    sendAjaxRequest('post', '/api/comments/' + idComment + '/upvote', null, upVoteCommentHandler);
}

function downVoteComment(){

    let idComment = this.getAttribute('data-id');


    sendAjaxRequest('post', '/api/comments/' + idComment + '/downvote', null, downVoteCommentHandler);
}



function addFriendID(){
    let id = this.getAttribute('data-id');
    let modalButton = document.querySelector('div.modal-footer button.delete-friend');
    if(modalButton != null)
        modalButton.setAttribute('data-id', id);
}

function addCommentID(){
    let id = this.getAttribute('data-id');
    let modalButton = document.querySelector('div.modal-footer button.add-reply');
    if(modalButton != null)
        modalButton.setAttribute('data-id', id);
}

function addCommentToDeleteID(){
    let id = this.getAttribute('data-id');
    let modalButton = document.querySelector('div.modal-footer button.delete-comment');
    if(modalButton != null)
        modalButton.setAttribute('data-id', id);
}

function addComentText(){
    let id = this.getAttribute('data-id');
    let modalButton = document.querySelector('div.modal-footer button.edit-comment');
    let text = document.querySelector('#comment-' + id + ' div.comment-body p').innerText;
    let textArea = document.querySelector('#edit-form textarea');

    textArea.value = text;

    modalButton.setAttribute('data-id', id);
}

function encodeForAjax(data) {
    if (data == null) return null;
    return Object.keys(data).map(function(k){
        return encodeURIComponent(k) + '=' + encodeURIComponent(data[k])
    }).join('&');
}

function sendAjaxRequest(method, url, data, handler) {
    let request = new XMLHttpRequest();
    request.open(method, url, true);
    request.setRequestHeader('X-CSRF-TOKEN', document.querySelector('meta[name="csrf-token"]').content);
    request.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    request.addEventListener('load', handler);
    request.send(encodeForAjax(data));
}


function upVoteThreadHandler(){
    if(this.status == 401){
        $('#loginModal').modal('show');
        return;
    }
    else if(this.status == 403){
        createErrorFlash("You can't upvote your own Thread!");
        return;
    }
    else if (this.status != 200){
        createErrorFlash("Error while upvoting the Thread!");
        return;
    }

    let response = JSON.parse(this.responseText);

    let id = response['id'];

    let rating = document.querySelector("div.votes p[data-id='" + id + "']");
    let upVoteButton = document.querySelector("div.votes button.upvote[data-id='" + id + "']");
    let downVoteButton = document.querySelector("div.votes button.downvote[data-id='" + id + "']");

    rating.innerHTML = response['rating'];

    downVoteButton.style.color = "";

    if(response['upvote']){
        upVoteButton.style.color = 'var(--logoblue)';
    }
    else{
        upVoteButton.style.color = "";
        upVoteButton.blur();
    }

}

function downVoteThreadHandler(){
    if(this.status == 401){
        $('#loginModal').modal('show');
        return;
    }
    else if(this.status == 403){
        createErrorFlash("You can't downvote your own Thread!");
        return;
    }
    else if (this.status != 200){
        createErrorFlash("Error while downvoting the Thread!");
        return;
    }

    let response = JSON.parse(this.responseText);

    let id = response['id'];

    let rating = document.querySelector("div.votes p[data-id='" + id + "']");
    let downVoteButton = document.querySelector("div.votes button.downvote[data-id='" + id + "']");
    let upVoteButton = document.querySelector("div.votes button.upvote[data-id='" + id + "']");

    rating.innerHTML = response['rating'];

    upVoteButton.style.color = "";

    if(response['downvote']){
        downVoteButton.style.color = 'var(--dangercolor)';
    }
    else{
        downVoteButton.style.color = "";
        downVoteButton.blur();
    }
}


function upVoteCommentHandler(){
    if(this.status == 401){
        $('#loginModal').modal('show');
        return;
    }
    else if(this.status == 403){
        createErrorFlash("You can't upvote your own Comment!");
        return;
    }
    else if (this.status != 200){
        createErrorFlash("Error while upvoting the Comment!");
        return;
    }
    let response = JSON.parse(this.responseText);

    let id = response['id'];

    let rating = document.querySelector("div.comment-icons div.comment-votes span.rating[data-id='" + id + "']");
    let upVoteButton = document.querySelector("div.comment-icons div.comment-votes button.upvote[data-id='" + id + "']");
    let downVoteButton = document.querySelector("div.comment-icons div.comment-votes button.downvote[data-id='" + id + "']");

    rating.innerHTML = response['rating'];

    downVoteButton.style.color = "";

    if(response['upvote']){
        upVoteButton.style.color = 'var(--logoblue)';
    }
    else{
        upVoteButton.style.color = "";
        upVoteButton.blur();
    }

}


function downVoteCommentHandler(){
    if(this.status == 401){
        $('#loginModal').modal('show');
        return;
    }
    else if(this.status == 403){
        createErrorFlash("You can't downvote your own Comment!");
        return;
    }
    else if (this.status != 200){
        createErrorFlash("Error while downvoting the Comment!");
        return;
    }
    let response = JSON.parse(this.responseText);

    let id = response['id'];

    let rating = document.querySelector("div.comment-icons div.comment-votes span.rating[data-id='" + id + "']");
    let downVoteButton = document.querySelector("div.comment-icons div.comment-votes button.downvote[data-id='" + id + "']");
    let upVoteButton = document.querySelector("div.comment-icons div.comment-votes button.upvote[data-id='" + id + "']");

    rating.innerHTML = response['rating'];

    upVoteButton.style.color = "";

    if(response['downvote']){
        downVoteButton.style.color = 'var(--dangercolor)';
    }
    else{
        downVoteButton.style.color = "";
        downVoteButton.blur();
    }
}

function addCommentHandler(){
    if (this.status != 200) window.location = '/';
    let response = JSON.parse(this.responseText);
    let threadComments = document.querySelector('div.post-comments div.comment-thread');
    let textArea = document.querySelector('form.add-comment div.form-group textarea.form-control');
    textArea.value = "";
    threadComments.insertAdjacentHTML('beforeend', response['comment']);

    replyButton = document.querySelector('#comment-' + response['id'] + ' div.comment-body div.comment-icons button.comments');
    replyButton.addEventListener('click', addCommentID);

    upVoteButton = document.querySelector('#comment-' + response['id'] + ' div.comment-body div.comment-icons div.comment-votes button.upvote');
    downVoteButton = document.querySelector('#comment-' + response['id'] + ' div.comment-body div.comment-icons div.comment-votes button.downvote');

    upVoteButton.addEventListener('click', upVoteComment);
    downVoteButton.addEventListener('click', downVoteComment);

    editButton = document.querySelector('#comment-' + response['id'] + ' div.comment-body div.comment-icons button.edit');
    deleteButton = document.querySelector('#comment-' + response['id'] + ' div.comment-body div.comment-icons button.delete');

    editButton.addEventListener('click', addComentText);
    deleteButton.addEventListener('click', addCommentToDeleteID);

    window.location.href = "#comment-" + response['id'];

}

function addReplyHandler(){
    if (this.status != 200) window.location = '/';
    let response = JSON.parse(this.responseText);
    let replies = document.querySelector('#comment-' + response['idComment'] + ' div.replies');

    replies.insertAdjacentHTML('beforeend', response['reply']);

    replyButton = document.querySelector('#comment-' + response['id'] + ' div.comment-body div.comment-icons button.comments');
    replyButton.addEventListener('click', addCommentID);

    upVoteButton = document.querySelector('#comment-' + response['id'] + ' div.comment-body div.comment-icons div.comment-votes button.upvote');
    downVoteButton = document.querySelector('#comment-' + response['id'] + ' div.comment-body div.comment-icons div.comment-votes button.downvote');

    upVoteButton.addEventListener('click', upVoteComment);
    downVoteButton.addEventListener('click', downVoteComment);

    editButton = document.querySelector('#comment-' + response['id'] + ' div.comment-body div.comment-icons button.edit');
    deleteButton = document.querySelector('#comment-' + response['id'] + ' div.comment-body div.comment-icons button.delete');

    editButton.addEventListener('click', addComentText);
    deleteButton.addEventListener('click', addCommentToDeleteID);

    document.querySelector('#reply-form textarea.form-control').value = "";

    window.location.href = "#comment-" + response['id'];

}

function editCommentHandler(){
    if (this.status != 200) window.location = '/';
    let response = JSON.parse(this.responseText);

    let comment = document.querySelector('#comment-' + response['id'] + ' div.comment-body p');
    comment.innerText = response['text'];

    window.location.href = "#comment-" + response['id'];

}

function deleteFriend(){
    let idUser = this.closest('div.friends-list').getAttribute('data-id');
    let idFriend = this.getAttribute('data-id');

    sendAjaxRequest('delete', '/api/users/' + idUser + '/friends/' + idFriend, null, deleteFriendHandler);
}

function deleteFriendHandler() {
    if (this.status !== 200) window.location = '/';
    let friendID = JSON.parse(this.responseText);

    if(friendID !== 0){
        let friendCard = document.getElementById(friendID);
        let parent = friendCard.parentElement;
        let grandparent = parent.parentElement;

        createSuccessFlash("Friend removed successfully!");

        grandparent.removeChild(parent);
    }
    else{
        createErrorFlash("Error removing friend!")
    }
    scrollTop();
}

function reportThreadHandler() {
    if (this.status !== 200) window.location = '/';
    let threadID = JSON.parse(this.responseText);

    if(threadID !== 0){
        let reportButton = document.querySelector('button.report');
        reportButton.className = "report undo";
        reportButton.children[1].innerText = "Undo report";

        let reportConfirm = document.querySelector('#confirmReportThreadModal .modal-dialog .modal-content');
        reportConfirm.children[1].innerText = "Are you sure want to undo your report?";
        reportConfirm.children[2].children[1].innerText = "Yes! Undo"
        reportConfirm.children[2].children[1].removeEventListener('click', reportThread);
        reportConfirm.children[2].children[1].addEventListener('click', undoReportThread);

        createSuccessFlash("Thread reported successfully!");
    }
    else{
        createErrorFlash("Error reporting thread!");
    }
    scrollTop();
}

function reportThread(){
    let element = document.querySelector('button.report');
    let idThread = element.getAttribute('data-thread-id');
    let idUser = element.getAttribute('data-user-id');

    sendAjaxRequest('post', '/api/threads/' + idThread + '/report/' + idUser,null, reportThreadHandler);
}

function undoReportThreadHandler() {
    if (this.status !== 200) window.location = '/';
    let threadID = JSON.parse(this.responseText);

    if(threadID !== 0){
        let reportButton = document.querySelector('button.report');
        reportButton.className = "report";
        reportButton.children[1].innerText = "Report";

        let reportConfirm = document.querySelector('#confirmReportThreadModal .modal-dialog .modal-content');
        reportConfirm.children[1].innerText = "Are you sure want to confirm your report?";
        reportConfirm.children[2].children[1].innerText = "Yes! Report"
        reportConfirm.children[2].children[1].removeEventListener('click', undoReportThread);
        reportConfirm.children[2].children[1].addEventListener('click', reportThread);

        createSuccessFlash("Thread report removed successfully!");
    }
    else{
        createErrorFlash("Error removing thread report!");
    }
    scrollTop();
}

function undoReportThread(){
    let element = document.querySelector('button.report.undo');
    let idThread = element.getAttribute('data-thread-id');
    let idUser = element.getAttribute('data-user-id');

    sendAjaxRequest('delete', '/api/threads/' + idThread + '/report/' + idUser,null, undoReportThreadHandler);
}

function undoReportCommentHandler() {
    if (this.status !== 200) window.location = '/';
    let commentID = JSON.parse(this.responseText);

    if(commentID !== 0){
        console.log("here");
        let reportButton = document.querySelector('button.report.undo.comment-' + commentID );
        reportButton.className = "report comment-" + commentID;
        reportButton.children[1].innerText = "Report";

        let reportConfirm = document.querySelector('#confirmReportComment-'+ commentID +' .modal-dialog .modal-content');
        reportConfirm.children[1].innerText = "Are you sure want to confirm your report on this comment?";
        reportConfirm.children[2].children[1].innerText = "Yes! Report"
        reportConfirm.children[2].children[1].removeEventListener('click', undoReportComment);
        reportConfirm.children[2].children[1].addEventListener('click', reportComment);

        createSuccessFlash("Comment report removed successfully!");
    }
    else{
        createErrorFlash("Error removing comment report!");
    }
    scrollTop();
}

function undoReportComment(){
    let idComment = this.getAttribute('data-comment-id');
    let idUser = this.getAttribute('data-user-id');

    sendAjaxRequest('delete', '/api/comments/' + idComment + '/report/' + idUser,null, undoReportCommentHandler);
}

function reportCommentHandler() {
    if (this.status !== 200) window.location = '/';
    let commentID = JSON.parse(this.responseText);

    if(commentID !== 0){
        let reportButton = document.querySelector('button.report.comment-' + commentID );
        reportButton.className = "report undo comment-" + commentID;
        reportButton.children[1].innerText = "Undo report";

        let reportConfirm = document.querySelector('#confirmReportComment-'+ commentID +' .modal-dialog .modal-content');
        reportConfirm.children[1].innerText = "Are you sure want to undo your report on this comment?";
        reportConfirm.children[2].children[1].innerText = "Yes! Undo"
        reportConfirm.children[2].children[1].removeEventListener('click', reportComment);
        reportConfirm.children[2].children[1].addEventListener('click', undoReportComment);

        createSuccessFlash("Comment reported successfully!");
    }
    else{
        createErrorFlash("Error reporting comment!");
    }
    scrollTop();
}

function reportComment(){
    let idComment = this.getAttribute('data-comment-id');
    let idUser = this.getAttribute('data-user-id');

    sendAjaxRequest('post', '/api/comments/' + idComment + '/report/' + idUser,null, reportCommentHandler);
}

function createSuccessFlash(message){
    let header = document.querySelector('header');
    header.innerHTML = '';
    let div = document.createElement('div');
    div.setAttribute('class', 'alert alert-success alert-block')
    let button = document.createElement('button');
    button.setAttribute('type', 'button');
    button.setAttribute('class', 'close');
    button.setAttribute('data-dismiss','alert');
    button.setAttribute('onclick','slideUp()');
    button.innerText = '×';
    let text = document.createElement('strong');
    text.innerText = message;
    div.appendChild(button);
    div.appendChild(text);
    header.appendChild(div);
}

function createErrorFlash(message){
    let header = document.querySelector('header');
    header.innerHTML = '';
    let div = document.createElement('div');
    div.setAttribute('class', 'alert alert-danger alert-block')
    let button = document.createElement('button');
    button.setAttribute('type', 'button');
    button.setAttribute('class', 'close');
    button.setAttribute('data-dismiss','alert');
    button.setAttribute('onclick','slideUp()');
    button.innerText = '×';
    let text = document.createElement('strong');
    text.innerText = message;
    div.appendChild(button);
    div.appendChild(text);
    header.appendChild(div);
}

function createInformationFlash(message){
    let header = document.querySelector('header');
    header.innerHTML = '';
    let div = document.createElement('div');
    div.setAttribute('class', 'alert alert-info alert-block')
    let button = document.createElement('button');
    button.setAttribute('type', 'button');
    button.setAttribute('class', 'close');
    button.setAttribute('data-dismiss','alert');
    button.setAttribute('onclick','slideUp()');
    button.innerText = '×';
    let text = document.createElement('strong');
    text.innerText = message;
    div.appendChild(button);
    div.appendChild(text);
    header.appendChild(div);
}

function deleteComment(){
    let id = this.getAttribute('data-id');

    sendAjaxRequest('delete', '/api/comments/' + id + '/delete', null, deleteCommentHandler);
}

function deleteCommentHandler(){
    if (this.status != 200) window.location = '/';
    let response = JSON.parse(this.responseText);

    let comment = document.querySelector('#comment-' + response['id']);
    comment.parentElement.removeChild(comment);

}

function sendFriendRequest(){
    let sender_id = this.getAttribute('data-sender-id');
    let receiver_id = this.getAttribute('data-receiver-id');

    sendAjaxRequest('post', '/api/users/' + sender_id + '/friendrequest/' + receiver_id, null, sendFriendRequestHandler);
}

function sendFriendRequestHandler(){
    if (this.status != 200){
        createErrorFlash("Error while sending friend request!");
        return;
    }

    let response = JSON.parse(this.responseText);
    let sender_id = response.id_sender;
    let receiver_id = response.id_receiver;

    let button = document.querySelector('.container button.friend-request-button');
    button.remove();

    let newButton = document.createElement('button');
    newButton.className = "btn btn-primary mt-2 friend-removerequest-button";
    newButton.style.width = '100%';
    newButton.innerText="REMOVE FRIEND REQUEST";
    newButton.setAttribute('data-receiver-id', receiver_id);
    newButton.setAttribute('data-sender-id', sender_id);
    newButton.style.backgroundColor = "rgb(225,173,1)";
    newButton.style.borderColor = "rgb(225,173,1)";
    newButton.addEventListener('click', undoFriendRequest);

    let parent = document.querySelector('.profile .container');
    let footer = document.querySelector('.profile .container footer');
    parent.insertBefore(newButton, footer);

    createSuccessFlash("Friend request sent successfully");
    scrollTop();
}

function undoFriendRequest(){
    let sender_id = this.getAttribute('data-sender-id');
    let receiver_id = this.getAttribute('data-receiver-id');

    sendAjaxRequest('post', '/api/users/' + sender_id + '/undofriendrequest/' + receiver_id, null, undoFriendRequestHandler);
}

function undoFriendRequestHandler(){
    if (this.status != 200){
        createErrorFlash("Error while removing friend request!");
        return;
    }

    let response = JSON.parse(this.responseText);
    let sender_id = response.id_sender;
    let receiver_id = response.id_receiver;

    let removeButton = document.querySelector('.container button.friend-removerequest-button');
    removeButton.remove();

    let button = document.createElement('button');
    button.className = "btn btn-primary mt-2 friend-request-button";
    button.innerText="SEND FRIEND REQUEST";
    button.setAttribute('data-receiver-id', receiver_id);
    button.setAttribute('data-sender-id', sender_id);
    button.style.backgroundColor = "#2c5784";
    button.style.borderColor = "#2c5784";
    button.style.width = '100%';
    button.addEventListener('click', sendFriendRequest);

    let parent = document.querySelector('.profile .container');
    let footer = document.querySelector('.profile .container footer');
    parent.insertBefore(button, footer);

    createSuccessFlash("Friend request removed successfully");
    scrollTop();
}

function acceptFriendRequest(){
    let sender_id = this.getAttribute('data-sender-id');
    let receiver_id = this.getAttribute('data-receiver-id');

    sendAjaxRequest('post', '/api/users/' + sender_id + '/acceptfriendrequest/' + receiver_id, null, acceptFriendRequestHandler);
}

function declineFriendRequest(){
    let sender_id = this.getAttribute('data-sender-id');
    let receiver_id = this.getAttribute('data-receiver-id');

    sendAjaxRequest('post', '/api/users/' + sender_id + '/declinefriendrequest/' + receiver_id, null, declineFriendRequestHandler);
}

function deleteFriend(){
    let idUser = this.closest('div.friends-list').getAttribute('data-id');
    let idFriend = this.getAttribute('data-id');

    sendAjaxRequest('delete', '/api/users/' + idUser + '/friends/' + idFriend, null, deleteFriendHandler);
}

function banUser(){
    let idUser = this.closest('div.friend-card').getAttribute('data-id');
    sendAjaxRequest('get', '/ban/' + idUser, null, banUserHandler);
}

function banUserHandler() {
    if (this.status !== 200) window.location = '/';
    let userID = JSON.parse(this.responseText);

    if(userID !== 0){
        let reportedCard = document.getElementById(userID);
        let parent = reportedCard.parentElement;
        let grandparent = parent.parentElement;
        let banned = document.querySelector("div.banned-users-list");

        let img = reportedCard.querySelector("img");
        let name = reportedCard.querySelector("div.col-lg-4");

        let bannedExample = document.querySelector('div.banned-users-card');
        let bannedCard = bannedExample.cloneNode();
        bannedCard.innerHTML = '';
        let div = document.createElement('div');
        div.setAttribute('class', 'container friend-card card m-sm-2 mb-2 p-2');
        div.id = userID;
        div.setAttribute('data-id', userID);
        let row = document.createElement('div');
        row.setAttribute('class', 'row');
        let col_auto = document.createElement('div');
        col_auto.setAttribute('class', 'col-auto mb-2');
        let friend_image = document.createElement('div');
        friend_image.setAttribute('class', 'friend-image');
        friend_image.appendChild(img);
        let col = document.createElement('div');
        col.setAttribute('class', 'col');
        col.setAttribute('style', 'align-self: center;');
        let btn = document.createElement('button');
        btn.setAttribute('type', 'button');
        btn.setAttribute('class', 'btn btn-success unban-user float-end w-100');
        btn.addEventListener('click', unbanUser);
        btn.innerHTML = 'Unban User';


        col_auto.appendChild(friend_image);
        row.appendChild(col_auto);
        col.appendChild(btn);
        row.append(name);
        row.appendChild(col);
        div.appendChild(row);
        bannedCard.appendChild(div);


        let adminList = document.querySelector("div.admin-list").querySelectorAll("div.friend-card");
        let adminUser = null;
        for (let i = 0; i < adminList.length; i++) {
            if (parseInt(adminList.item(i).id) == userID)
                adminUser = adminList.item(i);
        }

        if (adminUser != null) {
            adminList = document.querySelector("div.admin-list");
            adminList.removeChild(adminUser.parentElement);
        }

        createSuccessFlash("User banned succesfully!");

        grandparent.removeChild(parent);
        banned.appendChild(bannedCard);
    }
    else{
        createErrorFlash("Something went wrong while banning the User!")
    }
    scrollTop();
}

function unbanUser(){
    let idUser = this.closest('div.friend-card').getAttribute('data-id');
    sendAjaxRequest('get', '/unban/' + idUser, null, unbanUserHandler);
}

function unbanUserHandler() {
    if (this.status !== 200) window.location = '/';
    let userID = JSON.parse(this.responseText);

    if(userID !== 0){
        let reportedCard = document.getElementById(userID);
        let parent = reportedCard.parentElement;
        let grandparent = parent.parentElement;

        createSuccessFlash("User unbanned succesfully!");

        grandparent.removeChild(parent);
    }
    else{
        createErrorFlash("Something went wrong while unbanning the User!")
    }
    scrollTop();
}

function acceptFriendRequestHandler(){
    if (this.status != 200) window.location = '/';
    let response = JSON.parse(this.responseText);
    let nNotifications = response[0];
    let senderID = response[1];

    if(nNotifications >= 0) {
        let liElement = document.querySelector('li.lirequest-' + senderID);
        liElement.remove();

        let badgeElement = document.querySelector('.user-notifications .count.badge');
        badgeElement.remove();
    }
    if(nNotifications === 0){
        let noNotifications = document.createElement("div");
        noNotifications.className="no-notifications px-3 text-center w-100";
        noNotifications.innerText="You don't have notifications";

        let element = document.querySelector('.dropdown-menu');
        element.appendChild(noNotifications);
    }
    createSuccessFlash("Friend accepted successfully!");
}

function declineFriendRequestHandler(){
    if (this.status != 200){
        createErrorFlash("Error while declining friend request!");
        return;
    }

    let response = JSON.parse(this.responseText);
    let nNotifications = response[0];
    let senderID = response[1];

    if(nNotifications >= 0) {
        let liElement = document.querySelector('li.lirequest-' + senderID);
        liElement.remove();

        let badgeElement = document.querySelector('.user-notifications .count.badge');
        badgeElement.remove();
    }
    if(nNotifications === 0){
        let noNotifications = document.createElement("div");
        noNotifications.className="no-notifications px-3 text-center w-100";
        noNotifications.innerText="You don't have notifications";

        let element = document.querySelector('.dropdown-menu');
        element.appendChild(noNotifications);
    }
    createSuccessFlash("Friend declined successfully!");
}

function slideUp() {
    $(".alert").slideUp(300);
}


function scrollTop(){
    document.body.scrollTop = 0; // For Safari
    document.documentElement.scrollTop = 0; // For Chrome, Firefox, IE and Opera
}

function infiniteLoadMore(page) {
    $.ajax({
            url: ENDPOINT + "?page=" + page,
            datatype: "html",
            type: "get",
            beforeSend: function () {
                $('.auto-load').show();
            }
        })
        .done(function (response) {
            if (response.length == 0) {
                $('.auto-load').html("We don't have more data to display.");
                return;
            }
            $('.auto-load').hide();
            $(".scroll.active").append(response).ready(function(){

                let upVotes = document.querySelectorAll('div.votes button.upvote');
                let downVotes = document.querySelectorAll('div.votes button.downvote');

                [].forEach.call(upVotes, function(upVote) {
                    upVote.addEventListener('click', upVoteThread);
                });

                [].forEach.call(downVotes, function(downVote) {
                    downVote.addEventListener('click', downVoteThread);
                });

            });
        })
        .fail(function (jqXHR, ajaxOptions, thrownError) {
            console.log('Server error occured');
        });

}

function registerValidate(form){
    var username = form.username;
    var email = form.email;
    var password = form.password;
    var password2 = form.password_confirmation;
    if(username.value.length < 3 || username.value.length > 12) {
        createErrorFlash("Your username must be between 3 and 12 characters!")
        username.focus();
        return false;
    }
    if (!(/^[a-zA-Z0-9.!#$%&'+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:.[a-zA-Z0-9-]+)$/.test(email.value))){
        createErrorFlash("Invalid email!");
        email.focus();
        return false;
    }
    if(password.value.length < 6){
        createErrorFlash("Password must be at least 6 characters long!");
        password.focus();
        return false;
    }
    if(password.value != password2.value){
        createErrorFlash("Passwords do not match!");
        password2.focus();
        return false;
    }
    if(password2.value.length < 6){
        createErrorFlash("Password must be at least 6 characters long!");
        password2.focus();
        return false;
    }
    return true;
}

var ENDPOINT = window.location.href;
if(!ENDPOINT.includes("search")){
    var page = 1;
    infiniteLoadMore(page);
    $(window).scroll(function () {
        if ($(window).scrollTop() + $(window).height() >= $(document).height()) {
            page++;
            infiniteLoadMore(page);
        }
    });
};

$(document).ready(function () {
    $('.categories-select').selectize({
        sortField: {
        field: 'text',
    },
    });
});

function enablePusher(){
    // Enable pusher logging - don't include this in production

    let loggedUser1 = document.querySelector('meta[name=user-id]');
    if(loggedUser1 != null) {
        let loggedUser = loggedUser1.content;
        var pusher = new Pusher('4e5ec106335486688ad7', {
            cluster: 'eu',
            encrypted: true
        });

        var channel = pusher.subscribe('my-channel-' + loggedUser);
        channel.bind('App\\Events\\Notification', function (data) {
            if(data.type === 'request')
                sendAjaxRequest('get', 'api/notificationAttr/' + data.sender_id, null, addNotification);
            else if(data.type === 'remove')
                removeNotification(data.sender_id);
        });
    }
}

function addNotification(){
    let response = JSON.parse(this.responseText);
    let user_id = response.id;
    let username = response.username;
    let profile_image = response.profile_image;
    let logged_user = document.querySelector('meta[name=user-id]').content;

    let badgeElement = document.querySelector('.user-notifications .count.badge');
    if(badgeElement != null){
        badgeElement.innerText = parseInt(badgeElement.innerText) + 1;
    }else{
        let noNotifications = document.querySelector('.no-notifications');
        noNotifications.remove();
        let notificationsButton = document.querySelector('.user-notifications.dropdown');
        let newBadgeElement = document.createElement('span');
        newBadgeElement.className= "count badge bg-secondary";
        newBadgeElement.innerText="1";
        notificationsButton.appendChild(newBadgeElement);
    }
    let newNotification = document.createElement("li");
    newNotification.className="lirequest-" + user_id;
    newNotification.innerHTML="<div class=\"notification p-2\">" +
        "<div class=\"d-flex ms-2\">" +
        "   <img src='data:image;base64," + profile_image + "' class=\"rounded-circle\" width=\"30\" height=\"30\">" +
        "      <p class=\"notification\">" +
        "       <b>" + username + "</b> sent you a friend request</p>" +
        "</div>" +
        "<div class=\"d-flex px-2 gap-2\">" +
        "   <button type=\"button\" class=\"btn btn-success w-50 acceptRequest\" data-sender-id=\"" + user_id +"\"" + " data-receiver-id=\"" + logged_user + "\">Accept</button>" +
        "    <button type=\"button\" class=\"btn btn-danger w-50 declineRequest\" data-sender-id=\"" + user_id +"\"" + " data-receiver-id=\"" + logged_user + "\">Decline</button>" +
        "  </div>" +
        "</div>"
    let dropdown = document.querySelector('.dropdown-menu');
    dropdown.appendChild(newNotification);

    let acceptButton = document.querySelector('.notification .acceptRequest');
    acceptButton.addEventListener('click', acceptFriendRequest);

    let declineButton = document.querySelector('.notification .declineRequest');
    declineButton.addEventListener('click', declineFriendRequest);
}

function removeNotification(sender_id){
    let badgeElement = document.querySelector('.user-notifications .count.badge');

    let counter = parseInt(badgeElement.innerText) - 1;
    if (counter === 0){
        badgeElement.remove();
        let noNotifications = document.createElement("div");
        noNotifications.className="no-notifications px-3 text-center w-100";
        noNotifications.innerText="You don't have notifications";

        let element = document.querySelector('.dropdown-menu');
        element.appendChild(noNotifications);
    }
    else
        badgeElement.innerText = counter;
    let notification = document.getElementsByClassName("lirequest-" + sender_id)[0];
    notification.remove();
}

enablePusher();

addEventListeners();
