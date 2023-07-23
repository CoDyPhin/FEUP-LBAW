<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\DB;

class User extends Authenticatable
{
    use Notifiable;
    protected $table = 'users';


    // Don't add create and update timestamps in database.
    public $timestamps  = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'username', 'email', 'password', 'description', 'reputation', 'profile_image', 'header_image', 'is_banned', 'is_admin'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * Get all of the comments for the User
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function comments()
    {
        return $this->hasMany(Comment::class, 'id_user');
    }

    /**
     * Get all of the threads for the User
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function threads()
    {
        return $this->hasMany(Thread::class, 'id_user');
    }

    /**
     * The friendships that belong to the User
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function friends()
    {
        $firstPart = $this->belongsToMany(User::class, 'friendships', 'id_user1', 'id_user2')->get();
        $secondPart = $this->belongsToMany(User::class, 'friendships', 'id_user2', 'id_user1')->get();

        //foreach($secondPart as $s)

        //$friends = $firstPart->toArray()->append($secondPart->toArray());

        return $firstPart->merge($secondPart);
    }

    /**
     * The friend requests that belong to the User
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function friendRequests()
    {
        return $this->belongsToMany(User::class, 'friendrequests', 'id_sender', 'id_receiver');
    }

    public function filterUser($request, $array){
        $text = $request->searchstr;
        if(!empty($array)){
            $users = User::join('threads', 'users.id', '=', 'threads.id_user')
            ->join('threadcategories', 'threads.id', '=', 'threadcategories.id_thread')
            ->whereIn('threadcategories.id_category', $array);
        }
        else
            $users = User::select('users.*');

        $ordering = $request->input('orderby');
        if($request->has('description')){
            $users = $users
                ->where(function($query) use ($text){
                    $query->whereRaw('users.description @@ plainto_tsquery(\'english\', ?)', [$text])
                    ->orWhere('username', 'ILIKE', "%".$text."%");
                })
                ->orderByRaw('ts_rank(to_tsvector(users.description), plainto_tsquery(\'english\', ?)) DESC', [$text]);

            if(!empty($array)){
                $users = $users->groupBy('users.id')
                ->orderByRaw('count(threadCategories.id_category) DESC')
                ->select('users.*');
            }
            $users = $users->get();
        }
        else{
            $users = $users
            ->where(function($query) use ($text){
                $query->where('username', 'ILIKE', "%".$text."%");
            });

            if(!empty($array)){
                $users = $users->groupBy('users.id')
                ->orderByRaw('count(threadCategories.id_category) DESC')
                ->select('users.*');
            }

            $users = $users->get();
        }

        if($request->has('minrating') && $request->input('minrating') != null){
            $users = $users->where('reputation','>=', $request->input('minrating'));
        }

        if($request->has('maxrating') && $request->input('maxrating') != null){
            $users = $users->where('reputation','<=', $request->input('maxrating'));
        }

        switch ($ordering) {
            case 'rdesc':
                $users = $users->sortByDesc('reputation');
                break;
            case 'rasc':
                $users = $users->sortBy('reputation');
                break;
            default:
                break;
        }
        return $users;
    }

    /**
     * Platform's reported users
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function reportedUsers()
    {
        $reportedUsers = DB::table('users')
        ->join('threads', 'users.id', '=', 'threads.id_user')
        ->join('reportthreads', 'reportthreads.id_thread', '=', 'threads.id')
        ->where([['users.is_banned', '=', 'false'], ['users.is_admin', '=', 'false']])
        ->groupByRaw('users.username, users.reputation, users.profile_image, users.id')
        ->orderBy('users.reputation', 'desc')
        ->select('users.username', 'users.reputation', 'users.profile_image', 'users.id')
        ->get();

        return $reportedUsers;
    }

    /**
     * Platform's banned users
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function bannedUsers()
    {
        $bannedUser = DB::table('users')
        ->where('is_banned', '=', 'true')
        ->orderBy('users.reputation', 'desc')
        ->get();

        return $bannedUser;
    }

    /**
     * Platform's reputed users (can be promoted to admin)
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function admins()
    {
        $admins = DB::table('users')
        ->where([['reputation', '>=', '30'], ['is_admin', '=', 'false'], ['is_banned', '=', 'false']])
        ->orderBy('users.reputation', 'desc')
        ->get();

        return $admins;
    }

    /**
     * User's reported threads sorted by number of reports
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function reportedThreadsSorted($user)
    {
        $userThreads = $user->threads;
        $threads = [];

        foreach ($userThreads as $thread) {
            if ($thread->reports->count() > 0)
                array_push($threads, $thread);
        }
        usort($threads, function ($a, $b)
        {
            if ($a->reports->count() == $b->reports->count()) {
                return 0;
            }
            return ($a->reports->count() > $b->reports->count()) ? -1 : 1;
        });

        return $userThreads;
    }

    /**
     * User's reported top threads
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function topThreads($userThreads)
    {
        $threads = [];

        foreach ($userThreads as $thread) {
            if ($thread->reports->count() > 0)
                array_push($threads, $thread);
        }
        usort($threads, function ($a, $b)
        {
            if ($a->rating == $b->rating) {
                return 0;
            }
            return ($a->rating > $b->rating) ? -1 : 1;
        });
        $threads = array_slice($threads, 0, 3);

        return $threads;
    }

    /**
     * User's reported top comments
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function topComments($userComments)
    {
        $comments = [];

        foreach ($userComments as $comment) {
            if ($comment->rating > 0)
                array_push($comments, $comment);
        }
        usort($comments, function ($a, $b)
        {
            if ($a->rating == $b->rating) {
                return 0;
            }
            return ($a->rating > $b->rating) ? -1 : 1;
        });
        $comments = array_slice($comments, 0, 3);

        return $comments;
    }

    /**
     * User's reported threads
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function reportedThreads($id)
    {
        $updatedReportedThreads = DB::table('reportthreads')
        ->join('threads', 'threads.id', '=', 'reportthreads.id_thread')
        ->where('threads.id_user', "=", $id);

        return $updatedReportedThreads;
    }

    /**
     * User's reported comments
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function reportedComments($id)
    {
        $updatedReportedComments = DB::table('reportcomments')
        ->join('comments', 'comments.id', '=', 'reportcomments.id_comment')
        ->where('comments.id_user', "=", $id);

        return $updatedReportedComments;
    }

    public function friendCheck($auth_id){
        $areFriends = false;
        $areFriends = DB::table('friendships')->where('id_user1', $this->id)->where('id_user2', $auth_id)->first()
            || DB::table('friendships')->where('id_user1', $auth_id)->where('id_user2', $this->id)->first();
        return $areFriends;
    }
}
