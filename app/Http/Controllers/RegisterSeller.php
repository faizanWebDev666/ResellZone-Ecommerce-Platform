<?php

namespace App\Http\Controllers;

use App\Models\SellersRegistration;
use App\Models\User;
use Illuminate\Http\Request;

class RegisterSeller extends Controller
{
    public function registerSeller()
    {
        $User = User::where('type', 'seller')->get();
        $seller = SellersRegistration::all();
        return view('backend.sellersRegistration', compact('seller','User'));
    }
}
