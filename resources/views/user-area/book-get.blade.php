@extends('layouts.user-area')

@php
$title = 'Adding new book to my library';
@endphp

@section('form')
    <div class="form-group row">
        <div class="col-md-4">
            <img src="{{ $userBook->book->thumbnail }}">
        </div>
        <div class="col-md-8">
            <h1 class="fw-bold">{{ $userBook->book->title }}</h1>
            <h5 class="fw-bold">{{ __('Authors') }}: {{ $userBook->book->presentAuthors() }}</h5>
            <h5 class="fw-light">{{ __('ISBN') }}: {{ $userBook->book->isbn }}</h5>
            <p class="fw-light">{{ __('Publisher') }}: {{ $userBook->book->publisher?->name }}</p>
            <p class="fw-light">{{ __('Published') }}: {{ $userBook->book->published?->format('d/m/Y') }}</p>
            <p class="fw-light">{{ __('Page count') }}: {{ $userBook->book->pageCount }}</p>

            {{ Form::label(null, __('Your ratings'), ['class' => 'control-label']) }}
            {!! Form::rating('ratings', data_get($userBook, 'rating', 0)) !!}<br />

            {{ Form::label('reading_from', __('Reading since'), ['class' => 'control-label']) }}
            {{ Form::date('reading_from', data_get($userBook, 'reading_from'), ['class' => 'form-control']) }} <br />

            {{ Form::label('reading_from', __('Finish reading'), ['class' => 'control-label']) }}
            {{ Form::date('reading_from', data_get($userBook, 'reading_from'), ['class' => 'form-control']) }} <br />

            {{ Form::label('review', __('Write a review'), ['class' => 'control-label']) }}
            {{ Form::TextArea('review', data_get($userBook, 'review'), ['class' => 'form-control']) }} <br />

            <a target="_blank" href="{{ $userBook->book->previewLink }}" class="btn btn-light">Preview</a>
            {{ Form::submit(__('Save book'), ['class'=>'btn btn-primary']) }}
        </div>
    </div>
@endsection