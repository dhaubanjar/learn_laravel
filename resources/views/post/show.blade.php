@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-9">
                <div class="panel panel-default">
                    <div class="panel-heading text-center" ><h2><strong>{!! $post->title !!}</strong></h2></div>
                    <div class="" {!! $post->title !!}>
                    {!! $post->content !!}

                </div>
            </div>
        </div>
            <div class="col-md-3">
                <div class="well">
                    <a href="{!! route("post.edit",$post->id) !!}" class="btn btn-success">Edit</a>
                    <br>
                    <label>Created at : {!!  date("Y / M - d ",strtotime($post->created_at))  !!}</label>
                    <br>
                    <label>Updated at : <small></small></label>
                </div>

            </div>
    </div>

@endsection