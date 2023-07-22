<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ArmadaController extends Controller
{
    public function armada(){
        return view('admin.armada');
    }
}
