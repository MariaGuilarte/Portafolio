<?php

namespace App\Http\Controllers\API;

use App\DevelopmentStatus;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\DevelopmentStatusResource;
use App\Http\Requests\StoreDevelopmentStatus;
use App\Http\Requests\UpdateDevelopmentStatus;

class DevelopmentStatusController extends Controller {
  
  public function index() {
    $developmentStatuses = DevelopmentStatus::all();
    return DevelopmentStatusResource::collection( $developmentStatuses );
  }

  public function create() {
    return view('developmentStatuses.create');
  }

  public function store(StoreDevelopmentStatus $request) {
    
    $developmentStatus = DevelopmentStatus::create([
      'name' => $request->name
    ]);

    return new DevelopmentStatusResource( $developmentStatus );
  }

  public function show(DevelopmentStatus $developmentStatus) {
    return new DevelopmentStatusResource( $developmentStatus );
  }

  public function edit(DevelopmentStatus $developmentStatus) {
    return view('developmentStatus.edit', ['developmentStatus' => $developmentStatus]);
  }

  public function update(UpdateDevelopmentStatus $request, DevelopmentStatus $developmentStatus) {
    $developmentStatus->update([
      'name' => $request->name
    ]);

    return new DevelopmentStatusResource( $developmentStatus );
  }

  public function destroy(DevelopmentStatus $developmentStatus) {
     $developmentStatus->delete();
  }
  
}
