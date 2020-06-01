<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    public $timestamps = false;

    public function user()
    {
    	return $this->belongsTo('App\User');
    }

    protected $fillable = [
        'title', 'body', 'imgurl',
    ];
}
