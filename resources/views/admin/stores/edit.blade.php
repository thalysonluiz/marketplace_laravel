@extends('layouts.app')
@section('content')
    <h1>Criar Loja</h1>
    <form action="{{route('admin.stores.update', ['id' => $store->id])}}" method="post" enctype="multipart/form-data">
        <input type="hidden" name="_token" value="{{csrf_token()}}">
    <div class="form-group">
        <label>Nome Loja:</label>
        <input type="text" name="name" id="" class="form-control @error('name') is-invalid @enderror" value="{{$store->name}}">
        @error('name')
            <div class="invalid-feedback">
                {{$message}}
            </div>
        @enderror
    </div>
    <div class="form-group">
        <label>Descrição</label>
        <input type="text" name="description" id="" class="form-control @error('description') is-invalid @enderror" value="{{$store->description}}">
        @error('description')
            <div class="invalid-feedback">
                {{$message}}
            </div>
        @enderror
    </div>
    <div class="form-group">
        <label>Telefone</label>
        <input type="text" name="phone" id="" class="form-control @error('phone') is-invalid @enderror" value="{{$store->phone}}">
        @error('phone')
            <div class="invalid-feedback">
                {{$message}}
            </div>
        @enderror
    </div>
    <div class="form-group">
      <p>
        <img src="{{asset('storage/'.$store->logo)}}" alt="">
      </p>
      <label for="">Logo Loja</label>
      <input type="file" class="form-control" name="logo">
    </div>
    <div class="form-group">
        <label>Slug</label>
        <input type="text" name="slug" id="" class="form-control" value="{{$store->slug}}">
    </div>
    <button class="btn btn-primary" type="submit">Atualizar Loja</button>
    </form>

@endsection
