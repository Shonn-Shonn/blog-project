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

        <div class="mb-3">
            <select name="category" class="form-control  @error('category') is-invalid @enderror">
                <option value="">Category</option>
                @foreach($categories as $c)
                     <option value="{{$c->id}}">{{$c->name}}</option>
                @endforeach
             </select>
        </div>
        <button type="submit" class="btn btn-danger">Save</button>
    </form>
   </div>
@endsection
