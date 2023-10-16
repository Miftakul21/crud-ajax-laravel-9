@extends('template.app2')
@section('title','Dashboard')
<!-- Halaman ini menampilkan semua notes yang dituliskan oleh editor -->
<!-- Halaman ini dapat dilihat oleh role admin -->

@section('content')
@php $role = Auth::user()->role @endphp


@if($role == 'admin')
<!-- Page Admin -->
<div class="container" style="margin-top: 30px;">
    <div class="row">
        <div class="row">
            <div class="col-3">
                <div class="list-group" id="list-tab" role="tablist">
                    <!-- Home -->
                    <a class="list-group-item list-group-item-action active" id="list-home-list" data-bs-toggle="list"
                        href="#list-home" role="tab" aria-controls="list-home">Home</a>
                    <!-- User -->
                    <a class="list-group-item list-group-item-action" id="list-user" data-bs-toggle="list" href="#user"
                        role="tab" aria-controls="user">Users</a>
                    <!-- Notes -->
                    <a class="list-group-item list-group-item-action" id="list-notes" data-bs-toggle="list"
                        href="#notes" role="tab" aria-controls="user">Notes</a>
                    <!-- Logout -->
                    <a href="/logout" class="list-group-item list-group-item-action">Logout</a>
                </div>
            </div>
            <div class="col-9">
                <div class="tab-content" id="nav-tabContent">
                    <!-- Home -->
                    <div class="tab-pane fade show active" id="list-home" role="tabpanel"
                        aria-labelledby="list-home-list">
                        <div class="card">
                            <div class="card-header">
                                Page Admin
                            </div>
                            <div class="card-body">
                                <h5 class="card-title">Welcome Admin</h5>
                            </div>
                        </div>
                    </div>
                    <!-- User  -->
                    <div class="tab-pane fade" id="user" role="tabpanel" aria-labelledby="list-user">
                        <div class="card">
                            <div class="card-header d-flex justify-content-between align-items-center">
                                <h5>Editor</h5>
                                <button class="btn btn-sm btn-primary" data-bs-toggle="modal"
                                    data-bs-target="#exampleModal">Add Data</button>
                            </div>
                            <div class="card-body">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th scope="col">No</th>
                                            <th scope="col">Name</th>
                                            <th scope="col">Email</th>
                                            <th scope="col">Phone</th>
                                            <th scope="col">Role</th>
                                            <th scope="col">action</th>
                                        </tr>
                                    </thead>
                                    <tbody id="data-user">

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <!-- Notes -->
                    <div class="tab-pane fade" id="notes" role="tabpanel" aria-labelledby="list-notes">
                        <div class="card">
                            <div class="card-header">
                                Notes
                            </div>
                            <div class="card-body">
                                <div class="row" id="data-notes">


                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Page Admin -->
@elseif($role == 'editor')
<!-- Page Editor -->
<div class="container" style="margin-top: 30px;">
    <div class="row">
        <div class="row">
            <div class="col-3">
                <div class="list-group" id="list-tab" role="tablist">
                    <!-- Home -->
                    <a class="list-group-item list-group-item-action active" id="list-home-list" data-bs-toggle="list"
                        href="#list-home" role="tab" aria-controls="list-home">Home</a>
                    <!-- User -->
                    <a class="list-group-item list-group-item-action" id="list-notes" data-bs-toggle="list" href="#user"
                        role="tab" aria-controls="list-notes">Notes</a>
                    <!-- Notes -->
                    <!-- <a class="list-group-item list-group-item-action" id="list-collection-notes" data-bs-toggle="list"
                        href="#notes-collection" role="tab" aria-controls="list-notes-collection">Collection</a> -->
                    <!-- Logout -->
                    <a href="/logout" class="list-group-item list-group-item-action">Logout</a>
                </div>
            </div>
            <div class="col-9">
                <div class="tab-content" id="nav-tabContent">
                    <!-- Home -->
                    <div class="tab-pane fade show active" id="list-home" role="tabpanel"
                        aria-labelledby="list-home-list">
                        <div class="card">
                            <div class="card-header">
                                Page Editor
                            </div>
                            <div class="card-body">
                                <h5 class="card-title">Welcome Editor</h5>
                            </div>
                        </div>
                    </div>
                    <!-- Notes  -->
                    <div class="tab-pane fade" id="user" role="tabpanel" aria-labelledby="list-user">
                        <div class="card">
                            <div class="card-header d-flex justify-content-between align-items-center">
                                <h5>Notes</h5>
                                <button class="btn btn-sm btn-primary" data-bs-toggle="modal"
                                    data-bs-target="#addNotesModal">Add Data</button>
                            </div>
                            <div class="card-body">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th scope="col">No</th>
                                            <th scope="col">Notes</th>
                                            <th scope="col">Created/Updated</th>
                                            <th scope="col">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody id="data-notes-editor">
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <!-- Notes -->
                    <div class="tab-pane fade" id="notes-collection" role="tabpanel"
                        aria-labelledby="list-collection-notes">
                        <div class="card">
                            <div class="card-header">
                                Notes (Name_User)
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="card">
                                            <div class="card-body">
                                                <h5 class="card-title">Special title treatment</h5>
                                                <p class="card-text">With supporting text below as a natural lead-in to
                                                    additional content.</p>
                                                <a href="#" class="btn btn-primary">Go somewhere</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="card">
                                            <div class="card-body">
                                                <h5 class="card-title">Special title treatment</h5>
                                                <p class="card-text">With supporting text below as a natural lead-in to
                                                    additional content.</p>
                                                <a href="#" class="btn btn-primary">Go somewhere</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Editor -->

@elseif($role == 'user')
<div class="container" style="margin-top: 30px;">
    <div class="row">
        <div class="row">
            <div class="col-3">
                <div class="list-group" id="list-tab" role="tablist">
                    <!-- Home -->
                    <a class="list-group-item list-group-item-action active" id="list-home-list" data-bs-toggle="list"
                        href="#list-home" role="tab" aria-controls="list-home">Home</a>
                    <!-- Notes All Editor -->
                    <a class="list-group-item list-group-item-action" id="list-collection-notes" data-bs-toggle="list"
                        href="#notes-collection" role="tab" aria-controls="list-notes-collection">Collection Notes</a>
                    <!-- Logout -->
                    <a href="/logout" class="list-group-item list-group-item-action">Logout</a>
                </div>
            </div>
            <div class="col-9">
                <div class="tab-content" id="nav-tabContent">
                    <!-- Home -->
                    <div class="tab-pane fade show active" id="list-home" role="tabpanel"
                        aria-labelledby="list-home-list">
                        <div class="card">
                            <div class="card-header">
                                Page User
                            </div>
                            <div class="card-body">
                                <h5 class="card-title">Welcome <?= Auth::user()->name; ?></h5>
                            </div>
                        </div>
                    </div>
                    <!-- Collection Notes Editor -->
                    <div class="tab-pane fade" id="notes-collection" role="tabpanel"
                        aria-labelledby="list-collection-notes">
                        <div class="card">
                            <div class="card-header">
                                Notes Collection
                            </div>
                            <div class="card-body">
                                <div class="row" id="data-notes">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@else
<script>
alert('Oops!, role not found')
</script>
@endif

<!-- Admin -->
<!-- Live Modal Add Data -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add Data</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="mb-3">
                    <label for="name" class="form-label">Name</label>
                    <input type="text" class="form-control" id="name" placeholder="Enter Name...">
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control" id="email" placeholder="Enter Email...">
                </div>
                <div class="mb-3">
                    <label for="number_phone" class="form-label">Number Phone</label>
                    <input type="text" class="form-control" id="number_phone" placeholder="Enter Number Phone...">
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" class="form-control" id="password" placeholder="Enter Password">
                </div>
                <div class="mb-3">
                    <label for="role" class="form-label">Role</label>
                    <select class="form-select" id="role">
                        <option selected>Select Role</option>
                        <option value="editor">Editor</option>
                        <option value="admin">Admin</option>
                    </select>
                </div>
                <button class="btn btn-primary btn-add-data">Submit</button>
            </div>
        </div>
    </div>
</div>
<!-- Live Modal Edit Data -->
<div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Data</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <input type="hidden" id="user_id">
                <div class="mb-3">
                    <label for="name" class="form-label">Name</label>
                    <input type="text" class="form-control" id="name_edit">
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control" id="email_edit">
                </div>
                <div class="mb-3">
                    <label for="number_phone" class="form-label">Number Phone</label>
                    <input type="text" class="form-control" id="number_phone_edit">
                </div>
                <div class="mb-3">
                    <label for="role" class="form-label">Role</label>
                    <select class="form-select" id="role_edit">
                        <option selected>Select Role</option>
                        <option value="editor">Editor</option>
                        <option value="admin">Admin</option>
                    </select>
                </div>
                <button class="btn btn-primary btn-edit-data">Update</button>
            </div>
        </div>
    </div>
</div>

<!-- Editor -->
<!-- Live Modal Add Data -->
<div class="modal fade" id="addNotesModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add Note</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="mb-3">
                    <label for="name" class="form-label">Notes</label>
                    <textarea class="form-control" placeholder="add notes..." id="text-notes"
                        style="height: 100px"></textarea>
                </div>
                <button class="btn btn-primary btn-add-notes">Add Data</button>
            </div>
        </div>
    </div>
</div>
<!-- Live Modal Edit Data -->
<div class="modal fade" id="editNotesModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Notes</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <input type="hidden" id="id_notes">
                <div class="mb-3">
                    <label for="notes-edit" class="form-label">Notes</label>
                    <textarea class="form-control" placeholder="add notes..." id="text-notes-edit"
                        style="height: 100px"></textarea>
                </div>
                <button class="btn btn-primary btn-edit-notes">Update</button>
            </div>
        </div>
    </div>
</div>


<!-- Sweet Alert 2 -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<!-- Ajax -->
<script src="{{url('assets/js/jquery.js')}}"></script>
<script src="{{url('assets/js/main.js')}}"></script>
<script>
$(document).ready(function() {
    fetch_notes();

    function fetch_notes() {
        $.ajax({
            url: '/notes',
            type: 'GET',
            dataType: 'JSON',
            success: (res) => {
                if (res.success) {
                    let jumlahData = res.data.length;
                    let html = '';

                    for (let i = 0; i < jumlahData; i++) {
                        let name_user = res.data[i].name_user;
                        let notes_user = res.data[i].notes_user;
                        let created_at = res.data[i].created_at;

                        html = `<div class="col-sm-6">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="card-title d-flex justify-content-between align-items-center">
                                                <h5>Editor : ${name_user}</h5>
                                                <p style="font-size: 16px;">Created : ${created_at}</p>
                                            </div>
                                            <p class="card-text">${notes_user}</p>
                                            <a href="#" class="btn btn-primary">Go somewhere</a>
                                        </div>
                                    </div>
                                </div>`;
                        $('#data-notes').append(html);
                    }
                }
            },
            error: (res) => {
                console.log(JSON.stringify(res));
            }
        })
    }

});
</script>



@endsection