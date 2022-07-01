@extends('layouts.MainLayout')
@section('title', 'Product index')
@section('content')
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>IMG</th>
                <th>Price</th>
                <th>Description</th>
                <th>
                    <div class="text-end">
                        <a role="button" href="{{ route('products.create') }}" class="btn btn-primary">Create</a>
                    </div>
                </th>

            </tr>

        </thead>
        <tbody>
            @if (empty($productList))
                <tr>
                    <td>No data!</td>
                </tr>
            @else
                @foreach ($productList as $product)
                    <tr>
                        <td>{{ $product->id }}</td>
                        <td>{{ $product->name }}</td>
                        <td><img class="img-thumbnail" src="/images/{{ $product->img }}" width="300px" height="230px"></td>
                        <td>{{ $product->price }}$</td>
                        <td>{{ $product->description }}</td>
                        <td ><a role="button" href="{{ route('products.show',$product->id) }}" class="btn btn-primary">Chi tiết</a> </td>


                    </tr>
                @endforeach
            @endif
        </tbody>

    </table>
@endsection
