
@extends('layouts.MainLayout')
@section("title", "Edit Product")
@section("content")
    @section("actionForm", route("products.update", $product->id))
        @section("method", 'put')
    @include("pages.products.form")
@endsection