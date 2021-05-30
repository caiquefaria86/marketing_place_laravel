
@extends('layouts.app')

@section('content')

<a href="{{route('admin.products.index')}}" class="btn btn-info m-3">Voltar</a>
<a href="{{route('admin.products.create')}}" class="btn btn-success m-3">Criar Produto</a>

<form action="{{route('admin.products.update', ['product' => $product->id])}}" method="post" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <h2>Criar Produto</h2>

    <div class="form-group">
        <label for="">Nome</label>
        <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" value="{{ $product->name }}">
        @error('name')
            <div class="invalid-feedback">
                {{$message}}
            </div>
        @enderror
    </div>
    <div class="form-group">
        <label for="">Descrição</label>
        <input type="text" name="description" class="form-control @error('description') is-invalid @enderror" value="{{ $product->description }}">
        @error('description')
            <div class="invalid-feedback">
                {{$message}}
            </div>
        @enderror
    </div>
    <div class="form-group">
        <label for="">Descrição</label>
        <textarea type="text" name="body" class="form-control @error('body') is-invalid @enderror">{{ $product->body }}</textarea>
        @error('body')
            <div class="invalid-feedback">
                {{$message}}
            </div>
        @enderror    
    </div>
    <div class="form-group">
        <label for="">Preço</label>
        <input type="text" name="price" class="form-control @error('price') is-invalid @enderror" value="{{ $product->price }}">
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
                <option value="{{$category->id}}" @if($product->categories->contains($category)) selected @endif >{{$category->name}}</option>
                        
            @endforeach
        </select>
    </div>

    <div class="form-group">
        <label for="">Fotos do Produto</label>
            <input type="file" name="photos[]" id="" class="form-control @error('photos.*') is-invalid @enderror" multiple>
            @error('photos.*')
            <div class="invalid-feedback">
                {{$message}}
            </div>
        @enderror
    </div>

    <div class="form-group">
        <button type="submit" class="btn btn-success">Atualizar Produto</button>
    </div>
</form>

<hr>
<div class="row">
    @foreach ($product->photos as $photo)
        <div class="col-4 text-center">
        <img src="{{asset('storage/' . $photo->image)}}" alt="" class="img-fluid">
        <form action="{{route('admin.photo.remove')}}" method="post">
            @csrf
            <input type="hidden" name="photoName" value="{{$photo->image}}">
            <button type="submit" class="btn btn-lg btn-block btn-danger">Remover</button>
        </form>
        </div>        
    @endforeach
</div>
@endsection


