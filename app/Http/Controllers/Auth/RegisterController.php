<?php

namespace App\Http\Controllers\Auth;
use Auth;
use Mail;
use App\User;
use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
use App\Mail\Welcome;
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
     * Where to redirect users after login / registration.
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
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(Request $request)
    {

        $cpf1 = explode(".",$request->cpf);
        $request->cpf = implode("",$cpf1);
        $cpf1= explode("-",$request->cpf);
        $request->cpf = implode("",$cpf1);
        
        $this->validate($request, [
            'name' => 'required|max:50',
            'email' => 'required|email|max:255|unique:users,email',
            'password' => 'required|min:6|confirmed',
            'cpf'=> 'unique:users,cpf|cpf',
        ]);


        

            $usuario = new User();

            $usuario->name = $request->name;

            $usuario->email = $request->email;

            $usuario->password =  bcrypt($request->password);

            $usuario->cpf = $request->cpf;

            $usuario->fone = $request->fone;

            $usuario->sexo = $request->sexo;

            $usuario->tipo = $request->tipo;

            $usuario->instituicao = $request->instituicao;

            $usuario->curso = $request->curso;

            $usuario->save();

            $data= array(
                'nome'=>'josé',
            );

            // Mail::send('mails.welcome', $data, function ($message) {
            //    $message->from('mailluisthiago@gmail.com', 'Laravel');

            //    $message->to('mailluisthiago@gmail.com');
            // });

            


            if (Auth::attempt(['email' => $usuario->email, 'password' => $request->password])) {
                if(Auth::user()->admin){
                    
                    return redirect()->route('admin/eventos');
                }else{
                    
                    return redirect('user/eventos');
                }
            }else{
                
                return redirect('login');               
            }
            

        

        

        
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(array $data)
    {        
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
            'cpf'=>$data['cpf'],
            'fone'=>$data['fone'],
            'sexo'=>$data['sexo'],
            'tipo'=>$data['tipo'],
            'instituicao'=>$data['instituicao'],
            'curso'=>$data['curso'],
        ]);
    }
}
