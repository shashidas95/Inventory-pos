@extends('layout.sidenav-layout')
@section('content')
    @include('components.invoice.list-invoice')
    @include('components.invoice.detail-invoice')
    @include('components.invoice.delete-invoice')
@endsection
