<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use Illuminate\Http\Request;
use Carbon\Carbon;
use DataTables;

class ProfileController extends Controller
{
    public function login(){
        return view('login');
    }

    public function loginSubmit(Request $request){

        if($request->email == "pegasyncinc" && $request->password =="pegasyncinc@123")
        {
            $request->session()->put('key', 'value');

            return redirect()->route('dashboard');

        }
        else{
            return redirect()->back()->with('error', 'Invalid username or password');
        }
    }

    public function index(){
        if(session()->has('key'))
        {
            return view('dashboard');
        }
        else{
            return redirect()->route('login');
        }
    }

    public function profile_list(){
        $data = Profile::select('id', 'name', 'phone_number', 'email_address', 'linkedin_url', 'picture_path', 'created_at');
        return DataTables::of($data)
            ->editColumn('name', function($data){

                if($data->name == null)
                {
                    return '-';
                }
                else{
                    return $data->name;
                }
            })
            ->editColumn('phone_number', function($data){

                if($data->phone_number == null)
                {
                    return '-';
                }
                else{
                    return $data->phone_number;
                }
            })
            ->editColumn('email_address', function($data){

                if($data->email_address == null)
                {
                    return '-';
                }
                else{
                    return $data->email_address;
                }
            })
            ->editColumn('created_at', function($data){

                return Carbon::parse($data->created_at)->format('m/d/Y H:i:s A');
            })
            ->editColumn('action', function($data){

                $buttons = '';

                if($data->picture_path != null)
                {
                    $buttons .= '<a class="btn btn-sm btn-custom-blue" href="'.asset('storage/'.$data->picture_path).'" data-lity data-lity-target="'.asset('storage/'.$data->picture_path).'" style="border-radius: 50%"><i class="fa fa-solid fa-image"></i></a>';
                }

                if($data->phone_number != null)
                {
                    $buttons .= '<a class="btn btn-sm btn-custom-blue" href="https://wa.me/'.$data->phone_number.'" target="_blank" style="border-radius: 50%"><i class="fab fa-whatsapp"></i></a>';
                }

                if($data->linkedin_url != null)
                {
                    $buttons .= '<a class="btn btn-sm btn-custom-blue" href="'.$data->linkedin_url.'" target="_blank" style="border-radius: 50%"><i class="fab fa-linkedin-in"></i></a>';
                }

                if($data->email_address != null)
                {
                    $buttons .= '<a class="btn btn-sm btn-custom-blue" href="mailto:'.$data->email_address.'" target="_blank" style="border-radius: 50%"><i class="fa fa-envelope" aria-hidden="true"></i></a>';
                }

                return $buttons;
            })
            ->rawColumns(['name','action'])
            ->addIndexColumn()
            ->make(true);
    }
}
