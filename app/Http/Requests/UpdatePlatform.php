<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePlatform extends FormRequest {
  
  public function authorize()
  {
    return true;
  }

  public function rules()
  {
    return [
      'name'         => 'required|unique:platforms,name|string|max:191',
      'description'  => 'nullable|string|max:191',
      'icon'         => 'nullable|string|max:191'
    ];
  }
}
