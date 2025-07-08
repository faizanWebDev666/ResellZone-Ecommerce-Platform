<?php

namespace App\Http\Controllers;
use App\Mail\loginNotification;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Mail\VerifyEmail;
use Carbon\Carbon;


class UsersController extends Controller
{
public function show($id)
{
    $user = User::findOrFail($id);
    return view('backend.view-customers', compact('user'));
}

    public function login()
    {

        return view('login');
    }
    public function signup()
    {

        return view('signup');
    }
    public function logout()
    {
        session()->forget('id');
        session()->forget('type');
        return redirect('/')->with('success', 'You have been successfully logged out.');


    }

  

    public function signupUser(Request $data)
    {
        $data->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => [
                'required', 'string', 'min:8',
                'regex:/[A-Z]/', 'regex:/[a-z]/', 'regex:/[0-9]/', 'regex:/[@$!%*?&#]/'
            ],
            'type' => 'required|in:customer,seller,admin',
        ]);
    
        $verificationToken = Str::random(64); 
        $newUser = new User();
        $newUser->name = $data->input('name');
        $newUser->email = $data->input('email');
        $newUser->password = Hash::make($data->input('password')); 
        $newUser->type = $data->input('type');
        $newUser->verification_token = $verificationToken;
        $newUser->status = 'active';
        $newUser->email_verified_at = null; 
        $newUser->save();
        
        Mail::to($newUser->email)->send(new VerifyEmail($newUser));
    
       return redirect()->route('login')->with('success', 'Registration successful! Please check your email to verify your account.');
    }
    

    

  
    
    public function loginUser(Request $data)
    {
        $data->validate([
            'email' => 'required|email',
            'password' => 'required|string|min:8',
        ]);
    
        $user = User::where('email', $data->input('email'))->first();
    
        if (!$user || !Hash::check($data->input('password'), $user->password)) {
           return redirect()->route('login')->with('error', 'Email/Password is incorrect');
        }
    
        if ($user->status === 'inactive') {
           return redirect()->route('login')->with('error', 'Access has been blocked. You cannot log in.');
        }
    
      
    
        Auth::loginUsingId($user->id);
            session()->put('name', $user->name);
session()->put('id', $user->id);
        session()->put('type', $user->type);
        session()->put('email', $user->email);
    
        $details = [
            'user_name' => $user->name,
            'login_date' => Carbon::now()->setTimezone('Asia/Karachi')->format('F j, Y, g:i A'),

        ];
    
        Mail::to($user->email)->send(new LoginNotification($details));
    
        session()->flash('success', 'Login successful!');
    
        return match ($user->type) {
            'seller' => DB::table('sellers_registrations')->where('id', $user->id)->value('status') === 'approved' 
                ? redirect()->route('dashboard') 
                : redirect('/'),
            'admin' => redirect('/admin'),
            default => redirect('/')
        };
    }
     
    
// public function loginUser(Request $data)
    // {
    //     $user = User::where('email', $data->input('email'))->first();
    
    //     if ($user && Hash::check($data->input('password'), $user->password)) {
    //         session()->put('id', $user->id);
    //         session()->put('type', $user->type);
    
        
    //         // $details = [
    //         //     'title' => "Welcome to ResellZone - Login Confirmation",
    //         //     'message' => "Dear {$user->name},\n\n" .
    //         //         "We noticed a successful login to your **ResellZone** account. If this was you, there's nothing to worry about!\n\n" .
    //         //         "However, if you did not authorize this login, we strongly recommend that you **reset your password immediately** to secure your account.\n\n" .
    //         //         "---\n" .
    //         //         "🔒 **Security Tip:** Never share your login credentials with anyone and always use a strong, unique password.\n\n" .
    //         //         "If you have any concerns or need assistance, feel free to [contact our support team](#).\n\n" .
    //         //         "**Best regards,**\n" .
    //         //         "**The ResellZone Team**\n\n" .
    //         //         "© " . date('Y') . " ResellZone. All rights reserved."
    //         // ];
            
    
    //         // // Send login notification email
    //         // Mail::to($user->email)->send(new loginNotification($details));
    
    //         session()->flash('success', 'Login successful!');
    
    //         // Redirect based on user type
    //         return ($user->type == 'customer') ? redirect('/') : redirect('/admin');
    //     } else {
    //        return redirect()->route('login')->with('error', 'Email/Password is incorrect');
    //     }
    // }
    


//     public function loginUser(Request $data)
// {
//     $user = User::where('email', $data->input('email'))->first();

//     if ($user && Hash::check($data->input('password'), $user->password)) {
//         // Log the user in using Laravel's Auth system
//         Auth::login($user);

//         // Flash success message
//         session()->flash('success', 'Login successful!');

//         // Redirect based on user type or to bookmarks if 'customer'
//         if ($user->type == 'customer') {
//             return redirect('/'); // Redirect to bookmarks page
//         } else if ($user->type == 'admin1') {
//             return redirect('/admin'); // Redirect to admin panel
//         }
//     } else {
//         // If login fails, redirect back with error message
//        return redirect()->route('login')->with('error', 'Email/Password is incorrect');
//     }
// }




public function destroy($id)
    {
        $product = User::findOrFail($id);
        $product->delete();
        return redirect()->back()->with('success', 'User deleted successfully.');
    }

    // ACTIVATE PRODUCT
    public function activate($id)
    {
        $product = User::findOrFail($id);
        $product->status = 'active';
        $product->save();
        return redirect()->back()->with('success', 'User activated successfully.');
    }

    // DEACTIVATE PRODUCT
    public function deactivate($id)
    {
        $product = User::findOrFail($id);
        $product->status = 'inactive';
        $product->save();
        return redirect()->back()->with('success', 'User deactivated successfully.');
    }
}
