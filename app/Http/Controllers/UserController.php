<?php

namespace App\Http\Controllers;

use App\Events\Notification;
use App\Models\User;
use App\Notifications\FriendRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Session;

class UserController extends Controller
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
    public function create(Request $request)
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }


    public function show($id)
    {
        $user = User::find($id);
        $areFriends = false;
        $hasRequest = false;
        if(Auth::check()){
            $auth_id = Auth::user()->id;
            $areFriends = DB::table('friendships')->where('id_user1', $id)->where('id_user2', $auth_id)->first()
                || DB::table('friendships')->where('id_user1', $auth_id)->where('id_user2', $id)->first();
            $hasRequest = DB::table('friendrequests')->where('id_sender', $id)->where('id_receiver', $auth_id)->first()
                || DB::table('friendrequests')->where('id_sender', $auth_id)->where('id_receiver', $id)->first();
        }
        return view('pages.profile', ['user' => $user, 'threads' => $user->threads, 'hasRequest' => $hasRequest, 'areFriends' => $areFriends]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function showNotifications($id)
    {
        $user = User::find($id);
        return view('partials.navbar', ['user' => $user, 'threads' => $user->threads]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function showAdmin()
    {
        $user = new User();

        $reportedUsers = $user->reportedUsers();
        $bannedUsers = $user->bannedUsers();
        $admins = $user->admins();

        return view('pages.administration', ['reported' => $reportedUsers, 'banned' => $bannedUsers, 'admins' => $admins]);
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function showReported($id)
    {
        $user = User::find($id);
        $threads = $user->reportedThreadsSorted($user);

        $userComments = $user->comments;
        $comments = [];

        foreach ($userComments as $comment) {
            if ($comment->reports->count() > 0 && $comment->owner->id == $id)
                array_push($comments, $comment);
        }
        usort($comments, function ($a, $b)
        {
            if ($a->reports->count() == $b->reports->count()) {
                return 0;
            }
            return ($a->reports->count() > $b->reports->count()) ? -1 : 1;
        });

        return view('pages.reportedPosts', ['user' => $user, 'reportedthreads' => $threads, 'reportedcomments' => $comments]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function showTopPosts($id)
    {
        $user = User::find($id);
        $userThreads = $user->threads;
        $userComments = $user->comments;
        $threads = $user->topThreads($userThreads);
        $comments = $user->topComments($userComments);

        return view('pages.topPosts', ['user' => $user, 'topthreads' => $threads, 'topcomments' => $comments]);
    }

    /**
     * Bans the specified user.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function banUser($id)
    {
        $user = User::find($id);
        $user->is_banned = true;
        $updatedReportedThreads = $user->reportedThreads($id);
        $updatedReportedComments = $user->reportedComments($id);

        if ($updatedReportedThreads->first()) {
            if (!$updatedReportedThreads->delete())
                return 0;
        }

        if ($updatedReportedComments->first()) {
            if (!$updatedReportedComments->delete())
                return 0;
        }

        if(!$user->save())
            return 0;
        return $id;
    }

    /**
     * Bans the specified user.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function banUserWithRedirect($id)
    {
        $user = User::find($id);
        $user->is_banned = true;
        $updatedReportedThreads = $user->reportedThreads($id);
        $updatedReportedComments = $user->reportedComments($id);

        if ($updatedReportedThreads->first()) {
            if (!$updatedReportedThreads->delete())
                return redirect('/administration')->with('error','Something went wrong while banning the User!');
        }

        if ($updatedReportedComments->first()) {
            if (!$updatedReportedComments->delete())
                return redirect('/administration')->with('error','Something went wrong while banning the User!');
        }

        if(!$user->save())
            return redirect('/administration')->with('error','Something went wrong while banning the User!');
        return redirect('/administration')->with('success','User banned succesfully!');
    }


    /**
     * Unbans the specified user.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function unbanUser($id)
    {
        $user = User::find($id);
        $user->is_banned = false;

        if(!$user->save())
            return 0;
        return $id;
    }

    /**
     * Awards admin to the specified user.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function awardAdmin($id)
    {
        $user = User::find($id);
        $user->is_admin = true;
        if(!$user->save())
            return redirect('/administration')->with('error','Something went wrong while giving administrator privileges the User!');
        return redirect('/administration')->with('success','User was awarded administrator privileges succesfully!');
    }

    /**
     * Display the specified user's friends.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show_friends($id)
    {
        $user = User::find($id);

        return view('pages.friends', ['user' => $user, 'friends' => $user->friends()]);
    }

    /**
     *Delete friend from user's friends list.
     *
     * @param \App\Models\User $user
     * @return \Illuminate\Http\Response
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function delete_friend($id, $idFriend)
    {
        $user = User::find($id);
        $this->authorize('delete_friend', $user);
        if(DB::table('friendships')->where('id_user1', $id)->where('id_user2', $idFriend)->delete() || DB::table('friendships')->where('id_user1', $idFriend)->where('id_user2', $id)->delete()){
            //Session::reflash('success', 'Friend removed successfully!');
            return $idFriend;
        }
        else{
            //Session::reflash('error', 'Something went wrong while removing friend!');
            return 0;
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //$user = User::findOrFail($id);
        //$this->authorize('update',$user);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function editPassword($id)
    {
        $user = User::findOrFail($id);
        $this->authorize('updatePassword',$user);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function editEmail($id)
    {
        $user = User::findOrFail($id);
        $this->authorize('updateEmail',$user);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);
        $this->authorize('update', $user);
        $validatedData = $request->validate([
            'username' => 'max:100',
            'description' => 'required'
            ]
        );

        $user->username = $request->input('username');
        $user->description = $request->input('description');

        if($request->has('profile_image')) {
            $user->profile_image = base64_encode(file_get_contents($request->file('profile_image')->path()));
        }

        if($request->has('header_image'))
            $user->header_image = base64_encode(file_get_contents($request->file('header_image')->path()));

        if(!$user->save())
            return redirect('/users/{id}/edit')->with('error','Something went wrong while editing the Thread!');

        return redirect('/users/'.$user->id)->with('success','User Settings edited successfully!');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function updatePassword(Request $request, $id)
    {
        $user = User::findOrFail($id);
        $this->authorize('update', $user);

        if (!Hash::check($request->input('old_password'), $user->password)) {
            return redirect('/settings/'.$user->id)->with('error','Old password doesn\'t match!');
        }

        $validatedData = $request->validate([
            'old_password' => 'required|string|min:6',
            'password' => 'required|string|min:6|confirmed',
            ]
        );

        User::find(auth()->user()->id)->update(['password'=> Hash::make($request->input('password'))]);

        echo "goods";

        return redirect('/settings/'.$user->id)->with('success','Password updated successfully!');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function updateEmail(Request $request, $id)
    {
        $user = User::findOrFail($id);
        $this->authorize('update', $user);
        $validatedData = $request->validate([
            'email' => 'required|email',
            ]
        );

        if ($user->email === $request->input('email'))
            return redirect('/settings/'.$user->id)->with('error','Email Address is the same!');

        $user->email = $request->input('email');

        if(!$user->save())
            return redirect('/settings/'.$user->id )->with('error','Something went wrong while updating your email address!');

        return redirect('/settings/'.$user->id)->with('success','Email Address updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        $user = User::findOrFail($id);
        $this->authorize('delete',$user);

        $validatedData = $request->validate([
            'password' => 'required|string|min:6|confirmed',
            ]
        );

        if (!Hash::check($request->input('password'), $user->password)) {
            return redirect('/settings/'.$user->id)->with('error','Old password doesn\'t match!');
        }

        $user->delete();

        return redirect('/logout')->with('success','Account deleted successfully!');
    }

    /**
     * Display specified user's settings.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function showSettings($id)
    {
        $user = User::find($id);
        return view('pages.settings', ['user' => $user]);
    }

    /**
     * Display specified user's settings.
     *
     * @param $sender_id
     * @param $receiver_id
     */
    public function sendRequest($sender_id, $receiver_id)
    {
        $user = User::find($receiver_id);
        $user->notify(new FriendRequest($sender_id));

        DB::table('friendrequests')->insert(['id_sender' => $sender_id, 'id_receiver' => $receiver_id]);

        $sender = User::find($sender_id);
        event(new Notification($sender, $user, 'request'));

        return json_encode(['id_sender' => $sender_id, 'id_receiver' => $receiver_id]);
    }

    public function undoRequest($sender_id, $receiver_id)
    {
        $user = User::find($receiver_id);
        //$user->notify(new FriendRequest($sender_id));

        DB::table('friendrequests')->where(['id_sender' => $sender_id, 'id_receiver' => $receiver_id])->delete();
        DB::table('notifications')->where(['notifiable_id' => $receiver_id])->delete();

        $sender = User::find($sender_id);
        event(new Notification($sender, $user, 'remove'));

        return json_encode(['id_sender' => $sender_id, 'id_receiver' => $receiver_id]);
    }

    /**
     * Display specified user's settings.
     *
     * @param $sender_id
     * @param $receiver_id
     * @return int
     */
    public function acceptRequest($sender_id, $receiver_id)
    {
        if(DB::table('friendships')->insert(['id_user1' => $sender_id, 'id_user2' => $receiver_id])){
            DB::table('notifications')->where('notifiable_id', '=', $receiver_id)->where('data','LIKE','%"user_id":'.$sender_id.'%')->delete();
            DB::table('friendrequests')->where(['id_sender' => $sender_id, 'id_receiver' => $receiver_id])->delete();
            return json_encode(array(count(DB::table('notifications')->where('notifiable_id','=',$receiver_id)->get()),$sender_id));
        }
        else{
            return -1;
        }
    }

    public function declineRequest($sender_id, $receiver_id)
    {
        if (DB::table('friendrequests')->where(['id_sender' => $sender_id, 'id_receiver' => $receiver_id])->delete()) {
            DB::table('notifications')->where('notifiable_id', '=', $receiver_id)->where('data', 'LIKE', '%"user_id":' . $sender_id . '%')->delete();
            DB::table('friendrequests')->where(['id_sender' => $sender_id, 'id_receiver' => $receiver_id])->delete();
            return json_encode(array(count(DB::table('notifications')->where('notifiable_id','=',$receiver_id)->get()),$sender_id));
        }else{
            return -1;
        }

    }

    public function notificationAttr($id){
        $user = User::find($id);

        return json_encode(['id' => $user->id, 'username' => $user->username, 'profile_image' => stream_get_contents($user->profile_image)]);
    }

}
