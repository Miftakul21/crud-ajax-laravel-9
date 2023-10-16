@extends('template.app')
@section('title','Register Form')
@section('content')
<form>
    <h1>Register Form</h1>
    <div class="formcontainer">
        <hr />
        <div class="container">
            <label for=""><strong>Name</strong></label>
            <input type="text" placeholder="Enter Name" id="name">
            <label for="email"><strong>email</strong></label>
            <input type="email" placeholder="Enter email" id="email">
            <label for="number_phone"><strong>Number Phone</strong></label>
            <input type="text" placeholder="Enter Number Phone" id="number_phone">
            <label for="number_phone"><strong>Role</strong></label>
            <select id="role">
                <option value="" selected>Select Role</option>
                <option value="user">User</option>
                <option value="editor">Editor</option>
                <option value="admin">Admin</option>
            </select>
            <label for="psw"><strong>Password</strong></label>
            <input type="password" placeholder="Enter Password" id="password">
            <label for="psw"><strong>Confirm Password</strong></label>
            <input type="password" placeholder="Enter Confirm Password" id="confirm_password">
        </div>
        <button class="btn-register">Register</button>
        <div class="container" style=" text-align: right;">
            <span>Punya akun? <a href="/">Login </a></span>
        </div>
</form>

<!-- Sweet Alert 2 -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<!-- Ajax -->
<script src="{{url('assets/js/jquery.js')}}"></script>
<script>
$(document).ready(function() {

    $('.btn-register').click(function(e) {
        e.preventDefault();
        var token = $("meta[name='csrf-token']").attr("content");
        let name = $('#name').val();
        let email = $('#email').val();
        let number_phone = $('#number_phone').val();
        let password = $('#password').val();
        let confirm_password = $('#confirm_password').val();
        let role = $('#role').val();

        if (name.length == '') {
            Swal.fire({
                icon: 'warning',
                title: 'Oops...',
                text: 'Name is required!'
            });
        } else if (email.length == '') {
            Swal.fire({
                icon: 'warning',
                title: 'Oops...',
                text: 'Email is required!'
            });
        } else if (number_phone.length == '') {
            Swal.fire({
                icon: 'warning',
                title: 'Oops...',
                text: 'Number phone is required!'
            });
        } else if (password.length == '') {
            Swal.fire({
                icon: 'warning',
                title: 'Oops...',
                text: 'Passowrd is required!'
            });
        } else if (role.length == '') {
            Swal.fire({
                icon: 'warning',
                title: 'Oops...',
                text: 'Role is required!'
            });
        }

        $.ajax({
            url: '/register',
            type: 'POST',
            dataType: 'JSON',
            data: {
                _token: token,
                name: name,
                email: email,
                number_phone: number_phone,
                password: password,
                role: role
            },
            success: (res) => {
                if (res.success) {
                    Swal.fire({
                        type: 'success',
                        title: 'Register Success',
                        text: 'Please Login'
                    });
                    let name = $('#name').val('');
                    let email = $('#email').val('');
                    let number_phone = $('#number_phone').val('');
                    let password = $('#password').val('');
                    let confirm_password = $('#confirm_password').val('');
                    let role = $('#role').val('');
                } else {
                    Swal.fire({
                        icon: 'error',
                        title: res.message,
                        text: 'Please try again!'
                    });
                }
            },

            error: (res) => {
                Swal.fire({
                    icon: 'error',
                    title: 'Oops, something wrong',
                    text: 'Server error!'
                });
            }

        })


    })
})
</script>
@endsection