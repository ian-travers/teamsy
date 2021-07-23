@extends('layouts.app')

@section('title', 'Your Team')

@section('content')
    <div class="py-4">
        @livewire('show-users')
    </div>
@endsection
