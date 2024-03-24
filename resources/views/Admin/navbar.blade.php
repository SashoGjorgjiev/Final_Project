@extends('Admin.dashboard')

@section('content')
<div id="sidebar">
    <div id="profile">
        <img src="{{ asset('path_to_your_image.jpg') }}" alt="Profile Image">
        <p>Name Last Name</p>
    </div>
    <div id="menu">
        <a href="#">Vintage Obleka</a>
        <a href="#">Popusti</a>
        <a href="#">Profil Brendovi</a>
    </div>
</div>

<button id="logout">Odjavi se</button>
@endsection