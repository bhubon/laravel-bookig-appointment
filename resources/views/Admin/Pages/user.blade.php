@extends('Admin.layouts.admin-layout')

@section('content')
    @include('Admin.components.user.index')
    @include('Admin.components.user.destroy')
    @include('Admin.components.user.create')
    @include('Admin.components.user.update')
@endsection