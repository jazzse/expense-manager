<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Roles;
use Carbon\Carbon;

class RolesController extends Controller
{

	public function index(){
		$roles = Roles::orderBy('created_at', 'asc')->get();
        return json_encode($roles);
	}

    public function store(Request $request){
        $roles = Roles::create($request->all());
    }

    public function getRole($id){
        $getRole = Roles::findOrFail($id);
         return $getRole;
    }

    public function updateRole(Request $request, $id){
        $result = Roles::where('id', $id)
        ->update(array('name'=> $request['display_name_update'],
                    'description'=>$request['description_update'],
                    'updated_at'=>Carbon::now()));
        return json_encode($result);
    }
    
    public function delete($id){
        $getRole = Roles::where('id', $id)->delete();
    }
}
