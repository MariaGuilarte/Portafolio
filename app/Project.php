<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model {
  protected $fillable = [
    'id',
    'name',
    'description',
    'start_date',
    'end_date',
    'budget',
    'client_id',
    'platform_id',
    'development_status_id',
    'payment_method_id'
  ];

  public function client(){
    return $this->belongsTo('App\Client');
  }

  public function platforms(){
    return $this->belongsToMany('App\Platform');
  }

  public function developmentStatus(){
    return $this->belongsTo('App\DevelopmentStatus');
  }

  public function paymentMethod(){
    return $this->belongsTo('App\PaymentMethod');
  }

  public function attachments(){
    return $this->hasMany('App\Attachment');
  }

}
