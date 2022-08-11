@extends('layout')
@section('content')
<x-employee-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ 'Edit Status' }}
        </h2>
    </x-slot>
        <x-auth-card>
            <x-slot name="logo">
            </x-slot>
    
            <!-- Validation Errors -->
            <x-auth-validation-errors class="mb-4" :errors="$errors" />
            @include('inc.message')
    
            <form method="POST" action="{{ url('EmployeeTask/'.$task->id) }}">
                @csrf
                @method('PUT')
    
                <!-- Status -->
                <div>
                    <x-label for="type" :value="__('Status')" />
    
                    <select id='type' class="block mt-1 w-full form-control" name="status" required autofocus>
                        <option> New </option>
                        <option> In Progress </option>
                        <option> Cancelled </option>
                    </select>
                </div>

               
                <div class="flex items-center justify-end mt-4">
                    <x-button class="ml-4">
                        {{ __('Edit Status') }}
                    </x-button>
                </div>
            </form>
        </x-auth-card>
</x-app-layout>
@endsection
<script type="text/javascript">
    function voiceInputOver(val){
         alert("Voice input is complete");
         alert("Your input is " + val);
    }
</script>