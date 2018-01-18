<?php

namespace App\Http\Controllers;
use App\Model\Category;
use App\Model\Post;
use App\Http\Requests\PostRequest;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts=Post::orderBy('id','asc')->paginate(10);
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
        $categories=Category::all();
        return view('post/create',[
            "categories"=>$categories]);
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
//        $post->id=$request->get("id");
        $post->title=$request->get("title");
        $post->content=$request->get("content");
        $post->image="http://lorempixel.com/200/400";
        $post->slug=str_slug($request->get("content"));
        $post->category_id=$request->get('category');
        $post->save();

        Session::flash("success","New post has been added.");

        return redirect("/post");

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
//        $post=Post::where('Content','=',$content)->first();
//        if(!$post){
//            abort(404);
//        }
//        $post->Content=$content;
//        $post->save();
////        $post->delete();
//////                return response()->json($posts, 200);
//        $data=$post::all();
//        return $data;
        $post=Post::find($id);

        return view("post.show", ['post'=>$post]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $categories=Category::all();
        $post=Post::findorfail($id);
        return view('post.edit', [
            'categories'=>$categories,
            'post'=>$post
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PostRequest $request, $id)
    {
        $post=Post::findorfail($id);
//        $post->id=$request->get('id');
        $post->title=$request->get('title');
        $post->content=$request->get('content');
//        $post->slug=str_slug($request->get('title'));
        $post->category_id=$request->get('category');
        $post->image="http://lorempixel.com/200/400";
        $post->save();

        Session::flash("success","Post has been updated");

        return back();
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
