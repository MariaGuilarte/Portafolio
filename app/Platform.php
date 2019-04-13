<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Platform extends Model
{
  protected $fillable = ['id', 'name', 'description', 'icon'];
  
  public function projects(){
    return $this->belongsToMany('App\Project');
  }
}
