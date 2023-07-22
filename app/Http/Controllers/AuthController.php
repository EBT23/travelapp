<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class AuthController extends Controller
{
    public function login(){
        $data['title'] = 'Logout';

        $token = session('access_token');

        $response = Http::withToken("$token")->get('http://travel.dlhcode.com/api/logout');
        $body_logout = $response->getBody();
        $data['logout'] = json_decode($body_logout, true);
        return redirect()->route('login');
    }
}
