@extends('Admin.layouts.admin-layout')

@section('content')
    @include('Admin.components.service.index')
    @include('Admin.components.service.create')
    @include('Admin.components.service.update')
    @include('Admin.components.service.destroy')
@endsection