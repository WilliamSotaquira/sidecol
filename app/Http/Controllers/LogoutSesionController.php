<?php

namespace Sidecol\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Session;

class LogoutSesionController extends Controller
{
    public function EndSession()
    {
        
        Session::flush();
        Auth::logout();

        return redirect('/');
    }
}
