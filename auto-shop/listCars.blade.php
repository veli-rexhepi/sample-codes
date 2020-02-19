@extends('layouts.master')

@section('contentWrapper')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Page Header
                <small>Optional description</small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> Level</a></li>
                <li class="active">Here</li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content container-fluid">           
              
            <!-- Content Header (Page header) -->
            <section class="content-header">
              <h1>
                Data Tables
                <small>advanced tables</small>
              </h1>
              <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                <li><a href="#">Tables</a></li>
                <li class="active">Data tables</li>
              </ol>
            </section>

            <!-- Main content -->
            <section class="content">
              <div class="row">
                <div class="col-xs-12">
                  <div class="box">
                    <div class="box-header">
                      <h3 class="box-title">Available Cars</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                      <table id="example1" class="table table-bordered table-hover custom-carsTable">
                        <thead>
                            <tr>
                              <th>id</th>
                              <th>Make</th>
                              <th>Model</th>
                              <th>Registration</th>
                              <th>Engine Size</th>
                              <th>Active</th>
                              <th>Price</th>
                              <th>Color</th>
                              <th>Dors</th>
                              <th>Created On</th>
                              <th>Updated On</th>
                              <th>Operations</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach($carList as $car)
                                <tr>
                                  <th><div>{{ $car->id }}</div></th>
                                  <td><div>{{ $car->Make }}</div></td>
                                  <td><div>{{ $car->Model }}</div></td>
                                  <td><div>{{ $car->Registration }}</div></td>
                                  <td><div>{{ $car->{'Engine Size'} }}</div></td>
                                  <td><div>{{ $car->Active }}</div></td>
                                  <td><div>{{ $car->Price }}</div></td>
                                  <td><div><div class="carTable-carColor" style="background-color:{{ $car->Color }}"></div></td>
                                  <td><div>{{ $car->Dors }}</div></td>
                                  <td><div>{{ $car->created_at }}</div></td>
                                  <td><div>{{ $car->updated_at }}</div></td>
                                  <td class="button-holder">    
                                    <div class="btn-group">                             
                                      <button type="button" class="btn btn-default custom-carsTable-button"
                                        onclick="window.location='{{ url("/editCar/" . $car->id) }}'"
                                        ><i class="fa fa-edit"></i> Edit</button>
                                      <button type="button" class="btn btn-default custom-carsTable-button"
                                        onclick="window.location='{{ url("/deleteCar/" . $car->id) }}'"
                                      ><i class="fa fa-trash-o"></i> Delete</button>
                                    </div>
                                  </td>
                                </tr>
                            @endforeach                        
                        </tbody>

                        <tfoot>
                            <tr>
                              <th>id</th>
                              <th>Make</th>
                              <th>Model</th>
                              <th>Registration</th>
                              <th>Engine Size</th>
                              <th>Active</th>
                              <th>Price</th>
                              <th>Color</th>
                              <th>Dors</th>
                              <th>Created On</th>
                              <th>Updated On</th>
                              <th>Operations</th>
                            </tr>
                        </tfoot>
                      </table>
                    </div>
                    <!-- /.box-body -->
                  </div>
                  <!-- /.box -->         
                </div>
                <!-- /.col -->
              </div>
              <!-- /.row -->
            </section>
            <!-- /.content -->
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@endsection