<?php
/**
 * Created by PhpStorm.
 * User: ideo5
 * Date: 29.08.2017
 * Time: 12:51
 */
namespace Bevy\Http\Controllers;
use Auth;
use Bevy\Models\User;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
   public function getProfile($username)
   {
       $user = User::where('username', $username)->first();
       if(!$user){
           abort(404);
       }

       $statuses = $user->statuses()->notReply()->get();

       return view('profile.index')
            ->with('user', $user)
            ->with('statuses', $statuses)
            ->with('authUserIsFriend', Auth::user()->isFriendsWith($user));
   }
   public function getEdit()
   {
       return view('profile.edit');
   }

   public function postEdit(Request $request)
   {
 $this->validate($request, [
     'first_name' =>'alpha|max:20',
     'last_name' => 'alpha|max:30',
     'location' =>'max:50',
 ]);
Auth::user()->update([
    'first_name' => $request->input('first_name'),
    'last_name' => $request->input('last_name'),
    'location'=> $request->input('location'),
]);
return redirect()
    ->route('profile.edit')
    ->with('success' ,'Twój profil został zaktualizowany !');
   }

}

