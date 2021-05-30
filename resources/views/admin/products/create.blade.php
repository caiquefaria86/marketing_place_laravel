
@extends('layouts.app')

@section('content')

<a href="{{route('admin.products.index')}}" class="btn btn-info m-3">Voltar</a>
<a href="{{route('admin.products.create')}}" class="btn btn-success m-3">Criar Produto</a>

<form action="{{route('admin.products.store')}}" method="post" enctype="multipart/form-data">
    @csrf
    <h2>Criar Produto</h2>
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
        <label for="">Corpo</label>
        <textarea type="text" name="body" class="form-control @error('body') is-invalid @enderror"></textarea>
        @error('body')
        <div class="invalid-feedback">
            {{$message}}
        </div>
        @enderror
    </div>
    <div class="form-group">
        <label for="">Preço</label>
        <input type="text" name="price" class="form-control @error('price') is-invalid @enderror">
        @error('price')
        <div class="invalid-feedback">
            {{$message}}
        </div>
    @enderror 
    </div>

    <div class="form-group">
        <label for="">Categoria</label>
        <select class="form-control" name="categories[]" multiple>
            @foreach ($categories as $category)
            <option value="{{$category->id}}">{{$category->name}}</option>
            @endforeach
        </select>
    </div>
    <div class="form-group">
        <label for="">Fotos do Produto</label>
            <input type="file" name="photos[]" id="" class="form-control  @error('photos.*') is-invalid @enderror" multiple>
            @error('photos.*')
            <div class="invalid-feedback">
                {{$message}}
            </div>
        @enderror
    </div>
    <div class="form-group">
        <button type="submit" class="btn btn-success">Criar Produto</button>
    </div>
</form>
@endsection

