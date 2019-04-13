<?php

namespace App\Http\Controllers\API;

use App\Client;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\ClientResource;
use App\Http\Requests\StoreClient;
use App\Http\Requests\UpdateClient;

class ClientController extends Controller {
  
  public function index() {
    $clients = Client::all();
    return ClientResource::collection( $clients );
  }

  public function create() {
    return view('clients.create');
  }

  public function store(StoreClient $request) {
    
    $client = Client::create([
      'name'         => $request->name,
      'email'        => $request->email,
      'phone_number' => $request->phone_number,
      'country'      => $request->country
    ]);

    return new ClientResource( $client );
  }

  public function show(Client $client) {
    return new ClientResource( $client );
  }

  public function edit(Client $client) {
    return view('clients.edit', ['client' => $client]);
  }

  public function update(UpdateClient $request, Client $client) {
    
    $client->update([
      'name'         => $request->name,
      'email'        => $request->email,
      'phone_number' => $request->phone_number,
      'country'      => $request->country
    ]);

    return new ClientResource( $client );
  }

  public function destroy(Client $client) {
    $client->delete();
  }
}
