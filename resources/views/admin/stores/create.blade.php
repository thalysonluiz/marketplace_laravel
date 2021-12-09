@extends('layouts.app')
@section('content')
    <h1>Criar Loja</h1>
    <form action="{{route('admin.stores.store')}}" method="post">
        <input type="hidden" name="_token" value="{{csrf_token()}}">
    <div class="form-group">
        <label>Nome Loja:</label>
        <input type="text" name="name" id="" class="form-control">
    </div>
    <div class="form-group">
        <label>Descrição</label>
        <input type="text" name="description" id="" class="form-control">
    </div>
    <div class="form-group">
        <label>Telefone</label>
        <input type="text" name="phone" id="" class="form-control">
    </div>
    <div class="form-group">
        <label>Slug</label>
        <input type="text" name="slug" id="" class="form-control">
    </div>
    <button class="btn btn-primary" type="submit">Criar Loja</button>
    </form>

@endsection
