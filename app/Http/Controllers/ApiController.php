<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Mail;
use App\Mail\SendEmailNotification;
use App\Models\Profile;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class ApiController extends Controller
{
    public function store(Request $request){

        $rules = [
            'name' => 'nullable',
            'phone_number' => 'nullable',
            'email_address' => 'nullable|email',
            'linkedin_url' => 'nullable|url'
        ];

        $validate = Validator::make($request->all(), $rules);

        if ($validate->fails()) {
            return response()->json(['status' => 1, 'message' => 'Error(s) in Input', 'errors' => $validate->errors()]);
        } else {
            if ($request->name != null || $request->phone_number != null || $request->email_address != null || $request->linkedin_url != null) {

                if ($request->has('email_address')) {
                    Mail::to($request->email_address)->send(new SendEmailNotification());
                }

                $profile = new Profile();
                $profile->name = $request->name;
                $profile->phone_number = $request->phone_number;
                $profile->email_address = $request->email_address;
                $profile->linkedin_url = $request->linkedin_url;
                $profile->save();

                return response()->json(['message' => 'Profile created successfully'], 200);
            } else {
                return response()->json(['message' => 'Invalid Data'], 200);
            }
        }
    }
}
