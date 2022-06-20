<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\admin;
class AdminController extends Controller
{
    //
    public function index(){
        $tampiladmin = admin::all();
        return $tampiladmin;
    }
}
