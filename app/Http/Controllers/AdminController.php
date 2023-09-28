<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Recipe;
use App\Models\Comment;



class AdminController extends Controller
{

    public function showDashboard()
    {
        return view('admin_dashboard');
    }

    
    public function showLoginForm()
    {
        return view('admin_login');
    }

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            if (Auth::user()->role === 'admin') {
                return redirect()->route('admin.dashboard');
            } else {
                Auth::logout();  // 管理者でない場合、ログアウトさせる
                return redirect()->back()->withErrors(['email' => '管理者権限がありません。']);
            }
        }
        return redirect()->back()->withErrors(['email' => '認証情報が正しくありません。']);
    }        

    

    public function dashboard()
    {
        $users = User::all();
        $recipes = Recipe::all();
        $comments = Comment::all();

        return view('admin_dashboard', [
            'users' => $users,
            'recipes' => $recipes,
            'comments' => $comments
        ]);
    }


}

