<?php

namespace Shura\BackOffice\Controllers;

use Illuminate\Http\Request;

class BackOfficeController extends Controller
{
    public function spa(Request $request){
        return view($this->namespace.'::spa-vuetify');
    }
    public function dashboard(Request $request){
        return view($this->namespace.'::dashboard');
    }
    public function setting(Request $request){
        return view($this->namespace.'::setting');
    }
}
