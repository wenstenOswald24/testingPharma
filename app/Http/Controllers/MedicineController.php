<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Medicines;

class MedicineController extends Controller
{
    public function index(){

        $medicines = Medicines::latest()->get();

        return $medicines;
    }

    public function store(Request $request, $user_type){

        error_log("store jdfnd");
        error_log(`request holds the value : .$request.`);
        if($user_type == "OWNER"){

        $medicines = new Medicines();
        $medicines->name = $request->name;        
        $medicines->quantity = $request->quantity;
        $medicines->weight = $request->weight;
        $medicines->type = $request->type;
        $medicines->price = $request->price;

        $medicines->save();

        return "Successfully saved ";
    
    }else {
        return `User type = .$uses_type. is not allowed to create medicine`; 
    }

}

public function delete($user_type,$id){
    if($user_type == "CASHIER"){
         Medicines::destroy($id);
        return "Succesfully deleted";
    } else {
        return "Not Succesfully deleted";
    }
}

public function edit(Request $request,$user_type, $id){
    error_log($user_type);
    if($user_type == "CASHIER"){
        $medicines = Medicines::findOrFail($id);
        strval($request);
        error_log($request);
        $medicines->update($request->all());
        return $medicines;
    } else {
        return "Not updated yet";
    }
}
}
