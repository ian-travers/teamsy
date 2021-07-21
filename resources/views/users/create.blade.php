@extends('layouts.app')

@section('title', 'Create Team Member')

@section('content')

    <div class="mt-6 bg-white shadow px-4 py-5 sm:rounded-lg sm:p-6">
        <div class="lg:grid lg:grid-cols-3 lg:gap-6">
            <div class="lg:col-span-1">
                <h3 class="text-lg font-medium leading-6 text-gray-900">Personal Information</h3>
                <p class="mt-1 pr-3 text-sm leading-5 text-gray-500">
                    The more the merrier! Create a new team member.
                </p>
            </div>
            <div class="mt-5 lg:mt-0 lg:col-span-2">
                <livewire:add-user />
            </div>
        </div>
    </div>

@endsection
