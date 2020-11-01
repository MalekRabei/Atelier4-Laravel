@extends('layouts.app')
@section('content')
    <div class="container content">
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Products</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('product.create') }}" title="Create a product"> <i class="fas fa-plus-circle"></i>
                </a>
            </div>
        </div>
    </div>

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
    <div class="container content">
        <table class="table table-sm">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Category</th>
                <th scope="col">Created at</th>
                <th scope="col">Updated at</th>
                <th scope="col">Actions</th>

            </tr>
            </thead>
            <tbody>
            @foreach($products as $cat)

                    <tr>
                    <th scope="row">{{$cat->id}}</th>
                    <td>{{$cat->name}}</td>
                    <td>{{$cat->category_id}}</td>
                    <td>{{$cat->created_at}}</td>
                    <td>{{$cat->updated_at}}</td>
                    <td>
                        <form action="{{ route('product.destroy', $cat->id) }}" method="POST">

                            <a href="{{ route('product.show', $cat->id) }}" title="show">
                                <i class="fas fa-eye text-success  fa-lg"></i>
                            </a>

                            <a href="{{ route('product.edit', $cat->id) }}">
                                <i class="fas fa-edit  fa-lg"></i>

                            </a>

                            @csrf
                            @method('DELETE')

                            <button type="submit" title="delete" style="border: none; background-color:transparent;">
                                <i class="fas fa-trash fa-lg text-danger"></i>

                            </button>
                        </form>
                    </td>
                </tr>
                @endforeach

            </tbody>
        </table>
        {{$products->links('pagination::bootstrap-4')}}
    </div>
    </div>
@endsection