<?php

namespace App\Http\Controllers;
use App\Post;

use Illuminate\Http\Request;

class Catagory extends Controller
{

    // public function filter_catagory($id)
    // {

    //     $task = Post::where('id',$id);
    //     // $task = $task->delete();
    //     // $data=DegreeVerify::All();
    //     return response()->json([
    //     "code" => 300,
    //     "message" => "Data deleted successfully",
    //     ]);
    // }


    public function fetch_details($id)
    {


        // $data = Post::where('catagory', '=', $id)->get();


        $posts = Post::where('catagory',$id)->get();

        $catagory=Post::where('catagory',$id)->first();

        return view('catagories.catagories_view', compact('posts','catagory'));


        // return response()->json(['success'=>$data]);

    }

    public function students_guide(){

return view('catagories.studentsGuide');

    }


    public function create($id)
    {


        $data = Post::where('catagory', '=', $id)->get();

        return response()->json(['success'=>$data]);

    }

    public function store(Request $request)
    {
        $data = $request->all();
        #create or update your data here

        return response()->json(['success'=>'Ajax request submitted successfully']);
    }






}
