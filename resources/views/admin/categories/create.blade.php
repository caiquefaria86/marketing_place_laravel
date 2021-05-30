
@extends('layouts.app')

@section('content')

<a href="{{route('admin.products.index')}}" class="btn btn-info m-3">Voltar</a>
<a href="{{route('admin.products.create')}}" class="btn btn-success m-3">Criar Categoria</a>

<form action="{{route('admin.categories.store')}}" method="post">
    @csrf
    <h2>Criar Categoria</h2>
    <div class="form-group">
        <label for="">Nome</label>
        <input type="text" name="name" class="form-control @error('name') is-invalid @enderror">
        @error('name')
            <div class="invalid-feedback">
                {{$message}} 
            </div>
        @enderror
    </div>
    <div class="form-group">
        <label for="">Descrição</label>
        <input type="text" name="description" class="form-control @error('description') is-invalid @enderror">
        @error('description')
        <div class="invalid-feedback">
            {{$message}}
        </div>
    @enderror
    </div>

    <div class="form-group">
        <button type="submit" class="btn btn-success">Criar Categoria</button>
    </div>
</form>
@endsection

