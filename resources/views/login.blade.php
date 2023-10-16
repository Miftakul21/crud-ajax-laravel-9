@extends('template.app')
@section('title','Login Form')
@section('content')
<form>
    <h1>Login Form</h1>
    <div class="formcontainer">
        <hr />
        <div class="container">
            <label for="uname"><strong>Email</strong></label>
            <input type="text" placeholder="Enter Email" id="email">
            <label for="psw"><strong>Password</strong></label>
            <input type="password" placeholder="Enter Password" id="password">
        </div>
        <button class="btn-login">Login</button>
        <div class="container" style="text-align:center;">
            <span>Belum punya akun? <a href="/register">Register </a></span>
        </div>
</form>

<!-- Sweet Alert 2 -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<!-- Ajax -->
<script src="{{url('assets/js/jquery.js')}}"></script>
<script src="{{url('assets/js/login.js')}}"></script>
@endsection