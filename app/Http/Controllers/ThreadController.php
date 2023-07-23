<?php

namespace App\Http\Controllers;

use App\Models\Thread;
use App\Models\ThreadImage;
use App\Models\Category;
use App\Models\User;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use Session;

class ThreadController extends Controller
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
        if (!Auth::check()) return redirect('/home');
        $categories = Category::where('id','>', 2)->get();
        return view('pages.createThread', ['categories' => $categories]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (!Auth::check()) return redirect('/home');         

        $thread = new Thread();

        $validatedData = $request->validate([
            'title' => 'required|max:100',
            'summary' => 'required|max:300',
            'mainCategory' => 'required',
            'categories' => 'required|array|min:1',
            'description' => 'required',
            'images' => 'array'
        ]
        );

        $thread->id_user = Auth::user()->id;
        $thread->title = $request->input('title');
        $thread->summary = $request->input('summary');
        $thread->description = $request->input('description');


        if(!$thread->save()){
            return redirect('/create_thread')->with('error','Something went wrong while creating the Thread!');
        }

        $categories = $request->input('categories');
        $mainCategory = $request->input('mainCategory');
        $images = $request->file('images');

        if($request->has('images')){
            foreach($images as $image){
                $threaImage = new ThreadImage();
                $threaImage->image = base64_encode(file_get_contents($image->path()));
                $threaImage->id_thread = $thread->id;
                $threaImage->save();
            }
        }

        /*DB::table('threadcategories')->insert(['id_thread' => $thread->id, 'id_category' => $mainCategory]);

        foreach($categories as $category){

            DB::table('threadcategories')->insert(['id_thread' => $thread->id, 'id_category' => $category]);
        }*/

        $thread->addCategories($thread->id, $categories, $mainCategory);


        return redirect('/threads/'.$thread->id)->with('success','Thread created successfully!');

    }

    public function upvote($id)
    {
        if (!Auth::check()) return response()->json('', 401);

        $thread = Thread::findOrFail($id);
        
        $this->authorize('vote',$thread);

        $idUser = Auth::user()->id;

        /*$vote = DB::table('threadratings')->where('id_user', '=', $idUser)->where('id_thread', '=', $id)->first();
        $upvote = false;

        if($vote == null){
           DB::table('threadratings')->insert([['id_user' => $idUser, 'id_thread' => $id, 'upvote' => true]]);
           $upvote = true;
        }
        else if($vote->upvote === true){
            DB::table('threadratings')->where('id_user', '=', $idUser)->where('id_thread', '=', $id)->delete();
        }
        else if($vote->upvote === false){
            DB::table('threadratings')->where('id_user', '=', $idUser)->where('id_thread', '=', $id)->update(['upvote' => true]);
            $upvote = true;
        }*/

        $upvote = $thread->upVote($idUser, $id);

        $updatedThread = Thread::findOrFail($id);

        return response()->json(array('id' => $id, 'rating' => $updatedThread->rating, 'upvote' => $upvote));
    }

    public function downvote($id)
    {
        if (!Auth::check()) return response()->json('', 401);
        $thread = Thread::findOrFail($id);
        
        $this->authorize('vote', $thread);

        $idUser = Auth::user()->id;

        /*$vote = DB::table('threadratings')->where('id_user', '=', $idUser)->where('id_thread', '=', $id)->first();
        $downvote = false;

        if($vote == null){
            DB::table('threadratings')->insert([['id_user' => $idUser, 'id_thread' => $id, 'upvote' => false]]);
            $downvote = true;
        }
        else if($vote->upvote === false){
            DB::table('threadratings')->where('id_user', '=', $idUser)->where('id_thread', '=', $id)->delete();
        }
        else if($vote->upvote === true){
            DB::table('threadratings')->where('id_user', '=', $idUser)->where('id_thread', '=', $id)->update(['upvote' => false]);
            $downvote = true;
        }*/

        $downvote = $thread->downVote($idUser, $id);

        $updatedThread = Thread::findOrFail($id);

        return response()->json(array('id' =>$id, 'rating' => $updatedThread->rating, 'downvote' => $downvote));
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return Application|Factory|View
     */
    public function show($id)
    {
        $thread = Thread::findOrFail($id);
        $categories = $thread->categories;
        $comments = $thread->comments;
        $images = $thread->images;

        $reported = false;
        if (Auth::check()) $reported = DB::table('reportthreads')
            ->where('id_user', '=', Auth::user()->id)
            ->where('id_thread', '=', $id)->first();


        return view('pages.thread', ['thread' => $thread, 'categories' => $categories, 'comments' => $comments, 'images' => $images, 'reported' => $reported]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Thread $thread
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $thread = Thread::findOrFail($id);
        $this->authorize('update',$thread);
        $categories = $thread->categories;
        $images = $thread->images;
        $allCategories = Category::where('id','>', 2)->get();

        
        return view('pages.editThread', ['thread' => $thread, 'categories' => $categories, 'allCategories' => $allCategories, 'images' => $images]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param Thread $thread
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $thread = Thread::findOrFail($id);
        $this->authorize('update',$thread);

        $validatedData = $request->validate([
            'title' => 'required|max:100',
            'summary' => 'required|max:300',
            'categories' => 'required|array|min:1',
            'description' => 'required',
            'oldImages' => 'array',
            'images' => 'array'
            ]
        );

        $thread->title = $request->input('title');
        $thread->summary = $request->input('summary');
        $thread->description = $request->input('description');

        if(!$thread->save())
            return redirect('/threads/{id}/edit')->with('error','Something went wrong while editing the Thread!');

        $oldCategories = $thread->categories;

        $updatedCategories = $request->input('categories');
        $images = $thread->images;
        if($request->has('oldImages'))
            $oldImages = $request->input('oldImages');
        else
            $oldImages = [];
        $addedImages = $request->file('images');

        /*foreach($updatedCategories as $category){
            if(!$oldCategories->contains('id', $category))
                DB::table('threadcategories')->insert(['id_thread' => $thread->id, 'id_category' => $category]);

        }

        foreach($oldCategories as $category){
            if(!in_array($category->id, $updatedCategories))
                DB::table('threadcategories')->where('id_thread', $id)->where('id_category', $category->id)->delete();

        }*/

        $thread->updateCategories($id, $updatedCategories, $oldCategories);

        foreach($images as $image){
            if(!in_array($image->id, $oldImages)){
                $image->delete();
            }

        }

        if($request->has('images')){

            foreach($addedImages as $addedImage){
                $threaImage = new ThreadImage();
                $threaImage->image = base64_encode(file_get_contents($addedImage->path()));
                $threaImage->id_thread = $thread->id;
                $threaImage->save();
            }
        }


        return redirect('/threads/'.$thread->id)->with('success','Thread edited successfully!');
    }

    /**
     *Adds report to list.
     *
     * @return \Illuminate\Http\Response
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function reportThread($threadId, $userId)
    {
        $thread = Thread::findOrFail($threadId);
        $this->authorize('report', $thread);

        if(DB::table('reportthreads')->insert(['id_user' => $userId, 'id_thread' => $threadId])){
            return $threadId;
        }
        else{
            return 0;
        }
    }

    /**
     *Delete report from thread reports.
     *
     * @param \App\Models\User $user
     * @return \Illuminate\Http\Response
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function undoReportThread($threadId, $userId)
    {
        $thread = Thread::findOrFail($threadId);
        $this->authorize('undoReport', $thread);

        if(DB::table('reportthreads')->where('id_user', $userId)->where('id_thread', $threadId)->delete()){
            return $threadId;
        }
        else{
            return 0;
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Thread $thread
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {   
        $thread = Thread::findOrFail($id);
        $this->authorize('delete',$thread);
        $thread->delete();

        return redirect('/home')->with('success','Thread deleted successfully!');
    }
}
