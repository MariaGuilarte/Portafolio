<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePaymentMethod extends FormRequest {
  
  public function authorize() {
    return true;
  }

  public function rules() {
    return [
      'name' => 'required|unique:payment_methods,name|string|max:191',
      'logo' => 'nullable|string|max:191',
      'url'  => 'required|unique:payment_methods,url|string|max:191'
    ];
  }
  
}
