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
        return view('friends.index')
            ->with('friends', $friends);
    }
}

