@extends('layouts.user-area')

@php
$title = 'Adding new book to my library';
@endphp

@section('form')
    <div class="form-group row">
        <div class="col-md-4">
            <img src="{{ $book['thumbnail'] }}">
        </div>
        <div class="col-md-8">
            <h5 class="fw-bold">{{ $book['title'] }}</h5>
            <p class="fw-light">{{ __('Authors') }}: {{ $book['authors'] }}</p>
            <p class="fw-light">{{ __('Publisher') }}: {{ $book['publisher'] }}</p>
            <p class="fw-light">{{ __('Publisher') }}: {{ $book['publisher'] }}</p>
            <p class="fw-light">{{ __('Published') }}: {{ $book['published'] }}</p>

            {{ Form::label(null, __('Your ratings'), ['class' => 'control-label']) }}
            {!! Form::rating('ratings', $userBook->stars ?? 0) !!}<br />

            {{ Form::label('reading_from', __('Reading since'), ['class' => 'control-label']) }}
            {{ Form::date('reading_from', data_get($userBook, 'reading_from'), ['class' => 'form-control']) }} <br />

            {{ Form::label('reading_from', __('Finish reading'), ['class' => 'control-label']) }}
            {{ Form::date('reading_from', data_get($userBook, 'reading_from'), ['class' => 'form-control']) }} <br />

            {{ Form::label('review', __('Write a review'), ['class' => 'control-label']) }}
            {{ Form::TextArea('review', data_get($userBook, 'review'), ['class' => 'form-control']) }} <br />

            <a target="_blank" href="{{ $book['previewLink'] }}" class="btn btn-light">Preview</a>
            {{ Form::submit(__('Save book'), ['class'=>'btn btn-primary']) }}
        </div>
    </div>
@endsection