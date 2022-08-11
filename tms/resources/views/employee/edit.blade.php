@extends('layout')
@section('content')

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Users') }}
        </h2>
    </x-slot>

    <x-guest-layout>
        <x-auth-card>
            <x-slot name="logo">
            </x-slot>
    
            <!-- Validation Errors -->
            <x-auth-validation-errors class="mb-4" :errors="$errors" />
        @include('inc.message')
    
            <form method="POST" action="{{ url('employee/'.$employee->id) }}">
                @csrf
                @method('PUT')
    
                <!-- Name -->
                <div class="mt-4">
                    <x-label for="name" :value="__('Name')" />
    
                    <x-input id="name" class="block mt-1 w-full" type="text" name="name" value="{{$employee->name}}" required autofocus />
                </div>
    
                <!-- type -->
                <div class="mt-4">
                    <x-label for="name" :value="__('Type')" />
    
                    <select id="name" class="block mt-1 w-full" type="text" name="type" value="{{$employee->type}}">
                        <option> Employee </option>
                    </select>
                </div>
    
                <!-- Email Address -->
                <div class="mt-4">
                    <x-label for="email" :value="__('Email')" />
    
                    <x-input id="email" class="block mt-1 w-full" type="email" name="email" value="{{$employee->email}}" required />
                </div>
    
                <!-- Password -->
                <div class="mt-4">
                    <x-label for="password" :value="__('Password')" />
    
                    <x-input id="password" class="block mt-1 w-full"
                                    type="password"
                                    name="password"
                                    required autocomplete="new-password" />
                </div>
    
                <!-- Confirm Password -->
                <div class="mt-4">
                    <x-label for="password_confirmation" :value="__('Confirm Password')" />
    
                    <x-input id="password_confirmation" class="block mt-1 w-full"
                                    type="password"
                                    name="password_confirmation" required />
                </div>
    
                <div class="flex items-center justify-end mt-4">
                    <x-button class="ml-4">
                        {{ __('Edit Employee') }}
                    </x-button>
                </div>
            </form>
        </x-auth-card>
    </x-guest-layout>
    

</x-app-layout>

@endsection