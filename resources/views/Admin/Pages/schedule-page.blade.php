@extends('Admin.layouts.admin-layout')

@section('content')
    @include('Admin.components.schedule.index')
    @include('Admin.components.schedule.create')
    @include('Admin.components.schedule.update')
    @include('Admin.components.schedule.destroy')
@endsection