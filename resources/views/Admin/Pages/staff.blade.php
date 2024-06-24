@extends('Admin.layouts.admin-layout')

@section('content')
    @include('Admin.components.staff.index')
    @include('Admin.components.staff.destroy')
    @include('Admin.components.staff.create')
    @include('Admin.components.staff.update')
@endsection