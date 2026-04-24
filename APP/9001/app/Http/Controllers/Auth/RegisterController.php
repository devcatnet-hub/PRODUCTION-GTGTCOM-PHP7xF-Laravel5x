<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
use Illuminate\Auth\Events\Registered;
use RegBitacora;

class RegisterController extends Controller
{
    use RegistersUsers;

    protected $redirectTo = '/register';

    public function __construct()
    {
        $this->middleware('root');
    }

    public function register(Request $request)
    {
        $this->validator($request->all())->validate();

        event(new Registered($user = $this->create($request->all())));

        // $this->guard()->login($user);

        return $this->registered($request, $user)
                        ?: redirect($this->redirectPath());
    }

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'fname' => 'required|string|max:255',
            'lname' => 'required|string|max:255',
            'username' => 'required|string|max:255|unique:users',
            'group' => 'required|string|max:255',
            'attrib' => 'required|string|max:255',
            'status' => 'required|string|max:255',
            'author' => 'required|string|max:255',
            'email' => 'required|string|email|max:255',
            'password' => 'required|string|min:6|confirmed',
        ]);
    }

    protected function create(array $data)
    {

        RegBitacora::SetBitacora('New User', $data['author'], 'Administracion de Usuarios', 'User: '.$data['username'], 'Note: Null');

        return User::create([
            'fname' => $data['fname'],
            'lname' => $data['lname'],
            'username' => $data['username'],
            'group' => $data['group'],
            'attrib' => $data['attrib'],
            'status' => $data['status'],
            'author' => $data['author'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);
    }
}
