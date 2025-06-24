@extends('layouts.master')

@section('content')
    <br>
    <div class="d-flex justify-content-between align-items-center">
        <h1 class="text-light-emphasis">FinPocket Users</h1>
        <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#createUserModal">
            <i class="fas fa-plus"></i> Add User
        </button>
    </div>
    <hr>
    <br><br>

    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <span>Users List</span>
            <form class="d-flex" method="GET" action="{{ route('users.index') }}">
                <input class="form-control me-2" type="search" name="search" placeholder="Search users..." value="{{ request('search') }}">
                <button class="btn btn-outline-success" type="submit">Search</button>
            </form>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped table-bordered">
                    <thead>
                        <tr class="table-primary">
                            <th scope="col">No</th>
                            <th scope="col">Name</th>
                            <th scope="col">Email</th>
                            <th scope="col">Registered</th>
                            <th scope="col">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $item)
                            <tr>
                                <th scope="row">{{$loop->iteration}}</th>
                                <td>{{ $item->name }}</td>
                                <td>{{ $item->email }}</td>
                                <td>{{ $item->created_at->format('d/m/Y H:i') }}</td>
                                <td>
                                    <button class="btn btn-sm btn-warning" data-bs-toggle="modal" data-bs-target="#editUserModal{{ $item->id }}">
                                        <i class="fas fa-edit"></i>
                                    </button>
                                    <button class="btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#deleteUserModal{{ $item->id }}">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </td>
                            </tr>

                            <!-- Edit User Modal -->
                            <div class="modal fade" id="editUserModal{{ $item->id }}" tabindex="-1" aria-labelledby="editUserModalLabel{{ $item->id }}" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <form action="{{ route('users.update', $item->id) }}" method="POST">
                                            @csrf
                                            @method('PUT')
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="editUserModalLabel{{ $item->id }}">Edit User</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="mb-3">
                                                    <label for="name" class="form-label">Name</label>
                                                    <input type="text" class="form-control" id="name" name="name" value="{{ $item->name }}" required>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="email" class="form-label">Email</label>
                                                    <input type="email" class="form-control" id="email" name="email" value="{{ $item->email }}" required>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="password" class="form-label">Password (leave blank to keep current)</label>
                                                    <input type="password" class="form-control" id="password" name="password">
                                                    <small class="text-muted">Minimum 8 characters with letters, numbers, and symbols</small>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                <button type="submit" class="btn btn-primary">Save changes</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>

                            <!-- Delete User Modal -->
                            <div class="modal fade" id="deleteUserModal{{ $item->id }}" tabindex="-1" aria-labelledby="deleteUserModalLabel{{ $item->id }}" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <form action="{{ route('users.destroy', $item->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="deleteUserModalLabel{{ $item->id }}">Delete User</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                Are you sure you want to delete user <strong>{{ $item->name }}</strong>?
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                                <button type="submit" class="btn btn-danger">Delete</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Create User Modal -->
    <div class="modal fade" id="createUserModal" tabindex="-1" aria-labelledby="createUserModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form action="{{ route('users.store') }}" method="POST">
                    @csrf
                    <div class="modal-header">
                        <h5 class="modal-title" id="createUserModalLabel">Add New User</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="new_name" class="form-label">Name</label>
                            <input type="text" class="form-control" id="new_name" name="name" required>
                        </div>
                        <div class="mb-3">
                            <label for="new_email" class="form-label">Email</label>
                            <input type="email" class="form-control" id="new_email" name="email" required>
                        </div>
                        <div class="mb-3">
                            <label for="new_password" class="form-label">Password</label>
                            <input type="password" class="form-control" id="new_password" name="password" required>
                            <small class="text-muted">Minimum 8 characters</small>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Create User</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    @if($errors->any())
        <script>
            $(document).ready(function() {
                @if(session('form') == 'create')
                    $('#createUserModal').modal('show');
                @elseif(session('form') == 'edit')
                    $('#editUserModal{{ session("id") }}').modal('show');
                @endif
            });
        </script>
    @endif
@endsection