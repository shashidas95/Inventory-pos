@extends('layout.sidenav-layout')
@section('content')
    @include('components.customer.list-customer')
    @include('components.customer.create-customer')
    @include('components.customer.update-customer')
    @include('components.customer.delete-customer')
@endsection
