@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">

            <div class="row">
                <div class="col-md-8">
                    <table class="table table-reponsive table-bordered">
                        <thead>
                        <tr><a href="{!! route('tag.create') !!}" class="btn btn-primary">Add New Tag</a>
                        </tr>
                        <tr>
                            <th>Id</th>
                            <th>Name</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>

                        @foreach($tags as $tag)

                            <tr>
                                <td>{{$tag->id}}</td>
                                <td>{{$tag->name}}</td>
                                <td>
                                    <form method="post" action="{!! route("tag.delete",$tag->id) !!}">
                                        {{method_field('delete')}}
                                        {{csrf_field()}}
                                        <a href="{{route("tag.edit",$tag->id)}}"  class="btn btn-success">Edit</a>
                                        <input type="submit" value="delete" class="btn btn-danger">
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="col-md-3">
                    <div class="well">

                    </div>
                </div>
            </div>
        </div>
    </div>
    @endsection
