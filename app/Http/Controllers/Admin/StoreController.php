<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreRequest;
use App\Traits\UploadTrait;
use Illuminate\Support\Facades\Storage;

class StoreController extends Controller
{
  use UploadTrait;

  public function __construct()
  {
    $this->middleware('user.has.store')->only(['create', 'store']);
  }

  public function index()
  {
    //$stores = \App\Store::paginate(10);
    $store = auth()->user()->store;

    return view('admin.stores.index', compact('store'));
  }

  public function create()
  {

    $users = \App\User::all(['id', 'name']);

    return view('admin.stores.create', compact('users'));
  }

  public function store(StoreRequest $request)
  {
    $data = $request->all();

    $user_id = auth()->user()->id;
    //dd($user_id);
    $user = \App\User::find($user_id);

    if ($request->hasFile('logo')) {
      $data['logo'] = $this->imageUpload($request->file('logo'));
    }

    $store = $user->store()->create($data);

    flash('Loja criada com sucesso!')->success();
    return redirect()->route('admin.stores.index');
  }

  public function edit($id)
  {

    $store = \App\Store::find($id);

    return view('admin.stores.edit', compact('store'));
  }

  public function update(StoreRequest $request, $id)
  {
    $data = $request->all();

    $store = \App\Store::find($id);

    if ($request->hasFile('logo')) {
      if (Storage::disk('public')->exists($store->logo)) {
        Storage::disk('public')->delete($store->logo);
      }

      $data['logo'] = $this->imageUpload($request->file('logo'));
    }

    $store->update($data);

    flash('Loja atualizada com sucesso!')->success();
    return redirect()->route('admin.stores.index');
  }

  public function destroy($id)
  {
    $store = \App\Store::find($id);
    $store->delete();

    flash('Loja excluida com sucesso!')->success();
    return redirect()->route('admin.stores.index');
  }
}