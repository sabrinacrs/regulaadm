<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;

use Redirect;

class HelpController extends Controller
{
     public function index()
     {
         return view('help.help');
     }

}
