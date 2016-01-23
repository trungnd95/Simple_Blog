<?php

namespace Simple_Blog\Http\Controllers;

// use Illuminate\Http\Request;

use Simple_Blog\Http\Requests;
use Simple_Blog\Http\Controllers\Controller;
use Simple_Blog\Article;
use Simple_Blog\Http\Requests\ArticlesRequest;
use Auth;
use User;
use Request;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   $articles = Article::paginate(5);
        return view('admin.article.index')->with('articles',$articles);
    }

    /**
    *   Return view to add article
    */
    public function add() 
    {
        return view('admin.article.add');
    }

    /**
    *   Storing data to dabase
    */
    public function store(ArticlesRequest $request) 
    {
        $title = $request   -> input('title');
        $content = $request -> input('content');
        $cate_id = $request-> get('category');
        Article::create([
            'title'   => $title,
            'content' => $content,
            'user_id' => Auth::user()->id,
            'cate_id' => $cate_id
            ]);
        return redirect()->route('admin.article.index')->with(['flash_message'=>'Add Success! ', 'flash_level' => 'success']);
    }

    /**
    *   return view to edit article
    *
    * @param : id -> denifinitely article want edit
    */
    public function edit($id) 
    {
        $article =  Article::find($id);
        return view('admin.article.edit',compact('article'));
    }

    /**
    *   Update data was just edited to database
    *
    *   @param : id : id of article just edited 
    *   @param  request: validate data update
    */
    public function update(ArticlesRequest $request,$id) 
    {
        
        $article = Article::find($id);
        
        $article-> update([
            'title' =>  $request->get('title'),
            'content' =>  $request->get('content'),
            'user_id' => Auth::user()->id,
            'cate_id' => $request->get('category')
        ]);
        return redirect()->route('admin.article.index')->with(['flash_message'=>'Success! Edited Article', 'flash_level'=>'success']);
    }

    /**
    *   Delete a article
    */
    public function destroy() {
        if(Request::ajax())
        {
            // $requesAll = Request::all();
            $id = Request::get('id');
            $article = Article::findOrFail($id);
            $article->delete();
            echo $id;
        }
    }
    

}
