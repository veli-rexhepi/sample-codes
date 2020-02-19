@extends('admin-layouts.starter')

@section('admin-content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <!-- <i class="fa fa-user-o"></i> -->
        Create user profile
        <!-- <small>Optional description</small> -->
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{ route('createUserProfile') }}"><i class="fa fa-users"></i> User Management</a></li>
        <li class="active">Create user profile</li>
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
              <h3 class="box-title">Fill the form to create a new profile</h3>
            </div>
            <!-- /.box-header -->          
            <!-- form start -->
            <form class="form-horizontal" method="POST" action="{{ route('storeUserProfile') }}" >
              @csrf
              <div class="box-body">
                <div class="form-group">
                  <label for="first_name" class="col-sm-3 control-label">First Name</label>
                  <div class="col-sm-9">
                    <input type="text" class="form-control" id="first_name" name="first_name"
                      value="{{ old('first_name') }}" placeholder="type your first name">
                  </div>
                </div>

                <div class="form-group">
                  <label for="last_name" class="col-sm-3 control-label">Last Name</label>
                  <div class="col-sm-9">
                    <input type="text" class="form-control" id="last_name" name="last_name"
                      value="{{ old('last_name') }}" placeholder="type your last name">
                  </div>
                </div>

                <div class="form-group">
                  <label for="badge" class="col-sm-3 control-label">Badge #</label>
                  <div class="col-sm-9">
                    <div class="input-group">
                      <span class="input-group-addon custom-fa-icon"><i class="fa fa-id-badge"></i></span>
                      <input type="text" class="form-control" id="badge" name="badge"
                        value="{{ old('badge') }}" placeholder="type your badge number">
                    </div>
                  </div>
                </div>

                <div class="form-group">
                  <label for="email" class="col-sm-3 control-label">Email</label>
                  <div class="col-sm-9">
                    <div class="input-group">
                      <span class="input-group-addon custom-fa-icon"><i class="fa fa-envelope-o"></i></span>
                      <input type="email" class="form-control" id="email" name="email"
                        value="{{ old('email') }}" placeholder="type your email">
                    </div>
                  </div>
                </div>

                <div class="form-group">
                  <label for="role_id" class="col-sm-3 control-label">Role</label>
                  <div class="col-sm-9">
                    <select class="form-control" id="role_id" name="role_id">
                      <option value=1>Administrator</option>
                      <option value=2>Full</option>
                      <option value=3>Standard</option>
                      <option value=4 selected>Limited</option>                      
                    </select>
                  </div>
                </div>

                <div class="form-group">
                  <label for="status_id" class="col-sm-3 control-label">Status</label>
                  <div class="col-sm-9">
                    <select class="form-control" id="status_id" name="status_id">
                      <option value=1>Active</option>
                      <option value=0 selected>Inactive</option>                      
                    </select>
                  </div>
                </div>

                <div class="form-group">
                  <label for="password" class="col-sm-3 control-label">Password</label>
                  <div class="col-sm-9">
                    <input type="password" class="form-control" id="password" name="password"
                      value="{{ old('password') }}" placeholder="create password">
                  </div>
                </div>

                <div class="form-group">
                  <label for="password_confirmation" class="col-sm-3 control-label">Confirm Password</label>
                  <div class="col-sm-9">
                    <input type="password" class="form-control" id="password_confirmation" name="password_confirmation"
                      value="" placeholder="confirm password">
                  </div>
                </div>

                <div class="box-footer custom-box-footer">                
                  <a class="btn btn-primary" href="{{ route('listUserProfiles') }}"><i class="fa fa-list"></i> List Users</a>
                  <button type="submit" class="btn btn-primary pull-right"><i class="fa fa-save"></i> Save</button>                   
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