<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ClassModel;
class CrouseDetail extends Controller
{
    public function ShowCrouseDetails($id)
    {
        $data['getRecord'] = ClassModel::getSingle($id);
        if(!empty($data['getRecord']))
        {
            $data['getClass'] = ClassModel::getClass();
            $data['header_title'] = "Class Detail";
            return view('school.details',$data);    
        }
        else
        {
            abort(404);
        }
        
    }
}
