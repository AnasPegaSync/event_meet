<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use Illuminate\Http\Request;
use DataTables;

class ProfileController extends Controller
{
    public function index(){
        return view('dashboard');
    }

    public function profile_list(){
        $data = Profile::select('id', 'name', 'phone_number', 'email_address', 'linkedin_url', 'picture_path');
        return DataTables::of($data)
            ->editColumn('name', function($data){


                if($data->name == null)
                {
                    return '-';
                }
                else{
                    if($data->linkedin_url == null)
                    {
                        return $data->name;
                    }
                    else
                    {
                        return $data->name. ' <a class="linkedin-logo" href="'.$data->linkedin_url.'" target="_blank"><i class="fab fa-linkedin-in"></i></a>';
                    }
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
            ->editColumn('picture_path', function($data){

                if($data->picture_path == null)
                {
                    return '-';
                }
                else
                {
                    // return '<img src="'.asset('storage/'.$data->picture_path).'"/>';
                    return '<a class="btn btn-custom-blue" href="'.asset('storage/'.$data->picture_path).'" data-lity data-lity-target="'.asset('storage/'.$data->picture_path).'">View</a>';
                }
            })
            ->rawColumns(['name','picture_path'])
            ->addIndexColumn()
            ->make(true);
    }
}
