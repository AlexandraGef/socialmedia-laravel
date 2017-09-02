<?php
/**
 * Created by PhpStorm.
 * User: Ola
 * Date: 02.09.2017
 * Time: 18:46
 */
<?php
/**
 * Created by PhpStorm.
 * User: ideo5
 * Date: 29.08.2017
 * Time: 12:51
 */
namespace Bevy\Http\Controllers;
use Auth;
class HomeController extends Controller
{
    public function index()
    {
        if(Auth::check()){
            return view('timeline.index');
        }

        return view('home');
    }
}

