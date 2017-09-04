<?php
/**
 * Created by PhpStorm.
 * User: ideo5
 * Date: 29.08.2017
 * Time: 12:51
 */
namespace Bevy\Http\Controllers;

use Bevy\Models\User;
use Illuminate\Http\Request;
use Auth;
class FriendController extends Controller
{
    public function getIndex()
    {
        $friends  = Auth::user()->friends();
        $requests = Auth::user()->friendRequests();
        return view('friends.index')
            ->with('friends', $friends)
            ->with('requests', $requests);
    }
    public function getAdd($username)
    {
        $user = User::where('username', $username)->first();

        if(!$user){
            return redirect()
                ->route('home')
                ->with('alert','Dany użytkownik nie został znaleziony');
        }

        if(Auth::user()->id === $user->id){
            return redirect()->route('home');
        }
        if(Auth::user()->hasFriendRequestsPending($user) || $user->
            hasFriendRequestReceived(Auth::user())) {
            return redirect()
                ->route('profile.index',['username' =>$user->username])
            ->with('info', 'Oczekujące zaproszenie do znajomych');
        }

        if(Auth::user()->isFriendsWith($user)) {
            return redirect()
                ->route('profile.index',['username'=>$user->username])
                ->with('info','Jesteście już znajomymi');
        }
        Auth::user()->addFriend($user);

        return redirect()
            ->route('profile.index',['username'=> $username])
            ->with('success','Zaproszenie do znajomych zostało wysłane');

    }
    public function getAccept($username)
    {
        $user = User::where('username', $username)->first();

        if(!$user){
            return redirect()
                ->route('home')
                ->with('alert','Dany użytkownik nie został znaleziony');
        }

        if(!Auth::user()->hasFriendRequestReceived($user)){
            return redirect()->route('home');
        }

        Auth::user()->acceptFriendRequest($user);

        return redirect()
            ->route('profile.index', ['username' =>$username])
            ->with('success', 'Zaproszenie zostało zaakceptowane');
    }

    public function postDelete($username)
    {
        $user = User::where('username', $username)->first();

        if(!Auth::user()->isFriendsWith($user)){
            return redirect()->back();
        }

        Auth::user()->deleteFriend($user);

        return redirect()->back()->with('info', 'Znajomy został usunięty');
    }
}

