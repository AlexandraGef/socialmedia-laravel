<?php
/**
 * Created by PhpStorm.
 * User: ideo5
 * Date: 29.08.2017
 * Time: 12:51
 */
namespace Bevy\Http\Controllers;

class HomeController extends Controller
{
    public function index()
    {
        return view('home');
    }
}

