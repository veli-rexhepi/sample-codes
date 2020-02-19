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

              <div class="buyAnotherItem-holder">
                <div class="buyAnotherItem btn-group">
                  <button class="btn btn-primary buyCarGuestBtn" type="button" 
                    onclick="window.location = '{{ url("/displayMyBacketAuthUser") }}'"
                  >Display My Basket</button>
                </div>
              </div>
            </section>

            <!-- Main content -->
            <section class="content">
              <div class="row">
                <div class="col-xs-12">
                  <div class="box">
                    <div class="box-header">
                      <h3 class="box-title">Available Cars List</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                      <table id="example1" class="table table-bordered table-hover">
                        <thead>
                            <tr>
                              <th>Make</th>
                              <th>Model</th>
                              <th>Registration</th>
                              <th>Engine Size</th>                              
                              <th>Price</th>
                              <th>Color</th>
                              <th>Dors</th> 
                              <th>Quantity</th>
                              <th>Operations</th>                             
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($carList as $car)
                                @if ($car->Active === 'Active')
                                    <tr>
                                      <td>{{ $car->Make }}</td>
                                      <td>{{ $car->Model }}</td>
                                      <td>{{ $car->Registration }}</td>
                                      <td>{{ $car->{'Engine Size'} }}</td>                                      
                                      <td>{{ $car->Price }}</td>
                                      <td>{{ $car->Color }}</td>
                                      <td>{{ $car->Dors }}</td>
                                      <form role="form" method="POST" action="{{ url("/buyThisCarAuthUser/" . $car->id) }}">
                                        @csrf
                                        <td class="carQuantity">                                   
                                            <input name="carQuantity" type="number" value="1" min="0">                                          
                                        </td>
                                        <td>
                                            <button class="btn btn-block btn-primary" type="submit">Add to basket</button>
                                        </td>
                                      </form>
                                      <!-- <td><button class="btn btn-block btn-primary" type="button" 
                                            onclick="window.location = '{{ url("/buyThisCarAuthUser/" . $car->id) }}'"
                                          >Add to basket</button></td> -->                                      
                                    </tr>
                                @endif
                            @endforeach                        
                        </tbody>

                        <tfoot>
                            <tr>
                              <th>Make</th>
                              <th>Model</th>
                              <th>Registration</th>
                              <th>Engine Size</th>
                              <th>Price</th>
                              <th>Color</th>
                              <th>Dors</th>
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