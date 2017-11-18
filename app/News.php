<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    protected $table  = "news";
    // public function category() {
    //     return $this->belongsTo('App\Category','News_Cat_id','News_ID');
    // }
    public $timestamps = false;
}
