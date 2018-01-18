@extends('layouts.app')
@section('content')
    <a href="{{route('post.create')}}" class="btn btn-primary">Add New Post</a>
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <table class="table table-bordered table-responsive">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Title</th>
                        <th>Category id</th>
                        <th>Content</th>
                        <th>Image</th>
                        <th>Slug</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($posts as $post)
                        <tr>
                            <td>{{$post->id}}</td>
                            <td>{{$post->title}}</td>
                            <td>{{$post->category->name}}</td>
                            <td>{!!  $post->content!!}</td>
                            {{--<td>{{$post->content}}</td>--}}
                            <td>{{$post->image}}</td>
                            <td>{{$post->slug}}</td>


                            <td>
                                <form method="POST" action="{{route('post.delete',$post->id)}}">
                                    {{method_field('DELETE')}}
                                    {{csrf_field()}}
                                    <a href="{{ route('post.edit', $post->id) }}" class="btn btn-primary">Edit</a>
                                    <a href="{{ route('post.show', $post->id) }}" class="btn btn-success">Show</a>
                                    <input type="submit" value="Delete" class="btn btn-danger"/>

                                </form>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    <div class="col-md-12">
        <div class="text-center">
    {!! $posts->links() !!}          //paginate ko link
        </div>
    </div>
    </div>
@endsection