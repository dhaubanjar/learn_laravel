<?php

namespace App\Http\Controllers;
use App\Model\Post;
use App\Http\Requests\PostRequest;

use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts=Post::all();
        return view( "post.index",[
            "posts"=>$posts]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('post/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PostRequest $request)
    {
        $post= new Post();
        $post->id=$request->get("id");
        $post->title=$request->get("title");
        $post->slug=str_slug($request->get("title"));
        $post->category_id=$request->get('category_id');
        $post->save();

        return redirect("/post");

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($content)
    {
        $post=Post::where('Content','=',$content)->first();
        if(!$post){
            abort(404);
        }
        $post->Content=$content;
        $post->save();
//        $post->delete();
////                return response()->json($posts, 200);
        $data=$post::all();
        return $data;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post=Post::findorfail($id);
        return view('post.edit', [
            'post'=>$post]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $post=Post::findorfail($id);
        $post->id=$request->get('id');
        $post->title=$request->get('title');
        $post->slug=str_slug($request->get('title'));
        $post->category_id=$request->get('category_id');
        $post->save();
        return redirect()->route('post.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post=Post::findorfail($id);
        $post->delete();
        return redirect()->route('post.index');
    }
}
