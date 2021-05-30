@extends('layouts.front')


@section('content')

<div class="row">
    <div class="col-6">
        @if ($product->photos->count())

            <img src="{{ asset('storage/' . $product->photos->first()->image) }}" alt="" class="card-img-top">
            <div class="row mt-3">
                @foreach ($product->photos as $photo)
                    <div class="col-4">
                        <img src="{{ asset('storage/' . $photo->image) }}" alt="" class="img-fluid">
                    </div>
                @endforeach
            </div>

        @else

            <img src="{{asset('assets/img/no-photo.png')}}" alt="{{$product->description}}" class="card-img-top">
        
        @endif
    </div class="col-md-12">
    <div class="col-6">
        <div>
            <h2> {{$product->name}} </h2>
            <p>  {{$product->description}} </p>
            <h3>R$ {{number_format($product->price, '2',',','.')}}</h3>
            <span>Loja: {{$product->store->name}}</span>
        </div>
        <div class="product-add">
            <hr>
            <form action="{{route('cart.add')}}" method="post">
                @csrf
                <div class="form-group">
                    <input type="hidden" name="product[name]" value="{{$product->name}}">
                    <input type="hidden" name="product[price]" value="{{$product->price}}">
                    <input type="hidden" name="product[slug]" value="{{$product->slug}}">

                    <label for="">Quantidade: </label>
                    <input type="number" name="product[amount]" id="" class="form-control col-md-2" value="1">
                </div>
                <div class="button-group">
                    <button class="btn btn-lg btn-primary">+ <i class="fas fa-shopping-cart fa-lg"></i></button>
                    <button class="btn btn-lg btn-warning">Comprar Agora</button>
                </div>
                
            </form>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-12">
        <hr>
        {{$product->body}}
    </div>
</div>

@endsection