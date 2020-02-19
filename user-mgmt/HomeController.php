<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Hash;
use App\User;
use App\UserRole;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    
    public function __construct() {
        // $this->middleware('auth');
        // $this->middleware('verified');
        $this->middleware(['auth', 'verified']);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index() {
        // return view('home');
        return view('admin-layouts.dashboard.dashboard');
    }

    public function listUserProfiles() {   
        
        $userProfiles = User::all();
        $userRoles = UserRole::all();

        foreach($userProfiles as $userProfile) {
            $userRole = UserRole::where('user_id', $userProfile->id)->first();
            $userProfile['role_description'] = $userRole->role_description;
        }

        // switch ($request->role_id) {
        //     case 1:
        //         $role_description = 'Administrator';
        //     break;

        //     case 2:
        //         $role_description = 'Full';
        //     break;

        //     case 3:
        //         $role_description = 'Standard';
        //     break;

        //     case 4:
        //         $role_description = 'Limited';
        //     break;
        // };

        return view('admin-layouts.user_management.listUserProfiles', compact('userProfiles'));
    }

    public function createUserProfile() {

        return view('admin-layouts.user_management.createUserProfile');
    }

    public function storeUserProfile(Request $request) {       

        $request->validate([
            'first_name' => 'required|max:64',
            'last_name' => 'required|max:64',
            'badge' => 'required|max:16|unique:users,badge',
            'email' => 'required|max:255|email|unique:users,email',
            'role_id' => [
                'required',
                Rule::in([1, 2, 3, 4]),
            ],
            'status_id' => [
                'required',
                Rule::in([1, 0]),
            ],            
            'password' => 'required|password|min:8|max:255|confirmed',
        ]);        

        $user = new User;
        $user->first_name = $request->first_name;
        $user->last_name = $request->last_name;
        $user->badge = $request->badge;
        $user->email = $request->email;        
        $user->status_id = $request->status_id;
        $user->password = Hash::make($request->password);
        $user->save();        

        /* Direct saveing form */
        // $userRole = new UserRole;
        // $userRole->user_id = $user->id;
        // $userRole->role_id = $request->role_id;
        // $userRole->save();
        // $user->userRole()->save($userRole); 
         
        /* Using relationship for saving */
        $user->userRole = new UserRole;
        $user->userRole->user_id = $user->id;
        $user->userRole->role_id = $request->role_id;
        $user->userRole->save();

        // Send verification link to user
        $user->sendEmailVerificationNotification();       

        return redirect()->route('displayUserProfile', ['id' => $user->id]);
    }

    public function displayUserProfile($id) {        

        $user = User::find($id);
        
        return view('admin-layouts.user_management.displayUserProfile', compact('user'));
    }

    public function editUserProfile($id) {

        $user = User::find($id);

        return view('admin-layouts.user_management.editUserProfile', compact('user'));
    }

    public function updateUserProfile(Request $request, $id) {
        
        $request->validate([
            'first_name' => 'required|max:64',
            'last_name' => 'required|max:64',
            'badge' => [
                'required',
                'max:16',
                Rule::unique('users')->ignore($id),                
            ],
            'role_id' => [
                'required',
                Rule::in([1, 2, 3, 4]),
            ],
            'status_id' => [
                'required',
                Rule::in([1, 0]),
            ],           
        ]);
        
        $user = User::find($id);
        $user->first_name = $request->first_name;
        $user->last_name = $request->last_name;
        $user->badge = $request->badge;
        $user->status_id = $request->status_id;        
        $user->save();           

        /* Direct saving */
        // $userRole = UserRole::find($id);        
        // $userRole->role_id = $request->role_id;        
        // $userRole->save();   
        
        /* Using relationship for saving */
        $user->userRole->role_id = $request->role_id;
        $user->userRole->save();

        return redirect()->route('displayUserProfile', ['id' => $user->id]);
    }

    public function confirmDeleteUserProfile($id) {

        $user = User::find($id);

        return view('admin-layouts.user_management.confirmDeleteUserProfile', compact('user'));
    }

    public function deleteUserProfile($id) {

        $user = User::find($id);
        $user->userRole()->delete();
        $user->delete();

        return redirect()->route('listUserProfiles');
    }
}
