$(document).ready(function () {
    fetch_data_user();

    /* Admin */
    function fetch_data_user() {
        $.ajax({
            url: '/user',
            type: 'GET',
            dataType: 'JSON',
            success: (res) => {
                if (res.success) {
                    let html = '';
                    let index = 1;

                    $('#data-user').html('');
                    for (let i = 0; i < res.data.length; i++) {
                        let id = res.data[i].user_id;
                        let nama_user = res.data[i].nama_user;
                        let email_user = res.data[i].email_user;
                        let nomor_telepon_user = res.data[i].nomor_telepon_user;
                        let role = res.data[i].role;

                        html = `<tr>
                                    <th scope="row">${index}</th>
                                    <td>${nama_user}</td>
                                    <td>${email_user}</td>
                                    <td>${nomor_telepon_user}</td>
                                    <td>${role}</td>
                                    <td>
                                        <!-- Live Modal -->
                                        <button class="btn btn-warning btn-sm btn-edit-user" data-id="${id}" 
                                        data-bs-toggle="modal" data-bs-target="#editModal">Edit</button>
                                        <button class="btn btn-danger btn-sm btn-delete-user" data-id="${id}" >Delete</button>
                                    </td>
                                </tr>`;
                        $('#data-user').append(html);
                        index++;
                    }
                } else {
                    Swal.fire({
                        icon: 'warning',
                        title: 'Oops...',
                        text: 'server error'
                    });
                }
            }
        })
    }
    // Button Add Data User
    $('.btn-add-data').click(function (e) {
        e.preventDefault();
        var token = $("meta[name='csrf-token']").attr("content");
        let name = $('#name').val();
        let email = $('#email').val();
        let number_phone = $('#number_phone').val();
        let password = $('#password').val();
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
                text: 'Email is required!'
            });
        } else if (password.length == '') {
            Swal.fire({
                icon: 'warning',
                title: 'Oops...',
                text: 'Password is required!'
            });
        } else if (role.length == '') {
            Swal.fire({
                icon: 'warning',
                title: 'Oops...',
                text: 'role is required!'
            });
        }

        $.ajax({
            url: '/user',
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
                        icon: 'success',
                        title: 'Succesfully',
                        text: 'add data editor!'
                    });

                    $('#name').val('');
                    $('#email').val('');
                    $('#number_phone').val('');
                    $('#password').val('');
                    $('#role').val('');

                    $('#exampleModal').modal('hide');
                    fetch_data_user();
                } else {
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops!',
                        text: 'something wrong!'
                    });
                    fetch_data_user();
                }
            },
            error: (res) => {
                Swal.fire({
                    icon: 'error',
                    title: 'Oops!',
                    text: 'server error!'
                });
            }
        })
    });
    // Button Updated Data User
    $('.btn-edit-data').click(function () {
        var token = $("meta[name='csrf-token']").attr("content");
        let user_id = $('#user_id').val();
        let nama_user = $('#name_edit').val();
        let email_user = $('#email_edit').val();
        let nomor_telepon_user = $('#number_phone_edit').val();
        let role = $('#role_edit').val();

        $.ajax({
            url: '/user/' + user_id,
            type: "POST",
            dataType: 'JSON',
            data: {
                _token: token,
                id: user_id,
                nama_user: nama_user,
                email_user: email_user,
                nomor_telepon_user: nomor_telepon_user,
                role: role,
                _method: "PATCH",
            },
            success: (res) => {
                if (res.success) {
                    Swal.fire({
                        icon: 'success',
                        title: 'Success',
                        text: res.message
                    });
                    $('#editModal').modal('hide');
                    fetch_data_user();
                } else {
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops!',
                        text: 'server error!'
                    });
                }
            },
            error: (res) => {
                Swal.fire({
                    icon: 'error',
                    title: 'Oops!',
                    text: 'server error!'
                });
            }
        })

    })
    // Show Data User Live Modal
    $('#data-user').on('click', '.btn-edit-user', function () {
        var token = $("meta[name='csrf-token']").attr("content");
        let user_id = $(this).data('id');

        $.ajax({
            url: 'user/' + user_id,
            type: 'GET',
            dataType: 'JSON',
            success: (res) => {

                if (res.success) {
                    let user_id = res.data[0].user_id;
                    let nama_user = res.data[0].nama_user;
                    let email_user = res.data[0].email_user;
                    let nomor_telepon_user = res.data[0].nomor_telepon_user;
                    let role = res.data[0].role;

                    $('#user_id').val(user_id);
                    $('#name_edit').val(nama_user);
                    $('#email_edit').val(email_user);
                    $('#number_phone_edit').val(nomor_telepon_user);
                    $('#role_edit').val(role);
                } else {
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops!',
                        text: 'something wrong!'
                    });
                }
            },
            error: (res) => { }
        })

    });
    // Button Delete User
    $('#data-user').on('click', '.btn-delete-user', function () {
        var token = $("meta[name='csrf-token']").attr("content");
        let user_id = $(this).data('id');
        Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url: '/user/' + user_id,
                    type: 'delete',
                    dataType: 'JSON',
                    data: {
                        _token: token,
                        id: user_id
                    },
                    success: (res) => {
                        fetch_data_user()
                        if (res.success) {
                            Swal.fire(
                                'Deleted!',
                                'Your file has been deleted.',
                                'success'
                            )
                            fetch_data_user();
                        } else {
                            fetch_data_user();
                        }
                    },
                    error: (res) => { }
                })
            }
        })

    })


    /* Editor */
    fetch_notes_user();
    function fetch_notes_user() {
        $.ajax({
            url: '/notes-user',
            type: 'GET',
            dataType: 'JSON',
            success: (res) => {
                let html = '';
                let index = 1;

                $('#data-notes-editor').html('');
                if (res.success) {
                    let jum_data = res.data.length;
                    for (let i = 0; i < jum_data; i++) {
                        let id_notes = res.data[i].id_notes;
                        // let  user_id = res.data[i].user_id;
                        let notes = res.data[i].notes;
                        let created_at = res.data[i].created_at;
                        let updated_at = res.data[i].updated_at;

                        html = `<tr>
                                    <td>${index}</td>
                                    <td>${notes}</td>
                                    <td>${created_at}</td>
                                    <td>
                                        <button class="btn btn-warning btn-sm btn-notes-edit" data-bs-toggle="modal" 
                                        data-bs-target="#editNotesModal" data-id="${id_notes}">Edit</button>
                                        <button class="btn btn-danger btn-sm btn-notes-delete" data-id="${id_notes}">delete</button>
                                    </td>
                                </tr>`;

                        index++;

                        $('#data-notes-editor').append(html);

                    }
                } else {
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops!',
                        text: 'something wrong'
                    });
                }
            },
            error: (res) => {
                Swal.fire({
                    icon: 'error',
                    title: 'Oops!',
                    text: 'server error'
                });
            }
        })
    }
    // Button Add Data Notes
    $('.btn-add-notes').click(function (e) {
        e.preventDefault();
        var token = $("meta[name='csrf-token']").attr("content");
        let notes = $('#text-notes').val();

        if (notes.length == '') {
            Swal.fire({
                icon: 'warning',
                title: 'Oops...',
                text: 'Notes is required!'
            });
        }
        $.ajax({
            url: '/notes',
            type: 'POST',
            dataType: 'JSON',
            data: {
                _token: token,
                notes: notes,
            },
            success: (res) => {
                if (res.success) {
                    Swal.fire({
                        icon: 'success',
                        title: 'Succesfully',
                        text: 'add notes!'
                    });

                    $('#addNotesModal').modal('hide');
                    $('#text-notes').val('');
                    fetch_notes_user();
                } else {
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops!',
                        text: 'something wrong!'
                    });
                    fetch_notes_user();
                }
            },
            error: (res) => {
                console.log(JSON.stringify(res));
            }
        })
    });
    // Show Data Notes live Modal
    $('#data-notes-editor').on('click', '.btn-notes-edit', function () {
        let id_notes = $(this).data('id');
        $.ajax({
            url: '/notes-user/' + id_notes,
            type: 'GET',
            dataType: 'JSON',
            success: (res) => {
                fetch_notes_user();
                if (res.success) {
                    let notes = res.data[0].notes;
                    $('#id_notes').val(id_notes);
                    $('#text-notes-edit').val(notes);
                } else {
                    Swal.fire({
                        icon: 'warning',
                        title: 'Oops...',
                        text: 'something wrong'
                    });
                }
            },
            error: (res) => {
                console.log(JSON.stringify(res));
            }
        })
    })
    // Button Update Data
    $('.btn-edit-notes').click(function () {
        var token = $("meta[name='csrf-token']").attr("content");
        let id_notes = $('#id_notes').val();
        let notes = $('#text-notes-edit').val();

        if (notes.length == '') {
            Swal.fire({
                icon: 'warning',
                title: 'Oops...',
                text: 'Notes is required!'
            });
        }
        $.ajax({
            url: '/notes/' + id_notes,
            type: 'POST',
            dataType: 'JSON',
            data: {
                _token: token,
                notes: notes,
                _method: "PATCH",
            },
            success: (res) => {
                fetch_notes_user();
                if (res.success) {
                    Swal.fire({
                        icon: 'success',
                        title: 'Succesfully',
                        text: 'update notes'
                    });
                    $('#editNotesModal').modal('hide');
                    fetch_notes_user();
                } else {
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops!',
                        text: 'something wrong cok'
                    });
                    fetch_notes_user();
                }
            },
            error: (res) => {
                console.log(JSON.stringify(res));
            }

        })

    });
    // Delete Data Notes
    $('#data-notes-editor').on('click', '.btn-notes-delete', function () {
        var token = $("meta[name='csrf-token']").attr("content");
        let id_notes = $(this).data('id');
        Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url: '/notes-user/' + id_notes,
                    type: 'delete',
                    dataType: 'JSON',
                    data: {
                        _token: token,
                        id_notes: id_notes
                    },
                    success: (res) => {
                        fetch_notes_user();
                        if (res.success) {
                            Swal.fire(
                                'Deleted!',
                                'Your file has been deleted.',
                                'success'
                            )
                            fetch_notes_user();
                        } else {
                            fetch_notes_user();
                        }
                    },
                    error: (res) => {
                        console.log(JSON.stringify(res));
                    }
                })
            }
        })
    })
});