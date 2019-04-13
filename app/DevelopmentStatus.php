<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DevelopmentStatus extends Model {
  
  protected $fillable = ['id', 'name'];
  
  public function projects(){
    return $this->hasMany('App\Project');
  }
  
}
