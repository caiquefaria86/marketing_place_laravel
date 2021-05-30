
@extends('layouts.app')

@section('content')

<a href="{{route('admin.stores.index')}}" class="btn btn-info m-3">Voltar</a>
<a href="{{route('admin.stores.create')}}" class="btn btn-success m-3">Criar Loja</a>

<form action="{{route('admin.stores.update', ['store'=> $store->id])}}" method="post" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <h2>Editar Loja</h2>
    <div class="form-group">
        <label for="">Nome</label>
        <input type="text" name="name" class="form-control  @error('name') is-invalid @enderror" value="{{$store->name}}">
        @error('name')
            <div class="invalid-feedback">
                {{$message}}
            </div>
        @enderror
    </div>
    <div class="form-group">
        <label for="">Descrição</label>
        <input type="text" name="description" class="form-control @error('description') is-invalid @enderror" value="{{$store->description}}">
        @error('description')
        <div class="invalid-feedback">
            {{$message}}
        </div>
    @enderror
    </div>
    <div class="form-group">
        <label for="">Celular/whats</label>
        <input type="text" name="phone" class="form-control @error('phone') is-invalid @enderror" value="{{$store->phone}}">
        @error('phone')
        <div class="invalid-feedback">
            {{$message}}
        </div>
    @enderror
    </div>
    <div class="form-group">
        <label for="">Telefone</label>
        <input type="text" name="mobile_phone @error('mobile_phone') is-invalid @enderror" class="form-control" value="{{$store->mobile_phone}}">
        @error('mobile_phone')
        <div class="invalid-feedback">
            {{$message}}
        </div>
    @enderror
    </div>
    
    <div class="form-group">
        <p>
          <img src="{{asset('storage/'. $store->logo)}}" alt="">           
        </p>

        <label for="">Logo da Loja</label>
            <input type="file" name="logo" id="" class="form-control @error('logo') is-invalid @enderror">
            @error('logo')
            <div class="invalid-feedback">
                {{$message}}
            </div>
        @enderror
    </div>

    <div class="form-group">
        <button type="submit" class="btn btn-success">Editar Loja</button>
    </div>
</form>
@endsection

