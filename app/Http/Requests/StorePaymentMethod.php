<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePaymentMethod extends FormRequest {
  
  public function authorize() {
    return true;
  }

  public function rules() {
    return [
      'name' => 'required|unique|string|max:191',
      'logo' => 'nullable|string|max:191',
      'url'  => 'required|unique|string|max:191'
    ];
  }
  
}
