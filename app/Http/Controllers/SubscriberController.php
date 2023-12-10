<?php

namespace App\Http\Controllers;

use App\Events\UserRegistered;
use App\Models\Subscriber;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class SubscriberController extends Controller
{
    public function store(Request $request){
        try {
            //validate the request data
            $validator = Validator::make($request->all(), [
                'email'  =>  'required|email',
            ]);

            if ($validator->fails()) {
                return new JsonResponse(['success' => false, 'message' => $validator->errors()], 422);
            }

            // subscribe to the newsletter
            $Subscriber = Subscriber::create([
                'email'=> $request->email
            ]);

            // call the event
            $event_data = event(new UserRegistered($request->email));
            $event_data[] = array_unshift($event_data, $Subscriber);
            if(!empty(sizeof($event_data))) {
                unset($event_data[count($event_data)-1]);
            }

            return new JsonResponse(['success' => true, 'message' => "Thank you for creating the subscribers!", 'Subscribers'=> $event_data], 200);
        }catch(\Throwable $th){
            return new JsonResponse(['error' => true, 'message' => "Error!"], 404);
        }
    }
}
