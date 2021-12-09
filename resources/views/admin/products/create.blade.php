@extends('layouts.app')
@section('content')
    <h1>Criar Produto</h1>
    <form action="{{route('admin.products.store')}}" method="post">
        @csrf
        <div class="form-group">
            <label>Nome Produto:</label>
            <input type="text" name="name" id="" class="form-control">
        </div>
        <div class="form-group">
            <label>Descrição</label>
            <input type="text" name="description" id="" class="form-control">
        </div>
        <div class="form-group">
            <label>Conteudo</label>
            <textarea name="body" id="" cols="30" rows="5" class="form-control"></textarea>
        </div>
        <div class="form-group">
            <label>Preço</label>
            <input type="text" name="price" id="" class="form-control">
        </div>
        <div class="form-group">
            <label>Slug</label>
            <input type="text" name="slug" id="" class="form-control">
        </div>
        <div class="form-group">
            <label>Lojas</label>
            <select name="store" id="" class="form-control">
                @foreach ($stores as $store)
                    <option value="{{$store->id}}">{{$store->name}}</option>
                @endforeach
            </select>
        </div>
        <button class="btn btn-primary" type="submit">Criar Produto</button>
    </form>

@endsection
