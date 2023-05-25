<?php

namespace App\Http\Controllers;

use App\Models\CartHeader;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;


class AuthController extends Controller
{
    public function loginRouter(){
        return view('pages.login.login');
    }

    public function registerRouter(){
        return view('pages.register.register');
    }

    public function profileRouter(){
        return view('pages.profile.profile');
    }

    public function transactionRouter(){
        return view('pages.profile.transactionhistory');
    }

    public function register(Request $request){
        $request->validate([
            'email'=>'required|email',
            'username'=>'required|min:5|max:50',
            'password'=>'required|min:5|max:255',
            'confirmPassword'=>'required|min:5|same:password'
        ]);
        $temp = mt_rand(100, 999);
        $newUser = new User();
        $newUser->UserID = 'ID'.$temp;
        $newUser->UserName = $request->username;
        $newUser->UserEmail = $request->email;
        $newUser->UserPassword = bcrypt($request->password);
        $newUser->Role = 'User';
        $newUser->save();

        $newCart = new CartHeader();
        $newCart->CartID = 'CA'.$temp;
        $newCart->UserID = 'ID'.$temp;
        $newCart->save();

        // Session ada sbg global variabel, jadi biar semua data si user sm cart
        // bisa diakses di mana aja, huehue
        session([
            'user' => $newUser,
            'cart' => $newCart
        ]);

        Auth::login($newUser);
        return redirect('/home');
    }

    public function login(Request $request)
    {
        // Validate the request
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:8|max:50',
        ]);

        // Extract the remember_me value from the request
        $rememberMe = $request->has('remember_me');

        // Attempt to authenticate the user
        if (Auth::attempt(['UserEmail' => $request->email, 'password' => $request->password], $rememberMe)) {
            $user = Auth::user();
            $cart = CartHeader::where('UserID', $user->UserID)->first();
            session([
                'user' => $user,
                'cart' => $cart
            ]);

            // Set the remember_me cookie if checked
            if ($rememberMe) {
//                $rememberMeExpiration = now()->addHours(5);
                Cookie::queue('remember_me', encrypt($user->UserEmail), 5);
            }

            return redirect('/home');
        } else {
            return view('pages.login.login')->withErrors('Login failed');
        }
    }

    public function logout()
    {
        Auth::logout();
        Session::flush();
        return redirect('/home');
    }

    public function updateProfile(Request $request)
    {
        if(!Hash::check(session('user')->UserPassword, $request->previous_password)){
            return back()->withErrors('Current password is incorrect!');
        }

        $request->validate([
            'username' => 'required|min:5',
            'email' => 'required|max:100',
            'phone' => 'required|max:500',
            'address' => 'required',
            'previous_password' => '',
            'new_password' => 'required',
            'confirm_password' => 'required|same:new_password',
            'profile_image' => 'required|image|mimes:jpeg,jpg'
        ]);

        //$user->validate() ..
        Storage::delete('profile_image/' . session('user')->UserProfileImage);
        $file = $request->file('profile_image');

        $filename = time() . '-' . $file->getClientOriginalName();
        $path = public_path().'\\profilePicture\\';

        $file->move($path, $filename);

        $user = User::find(session('user')->getAttributes()['UserID']);

        $user->UserName = $request->username;
        $user->UserEmail = $request->email;
        $user->UserPhoneNumber = $request->phone;
        $user->UserAddress = $request->address;
        $user->UserProfileImage = $filename;
        $user->UserPassword = bcrypt($request->new_password); // Remember to hash the password

        $user->save();


        session([
            'user' => $user
        ]);

        // Redirect to a success page or perform any other action
        return redirect('/profile')->with('success', 'Profile updated successfully');
    }

    public function checkCookie(Request $request)
    {
        $rememberMeCookie = $request->cookie('remember_me');

        if ($rememberMeCookie) {
            // The cookie exists
            $decryptedEmail = decrypt($rememberMeCookie);
            // Use the decrypted email to perform further checks or actions
            // ...
            return "Remember Me cookie is set for email: " . $decryptedEmail;
        } else {
            // The cookie doesn't exist
            return "Remember Me cookie is not set.";
        }
    }
}
