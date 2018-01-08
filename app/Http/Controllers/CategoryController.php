<?php

namespace App\Http\Controllers;
use App\Model\Category;
use App\Http\Requests\CategoryRequest;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories=Category::all();
//        return response()->json($data, 200);
        return view( "category.index",[
            "categories"=>$categories
        ]);             //views ma link gareko
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("category.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CategoryRequest $request)  //category.create ko form bata ako data lai request gareyra database ma stor garcha
    {

//        dd("A");
        $category= new Category();
        $category->id=$request->get("id");
        $category->name=$request->get("name");
        $category->save();

        Session::flash("success","A category has been added.");

        return redirect("/category");  //redirect to category page in browser
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($name, $names)
    {
        $category=category::where('Names','=',$name)->first();
            if(!$category){
                abort(404);
            }
            $category->Names=$names;
            $category->save();
//        $category->delete();
////                return response()->json($data, 200);
        $data=$category::all();
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
        $category=Category::find($id);

        return view('category.edit',[
        "category"=>$category
        ]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CategoryRequest $request, $id)
    {
        dd("B");

        $category=Category::findorfail($id);
        $category->name=$request->get('name');
        $category->save();
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
        Session::flash("success","A category has been deleted.");
        $category=Category::findorfail($id);
        $category->delete();
        return back();

    }
}
