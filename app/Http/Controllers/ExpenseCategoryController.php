<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ExpenseCategories;
use Carbon\Carbon;

class ExpenseCategoryController extends Controller
{
    public function index(){
		$categories = ExpenseCategories::orderBy('created_at', 'asc')->get();
        return json_encode($categories);
	}

    public function store(Request $request){
        $categories = ExpenseCategories::create($request->all());
    }

    public function getCategory($id){
        $getCategory = ExpenseCategories::findOrFail($id);
         return $getCategory;
    }

    public function updateCategory(Request $request, $id){
        $result = ExpenseCategories::where('id', $id)
        ->update(array('name'=> $request['display_name_update'],
                    'description'=>$request['description_update'],
                    'updated_at'=>Carbon::now()));
        return json_encode($result);
    }
    
    public function delete($id){
        $getCategory = ExpenseCategories::where('id', $id)->delete();
    }
}
