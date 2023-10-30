<?php

namespace App\Http\Controllers;

use App\Models\Category;

use App\Models\Announcement;
use Illuminate\Http\Request;

class AnnouncementController extends Controller
{
    public function create(){
        return view('announcement.create');
    }

    public function homepage(){

        return view('welcome');
    }

    public function show($announcement){ 
        
        $announcement = Announcement::find($announcement);
        if(!$announcement){
            abort(404);
        }
        return view('announcement.show', compact('announcement'));   
    }
    public function categoryShow(Category $category){
        $announcements = Announcement::where('category_id', $category->id);
        return view('categoryShow', compact('category'));
    }

    public function index(){
        $announcements = Announcement::orderBy('created_at', 'desc')->get();
        return view('announcement.announcementIndex', compact('announcements'));
    }
    
    public function searchAnnouncement(Request $request){

        $searched = $request->input('searched');
        return view('announcement.index', ['searched' => $searched]);
    }
}
