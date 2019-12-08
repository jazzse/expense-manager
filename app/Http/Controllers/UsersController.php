<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Roles;
use Carbon\Carbon;

class UsersController extends Controller
{
    public function index(){
		$users = User::all();
        return json_encode($users);
	}

	public function userRoles(){
		$userRoles = Roles::all();
        return json_encode($userRoles);

	}

	public function store(Request $request){
		$user =  User::create(array('name'=> $request['name'],
                    'email'=>$request['email'],
                    'role'=>$request['role'],
                    'password' => bcrypt('default'),
                    'created_at'=>Carbon::now(),
                    'updated_at'=>Carbon::now()));
        return json_encode($user);
	}

	public function getUser($id){
        $getUser = User::findOrFail($id);
         return $getUser;
    }

    public function updateUser(Request $request, $id){
        $result = User::where('id', $id)
        ->update(array('name'=> $request['name_update'],
                    'email'=>$request['email_update'],
                    'role'=>$request['role_update'],
                    'updated_at'=>Carbon::now()));
        return json_encode($result);
    }

    public function delete($id){
        User::where('id', $id)->delete();
    }

}
