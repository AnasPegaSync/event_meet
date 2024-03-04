<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use Illuminate\Http\Request;
use Carbon\Carbon;
use DataTables;

use Illuminate\Support\Facades\Mail;
use App\Mail\NewRecordEmail;

class ProfileController extends Controller
{
    public function login(){
        return view('login');
    }

    public function loginSubmit(Request $request){

        if(session()->has('pegasyncinc'))
        {
            return view('dashboard');
        }
        else{
            if($request->email == "pegasyncinc" && $request->password =="pegasyncinc@123")
            {
                $request->session()->put('pegasyncinc', '');

                return redirect()->route('dashboard');

            }
            else{
                return redirect()->back()->with('error', 'Invalid username or password');
            }
        }
    }

    public function index(){
        if(session()->has('pegasyncinc'))
        {
            // Mail::to('muhammad.shariq@pegasync.com')->send(new NewRecordEmail('Shariq'));
            return view('dashboard');
        }
        else{
            return redirect()->route('login');
        }
    }

    public function profile_list(){
        $data = Profile::join('users as u', 'u.id', 'profiles.user_id')
        ->select('profiles.id', 'profiles.name', 'profiles.phone_number', 'profiles.email_address', 'profiles.linkedin_url', 'profiles.picture_path', 'profiles.created_at', 'u.name as added_by');
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
                    $buttons .= '<a class="btn btn-sm btn-custom-blue" target="_blank" href="'.asset('storage/'.$data->picture_path).'" data-lity data-lity-target="'.asset('storage/'.$data->picture_path).'" style="border-radius: 50%"><i class="fa fa-solid fa-image"></i></a>';
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
