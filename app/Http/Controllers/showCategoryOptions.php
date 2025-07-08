<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class showCategoryOptions extends Controller
{
    public function categories()
    {
       
        return view('categories');
    }
    
}
