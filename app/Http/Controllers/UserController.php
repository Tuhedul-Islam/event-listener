<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    public function store(Request $request){
        try {
            //validate the request data
            $validator = Validator::make($request->all(), [
                'name'  =>  'required',
            ]);

            if ($validator->fails()) {
                return new JsonResponse(['success' => false, 'message' => $validator->errors()], 422);
            }

            // subscribe to the newsletter
            $user = User::create([
                'name'=> $request->name,
                'email'=> rand(10,99).'abc'.'@gmail.com',
                'password'=> bcrypt('password'),
            ]);

            return new JsonResponse(['success' => true, 'message' => "Thank you for creating the User!", 'user'=> $user->toArray()], 200);
        }catch(\Throwable $th){
            return new JsonResponse(['error' => true, 'message' => "Error!"], 404);
        }
    }
}
