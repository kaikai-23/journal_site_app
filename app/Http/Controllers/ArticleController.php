<?php

namespace App\Http\Controllers;
//Articleクラスを読み込む
use App\Models\Article;

//use Illuminate\Http\Request;
use App\Http\Requests\ArticleRequest;

class ArticleController extends Controller
{
    public function index()
    {
        //モデル名::テーブル全件取得
        $article = Article::all();
        //articleディテクトリーの中のindexページを指定し、articlesの連想配列を代入
        return view('articles.index', ['articles'=>$article]);
    }
    
    public function create()
    {
        return view('articles.create');
    }

    public function store(ArticleRequest $request)
    {
        //インスタンスの生成
        $article = new Article;

        //値の用意
        $article->title = $request->title;
        $article->body = $request->body;

        //インスタンスに値を設定して保存
        $article->save();

        //登録後indexに戻る
        return redirect('/articles');
    }

    public function show($id)
    {
        $article = Article::find($id);
        return view('articles.show', ['article' => $article]);
    }
    
    public function edit($id)
    {
        $article = Article::find($id);
        return view('articles.edit', ['article'=>$article]);
    }
    
    public function update(ArticleRequest $request, $id)
    {
        //ここはidで探して持ってくる以外はstoreと同じ
        $article = Article::find($id);

        //値の用意
        $article->title=$request->title;
        $article->body=$request->body;

        //保存
        $article->save();

        //保存したらindexへ
        return redirect('/articles');
    }

    public function destroy($id)
    {
        $article = Article::find($id);
        $article->delete();

        return redirect('/articles');
    }
}
