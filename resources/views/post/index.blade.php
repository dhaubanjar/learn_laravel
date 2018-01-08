@extends('layouts.app')
@section('content')
    <a href="{{route('post.create')}}" class="btn btn-primary">Add New Post</a>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <table class="table table-bordered table-responsive">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Title</th>
                        {{--<th>Actions</th>--}}
                        <th>Slug</th>
                        <th>Category ID</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($posts as $posts)
                        <tr>
                            <td>{{$posts->id}}</td>
                            <td>{{$posts->title}}</td>
                            <td>{{$posts->slug}}</td>
                            <td>{{$posts->category_id}}</td>

                            <td>
                                <form method="POST" action="{{route('post.delete',$posts->id)}}">
                                    {{method_field('DELETE')}}
                                    {{csrf_field()}}
                                    <a href="{{ route('post.edit', $posts->id) }}" class="btn btn-primary">Edit</a>
                                    <input type="submit" value="Delete" class="btn btn-danger"/>

                                </form>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection