<?php

namespace Simple_Blog;

use Illuminate\Database\Eloquent\Model;

class Cate extends Model
{
    //
    protected $table = 'cates';
	protected $fillable = ['name','alias','short_description'];
	protected $hidden = ['timestamps'];

	public function article() 
	{
		return $this->hasMany('App\Article');
	}
}
