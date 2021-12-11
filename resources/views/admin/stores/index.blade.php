@extends('layouts.app')
@section('content')

    @if (!$store)
    <a href="{{route('admin.stores.create')}}" class="btn btn-sm btn-primary">Criar Loja</a>

    @endif

    <table class="table table-striped">
        <thead>
            <tr>
                <th>#</th>
                <th>Loja</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>

                <tr>
                    <td>{{$store->id}}</td>
                    <td>{{$store->name}}</td>
                    <td>
                        <a href="{{route('admin.stores.edit', ['id' => $store->id])}}" class="btn btn-sm btn-warning">Edit</a>
                        <a href="{{route('admin.stores.destroy', ['id' => $store->id])}}" class="btn btn-sm btn-danger">Delete</a>
                    </td>
                </tr>

        </tbody>
    </table>

@endsection
