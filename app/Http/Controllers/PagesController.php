<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Support;
use Illuminate\Http\Request;

class PagesController extends Controller
{
    
    public function welcome()
    {
        return view('welcome');
    }
    // public function viewsupport($id)
    // {
    //     // Logic to retrieve support details by $id can be added here
    //     return view('viewsupport', ['id' => $id]);
    // 
public function viewblog()
{
    $blogs = Blog::latest()->get(); // Fetch all blogs from DB
    return view('viewblog', compact('blogs')); // Pass it to view
}

public function viewsupport()
{
    $supports = Support::latest()->get();
    return view('viewsupport', compact('supports'));
}

public function viewsupportdetails($id)
{
    $support = Support::findOrFail($id);
    return view('viewsupportdetails', compact('support'));
}


}