@extends('layout')
@section('content')

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Users Table') }}
        </h2>
    </x-slot>


    <div class="container">
        <div class="row">
            <div class="col-10 mx-auto mt-4">
                @include('inc.message')

                <div class="float-end">
                    <form action="{{url('admin/create')}}" method="GET">
                        @csrf
                        @method('HEAD')
                        <button class="btn btn-outline-dark">
                            <input type="submit"  value="Add Admin Or Manager">
                        </button>
                      </form>

                      <form action="{{url('employee/create')}}" method="GET">
                        @csrf
                        @method('HEAD')
                            <button class="btn btn-outline-dark">
                                <input type="submit"  value="Add Employee">
                            </button>
                        </form>
                </div>

            </div>
        </div>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-10 mx-auto mt-4">

                <h2> Admins and Employees Table </h2>
                <table class="table">
                    <thead>
                        <tr>
                            <th scope='col'>#</th>
                            <th scope='col'> Name </th>
                            <th scope='col'> Email </th>
                            <th scope='col'> Type </th>
                            <th scope='col'> Edit </th>
                            <th scope='col'> Delete </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $user)
                            <tr>
                                <th scope='row'> {{$loop->iteration}} </th>
                                <td> {{$user['name']}} </td>
                                <td> {{$user['email']}} </td>
                                <td> {{$user['type']}} </td>
                                <td>
                                    <a href="{{url('admin/'.$user->id.'/edit')}}" class="btn btn-primary"> Edit </a>
                                </td>
                                <td>
                                  <form action="{{url('admin/'.$user->id)}}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button  class="btn btn-danger">
                                       Delete
                                    </button>
                                  </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

                        <div class="container">
                            <div class="row">
                                <div class="col-10 mx-auto mt-4">

                                   <h2> Employees Table</h2>
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th scope='col'>#</th>
                                                <th scope='col'> Name </th>
                                                <th scope='col'> Email </th>
                                                <th scope='col'> Type </th>
                                                <th scope='col'> Edit </th>
                                                <th scope='col'> Delete </th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                        @foreach ($employee as $emp)
                                            <tr>
                                                <th scope='row'> {{$loop->iteration}} </th>
                                                <td> {{$emp['name']}} </td>
                                                <td> {{$emp['email']}} </td>
                                                <td> {{$emp['type']}} </td>
                                                <td>
                                                    <a href="{{url('employee/'.$emp->id.'/edit')}}" class="btn btn-primary"> Edit </a>
                                                </td>
                                                <td>
                                                    <form action="{{url('employee/'.$emp->id)}}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                        <button  class="btn btn-danger">
                                                            Delete
                                                        </button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
       

</x-app-layout>

@endsection