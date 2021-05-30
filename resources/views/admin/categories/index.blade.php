@extends('layouts.app')

@section('content')



<a href="{{route('admin.stores.index')}}" class="btn btn-info m-3">Voltar</a>
<a href="{{route('admin.categories.create')}}" class="btn btn-success m-3">Criar Categoria</a>

<table class="table table-striped">
    <thead>
        <tr>
            <th>#</th>
            <th>Nome</th>
            <th>Ações</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($categories as $category)
            <tr>
                <td>{{$category->id}}</td>
                <td>{{$category->name}}</td>
                <td>
                    <div class="btn-group">
                        <a href=" {{route('admin.categories.edit', ['category' => $category->id])}} " class="btn btn-sm btn-info mx-1">Editar</a>
                        <form action="{{route('admin.categories.destroy', ['category' => $category->id])}}" method="post">
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

{{$categories->links()}}

@endsection