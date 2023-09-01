@extends('layout.sidenav-layout')
@section('content')
    @include('components.category.list-category')
    @include('components.category.create-category')
    @include('components.category.update-category')
    @include('components.category.delete-category')
@endsection
