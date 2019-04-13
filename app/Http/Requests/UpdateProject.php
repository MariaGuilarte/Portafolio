<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProject extends FormRequest {
  
  public function authorize() {
    return true;
  }

  public function rules() {
    return [
      'name'                 => 'required|string|max:191',
      'description'          => 'nullable|text|max:300',
      'start_date'           => 'required|date',
      'end_date'             => 'required|date',
      'budget'               => 'required|integer',
      'client_id'             => 'required|integer',
      'platform_id'           => 'required|integer',
      'development_status_id' => 'required|integer',
      'payment_method_id'     => 'required|integer'
    ];
  }
  
}
