@extends('admin-layouts.starter')

@section('admin-content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        List User Profiles
        <!-- <small>Optional description</small> -->
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{ route('createUserProfile') }}"><i class="fa fa-dashboard"></i> User Management</a></li>
        <li class="active">List User Profiles</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content container-fluid">
      <div class="col-md-12" style="background-color:white">
        <div class="col-md-6">
          <!-- Horizontal Form -->
          <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Navigate the list to find the user profile you'r lookig for.</h3>
            </div>
            <!-- /.box-header -->          
            {{ $userProfiles }}
            <!-- user profile table -->            
            <div class="box-body" style="/*background-color:red*/">
              <div class="table-responsive" style="/*background-color:green*/">
                
                <table id="userProfilesList" class="table" style="/*background-color:white*/">
                  <caption>List of users profiles</caption>
                  <thead>
                    <tr>
                      <th scope="col">#</th>
                      <th scope="col">Last Name</th>
                      <th scope="col">First Name</th>
                      <th scope="col">Email</th>
                      <th scope="col">Role</th>
                      <th scope="col">Status</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($userProfiles as $userProfile)
                    <tr>
                      <th scope="row">{{ $loop->iteration }}</th>
                      <td>{{ $userProfile->last_name }}, {{ $userProfile->first_name }}</td>
                      <td>{{ $userProfile->badge }}</td>
                      <td>{{ $userProfile->email }}</td>
                      <td>{{ $userProfile->role_description }}</td>
                      <td>{{ $userProfile->status }}</td>
                    </tr>
                    @endforeach                    
                  </tbody>
                </table>
                               
                @push('DatatableCSS')
                  <!-- DataTable style -->
                  <link rel="stylesheet" type="text/css" href="{{ asset('/assets/Datatables/datatables.css') }}">
                @endpush

                @push('DatatableJS')
                  <!-- DataTables JavaScript -->
                  <script type="text/javascript" charset="utf8" src="{{ asset('/assets/DataTables/datatables.js') }}"></script>
                  <script>
                    $(document).ready( function () {
                      $('#userProfilesList').DataTable({
                        "lengthMenu": [ 5, 10, 25, 50 ],
                          "pagingType": "full_numbers"                           
                      });
                    });
                  </script>
                @endpush
              </div>
            </div>
            <!-- /. user profile table -->
            

          </div>
          <!-- /.box -->            
        </div>
      </div>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
@endsection