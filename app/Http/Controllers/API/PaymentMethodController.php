<?php

namespace App\Http\Controllers\API;

use App\PaymentMethod;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\PaymentMethodResource;
use App\Http\Requests\StorePaymentMethod;
use App\Http\Requests\UpdatePaymentMethod;

class PaymentMethodController extends Controller {
  
  public function index() {
    $paymentMethods = PaymentMethod::all();
    return PaymentMethodResource::collection( $paymentMethods );
  }

  public function create() {
    return view('paymentMethods.create');
  }

  public function store(StorePaymentMethod $request) {
    
    $paymentMethod = PaymentMethod::create([
      'name' => $request->name,
      'logo' => $request->logo,
      'url'  => $request->url
    ]);

    return new PaymentMethodResource( $paymentMethod );
  }

  public function show(PaymentMethod $paymentMethod) {
    return new PaymentMethodResource( $paymentMethod );
  }

  public function edit(PaymentMethod $paymentMethod) {
    return view('paymentMethods.edit', ['paymentMethod' => $paymentMethod]);
  }

  public function update(UpdatePaymentMethod $request, PaymentMethod $paymentMethod) {
    
    $paymentMethod->update([
      'name'        => $request->name,
      'description' => $request->email,
      'icon'        => $request->phone_number
    ]);

    return new PaymentMethodResource( $paymentMethod );
  }

  public function destroy(PaymentMethod $paymentMethod) {
    $paymentMethod->delete();
  }
  
}
