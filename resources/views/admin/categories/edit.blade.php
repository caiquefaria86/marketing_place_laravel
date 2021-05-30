
@extends('layouts.app')

@section('content')

<a href="{{route('admin.categories.index')}}" class="btn btn-info m-3">Voltar</a>
<a href="{{route('admin.categories.create')}}" class="btn btn-success m-3">Criar Categoria</a>

<form action="{{route('admin.categories.update', ['category' => $category->id])}}" method="post">
    @csrf
    @method('PUT')
    <h2>Editar Categoria</h2>

    <div class="form-group">
        <label for="">Nome</label>
        <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" value="{{ $category->name }}">
        @error('name')
            <div class="invalid-feedback">
                {{$message}}
            </div>
        @enderror
    </div>
    <div class="form-group">
        <label for="">Descrição</label>
        <input type="text" name="description" class="form-control @error('description') is-invalid @enderror" value="{{ $category->description }}">
        @error('description')
            <div class="invalid-feedback">
                {{$message}}
            </div>
        @enderror
    </div>
    <div class="form-group">
        <button type="submit" class="btn btn-success">Atualizar Categoria</button>
    </div>
</form>
@endsection

