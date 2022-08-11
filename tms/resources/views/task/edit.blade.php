@extends('layout')
@section('content')
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ 'Edit Task' }}
        </h2>
    </x-slot>
    <x-guest-layout>
        <x-auth-card>
            <x-slot name="logo">
            </x-slot>
    
            <!-- Validation Errors -->
            <x-auth-validation-errors class="mb-4" :errors="$errors" />
            @include('inc.message')

            <form method="POST" action="{{ url('task/'.$task->id) }}">
                @csrf
                @method('PUT')
    
                <!-- Title -->
                <div>
                    <x-label for="desc" :value="__('Title')" />
    
                    <x-input id="desc" class="block mt-1 w-full" type="text" name="title" value="{{$task->title}}" required autofocus />
                </div>
    
                 <!-- Description -->
                 <div class='mt-4'>
                 <x-label for="desc" :value="__('Description')" class="form-label" />
 
                 <x-input class="block mt-1 w-full"  id="desc" type="text" name="description" value='{{$task->description}}' required autofocus />
                </div>

                <!-- File -->
                <div class="mt-4">
                    <x-label for="myfile" :value="__('File')" />
    
                    <input id="myfile" class="block mt-1 w-full" type="file" name="file" />
                </div>
    
               <!-- Voice -->
               <div class="mt-4">
                <x-label for="voice" :value="__('Voice')" />

                <x-input id="voice" class="block mt-1 w-full" type='file' name="voice" />
               </div>
    
                <!-- Status -->
                <div class='mt-4'>
                    <x-label for="type" :value="__('Status')" />
    
                    <select id='type' class="block mt-1 w-full form-control" name="status" value={{$task->status}} required autofocus>
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
                        {{ __('Edit Task') }}
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