@extends('layouts.app')


@section('content')
   <div class="container">
         @if(session("delete"))
         <div class="alert alert-danger">
              {{session('delete')}}
         </div>
         @endif

         @if(session("commentCre"))
         <div class="alert alert-success">
            {{session('commentCre')}}
         </div>
         @endif


            <div class="card mb-2 border-primary">
                <div class="card-body">
                    <h3 class="card-title">{{$article->title}}</h3>
                    <div>

                        <small class="text-muted">
                            Comments: <b>{{count($article->comments)}}</b>
                            Category: <b>{{$article->category->name}}</b>
                            {{$article->created_at}}
                        </small>
                    </div>
                    <div>{{$article->body}}</div>
                    <div class="mt-2 btn-warning">
                        @auth
                            @can('delete-article',$article)
                                <div class="mt-2">
                                    <a class="btn btn-warning" href="{{url("/articles/delete/$article->id")}}">
                                        Delete
                                    </a>
                                </div>
                            @endcan
                        @endauth
                    </div>
                </div>
            </div>

            <hr>
            <ul class="list-group">
                <li class="list-group-item active">
                    Comments ({{count($article->comments)}})
                </li>
                @foreach ($article->comments as $comment)
                    <li class="list-group-item">
                        @auth
                             @can('delete-comment',$comment)
                                <a href="{{url("/comments/delete/$comment->id")}}" class="btn-close float-end"></a>
                             @endcan
                        @endauth
                        <b class="text-success">
                            {{$comment->user->name}}
                       </b>-
                        {{$comment->content}}
                     </li>
                @endforeach
            </ul>

           @auth
               <form class="mt-3" action="{{url('/comments/add')}}" method="post">
                @csrf
                <input type="hidden" name="article_id" value="{{$article->id}}"/>
                <textarea name="content" class="form-control mb-2"></textarea>
                <button class="btn btn-secondary">Add Comment</button>
                </form>
           @endauth


   </div>
@endsection('content')
