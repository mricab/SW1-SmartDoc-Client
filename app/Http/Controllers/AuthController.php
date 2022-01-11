<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use GuzzleHttp\Client;

class AuthController extends Controller
{
    static protected $authServer = 'https://smartdoc-server.herokuapp.com/api';

    /*public function __construct() {
        self::$authServer = 'http://'
            .'localhost'.':'.'8000';
    }*/
    /*public function __construct() {
        self::$authServer = 'https://'
            .'smartdoc'.'-'.'server'.'.'.'herokuapp'.'.'.'com';
    }*/
    //https://smartdoc-server.herokuapp.com/


    public function register (Request $request)
    {
        $response = Http::post(
            self::$authServer.'/auth/register',
            [
                'name' => $request->input('name'),
                'email' => $request->input('email'),
                'password' => $request->input('password'),
                'password_confirmation' => $request->input('password_confirmation'),
            ]);

        if($response->ok()) {
            return redirect('/login');
        } else {
            return redirect()->back()->withErrors($response['errors'])->withInput();
        }
    }

    public function login (Request $request)
    {
        $response = Http::post(
            self::$authServer.'/auth/login',
            [
                'email' => $request->input('email'),
                'password' => $request->input('password'),
                'password_confirmation' => $request->input('password'),
            ]);

        if($response->ok()) {
            $request->session()->put('token', $response['token']);
            print('Exito!');
            return redirect()->route('/home');
        } else {
            if (isset($response['errors'])) {
                print('Error1');
                return redirect()->back()->withErrors($response['errors'])->withInput();
            } else {
                print('Error2');
                return redirect()->back()->with('message', $response['message'])->withInput();
            }
        }
    }
}
