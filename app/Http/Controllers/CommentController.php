<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Comment;

class CommentController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
    	$request->validate([
            'body'=>'required',
        ]);

        // $input = $request->all();

        // $input['user_id'] = auth()->user()->id;

        // Comment::create($input);

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

        $summernote = new Comment;

        $summernote->user_id= auth()->user()->id;
        $summernote->post_id= $request->post_id;
        $summernote->parent_id= $request->parent_id;

        $summernote->body = $description;

        $summernote->save();














        return back();
    }






    public function destroy($id)
{
    $Post_Comment = Comment::find($id);
    $Post_Comment->delete();

    return back()->with('message', 'You have successfully deleted your comment!');
}




public function edit($id)
{
    $posts = Comment::find($id);
    return view('posts.comment_edit', compact('posts'));

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

            // 'title' => 'bail|required|min:4',
            'body' => 'bail|required',



            ));






$user_post  = Comment::find($id) ;


// if($request->hasFile('user_image')){
//     $image = $request->file('user_image');
//     $filename = time() . '.' . $image->getClientOriginalExtension();
//     Image::make($image)->resize(160, 160)->save('uploads//'.$filename);
//     $user_post->user_image = $filename;


// }

// $user_post->title = $request->input('title');
$user_post->body = $request->input('body');

// $user_post->added_by = $request->input('father_name');


// $places = $request->places;



$user_post->save();

// return redirect()->route('home')->with('message', 'The comment has successfully edited');

return redirect()->route('posts.show',$user_post->post_id);






    }











}
