@extends("layouts.app")
@section("content")
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <h1 class="page-header">Add new Tag</h1>
                <form action="{!! route('tag.store') !!}" method="post">
                    {{csrf_field()}}
                    <ul class="list-group">
                        @foreach($errors->all() as $error)
                            <li class="list-group-item">{{$error}}</li>
                        @endforeach
                    </ul>
                    <div class="form-group">
                        <label for="name">Id</label>
                        <input type ="text" class="form-control" name="id" required>

                        <label for="name">Name</label>
                        <input type ="text" class="form-control" name="name" >

                        <input type="submit" value="submit" class="btn btn-primary">
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection()