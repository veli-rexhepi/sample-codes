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
            <form role="form" method="POST" action="{{ asset('/editCarConfirm/'. $editCar->id) }}">             
                @csrf                

                <div class="box box-info custom-addACar">
                    <div class="box-header with-border">
                        <h3 class="box-title">Edit car</h3>
                    </div> 

                    <div class="box-body">
                        <div class="input-group custom-input-group-addCar">
                            <span class="input-group-addon custom-addCarLabel">Make</span>
                            <input id="Make" name="Make" type="text" class="form-control" maxlength="64" value="{{ $editCar->Make }}" >
                        </div>
                        <br>

                        <div class="input-group custom-input-group-addCar">
                            <span class="input-group-addon custom-addCarLabel">Model</span>
                            <input id="Model" name="Model" type="text" class="form-control" maxlength="64" value="{{ $editCar->Model }}" >
                        </div>
                        <br>

                        <div class="input-group custom-input-group-addCar">
                            <span class="input-group-addon custom-addCarLabel">Registration</span>
                            <input id="Registration" name="Registration" type="date" class="form-control" value="{{ $editCar->Registration }}" >
                        </div>
                        <br>

                        <div class="input-group custom-input-group-addCar">
                            <span class="input-group-addon custom-addCarLabel">Engine Size</span>
                            <input id="EngineSize" name="EngineSize" type="text" class="form-control" maxlength="64" value="{{ $editCar->{'Engine Size'} }}" >
                        </div>
                        <br>
                        
                        <div class="box-body">                  
                            <div class="form-group">                              
                                <label>
                                    <input id="Active" name="Active" type="checkbox" class="minimal" 
                                    @if ($editCar->Active === 'Active')
                                        {{ 'checked' }}
                                    @endif
                                    >
                                    Make this car available for selling
                                </label>
                            </div>            
                        </div>                              

                        <div class="custom-input-group-addCar-inline">
                            <div class="input-group custom-input-group-addCar2">
                                <span class="input-group-addon custom-addCarLabel">Price in $</span>
                                <input id="Price" name="Price" type="text" class="form-control" value="{{ $editCar->Price }}" >
                                <span class="input-group-addon">.00</span>
                            </div>
                            

                            <div class="input-group custom-input-group-addCar2">
                                <span class="input-group-addon custom-addCarLabel">Color</span>
                                <input id="Color" name="Color" type="color" class="form-control custom-carColor" value="{{ $editCar->Color }}" >                            
                            </div>
                                                

                            <div class="input-group custom-input-group-addCar2">
                                <span class="input-group-addon custom-addCarLabel">Dors #</span>
                                <select id="Dors" name="Dors" class="form-control select2">                                      
                                  <option value="{{ $editCar->Dors }}" selected >{{ $editCar->Dors }}</option>    
                                  @if ($editCar->Dors !== '5') { 
                                    <option value="5">5</option> 
                                  };
                                  @endif
                                  @if ($editCar->Dors !== '4') { 
                                    <option value="4">4</option> 
                                  };
                                  @endif
                                  @if ($editCar->Dors !== '3') { 
                                    <option value="3">3</option> 
                                  };
                                  @endif
                                  @if ($editCar->Dors !== '2') { 
                                    <option value="2">2</option> 
                                  };
                                  @endif                                                                               
                                </select>
                            </div>
                        </div>
                        <br>                        

                        <div class="box-footer custom-input-group-addCar3">
                            <button type="submit" class="btn btn-primary custom-input-submit"
                            >Submit</button>
                            <button type="button" class="btn btn-primary custom-input-reset"
                                onclick="window.location='{{ url("/listCars") }}'"
                            >Cancel</button>
                        </div>
                    </div>           
                </div>
            </form>            
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@endsection