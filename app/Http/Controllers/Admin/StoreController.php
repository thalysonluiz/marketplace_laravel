<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreRequest;

class StoreController extends Controller
{
    public function index()
    {
        //$stores = \App\Store::paginate(10);
        $store = auth()->user()->store;

        return view('admin.stores.index', compact('store'));
    }

    public function create()
    {
        if (auth()->user()->store()->count()) {
            flash('Você já possui uma loja cadastrada!')->warning();
            return redirect()->route('admin.stores.index');
        }

        $users = \App\User::all(['id', 'name']);

        return view('admin.stores.create', compact('users'));
    }

    public function store(StoreRequest $request)
    {
        $data = $request->all();

        $user_id = auth()->user()->id;
        //dd($user_id);
        $user = \App\User::find($user_id);
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
