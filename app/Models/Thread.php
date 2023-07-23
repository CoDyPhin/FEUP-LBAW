<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Thread extends Model
{
    use HasFactory;

    protected $table = 'threads';

    public $timestamps  = false;

    protected $fillable = [
        'title', 'summary', 'description', 'rating', 'creation_date'
    ];


    /**
     * The categories that belong to the Thread
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function categories()
    {
        return $this->belongsToMany(Category::class, 'threadcategories', 'id_thread', 'id_category');
    }

    /**
     * The reports that belong to the Thread
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function reports()
    {
        return $this->belongsToMany(User::class, 'reportthreads', 'id_thread', 'id_user');
    }

    /**
     * Get all of the comments for the Thread
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function comments()
    {
        return $this->hasMany(Comment::class, 'id_thread')->orderBy('rating', 'desc')->orderBy('creation_date', 'asc');
    }

    /**
     * Get the user that owns the Thread
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function owner()
    {
        return $this->belongsTo(User::class, 'id_user');
    }

    /**
     * The votes that belong to the Thread
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function votes()
    {
        return $this->belongsToMany(User::class, 'threadratings', 'user_id', 'id_thread')->withPivot('upvote');
    }

    /**
     * Get all of the images for the Thread
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function images()
    {
        return $this->hasMany(ThreadImage::class, 'id_thread');
    }

    public function hasVoted($idUser)
    {      
        return DB::table('threadratings')->where('id_user', '=', $idUser)->where('id_thread', '=', $this->id)->first();
    }

    /**
     * Check if Thread has a specific Category
     *
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function threadHasCategory($query, $id)
    {
        return $query->where('categories', 'like', "%\"{$id}\"%"); 
    }

    /**
     * Insert thread categories
     *
     */
    public function addCategories($id, $categories, $mainCategory)
    {
        DB::table('threadcategories')->insert(['id_thread' => $id, 'id_category' => $mainCategory]);

        foreach($categories as $category){

            DB::table('threadcategories')->insert(['id_thread' => $id, 'id_category' => $category]);
        } 
    }

    /**
     * Update thread categories
     *
     */
    public function updateCategories($id, $updatedCategories, $oldCategories)
    {
        foreach($updatedCategories as $category){
            if(!$oldCategories->contains('id', $category))
                DB::table('threadcategories')->insert(['id_thread' => $id, 'id_category' => $category]);

        }

        foreach($oldCategories as $category){
            if(!in_array($category->id, $updatedCategories))
                DB::table('threadcategories')->where('id_thread', $id)->where('id_category', $category->id)->delete();

        }
    }

    /**
     * Upvote on thread
     *
     */
    public function upVote($idUser, $id)
    {
        $vote = DB::table('threadratings')->where('id_user', '=', $idUser)->where('id_thread', '=', $id)->first();
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
        }

        return $upvote;
    }

    /**
     * Downvote on thread
     *
     */
    public function downVote($idUser, $id)
    {
        $vote = DB::table('threadratings')->where('id_user', '=', $idUser)->where('id_thread', '=', $id)->first();
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
        }

        return $downvote;
    }

    
    public function filterThread($request, $array){
        $text = $request->searchstr;
        if(!empty($array))
            $threads = $this->join('threadcategories', 'threads.id', '=', 'threadcategories.id_thread')
                        ->whereIn('threadcategories.id_category', $array);
        
        else
            $threads = $this->select('threads.*');

        $ordering = $request->input('orderby');
        if($request->has('description')){
            $threads = $threads
                ->where(function($query) use ($text){
                    $query->whereRaw('description @@ plainto_tsquery(\'english\', ?)', [$text])
                    ->orWhere('title', 'ILIKE', "%".$text."%")
                    ->orWhere('summary', 'ILIKE', "%".$text."%");
                })
                ->orderByRaw('ts_rank(to_tsvector(description), plainto_tsquery(\'english\', ?)) DESC', [$text]);

            if(!empty($array)){
                $threads = $threads->groupBy('threads.id')
                ->orderByRaw('count(threadCategories.id_category) DESC')
                ->select('threads.*');
            }
            $threads = $threads->get();
        }
        else{
            $threads = $threads
            ->where(function($query) use ($text){
                $query->where('title', 'ILIKE', "%".$text."%")
                ->orWhere('summary', 'ILIKE', "%".$text."%");
            });

            if(!empty($array)){
                $threads = $threads->groupBy('threads.id')
                ->orderByRaw('count(threadCategories.id_category) DESC')
                ->select('threads.*');
            }
            
            $threads = $threads->get();
        }

        if($request->has('minrating') && $request->input('minrating') != null){
            $threads = $threads->where('rating','>=', $request->input('minrating'));
        }

        if($request->has('maxrating') && $request->input('maxrating') != null){
            $threads = $threads->where('rating','<=', $request->input('maxrating'));
        }

        if($request->has('maxdate') && $request->input('maxdate') != null){
            $threads = $threads->where('creation_date','<=', $request->input('maxdate'));
        }

        if($request->has('mindate') && $request->input('mindate') != null){
            $threads = $threads->where('creation_date','>=', $request->input('mindate'));
        }

        switch($ordering){
            case 'tdesc':
                $threads = $threads->sortByDesc('rating');
                break;
            case 'tasc':
                $threads = $threads->sortBy('rating');
                break;
            case 'rdesc':
                $threads = $threads->sortByDesc('creation_date');
                break;
            case 'rasc':
                $threads = $threads->sortBy('creation_date');
                break;
        }       
        return $threads;
    }

    public function findReviews(){
        return Thread::whereHas('categories', function($q)
        {
            $categoryName = "Reviews";
            $category = Category::where('name', '=', $categoryName)->first();
            $q->where('id_category', 'like', $category->id);
        });
    }

    public function findNews(){
        return Thread::whereHas('categories', function($q)
        {
          $categoryName = "News";
          $category = Category::where('name', '=', $categoryName)->first();
          $q->where('id_category', 'like', $category->id);
        });
    }
}
