<?php

namespace App\Http\Controllers\Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

use Illuminate\Http\UploadedFile;
class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $request
     * @return \Illuminate\Contracts\Validation\Validator
     */

    protected function validator($request)
    {
        return Validator::make($request, [
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'max:255', 'unique:users'],
            'password' => ['required', 'string'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $request
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
        // if($request['imgInp']){
        //     var_dump($request['imgInp']);
        //     die();
        //     $file= $request['imgInp']->file('imgInp');
        //     $filename= date('YmdHi').$file->getClientOriginalName();
        //     $file-> move(public_path('public/Image'), $filename);
        //     $request['imgInp']= $filename;
        // }else{
        //     $request['imgInp']="default";
        // }

        if (request()->hasFile('imgInp')) {
            $file = request()->file('imgInp');
    //            dd($file);
            $extension = $file->getClientOriginalExtension();
            $filename = date('YmdHi').$file->getClientOriginalName();
            $file->move('img/profile/', $filename);
            $saveIm=$filename;
        }else{
            $saveIm="default";
        }

        return User::create([
            'first_name' => $data['first_name'],
            'last_name' => $data['last_name'],
            'email' => $data['email'],
            'image' => $saveIm,
            'password' => Hash::make($data['password']),
        ]);
    }
}
