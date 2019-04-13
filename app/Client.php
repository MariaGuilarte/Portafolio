<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
  protected $fillable = ['id', 'name', 'email', 'phone_number', 'country'];
}
