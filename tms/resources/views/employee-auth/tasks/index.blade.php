@extends('layout')
@section('content')

<x-employee-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Tasks Show') }}
        </h2>
    </x-slot>

<div class="container">
    <div class="row">
        <div class="col-12 mx-auto mt-4">

            @include('inc.message')

         
            <div class="mt-4">
            @foreach ($tasks as $task)
            @if(Auth::guard('employee')->user()->id == $task->employee_id)
            <div class="card">
                <div class="card-header">
                    <x-label :value="__('Created By:')" />
                    {{$task->creator_name->name}}

                    <x-label :value="__('Title:')" />
                    {{$task->title}}
                </div>

                <div class="card-body">
                    <div>
                        <x-label :value="__('Description:')" />
                        {{$task->description}}
                    </div>

                    <div class="mt-4">
                        <x-label :value="__('File:')" />
                        @if(empty($task->file))
                            Nothing to Show
                        @else
                            <img src="{{ url($task->file)}}" alt="photo">
                        @endif
                    </div>

                    <div class="mt-4">
                        <x-label :value="__('Voice:')" />
                        @if(isset($task->voice))
                        <audio controls>
                            <source src="{{ url($task->voice)}}" type='audio/mp3'>
                        </audio>
                        @else
                            Nothing To Show
                        @endif
                    </div>

                    <div class="mt-4">
                        <x-label :value="__('Status:')" />
                        {{$task->status}}
                    </div>
                </div>
                 
                <div>
                <a href="{{url('EmployeeTask/'.$task->id.'/edit')}}" class="btn btn-primary"> Edit </a>
                </div>

            </div>
            <br> <br>
            @endif
            @endforeach
            </div>
        </div>
    </div>
</div>
</x-employee-layout>
@endsection

