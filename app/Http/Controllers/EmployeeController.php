<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Information;

class EmployeeController extends Controller
{
    function list($id=null)
    {
        
         $information=new Information;
         return $id?$information->where('ID',$id)->get():$information->all();

    }
    function addlist(Request $req)
    {
        $information = new Information;
        $information->UserName=$req->UserName;
        $information->Password=$req->Password;
        $result=$information->save();
        if($result)
        {
        return ["result"=>"Data has been saved"];
        }
        else
        {
            {
                return ["result"=>"Data has not been saved"];
                }
        }

    }
}
