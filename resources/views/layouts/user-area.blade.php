@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __($title) }}</div>
                <div class="card-body">

                    @if(Session::has('success'))
                    <div class="alert alert-success alert-dismissible" role="alert">
                        <strong>{{ __('Success!') }}</strong> {!! Session::get('success') !!}
                    </div>
                    @endif
                    @if(Session::has('error') || Session::has('errors'))
                    <div class="alert alert-danger alert-dismissible" role="alert">
                        <strong>{{ __('Atention!') }}</strong>
                        <p>
                            @foreach(Session::get('errors')->all() + [Session::get('error')] as $error)
                            &bull; {!!$error!!} <br>
                            @endforeach
                        </p>
                    </div>
                    @endif
                    @if(Session::has('info'))
                    <div class="alert alert-info alert-dismissible" role="alert">
                        <strong>{{ __('Atention!') }}</strong>
                        <p>
                            @foreach(Session::get('info') as $info)
                            &bull; {!!$info!!} <br>
                            @endforeach
                        </p>
                    </div>
                    @endif

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