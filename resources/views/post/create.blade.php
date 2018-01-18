@extends('layouts.app')
@section('content')

                    <div class="container">
                        <div class="row">
                            <div class="col-md-8 col-md-offset-2">
                                <div class="panel panel-default">
                                    <div class="panel-heading">Add new post</div>
{{$errors}}
                                    <div class="panel-body">
                                        <form class="form-horizontal" method="POST" action="{{ route('post.index') }}">
                                            {{ csrf_field() }}

                                            <div class="form-group{{ $errors->has('category') ? ' has-error' : '' }}">
                                                <label for="category" class="col-md-4 control-label">Category</label>

                                                <div class="col-md-6">
                                                    <select class="form-control" name="category" id="category">
                                                        <option value="0">Select a category</option>
                                                        @foreach($categories as $category)
                                                            <option value="{{$category->id}}">{{$category->name}}
                                                            </option>
                                                            @endforeach
                                                    </select>


                                                    @if ($errors->has('category'))
                                                        <span class="help-block">
                                        <strong>{{ $errors->first('category') }}</strong>
                                    </span>
                                                    @endif
                                                </div>
                                            </div>

                                            <div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
                                                <label for="title" class="col-md-4 control-label">Title</label>

                                                <div class="col-md-6">
                                                    <input id="title" type="title" class="form-control" name="title" value="{{ old('title') }}" required autofocus>

                                                    @if ($errors->has('title'))
                                                        <span class="help-block">
                                        <strong>{{ $errors->first('title') }}</strong>
                                    </span>
                                                    @endif
                                                </div>
                                            </div>

                                            <div class="form-group{{ $errors->has('slug') ? ' has-error' : '' }}">
                                                <label for="slug" class="col-md-4 control-label">Slug</label>

                                                <div class="col-md-6">
                                                    <input id="slug" type="slug" class="form-control" name="slug" value="{{ old('slug') }}" required autofocus>

                                                    @if ($errors->has('slug'))
                                                        <span class="help-block">
                                        <strong>{{ $errors->first('slug') }}</strong>
                                    </span>
                                                    @endif
                                                </div>
                                            </div>

                                            <div class="form-group{{ $errors->has('content') ? ' has-error' : '' }}">
                                                <label for="content" class="col-md-2 control-label">Content</label>

                                                <div class="col-md-10">
                                                    <textarea id="content" name="content" class="form-control"></textarea>

                                                    @if ($errors->has('content'))
                                                        <span class="help-block">
                                        <strong>{{ $errors->first('content') }}</strong>
                                    </span>
                                                    @endif
                                                </div>
                                            </div>
                    <input type="submit" value="Submit" class="btn btn-primary"/>
                </form>
            </div>
        </div>
    </div>
                        </div>
                    </div>
@endsection

@section("script")

                                <script src="{{asset("tinymce/js/tinymce/tinymce.min.js")}}"></script>
                                <script>
                                    tinymce.init({
                                        selector: 'textarea',
                                        height: 500,
                                        menubar: false,
                                        plugins: [
                                            'advlist autolink lists link image charmap print preview anchor textcolor',
                                            'searchreplace visualblocks code fullscreen',
                                            'insertdatetime media table contextmenu paste code help wordcount'
                                        ],
                                        toolbar: 'insert | undo redo |  formatselect | bold italic backcolor  | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | removeformat | help',
                                        content_css: [
                                            '//fonts.googleapis.com/css?family=Lato:300,300i,400,400i',
                                            '//www.tinymce.com/css/codepen.min.css']
                                    });
                                </script>

    @endsection
