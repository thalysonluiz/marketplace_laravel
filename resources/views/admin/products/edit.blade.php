@extends('layouts.app')
@section('content')
<h1>Editar Produto</h1>
<form action="{{route('admin.products.update', ['product' => $product->id])}}" method="post" enctype="multipart/form-data">
    @csrf {{-- <input type="hidden" name="_token" value="{{csrf_token()}}"> --}}
    @method('PUT') {{-- <input type="hidden" name="_method" value="PUT"> --}}
    <div class="form-group">
        <label>Nome Produto:</label>
        <input type="text" name="name" id="" class="form-control @error('name') is-invalid @enderror" value="{{$product->name}}">
        @error('name')
            <div class="invalid-feedback">
                {{$message}}
            </div>
        @enderror
    </div>
    <div class="form-group">
        <label>Descrição</label>
        <input type="text" name="description" id="" class="form-control @error('description') is-invalid @enderror" value="{{$product->description}}">
        @error('name')
            <div class="invalid-feedback">
                {{$message}}
            </div>
        @enderror
    </div>
    <div class="form-group">
        <label>Conteudo</label>
        <textarea name="body" id="" cols="30" rows="5" class="form-control @error('body') is-invalid @enderror">{{$product->body}}</textarea>
        @error('name')
            <div class="invalid-feedback">
                {{$message}}
            </div>
        @enderror
    </div>
    <div class="form-group">
        <label>Preço</label>
        <input type="text" name="price" id="" class="form-control @error('price') is-invalid @enderror" value="{{$product->price}}">
        @error('name')
            <div class="invalid-feedback">
                {{$message}}
            </div>
        @enderror
    </div>
    <div class="form-group">
      <label for="categories">Categorias</label>
      <select name="categories[]" id="" class="form-control" multiple>
        @foreach ($categories as $category)
          <option value="{{$category->id}}"
            @if ($product->categories->contains($category))
              selected
            @endif
          >{{$category->name}}</option>
        @endforeach
      </select>
    </div>
    <div class="form-group">
      <label for="">Fotos do Produto</label>
      <input type="file" class="form-control @error('photos') is-invalid @enderror" name="photos[]" multiple>
      @error('photos')
        <div class="invalid-feedback">
          {{$message}}
        </div>
      @enderror
    </div>
    <div class="form-group">
        <label>Slug</label>
        <input type="text" name="slug" id="" class="form-control" value="{{$product->slug}}">
    </div>
    <div class="form-group">

    </div>
    <button class="btn btn-primary" type="submit">Editar Produto</button>
</form>

<hr>

<div class="row">
  @foreach ($product->photos as $photo)
    <div class="col-4">
      <img src="{{asset('storage/'.$photo->image)}}" alt="" class="img-fluid">
      <form action="{{route('admin.photo.remove')}}" method="post">
        @csrf
        <input type="hidden" name="photoName" value="{{$photo->image}}">
        <button type="submit" class="btn btn-danger">Remover</button>
      </form>
    </div>
  @endforeach
</div>

@endsection
