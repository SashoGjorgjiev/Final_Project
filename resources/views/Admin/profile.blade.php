@extends('dashboard')
@section('title', 'Profile')
@section('content')
<div class="container centerMediumAndSmall">
    <div class="col-md-6 offset-2 my-3">
        @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
        @endif
    </div>
    <div class="row">
        <div class="col-lg-6 offset-sm-2 col-sm-6  mt-4">
            <h2>Мој профил</h2>
            <form action="{{route('update_profile')}}" class="w-sm-25" method="POST">
                @csrf
                @method('PUT')
                <div class="form-group d-flex align-items-start" id="profile">
                    <img src="{{ Auth::user()->image }}" alt="Profile Image" class="mr-3">

                </div>
                <a href="{{route('update_image')}}" class="text-decoration-underline green">Промени слика</a>
                <div class="form-group ">
                    <label for="name">Име:</label>
                    <input type="text" class="form-control " id="name" name="name" value="{{Auth::user()->name}}">
                </div>
                <div class="form-group ">
                    <label for="email">Email адреса</label>
                    <input type="email" class="form-control " id="email" name="email" value="{{Auth::user()->email
                        }}">
                </div>
                <div class="form-group ">
                    <label for="phone">Телефонски број</label>
                    <input type="text" class="form-control" id="phone
                            " name="phone" value="{{Auth::user()->phone}}">
                </div>
                <div class="form-group ">
                    <label for="password">Лозинка</label>
                    <input type="password" class="form-control " id="password" name="password">
                </div>
                <a href="{{route('update_password')}}" class="text-decoration-underline green">Промени лозинка</a>
                <button type="submit" class="btn btn-primary login my-5 font-weight-bold ">Зачувај</button>
            </form>
        </div>