<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    public function __construct()
    {
            $this->middleware('auth')->except(['index','detail']);
    }


    public function index()
    {
        $data = Article::latest()->paginate(5);
        return view('articles.index', ["articles" => $data]);
    }

    public function detail($id)
    {
        $article = Article::find($id);
        return view('articles.detail', ["article" => $article]);
    }

    //delete
    public function delete($id){
        $article = Article::find($id);
        $article->delete();
        return redirect('/articles')->with("info","An article deleted");
    }

    public function add()
    {
        return view('articles.add');
    }

    public function create(){

        $validator = validator(request()->all(), [
              'title' => 'required',
              'body' => 'required',
              'category_id' => 'required',
        ]);
        if($validator->fails()){
            return back()->withErrors($validator);
        }
        $article = new Article;
        $article->title = request()->title;
        $article->body = request()->body;
        $article->category_id = request()->category_id;
        $article->save();
        return redirect('/articles');
    }

    public function edit($id){
        $article = Article::find($id);
        return view('articles.edit', ['article' => $article]);
    }

    public function update($id){
        $article = Article::find($id);
        $article->title = request()->title;
        $article->body = request()->body;
        $article->category_id = request()->category_id;
        $article->update();
        return redirect('/articles')->with('update','An article updated successfully');
    }
}