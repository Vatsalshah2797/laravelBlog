<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Traits\HasRoles;

class HomeController extends Controller
{
    use HasRoles;
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
        $users = $posts =  0;
        $user  = Auth::user();

        if ($user->hasRole('Admin')) {
            $posts = Post::select('id')->count();
            $users = User::select('id')->count();
        } else {
            $posts = Post::where('user_id', $user->id)->count();
        }
        return view('home', compact('posts', 'users'));
    }
}
