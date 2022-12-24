<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Comment;

class CommentController extends Controller
{
    public function create()
    {
        $validator = validator(request()->all(),[
            'article_id' => 'required',
            'content' => 'required'
        ]);

        if($validator->fails()){
            return back()->withErrors($validator);
        }

        $comment = new Comment;
        $comment->article_id = request()->article_id;
        $comment->content = request()->content;
        $comment->save();

        return back()->with(['commentCre'  => 'A comment submitted']);

    }

    public function delete($id)
    {
        $comment  = Comment::find($id);
        $comment->delete();
        return back()->with(['delete' => 'A comment deleted successfully!']);
    }
}
