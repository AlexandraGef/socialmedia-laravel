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

class ProfileController extends Controller
{
   public function getProfile($username)
   {
       $user = User::where('username', $username)->first();
       if(!$user){
           abort(404);
       }

       return view('profile.index')
           ->with('user', $user);
   }
   public function getEdit()
   {
       return view('profile.edit');
   }

   public function postEdit(Request $request)
   {
 $this->validate($request, [
     'imie' =>'alpha|max:20',
     'nazwisko' => 'alpha|max:30',
     'miasto' =>'max:50',
 ]);
 dd('ok');
   }

}

