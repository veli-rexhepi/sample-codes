@extends('layouts.masterGuest')

@section('contentWrapper-Guest')    

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
                    onclick="window.location = '{{ url("/buyACarGuest") }}'"
                  >Add an item</button>

                  <button class="btn btn-primary buyCarGuestBtn" type="button" 
                    onclick="window.location = '{{ url("/removeAllCarsGuest") }}'"
                  >Remove all items</button>

                  <button class="btn btn-primary buyCarGuestBtn" type="button" 
                    onclick="window.location = '{{ url("/goToPaymentGuest") }}'"
                  >Go to payment</button>
                </div>
              </div>
            </section>

            <!-- Main content -->
            <section class="content">
              <div class="row">
                <div class="col-xs-12">
                  <div class="box">
                    <div class="box-header">
                      <h3 class="box-title">Buy This Car</h3>
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
                            </tr>
                        </thead>

                        <tbody>
                          @if ($basket !== null)                          
                             @foreach ($basket as $key => $value)
                                <tr>
                                  @foreach ($value as $key2 => $value2)
                                    @if (in_array($key2, $allowedFields))
                                      @if ($key2 !== 'Quantity')
                                        <td>{{ $value2 }}</td>                             
                                      @else
                                        <td class="carQuantity">                                   
                                            <input name="carQuantity" type="number" value="{{ $value2 }}" min="0">                                          
                                        </td>
                                      @endif
                                    @endif
                                  @endforeach                                                                      
                                </tr>
                             @endforeach
                          @else
                            <tr>
                              <td colspan="9" class="tdCenterText">
                                Your basket is empty ..
                              </td>
                            </tr>
                          @endif

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
                              <th>Quantity</th>                              
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
    
@endsection