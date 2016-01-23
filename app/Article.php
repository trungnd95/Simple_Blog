<?php

namespace Simple_Blog;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    //
    protected $table = 'articles';
    protected $fillable = ['id','title','content','user_id','cate_id','create_at'];

    /**
	*	Article belong to a Category
	*/
    public function cate()
    {
    	$this->belongTo('App\Cate');
    }

    /**
	*	Article belong to a User
	*/
    public function user()
    {
    	$this->belongTo('App\User');
    }
}
