<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Auth;
use App\User;


class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest', ['except' => 'logout']);
    }


    public function authenticate(Request $request)
    {
        $cpf1 = explode(".", $request->cpf);
        $request->cpf = implode("", $cpf1);
        $cpf1 = explode("-", $request->cpf);
        $request->cpf = implode("", $cpf1);

        
        $user = User::where('cpf',$request->cpf)->first();
        //dd($user);
         $this->validate($request, [            
            'password' => 'required|min:6',
            'cpf'=>'cpf|',            
        ]);
        
        if ($user && Auth::attempt(['email' => $user->email, 'password' => $request->password])) {
            if(Auth::user()->admin){
                return redirect('admin/');
            }else{
                return redirect('user/');
            }
        }else{
            
            return Redirect()->back()->withErrors(['CPF ou senha invalidos']);

            
        }
    }

    public function logout() {

        Auth::logout();
        return redirect('home');

    }
}
