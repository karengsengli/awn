<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $fillable = [
        "id",'title','subtitle','client','client_web','complete_date','detail','img','project_category_id'
    ];
    public function project_category()
    {
        return $this->belongsTo('App\Project_category', 'project_category_id');
    }
}
