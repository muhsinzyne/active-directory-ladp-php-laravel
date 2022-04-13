<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use LdapRecord\Connection;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $connection = new Connection([
            'hosts'    => ['actvet.ac.ae'],
            'port'     => 389,
            'username' => null,
            'password' => null,
        ]);

        $connection->connect();

        $user     = 'cn=user,dc=local,dc=com';
        $password = 'secret';

        if ($connection->auth()->attempt($user, $password)) {
            echo '<pre>';
            print_r();
            echo '</pre>';
            die();
            echo 'Username and password are correct!';
        }

        return view('home');
    }
}
