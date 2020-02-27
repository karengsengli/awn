<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Blog_Post extends Model
{
    protected $fillable = [
        "id",'title','details','img','category_id','view'
    ];
    public function category()
    {
        return $this->belongsTo('App\Category', 'category_id');
    }
}
