@extends('layouts.app')

@section('content')


<a href="{{route('admin.products.index')}}" class="btn btn-info m-3">Voltar</a>
<a href="{{route('admin.products.create')}}" class="btn btn-success m-3">Criar Produto</a>

<table class="table table-striped">
    <thead>
        <tr>
            <th>#</th>
            <th>Nome</th>
            <th>Preço</th>
            <th>Loja</th>
            <th>Ações</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($products as $p)
            <tr>
                <td>{{$p->id}}</td>
                <td>{{$p->name}}</td>
                <td>R$ {{$p->price}}</td>
                <td>{{$p->store->name}}</td>
                <td>
                    <div class="btn-group">
                        <a href=" {{route('admin.products.edit', ['product'=>$p->id])}} " class="btn btn-sm btn-info mx-1">Editar</a>
                        <form action="{{route('admin.products.destroy', ['product'=>$p->id])}}" method="post">
                            @csrf
                            @method('DELETE')
                            <input class="btn btn-sm btn-danger" type="submit" value="Deletar">
                        </form>
                    </div>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>

{{$products->links()}}

@endsection