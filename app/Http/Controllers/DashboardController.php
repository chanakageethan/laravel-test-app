<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Support\Facades\Auth;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

class DashboardController extends Controller 
{
  
    public function index()
    {

        // $posts = Post::where('user_id',Auth::id())->get();
        $posts = Auth::user()->posts()->latest()->paginate(2);
 
     
        return view('users.dashboard',['posts'=>$posts]);
    }
}
