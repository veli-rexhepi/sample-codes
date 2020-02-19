@extends('admin-layouts.starter')

@section('admin-content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <!-- <i class="fa fa-edit"></i> -->
        Edit user profile
        <!-- <small>Optional description</small> -->
      </h1>
      <ol class="breadcrumb">
        <li><a href=""><i class="fa fa-users"></i> User Management</a></li>
        <li class="active">Edit user profile</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content container-fluid">

      @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
      @endif

      <!-- <div class="col-md-12" style="background-color:white;"> -->
        <div class="col-md-6 custom-box-info-container">
          <!-- Horizontal Form -->
          <div class="box box-info custom-box-info">
            <div class="box-header with-border">
              <h3 class="box-title">User profile details</h3>
            </div>
            <!-- /.box-header -->          
            <!-- form start -->
            <form class="form-horizontal" method="POST" action="{{ route('updateUserProfile', ['id' => $user->id]) }}" >
              @csrf
              <div class="box-body">
                <div class="form-group">
                  <label for="first_name" class="col-sm-3 control-label">First Name</label>
                  <div class="col-sm-9">
                    <input type="text" class="form-control" id="first_name" name="first_name"
                      value="{{ $user->first_name ?? '' }}">
                  </div>
                </div>

                <div class="form-group">
                  <label for="last_name" class="col-sm-3 control-label">Last Name</label>
                  <div class="col-sm-9">
                    <input type="text" class="form-control" id="last_name" name="last_name"
                      value="{{ $user->last_name ?? '' }}">
                  </div>
                </div>

                <div class="form-group">
                  <label for="badge" class="col-sm-3 control-label">Badge #</label>
                  <div class="col-sm-9">
                    <div class="input-group">
                      <span class="input-group-addon custom-fa-icon"><i class="fa fa-id-badge"></i></span>
                      <input type="text" class="form-control" id="badge" name="badge"
                        value="{{ $user->badge ?? '' }}">
                    </div>
                  </div>
                </div>

                <div class="form-group">
                  <label for="email" class="col-sm-3 control-label">Email</label>
                  <div class="col-sm-9">
                    <div class="input-group">
                      <span class="input-group-addon custom-fa-icon"><i class="fa fa-envelope-o"></i></span>
                      <input type="email" class="form-control" id="email" name="email"
                        value="{{ $user->email ?? '' }}" disabled>
                      <span class="input-group-addon custom-fa-icon"><i class="fa fa-lock"></i></span>
                    </div>
                  </div>
                </div>                

                <div class="form-group">
                  <label for="role_id" class="col-sm-3 control-label">Role</label>
                  <div class="col-sm-9">
                    <select class="form-control" id="role_id" name="role_id">
                      <option value=1 {{ $user->userRole->role_id == 1 ? 'selected' : '' }}>Administrator</option>
                      <option value=2 {{ $user->userRole->role_id == 2 ? 'selected' : '' }}>Full</option>
                      <option value=3 {{ $user->userRole->role_id == 3 ? 'selected' : '' }}>Standard</option>
                      <option value=4 {{ $user->userRole->role_id == 4 ? 'selected' : '' }}>Limited</option>                      
                    </select>
                  </div>
                </div>
                  
                <div class="form-group">
                  <label for="status_id" class="col-sm-3 control-label">Status</label>
                  <div class="col-sm-9">
                    <select class="form-control" id="status_id" name="status_id">
                      <option value=1 {{ $user->status_id == 1 ? 'selected' : '' }}>Active</option>
                      <option value=0 {{ $user->status_id == 0 ? 'selected' : '' }}>Inactive</option>                      
                    </select>
                  </div>
                </div>

                <!-- /.box-body -->
                <div class="box-footer custom-box-footer">                
                  <a class="btn btn-primary" href="{{ route('displayUserProfile', ['id' => $user->id]) }}">
                    <i class="fa fa-times"></i> Cancel</a>                  
                  <div class="btn-group pull-right">                    
                    <button type="submit" class="btn btn-primary pull-right">
                      <i class="fa fa-save"></i> Save</button>
                  </div>
                </div>
                <!-- /.box-footer -->
              </div>
              <!-- /.box-body -->
            </form>
            <!-- /.form -->
          </div>
          <!-- /.box -->            
        </div>
      <!-- </div> -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
@endsection