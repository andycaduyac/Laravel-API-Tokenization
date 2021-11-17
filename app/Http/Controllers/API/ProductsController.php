<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Posts;
use App\Models\Products;
use App\Models\Appointment;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\User;
use Flash;
use Response;

class ProductsController extends Controller {
    public $successStatus = 200;

    public function getAllProducts(Request $request){
        $token = $request['token'];
        $userid = $request['userid'];

        $user = User::where('id', $userid) -> where('remember_token', $token)->first();

        if($user != null) {
            $products = Products::all();

            return response() -> json($products, $this->successStatus);
        } else {
            return response()->json(['response' => 'Bad Call'], 501);
        }
    }

    public function getProduct(Request $request) {
        $id = $request['productid'];
        $token = $request['token'];
        $userid = $request['userid'];

        $user = User::where('id', $userid) -> where('remember_token', $token)->first();

        if($user != null) {
            $products = Products::where('id', $id)->first();

            if($products != null) {
                return response()->json($products, $this->successStatus);
            } else {
                return response()->json(['response' => 'Product not found'], 404);
            }
        } else {
            return response()->json(['response' => 'Bad Call'], 501);
        }
    }
    public function searchProduct(Request $request) {
        $params = $request['keyword'];
        $token = $request['token'];
        $userid = $request['userid'];

        $user = User::where('id', $userid)->where('remember_token', $token)->first();

        if($products != null) {

            $products = Products::where('description', 'LIKE', '%'.$params.'%')
            ->orWhere('title', 'LIKE', '%'. $params .'%')
            ->get();

            if($products != null) {
                return response()->json($products, $this->successStatus);
            } else {
                return response()->json(['response' => 'Product not found'], 404);
            }
        }else {
            return response()->json(['response' => 'Bad Call'], 501);
        }
    }

}