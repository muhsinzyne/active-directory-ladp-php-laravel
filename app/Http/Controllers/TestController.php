<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use LdapRecord\Connection;

class TestController extends Controller
{
    //

    public function index()
    {
        $connection = new Connection([
            'hosts'    => ['actvet.ac.ae'],
            'port'     => 389,
            'username' => null,
            'password' => null,
        ]);

        $connection->connect();

        $user     = 'cn=muhammed.muhsin@aths.ac.ae';
        $password = '1Message!@#';

        if ($connection->auth()->attempt($user, $password)) {
            echo '<pre>';
            print_r('sdsd');
            echo '</pre>';
            die();
        } else {
        }
        echo '<pre>';
        print_r('hello');
        echo '</pre>';
        die();
    }
}
