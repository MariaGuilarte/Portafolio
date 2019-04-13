<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model {
  protected $fillable = ['id', 'name', 'description', 'start_date', 
                        'end_date', 'budget', 'client_id', 'platform_id', 
                        'development_status_id', 'payment_method_id'
                        ];
}
