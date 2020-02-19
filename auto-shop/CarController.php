<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Car;
use App\Basket;

class CarController extends Controller
{
	/* Guest functions */

	// List all cars from db
	public function buyACarGuest() {

		$car = new Car;

		$carList = $car->all();		

		return view('guest.buyACarGuest', compact('carList'));
	}
	
	// Call teh Buy This Car form
	public function buyThisCarGuest(Request $request, $car_id) {

		$car = new Car;

		$car = $car->where('id', $car_id)->first();

		// $request->session()->push('car', ['id' => $car->id]);
		// $request->session()->push('car.Model', $car->Model);				

		$request->session()->push('basket', [
			'id' => $car->id, 
			'Make' => $car->Make,
			'Model' => $car->Model,
			'Registration' => $car->Registration,
			'EngineSize' => $car->{'Engine Size'},			
			'Price' => $car->Price,
			'Color' => $car->Color,
			'Dors' => $car->Dors,
			'Quantity' => $request->input('carQuantity')
		]);	

		$basket= $request->session()->get('basket');
		
		$allowedFields = array(
							"Make", 
							"Model", 
							"Registration", 
							"EngineSize", 
							"Price", 
							"Color", 
							"Dors",
							'Quantity'
						);

		return view('guest.buyThisCarGuest', compact('basket', 'allowedFields'));
	}

	public function goToPaymentGuest(Request $request) {

		$user = Auth::user();

		if ($user === null) {
			return redirect('/login');
		} else {
			return view('authUser.buyCompletedAuthUser');
		}		
	}

	// Remove All Cars
	public function removeAllCarsGuest(Request $request) {		

		$request->session()->flush();
		
		$basket = null;
		$allowedFields = null;

		return view('guest.buyThisCarGuest', compact('basket', 'allowedFields'));
	}

	// Display my basket
	public function displayMyBacketGuest(Request $request) {

		$basket = new Basket;

		$basket= $request->session()->get('basket');

		$allowedFields = array(
							"Make", 
							"Model", 
							"Registration", 
							"EngineSize", 
							"Price", 
							"Color", 
							"Dors",
							"Quantity"
						);

		return view('guest.buyThisCarGuest', compact('basket', 'allowedFields'));
	}

	/* Auth User functions */

	// List all cars from db
	public function buyACarAuthUser() {

		$car = new Car;

		$carList = $car->all();

		return view('authUser.buyACarAuthUser', compact('carList'));
	}

	// Call teh Buy This Car form
	public function buyThisCarAuthUser(Request $request, $car_id) {

		$car = new Car;

		$car = $car->where('id', $car_id)->first();

		// $request->session()->push('car', ['id' => $car->id]);
		// $request->session()->push('car.Model', $car->Model);				

		$request->session()->push('basket', [
			'id' => $car->id, 
			'Make' => $car->Make,
			'Model' => $car->Model,
			'Registration' => $car->Registration,
			'EngineSize' => $car->{'Engine Size'},			
			'Price' => $car->Price,
			'Color' => $car->Color,
			'Dors' => $car->Dors,
			'Quantity' => $request->input('carQuantity')
		]);	

		$basket= $request->session()->get('basket');
		
		$allowedFields = array(
							"Make", 
							"Model", 
							"Registration", 
							"EngineSize", 
							"Price", 
							"Color", 
							"Dors",
							'Quantity'
						);

		//dd($basket);

		return view('authUser.buyThisCarAuthUser', compact('basket', 'allowedFields'));
	}

	// Complete the bayment - Change status to inactive
	public function buyCompletedAuthUser($car_id) {
		$car = new Car;

		$car = $car->where('id', $car_id)->first();

		$car->Active = "Inactive";

		$car->save();

		return view('buyCompletedAuthUser', compact('car'));
	}

	// Display my basket
	public function displayMyBacketAuthUser(Request $request) {

		if (Auth::user()->{'Account Type'} === 'User') {
			$basket = new Basket;

			$basket= $request->session()->get('basket');

			$allowedFields = array(
								"Make", 
								"Model", 
								"Registration", 
								"EngineSize", 
								"Price", 
								"Color", 
								"Dors",
								"Quantity"
							);

			return view('authUser.buyThisCarAuthUser', compact('basket', 'allowedFields'));
		} else {
			$user = Auth::user();

			if ($user->{'Account Type'} === 'Admin') {
				$car = new Car;

				$carList = $car->all();

	    		return view('listCars', compact('carList'));
	    	} else {
	    		return view('restrictedContent');
	    	};
		}
		
	}

	// Remove All Cars
	public function removeAllCarsAuthUser(Request $request) {		

		$request->session()->forget('basket');
		
		$basket = null;
		$allowedFields = null;

		return view('authUser.buyThisCarAuthUser', compact('basket', 'allowedFields'));
	}

	public function goToPaymentAuthUser(Request $request) {

		$user = Auth::user();

		if ($user === null) {
			return redirect('/login');
		} else {

			$request->session()->forget('basket');

			return view('authUser.buyCompletedAuthUser');
		}		
	}

	/* Admin functions */

	// List all cars from db
	public function listCars() {			

		$user = Auth::user();

		if ($user->{'Account Type'} === 'Admin') {
			$car = new Car;

			$carList = $car->all();

    		return view('listCars', compact('carList'));
    	} else {
    		return view('restrictedContent');
    	}; 
	}

	// Call the Add A Car from
    public function addACar() {

    	$user = Auth::user();

    	if ($user->{'Account Type'} === 'Admin') {
    		return view('addACar');
    	} else {
    		return view('restrictedContent');
    	};    	
    }

    // Store on db the selected item
    public function store(Request $request) {   	

		if ($request->Active === null) {
	    		$request->Active = "Inactive";
	    	};

		$car = new Car;		

    	$car->Make = $request->Make;
    	$car->Model = $request->Model;
    	$car->Registration = $request->Registration;
    	$car->{'Engine Size'} = $request->EngineSize;
    	$car->Active = $request->Active;
    	$car->Price = $request->Price;
    	$car->Color = $request->Color;
    	$car->Dors = $request->Dors;

    	$car->save();

    	return view('addACarConfirm', compact('car'));
    }

    // Delete from db the selected item
    public function deleteCar($car_id) {

    	$user = Auth::user();

    	if ($user->{'Account Type'} === 'Admin') {
    		$car = new Car;

			$car->destroy($car_id);		

			return redirect()->route('listCars');
    	} else {
    		return view('restrictedContent');
    	};    	    	   	
    }

    // Edit the selected item
    public function editCar(Request $request, $car_id) { 

    	$user = Auth::user();

    	if ($user->{'Account Type'} === 'Admin') {
    		$car = new Car;

	    	$editCar = $car->where('id', $car_id)->first();    		

			return view('editCar', compact('editCar'));  
    	} else {
    		return view('restrictedContent');
    	};       	  	   	
    }

     // Confirm for edit of the selected item
    public function editCarConfirm(Request $request, $car_id) {    	

    	if ($request->Active === null) {
    		$request->Active = "Inactive";
    	} else {
    		$request->Active = "Active";
    	}

    	$car = Car::where('id', $car_id)->first(); 
    	//$car = Car::find($car_id);

    	$car->Make = $request->Make;
    	$car->Model = $request->Model;
    	$car->Registration = $request->Registration;
    	$car->{'Engine Size'} = $request->EngineSize;
    	$car->Active = $request->Active;
    	$car->Price = $request->Price;
    	$car->Color = $request->Color;
    	$car->Dors = $request->Dors;

		$car->save();    			

		return view('editCarConfirm', compact('car'));    	   	
    }
}
