@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __($title) }}</div>
                <div class="card-body">
                    {{ Form::open($form) }}
                    {{ Form::token() }}
                    @yield('form')
                    {{ Form::close() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection