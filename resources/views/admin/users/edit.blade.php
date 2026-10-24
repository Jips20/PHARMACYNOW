@extends('admin.layouts.app')

@push('page-css')
    
@endpush

@push('page-header')
<div class="col-sm-12">
	<h3 class="page-title">Edit User</h3>
	<ul class="breadcrumb">
		<li class="breadcrumb-item active">Dashboard</li>
	</ul>
</div>
@endpush

@section('content')

<div class="row">
    <div class="col-md-12 col-lg-12">
    
        <div class="card card-table">
            <div class="card-header">
                <h4 class="card-title ">Edit User</h4>
            </div>
            <div class="card-body">
                <div class="p-5">
                    <form method="POST" enctype="multipart/form-data" action="{{route('users.update',$user)}}">
                        @csrf
                        @method("PUT")
                        <div class="row form-row">
                            <div class="col-12">
                                <div class="form-group">
                                    <label>Full Name</label>
                                    <input type="text" name="name" class="form-control" value="{{old('name', $user->name)}}" placeholder="John Doe" maxlength="50" pattern="[A-Za-z0-9 ]+" required>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <label>Email</label>
                                    <input type="email" name="email" class="form-control" value="{{old('email', $user->email)}}" placeholder="example@gmail.com" maxlength="50" pattern="[A-Za-z0-9.@]+" required>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <label>Role</label>
                                    <div class="form-group">
                                        <select class="select2 form-select form-control" name="role" required>
                                            @foreach ($roles as $role)
                                                <option value="{{$role->name}}" {{old('role', $user->getRoleNames()->first()) === $role->name ? 'selected' : ''}}>{{$role->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <label>Picture</label>
                                    <input type="file" name="avatar" class="form-control" >
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="row">
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label>Password</label>
                                            <input type="password" name="password" class="form-control" maxlength="20" pattern="[!-~]{1,20}">
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label>Confirm Password</label>
                                            <input type="password" name="password_confirmation" class="form-control" maxlength="20" pattern="[!-~]{1,20}">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-success btn-block">Save Changes</button>
                    </form>
                </div>
            </div>
        </div>
        
    </div>

    
</div>

@endsection

@push('page-js')
    <script>
        $(document).on('input', 'input[name="name"]', function() {
            this.value = this.value.replace(/[^A-Za-z0-9 ]/g, '').slice(0, 50);
        });

        $(document).on('input', 'input[name="email"]', function() {
            this.value = this.value.replace(/[^A-Za-z0-9.@]/g, '').slice(0, 50);
        });

        $(document).on('input', 'input[name="password"], input[name="password_confirmation"]', function() {
            this.value = this.value.replace(/[^\x21-\x7E]/g, '').slice(0, 20);
        });
    </script>
@endpush