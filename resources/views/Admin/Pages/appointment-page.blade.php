@extends('Admin.layouts.admin-layout')

@section('content')
    @include('Admin.components.appointment.index')
    @include('Admin.components.appointment.create')
    @include('Admin.components.appointment.update')
    @include('Admin.components.appointment.destroy')
@endsection