@extends('errors::minimal')

@section('title', __('Forbidden'))
<meta http-equiv="refresh" content="2;url=/login">
@section('code', '403')
@section('message', __($exception->getMessage() ?: 'Forbidden'))