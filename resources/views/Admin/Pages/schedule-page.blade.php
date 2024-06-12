@extends('Admin.layouts.admin-layout')

@section('content')
    @include('Admin.components.schedule.index')
    @include('Admin.components.schedule.destroy')
    @include('Admin.components.schedule.create')
    @include('Admin.components.schedule.update')
@endsection