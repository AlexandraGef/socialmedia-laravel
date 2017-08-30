<?php
/**
 * Created by PhpStorm.
 * User: ideo5
 * Date: 29.08.2017
 * Time: 12:51
 */
namespace Bevy\Http\Controllers;
use DB;
use Bevy\Models\User;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function getResults(Request $request)
    {
        $query = $request->input('szukaj');
        if(!$query){
            return redirect()->route('home');
        }

        $users = User::where(DB::raw("CONCAT(first_name, ' ', last_name)"), 'LIKE', "%{$query}%")
            ->orWhere('username', 'LIKE', "%{$query}%")
            ->orWhere('email', 'LIKE', "%{$query}%")
            ->orWhere('location', 'LIKE', "%{$query}%")
            ->get();

        return view('search.results')->with('users', $users);
    }
}

