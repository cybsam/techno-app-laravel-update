<div class="modal fade" id="addusermodal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Add User</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('SupUser.AddNewUser') }}" method="post" enctype="multipart/form-data">
            <div class="modal-body">
                @csrf
                {{-- form start --}}
                <div class="form-group">
                    <label for="Name">Name</label>
                    <input type="text" name="name" id="name" class="form-control @error('name') is-invalie @enderror" value="{{ old('name') }}">
                    <div class="text-danger">
                        @error('name')
                            <span>{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="form-group">
                    <label for="Name">User-Name</label>
                    <input type="text" name="username" id="username" class="form-control @error('username') is-invalie @enderror" value="{{ old('username') }}">
                    <div class="text-danger">
                        @error('username')
                            <span>{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="form-group">
                    <label for="Name">Email</label>
                    <input type="email" name="email" id="email" class="form-control @error('email') is-invalie @enderror" value="{{ old('email') }}">
                    <div class="text-danger">
                        @error('email')
                            <span>{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="form-group">
                    <label for="Name">Password</label>
                    <input type="password" name="password" id="password" class="form-control @error('password') is-invalie @enderror" value="{{ old('password') }}">
                    <div class="text-danger">
                        @error('password')
                            <span>{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="form-group">
                    <label for="Name">Confirm Password</label>
                    <input type="password" name="password_confirmation"  class="form-control">
                    <div class="text-danger">
                        @error('name')
                            <span>{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="form group">
                    
                </div>
                
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">+ User</button>
            </div>
        </form>
        </div>
    </div>
</div>


{{-- start user update modal --}}
<div class="modal fade" id="updateModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Update User</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="" method="post" enctype="multipart/form-data">
                <div class="modal-body">
                    @csrf
                    <input type="hidden" name="id" id="up_id" value="up_id">
                    <div class="form-group">
                        <label for="name">Name </label>

                        <input type="text" class="form-control" name="name" id="up_name">
                    </div>
                    <div class="form-group">
                        <label for="name">Username</label>
                        <input type="text" class="form-control" readonly="readonly" name="username" id="up_username">
                    </div>
                    <div class="form-group">
                        <label for="name">Email</label>
                        <input type="text" class="form-control" readonly="readonly" name="email" id="up_email">
                    </div>
                    <div class="form-group">
                        <label for="name">Role</label>

                        <select name="role_int" class="form-control" id="up_role_int">
                            <option value="0" id="up_role" selected>User</option>
                            <option value="0">User</option>
                            <option value="1">Admin</option>
                        </select>
                    </div>
                </div>
            </form>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div>
        </div>
    </div>
</div>

{{-- end user update modal --}}


{{-- start admin update modal --}}
<div class="modal fade" id="adminUpdateModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Update Admin</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="" method="post" enctype="multipart/form-data">
                <div class="modal-body">
                    @csrf
                    <input type="hidden" name="id" id="up_admin_id" value="up_admin_id">
                    <div class="form-group">
                        <label for="name">Name </label>

                        <input type="text" class="form-control" name="name" id="up_admin_name">
                    </div>
                    <div class="form-group">
                        <label for="name">Username</label>
                        <input type="text" class="form-control" readonly="readonly" name="username"
                            id="up_admin_username">
                    </div>
                    <div class="form-group">
                        <label for="name">Email</label>
                        <input type="text" class="form-control" readonly="readonly" name="email"
                            id="up_admin_email">
                    </div>
                    <div class="form-group">
                        <label for="name">Role</label>

                        <select name="role_int" class="form-control" id="up_admin_role">
                            <option value="up_admin_role_int" id="up_admin_role" selected>Admin Role</option>
                            <option value="0">User</option>
                            <option value="1">Admin</option>
                        </select>
                    </div>
                </div>
            </form>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div>
        </div>
    </div>
</div>

{{-- end admin update modal --}}


{{-- user delete modal --}}
<div class="modal fade" id="deleteUser" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Delete User</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="" method="post" enctype="multipart/form-data">
                @csrf
                <div class="modal-body text-danger">
                    Are You sure want to delete this user? <span class="text-danger"><i class="bi bi-person-fill-x" aria-hidden="true"></i></span>
                </div>
                <div class="form-group">
                    <input type="hidden" value="" id="id" aria-describedby="dlt_id" name="dlt_id" >
                </div>
            
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-danger">Delete User</button>
            </div>
        </form>
        </div>
    </div>
</div>



<div class="modal fade" id="usersArchiveModelSh" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <form action="" method="post" enctype="multipart/form-data">
                @csrf
                
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Project Delete</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <b class="">Are you sure to Delete this project! <br>Be carefull ! </b>
                        <input type="hidden" class="form-control" name="ProjectDeleteBTNId" id="ProjectDeleteBTNId" placeholder="">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-danger">Delete</button>
                </div>
            </form>
        </div>
    </div>
</div>
