<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function dashboard()
    {
        #title:
            $data['header_title'] = 'Dashboard';
            if(Auth::user()-> user_type == 1)
            {
                return view('admin.dashboard',data: $data);
            }
            else if(Auth::user()-> user_type== 2)
            {
                return view('teacher.dashboard',data: $data);
            }
            else if(Auth::user()-> user_type== 3)
            {
                return view('student.dashboard',data: $data);
            }
            else if(Auth::user()-> user_type== 4)
            {
                return view('teacher.dashboard',data: $data);
            }
    }
}
