<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storeComment(Request $request, $id)
    {
        if (!Auth::check()) return redirect('/home');

        $comment = new Comment();

        $validatedData = $request->validate([
            'description' => 'required'
        ]);

        $comment->id_user = Auth::user()->id;
        $comment->id_thread = $id;
        $comment->comment_text = $request->input('description');

        $comment->save();

        $comment = Comment::find($comment->id);


        $view = view('partials.comment', ['comments' => [$comment]]);
        $view = $view->render();

        return response()->json(array('id' => $comment->id, 'comment' => $view));
    }

    public function storeReply(Request $request, $id)
    {
        if (!Auth::check()) return redirect('/home');

        $comment = new Comment();

        $validatedData = $request->validate([
            'description' => 'required'
        ]);

        $comment->id_user = Auth::user()->id;
        $comment->id_comment = $id;
        $comment->comment_text = $request->input('description');

        $comment->save();

        $comment = Comment::find($comment->id);


        $view = view('partials.comment', ['comments' => [$comment]]);
        $view = $view->render();

        return response()->json(array('id' => $comment->id, 'idComment' => $id ,'reply' => $view));
    }

    public function upvote($id)
    {
        if (!Auth::check()) return response()->json('', 401);
        $comment = Comment::findOrFail($id);

        $this->authorize('vote',$comment);

        $idUser = Auth::user()->id;

        /*$vote = DB::table('commentratings')->where('id_user', '=', $idUser)->where('id_comment', '=', $id)->first();
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
        }*/

        $upvote = $comment->upVote($idUser, $id);

        $updatedComment = Comment::findOrFail($id);

        return response()->json(array('id' =>$id, 'rating' => $updatedComment->rating, 'upvote' => $upvote));
    }

    public function downvote($id)
    {
        if (!Auth::check()) return response()->json('', 401);
        $comment = Comment::findOrFail($id);

        $this->authorize('vote', $comment);

        $idUser = Auth::user()->id;

        /*$vote = DB::table('commentratings')->where('id_user', '=', $idUser)->where('id_comment', '=', $id)->first();
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
        }*/

        $downvote = $comment->downVote($idUser, $id);

        $updatedComment = Comment::findOrFail($id);

        return response()->json(array('id' =>$id, 'rating' => $updatedComment->rating, 'downvote' => $downvote));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function show(Comment $comment)
    {
       //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function edit($comment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $comment = Comment::findOrFail($id);
        $this->authorize('update',$comment);

        $validatedData = $request->validate([
            'text' => 'required'
            ]
        );

        $comment->comment_text = $request->input('text');
        $comment->save();


        return response()->json(array('id' => $id,'text' => ($request->input('text'))));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $comment = Comment::findOrFail($id);
        $this->authorize('delete',$comment);
        $comment->delete();

        return response()->json(array('id' => $id));
    }

    /**
     *Adds report to list.
     *
     * @return \Illuminate\Http\Response
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function reportComment($commentId, $userId)
    {
        $comment = Comment::findOrFail($commentId);
        $this->authorize('report', $comment);

        if(DB::table('reportcomments')->insert(['id_user' => $userId, 'id_comment' => $commentId])){
            return $commentId;
        }
        else{
            return 0;
        }
    }

    /**
     *Delete report from comment reports.
     *
     * @param \App\Models\User $user
     * @return \Illuminate\Http\Response
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function undoReportComment($commentId, $userId)
    {
        $comment = Comment::findOrFail($commentId);
        $this->authorize('undoReport', $comment);

        if(DB::table('reportcomments')->where('id_user', $userId)->where('id_comment', $commentId)->delete()){
            return $commentId;
        }
        else{
            return 0;
        }
    }
}
