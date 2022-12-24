@extends("layouts.app")

@section("content")
   <div class="container">
    @if($errors->any())
             <div class="alert alert-warning">
                <div>
                    @foreach ($errors->all() as $error)
                        <a>{{$error}}</a>
                    @endforeach
                </div>
             </div>
    @endif

    <form action="/articles/add" method="post">
        @csrf
        <div class="mb-2">
            <label>Title</label>
            <input type="text" class="form-control" name="title">
        </div>
        <div class="mb-2">
            <label>Body</label>
            <textarea name="body" class="form-control" name="title"></textarea>
        </div>
        <div class="mb-2">
            <label>Category</label>
            <select name="category_id" class="form-select">
                <option value="1">General</option>
                <option value="2">Technology</option>
                <option value="3">News</option>
            </select>
        </div>
        <button type="submit" class="btn btn-danger">Save</button>
    </form>
   </div>
@endsection
