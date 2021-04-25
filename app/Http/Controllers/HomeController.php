<?php

namespace App\Http\Controllers;
use App\Post;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        //for counting questions=============
        $postsCount_java = Post::where('catagory','Java')->count();
        $postsCount_python = Post::where('catagory','Python')->count();
        $postsCount_sql = Post::where('catagory','SQL')->count();
        $postsCount_project = Post::where('catagory','project Errors')->count();
        $postsCount_jquery = Post::where('catagory','JQuery')->count();
        $postsCount_css = Post::where('catagory','CSS')->count();
        $postsCount_framwork = Post::where('catagory','Framworks')->count();
        $postsCount_general = Post::where('catagory','General Languages')->count();
        $postsCount_other = Post::where('catagory','other')->count();

//==================================================================

        $posts = Post::orderBy('id', 'DESC')->get();
        return view('HomePage', compact(
            'posts',
            'postsCount_java',
            'postsCount_python',
            'postsCount_sql',
            'postsCount_project',
            'postsCount_jquery',
            'postsCount_css',
            'postsCount_framwork',
            'postsCount_general',
            'postsCount_other'
    ));

    }
}
