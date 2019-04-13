<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreClient extends FormRequest {
  
  public function authorize() {
    return true;
  }

  public function rules() {
    return [
      'name'         => 'required|string|max:191',
      'email'        => 'required|string|max:191',
      'phone_number' => 'nullable|string|max:191',
      'country'      => 'required|string|max:191'
    ];
  }
}
