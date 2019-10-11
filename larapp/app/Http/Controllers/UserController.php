<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class UserController extends Controller
{
    public function index(Request $request)
    {
        // データの追加 emailの値はランダムな英小文字8文字を使用
        $email = substr(str_shuffle('abcdefghijklmnopqrstuvwxyz'), 0, 8) . '@dummy.com';
        User::insert(['name' => 'Osaka hanako', 'email' => $email, 'password' => 'password']);
        $users = User::all();
        //$users = User::all()->toArray();
//var_dump($users); //debug
//dd($users); //debug

        //$request = new Request;
        $request->merge([
            'users' => $users,
        ]);

        return view('user', $request);
    }
}