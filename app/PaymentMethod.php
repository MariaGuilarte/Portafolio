<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PaymentMethod extends Model {
  protected $fillable = ['id', 'name', 'logo', 'url'];
}
