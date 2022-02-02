@extends('layouts.user-area')

@php
$title = 'My library';
@endphp

@section('form')
<div class="form-group row">
    <table>
    <tr>
        <th class="text-bold">{{ __('Book') }}</th>
        <th class="text-bold">{{ __('Authors') }}</th>
        <th class="text-bold">{{ __('Publisher') }}</th>
        <th class="text-bold">{{ __('Published') }}</th>
    </tr>
    @foreach($userBooks as $userBook)
    <tr>
        <th>
            <a href="{{ route('user-area.get.isbn', ['isbn' => $userBook->book->isbn]) }}">
                {{ $userBook->book->title }}
            </a>
        </th>
        <th>
            <a href="{{ route('user-area.get.isbn', ['isbn' => $userBook->book->isbn]) }}">
                {{ $userBook->book->presentAuthors()}}
            </a>
        </th>
        <th>
            <a href="{{ route('user-area.get.isbn', ['isbn' => $userBook->book->isbn]) }}">
                {{ $userBook->book->publisher?->name }}
            </a>
        </th>
        <th>
            <a href="{{ route('user-area.get.isbn', ['isbn' => $userBook->book->isbn]) }}">
                {{ $userBook->book->published?->format('d/m/Y') }}
            </a>
        </th>
    </tr>
    @endforeach
    </table>
</div>
@endsection