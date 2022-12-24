@extends("layouts.app")

@section("content")
   <div class="container">
    <h2>Edit Article</h2>

    <form action="{{url('/articles/update/'.$article->id)}}" method="post">
        @csrf
        <div class="mb-2">
            <label>Title</label>
            <input type="text" class="form-control" value="{{$article->title}}" name="title">
        </div>
        <div class="mb-2">
            <label>Body</label>
            <textarea name="body" class="form-control" name="title">{{$article->body}}</textarea>
        </div>
        <div class="mb-2">
            <label>Category</label>
            <select name="category_id" value="{{$article->category_id}}" class="form-select">
                <option value="1">General</option>
                <option value="2">Technology</option>
                <option value="3">News</option>
            </select>
        </div>
        <button type="submit" class="btn btn-danger">Update</button>
    </form>
   </div>
@endsection
