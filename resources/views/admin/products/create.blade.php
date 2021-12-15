@extends('layouts.app')
@section('content')
    <h1>Criar Produto</h1>
    <form action="{{route('admin.products.store')}}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label>Nome Produto:</label>
            <input type="text" name="name" id="" class="form-control @error('name') is-invalid @enderror" value="{{old('name')}}">
            @error('name')
                <div class="invalid-feedback">
                    {{$message}}
                </div>
            @enderror
        </div>
        <div class="form-group">
            <label>Descrição</label>
            <input type="text" name="description" id="" class="form-control @error('description') is-invalid @enderror" value="{{old('description')}}">
            @error('description')
                <div class="invalid-feedback">
                    {{$message}}
                </div>
            @enderror
        </div>
        <div class="form-group">
            <label>Conteudo</label>
            <textarea name="body" id="" cols="30" rows="5" class="form-control @error('body') is-invalid @enderror" value="{{old('body')}}"></textarea>
            @error('body')
                <div class="invalid-feedback">
                    {{$message}}
                </div>
            @enderror
        </div>
        <div class="form-group">
            <label>Preço</label>
            <input type="text" name="price" id="" class="form-control @error('price') is-invalid @enderror" value="{{old('price')}}">
            @error('price')
                <div class="invalid-feedback">
                    {{$message}}
                </div>
            @enderror
        </div>
        <div class="form-group">
            <label for="categories">Categorias</label>
            <select name="categories[]" id="" class="form-control" multiple>
                @foreach ($categories as $category)
                    <option value="{{$category->id}}">{{$category->name}}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
          <label for="">Fotos do Produto</label>
          <input type="file" class="form-control @error('photos.*') is-invalid @enderror" name="photos[]" multiple>
          @error('photos.*')
            <div class="invalid-feedback">
              {{$message}}
            </div>
          @enderror
        </div>
        <div class="form-group">
            <label>Slug</label>
            <input type="text" name="slug" id="" class="form-control">
        </div>

        <button class="btn btn-primary" type="submit">Criar Produto</button>
    </form>

@endsection
