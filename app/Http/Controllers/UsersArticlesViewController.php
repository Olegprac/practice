<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class UsersArticlesViewController extends Controller
{
    public function usersarticles(Request $request)
    {
    	$articles = $request->user()->articles()->get();
    	return view('usersarticles')->with('articles', $articles);
    }

    public function notenoughpermissions(Request $request)
    {
    	return view('notenoughpermissions');
    }
}
