<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project_category extends Model
{
    protected $fillable = [
        'name'
    ];

    public function project()
    {
        return $this->hasMany('App\Project');
    }
}
