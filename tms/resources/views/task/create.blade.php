@extends('layout')
@section('content')

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ 'New Task' }}
        </h2>
    </x-slot>

    <x-guest-layout>
        <x-auth-card>
            <x-slot name="logo">
            </x-slot>
    
            <!-- Validation Errors -->
            <x-auth-validation-errors class="mb-4" :errors="$errors" />
            @include('inc.message')

    
            <form method="POST" action="{{ route('task') }}" enctype="multipart/form-data">
                @csrf
    
                <!-- Title -->
                <div>
                    <x-label for="title" :value="__('Title')" />
    
                    <x-input id="title" class="block mt-1 w-full" type="text" name="title" :value="old('title')" required autofocus />
                </div>
    
                 <!-- Description -->
                 <div class='mt-4'>
                 <x-label for="desc" :value="__('Description')" class="form-label" />
 
                 <textarea class="form-control" rows="3" id="desc" type="text" name="description" :value="old('description')" required autofocus></textarea>
                </div>

                <!-- File -->
                <div class="mt-4 image">
                    <x-label for="myfile" :value="__('File')" />
    
                    <x-input id="myfile" class="block mt-1 w-full" type="file" name="file" :value="old('file')" placeholder="image"/>
                </div>
    
               <!-- Voice -->
               <div class="mt-4">
                <x-label for="voice" :value="__('Voice')" />

                <x-input id="voice" class="block mt-1 w-full" type='file' name="voice" :value="old('voice')" />
               </div>
    
                <!-- Status -->
                <div class='mt-4'>
                    <x-label for="type" :value="__('Status')" />
    
                    <select id='type' class="block mt-1 w-full form-control" name="status" :value="old('status')" required autofocus>
                        <option> New </option>
                        <option> In Progress </option>
                        <option> Cancelled </option>
                    </select>
                </div>

                  <!-- Which User -->
                  <div class='mt-4'>
                    <x-label for="type" :value="__('Employee')" />
    
                    <select id='type' class="block mt-1 w-full form-control" name="employee_id" :value="old('employee_id')" required autofocus>
                      @foreach($employee_name as $user)
                        <option value="{{$user->id}}"> {{$user->name}} </option>
                      @endforeach
                    </select>
                </div>
    
                <div class="flex items-center justify-end mt-4">
                    <x-button class="ml-4">
                        {{ __('Add Task') }}
                    </x-button>
                </div>
            </form>
        </x-auth-card>
    </x-guest-layout>
    
</x-app-layout>
@endsection
<script type="text/javascript">
    function voiceInputOver(val){
         alert("Voice input is complete");
         alert("Your input is " + val);
    }
</script>