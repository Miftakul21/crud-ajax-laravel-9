$(document).ready(function () {
    $('.btn-login').click(function (e) {
        e.preventDefault();
        var token = $("meta[name='csrf-token']").attr("content");
        let email = $('#email').val();
        let password = $('#password').val();

        if (email.length == '') {
            Swal.fire({
                type: 'warning',
                title: 'Oops...',
                text: 'Email is required!'
            });
        } else if (password.length == '') {
            Swal.fire({
                type: 'warning',
                title: 'Oops...',
                text: 'Password is required!'
            });
        }

        $.ajax({
            url: '/login',
            type: 'POST',
            dataType: 'JSON',
            data: {
                _token: token,
                email: email,
                password: password
            },
            success: (res) => {
                if (res.success) {
                    if (res.role == 'user') {
                        Swal.fire({
                            icon: 'success',
                            title: 'Login Success',
                            text: 'You will be redirected in 3 seconds',
                            timer: 3000,
                            showCancelButton: false,
                            showConfirmButton: false
                        })
                            .then(function () {
                                window.location.href = '/dashboard';
                            });
                    } else if (res.role == 'editor') {
                        Swal.fire({
                            icon: 'success',
                            title: 'Login Success',
                            text: 'You will be redirected in 3 seconds',
                            timer: 3000,
                            showCancelButton: false,
                            showConfirmButton: false
                        })
                            .then(function () {
                                window.location.href = "/dashboard";
                            });
                    } else if (res.role == 'admin') {
                        Swal.fire({
                            icon: 'success',
                            title: 'Login Success',
                            text: 'You will be redirected in 3 seconds',
                            timer: 3000,
                            showCancelButton: false,
                            showConfirmButton: false
                        })
                            .then(function () {
                                window.location.href = "/dashboard";
                            });
                    } else {
                        Swal.fire({
                            icon: 'error',
                            title: 'Opps!',
                            text: 'server error'
                        });
                    }
                } else {
                    Swal.fire({
                        icon: 'error',
                        title: 'Opps!',
                        text: 'Please try again'
                    });
                }
            },
            error: (res) => {
                Swal.fire({
                    type: 'error',
                    title: 'Opps!',
                    text: 'server error'
                });

                console.log('enek seng error mas bro\n ' + JSON.stringify(res));
            }
        })

    });
})