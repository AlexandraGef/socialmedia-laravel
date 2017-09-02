<?php
/**
 * Created by PhpStorm.
 * User: ideo5
 * Date: 29.08.2017
 * Time: 12:51
 */
namespace Bevy\Http\Controllers;
use Auth;
use Bevy\Models\Status;

class HomeController extends Controller
{
    public function index()
    {
        if(Auth::check()){
            $statuses = Status::notReply()->where(function($query){
                return $query->where('user_id', Auth::user()->id)
                    ->orWhereIn('user_id',Auth::user()->friends()->pluck('id'));
            })
            ->orderBy('created_at','desc')
            ->paginate(10);

            return view('timeline.index')
                ->with('statuses',$statuses);
        }

        return view('home');
    }
}

