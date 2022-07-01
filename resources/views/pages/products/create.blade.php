
@extends('layouts.MainLayout')
@section("title", "Create Product")
@section("content")
    @section("actionForm", route("products.store"))
    @section("method", 'post')
    @include("pages.products.form")
@endsection