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
            ->addIndexColumn()
            ->make(true);
    }
}
