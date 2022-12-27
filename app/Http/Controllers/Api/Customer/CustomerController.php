<?php

namespace App\Http\Controllers\Api\Customer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\Customer;

class CustomerController extends Controller
{
    public function register(Request $request){
        //validate
        $data = $request->validate([
            "name"=>"required",
            "email"=>"required|email|unique:customers",
            "password"=>"required|min:6",
            // "phone"=>"required"
        ]);

        //create
        $cust = Customer::create([
            "name"=>$data["name"],
            "email"=>$data["email"],
            "password"=>Hash::make($data["password"]),
            // "phone"=>$data["phone"]

        ]);
        
        //return response
        return response()->json([
            "status"=>200,
            "message"=>"Register Successfully",
            "token"=>$cust->createToken('secret')->plainTextToken,
            "data"=>$cust
        ],200);
    }
}
