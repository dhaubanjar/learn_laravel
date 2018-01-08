@extends("layouts.app")
@section("content")
        <div class="container">
                <div class="row">

                        <div class="row">
                                <div class="col-md-8 col-md-offset-2">
                                        <table class="table table-reponsive table-bordered">
                                                <thead>
                                                <tr><a href="{!! route('category.create') !!}" class="btn btn-primary">Add New Category</a>
                                                    </tr>
                                                <tr>
                                                        <th>Id</th>
                                                        <th>Name</th>
                                                        <th>Action</th>
                                                </tr>
                                                </thead>
                                                <tbody>

                                                @foreach($categories as $category)

                                                        <tr>
                                                        <td>{{$category->id}}</td>
                                                        <td>{{$category->name}}</td>
                                                        <td>
                                                               <form method="post" action="{{route('category.delete',$category->id)}}">
                                                                       {{method_field('delete')}}
                                                                       {{csrf_field()}}
                                                                       <a href="{{route("category.edit",$category->id)}}"  class="btn btn-success">Edit</a>
                                                                       <input type="submit" value="delete" class="btn btn-danger">
                                                               </form>
                                                        </td>
                                                </tr>
                                                        @endforeach
                                                </tbody>
                                        </table>
                                </div>
                        </div>
                </div>
        </div>
    @endsection