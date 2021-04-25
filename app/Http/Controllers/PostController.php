<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *Author:sabaoon,idrees,yaseen
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::all();
        return view('HomePage', compact('posts','postsCount'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
    	$request->validate([
            'title'=>'required',
            'body'=>'required',
            'catagory'=>'required',
        ]);



        // Post::create($request->all());


        $description = $request->body;

        $dom = new \DomDocument();

        $dom->loadHtml($description, LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);

        $images = $dom->getElementsByTagName('img');

        foreach($images as $k => $img){


            $data = $img->getAttribute('src');

            list($type, $data) = explode(';', $data);

            list($type, $data) = explode(',', $data);

            $data = base64_decode($data);

            $image_name= "/upload/" . time().$k.'.png';

            $path = public_path() . $image_name;

            file_put_contents($path, $data);

            $img->removeAttribute('src');

            $img->setAttribute('src', $image_name);

         }


        $description = $dom->saveHTML();

        $summernote = new Post;

        $summernote->title = $request->title;
        $summernote->added_by = $request->added_by;
        $summernote->catagory = $request->catagory;
        $summernote->user_email = $request->user_email;

        $summernote->body = $description;

        $summernote->save();




        return redirect()->route('home');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
    	$post = Post::find($id);

        return view('posts.show', compact('post'));
    }



public function destroy($id)
{
    $Post = Post::find($id);
    $Post->delete();

    return redirect('/')->with('message', 'You have successfully deleted your question!');
}




public function edit($id)
{
    $posts = Post::find($id);
    $posts_all = Post::all();
    return view('posts.edit', compact('posts','posts_all'));
}





 /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  FeeVerify
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {


        $this->validate($request, array(
            // 'user_image' => 'image|mimes:jpeg,png,jpg,svg|max:2048',
            // 'registration_num' => 'bail|required|min:2',
            // 'name' => 'bail|required|min:2',
            // 'father_name' => 'bail|required|min:2|',
            // 'semester' => 'bail|required',
            // 'balance' => 'bail|required',
            // 'status' => ['required',new StatusValidate],

            'title' => 'bail|required|min:4',
            'body' => 'bail|required',
            'catagory' => 'bail|required',



            ));






$user_post  = Post::find($id) ;


// if($request->hasFile('user_image')){
//     $image = $request->file('user_image');
//     $filename = time() . '.' . $image->getClientOriginalExtension();
//     Image::make($image)->resize(160, 160)->save('uploads//'.$filename);
//     $user_post->user_image = $filename;


// }

$user_post->title = $request->input('title');
$user_post->body = $request->input('body');
$user_post->catagory = $request->input('catagory');

// $user_post->added_by = $request->input('father_name');


// $places = $request->places;

$user_post->save();

return redirect('/')->with('message', 'The data has successfully edited');






    }













}
