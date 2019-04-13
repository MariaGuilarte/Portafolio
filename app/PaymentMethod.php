<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PaymentMethod extends Model {
  protected $fillable = ['id', 'name', 'logo', 'url'];
  
  public function projects(){
    return $this->hasMany('App\Project');
  }
}
