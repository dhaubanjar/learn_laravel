@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1 class="page-header">Edit post</h1>
                <form action="{{route('post.update', $post->id)}}" method="POST">
                    {{method_field('PUT')}}
                    {{csrf_field()}}
                    <div class="form-group">
                        <label>ID</label>
                        <input type="text" class="form-control" name="id" value="{{$post->id}}" required/>
                        <label>Title</label>
                        <input type="text" class="form-control" name="title" value="{{$post->title}}" required/>
                        {{--<label>Slug</label><br/>--}}
                        {{--<textarea class="form-control col-xs-12" name="slug">{{str_slug($post->content)}}</textarea>--}}
                        <label>Category ID</label><br/>
                        <textarea class="form-control col-xs-12" name="category_id">{{$post->content}}</textarea>
                    </div>
                    <input type="submit" value="Submit" class="btn btn-primary"/>
                </form>
            </div>
        </div>
    </div>
@endsection
