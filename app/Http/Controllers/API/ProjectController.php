<?php

namespace App\Http\Controllers\API;

use App\Project;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\ProjectResource;
use App\Http\Requests\StoreProject;
use App\Http\Requests\UpdateProject;

class ProjectController extends Controller {

  public function index() {
    $projects = Project::all();
    return ProjectResource::collection( $projects );
  }

  public function create() {
    return view('projects.create');
  }

  public function store(StoreProject $request) {

    $project = Project::create([
      'name'                  => $request->name,
      'description'           => $request->description,
      'start_date'            => $request->start_date,
      'end_date'              => $request->end_date,
      'budget'                => $request->budget,
      'client_id'             => $request->client_id,
      'development_status_id' => $request->development_status_id,
      'payment_method_id'     => $request->payment_method_id
    ]);

    return new ProjectResource( $project );
  }

  public function show(Project $project) {
    return new ProjectResource( $project );
  }

  public function edit(Project $project) {
    return view('projects.edit', ['project' => $project]);
  }

  public function update(UpdateProject $request, Project $project) {

    $project->update([
      'name'                  => $request->name,
      'description'           => $request->description,
      'start_date'            => $request->start_date,
      'end_date'              => $request->end_date,
      'budget'                => $request->budget,
      'client_id'             => $request->client_id,
      'platform_id'           => $request->platform_id,
      'development_status_id' => $request->development_status_id,
      'payment_method_id'     => $request->payment_method_id
    ]);

    return new ProjectResource( $project );
  }

  public function destroy(Project $project) {
    $project->delete();
  }

}
