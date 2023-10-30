<?php

namespace App\Http\Controllers;

use App\Models\Announcement;
use App\Models\User;
use Illuminate\Http\Request;

class PublicController extends Controller
{
    public function setLanguage($lang){
        
        session()->put('locale', $lang);
        return redirect()->back();
    }
    
    
    
    
    public function dashboard(User $user , Announcement $announcement){
        
        $user= auth()->user();
        
        $announcements = Announcement::where('user_id', $user->id)->where('is_accepted', 1)->get();
        
        
        
        return view('dashboardUser', compact('user','announcements'));
    }
}
