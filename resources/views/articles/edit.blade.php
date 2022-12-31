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


        <div class="form-group mb-3">
            <select name="category" class="form-control  @error('category') is-invalid @enderror">
               <option value="">Category</option>
               @foreach($categories as $c)
                    <option value="{{$c->id}}" @if($c->id == $article->category_id) selected @endif>{{$c->name}}</option>
               @endforeach
            </select>
        </div>


        <button type="submit" class="btn btn-danger">Update</button>
    </form>
   </div>
@endsection
