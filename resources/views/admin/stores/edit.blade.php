@extends('layouts.app')
@section('content')
    <h1>Criar Loja</h1>
    <form action="{{route('admin.stores.update', ['id' => $store->id])}}" method="post">
        <input type="hidden" name="_token" value="{{csrf_token()}}">
    <div class="form-group">
        <label>Nome Loja:</label>
        <input type="text" name="name" id="" class="form-control" value="{{$store->name}}">
    </div>
    <div class="form-group">
        <label>Descrição</label>
        <input type="text" name="description" id="" class="form-control" value="{{$store->description}}">
    </div>
    <div class="form-group">
        <label>Telefone</label>
        <input type="text" name="phone" id="" class="form-control" value="{{$store->phone}}">
    </div>
    <div class="form-group">
        <label>Slug</label>
        <input type="text" name="slug" id="" class="form-control" value="{{$store->slug}}">
    </div>
    <button class="btn btn-primary" type="submit">Atualizar Loja</button>
    </form>

@endsection
