<?php

namespace App\Http\Controllers\Forum;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class SingleForumTopicController extends Controller
{
    //
    public function index(){
        return view('forum.singleforumtopic');
    }
}