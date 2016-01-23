<?php

namespace Simple_Blog\Http\Controllers;

use Illuminate\Http\Request;

use Simple_Blog\Http\Requests;
use Simple_Blog\Http\Controllers\Controller;
use Simple_Blog\Article;
use Simple_Blog\Cate;
use Simple_Blog\User;

class PagesController extends Controller
{
	/**
	*
	*	Homepage
	*/	
	public function index()
	{	
		$articles = Article::simplePaginate(5);
		return view('front-end.pages.index',compact('articles'));	
	}

	/**
	*	Detail post page
	*/
	public function show($id)
	{
		$article = Article::findOrFail($id);
		return view('front-end.pages.post',compact('article'));
	}

	/**
	*	Category page
	*/

	public function tagIndex($id)
	{
		$articles_cat = Article::where('cate_id',$id)->simplePaginate(5);
		$cate =  Cate::find($id);
		return view('front-end.pages.cate',compact('articles_cat','cate'));
	}

	/**
	*	Author page
	*/

	public function authorIndex($id)
	{
		$articles_user = Article::where('user_id',$id)->simplePaginate(5);
		$author =  User::find($id);
		return view('front-end.pages.author',compact('articles_user','author'));
	}
}
