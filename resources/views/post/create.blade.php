@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <form method="POST" action="{{route('post.index')}}">
                    {{csrf_field()}}
                    <ul class="list-group">
                        @foreach($errors->all() as $error)
                            <li class="list-group-item">{{$error}}</li>
                        @endforeach
                    </ul>
                    <div class="form-group">
                        <label>ID</label>
                        <input type="text" class="form-control" name="id"/>
                        <label>Title</label>
                        <input type="text" class="form-control" name="title"/>
                        <label>Category ID</label><br/>
                        <textarea class="form-control col-xs-12" name="category_id"></textarea>
                    </div>
                    <input type="submit" value="Submit" class="btn btn-primary"/>
                </form>
            </div>
        </div>
    </div>
@endsection
