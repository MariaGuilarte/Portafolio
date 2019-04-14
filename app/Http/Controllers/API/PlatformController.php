<?php

namespace App\Http\Controllers\API;

use App\Platform;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\PlatformResource;
use App\Http\Requests\StorePlatform;
use App\Http\Requests\UpdatePlatform;

class PlatformController extends Controller {
  
  public function index() {
    $platforms = Platform::all();
    return PlatformResource::collection( $platforms );
  }

  public function create() {
    return view('platforms.create');
  }

  public function store(StorePlatform $request) {
    
    $platform = Platform::create([
      'name'        => $request->name,
      'description' => $request->description,
      'icon'        => $request->icon
    ]);

    return new PlatformResource( $platform );
  }

  public function show(Platform $platform) {
    return new PlatformResource( $platform );
  }

  public function edit(Platform $platform) {
    return view('platforms.edit', ['platform' => $platform]);
  }

  public function update(UpdatePlatform $request, Platform $platform) {
    
    $platform->update([
      'name'        => $request->name,
      'description' => $request->description,
      'icon'        => $request->icon
    ]);

    return new PlatformResource( $platform );
  }

  public function destroy(Platform $platform) {
    $platform->delete();
  }
  
}
