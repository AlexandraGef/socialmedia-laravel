<?php
/**
 * Created by PhpStorm.
 * User: Ola
 * Date: 02.09.2017
 * Time: 18:46
 */
namespace Bevy\Http\Controllers;
use Auth;
use Illuminate\Http\Request;
use Bevy\Models\Status;

class StatusController extends Controller
{
 public function postStatus(Request $request){
 $this->validate($request, [
     'status'=> 'required|max:500',
 ]);
 Auth::user()->statuses()->create([
     'body'=> $request->input('status'),
 ]);
 return redirect()
     ->route('home')
     ->with('success', 'Twój status został zaktualizowany');
 }
 public function postReply(Request $request, $statusId)
 {
     $this->validate($request, [
         "reply-{$statusId}" => 'required|max:300',
     ], [
         'required' => 'Komentarz nie może być pusty !']);

     $status = Status::notReply()->find($statusId);

     if(!$status){
         return redirect()->route('home');
     }

     if(!Auth::user()->isFriendsWith($status->user) && Auth::user()->id !==$status->user->id){
         return redirect()->route('home');
     }

     $reply = Status::create([
         'body' => $request->input("reply-{$statusId}"),
     ])->user()->associate(Auth::user());

     $status->replies()->save($reply);

     return redirect()->back();
 }
}

