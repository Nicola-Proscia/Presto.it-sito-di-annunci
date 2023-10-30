<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Category;
use App\Mail\BecomeRevisor;
use App\Models\Announcement;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Artisan;

class RevisorController extends Controller
{
    public function index()
    {
        $announcement_to_check = Announcement::where('is_accepted', null)->first();
        $announcements = Announcement::where('is_accepted','!=',null)->orderBy('updated_at', 'desc')->get();
        

        return view('revisor.index', compact('announcement_to_check', 'announcements'));
    }
    public function acceptAnnouncement(Announcement $announcement)
    {

        $announcement->update(['is_accepted' => true]);

        return redirect()->back()->with("message", __('ui.announcementAccepted'));
    }
    public function rejectAnnouncement(Announcement $announcement)
    {

        $announcement->update(['is_accepted' => false]);

        return redirect()->back()->with("message", __('ui.announcementRejected'));
    }
    public function undoAnnouncement(Announcement $announcement)
    {

        $announcement->setAccepted(null);
        

        return redirect()->back()->with("message", __('ui.announcementRestored'));
    }

    public function becomeRevisor(User $user)
    {
        
        return view('revisor.becomeRevisor', compact('user'));
    }

    public $surname;
    public $iban;
    public $descrizione;
    public $message = [
        'surname.required' => 'Il campo cognome è obbligatorio',
        'iban.required' => 'Il campo IBAN è obbligatorio',
        'descrizione.required' => 'Il campo descrizione è obbligatorio',
    ];
    
    protected $rules = [
        'surname' => 'required',
        'iban' => 'required|min:4|max:27',
        'descrizione' => 'required|min:10',
    ];

    public function update(Request $request, User $user)
    {
        $this->validate($request, $this->rules, $this->message);
        $user->update([

            'surname' => $request->input('surname'),
            'iban' => $request->input('iban'),
            'descrizione' => $request->input('descrizione')

        ]);

        Mail::to('assassinscreedcompany@gmail.com')->send(new BecomeRevisor(Auth::user()));
        return redirect()->back()->with('message', __('ui.emailSent'));
    }


    public function makeRevisor(User $user)
    {
        Artisan::call('presto:MakeUserRevisor', ["email" => $user->email]);

        return redirect('/')->with('message', __('ui.mailMakeRevisor'));
    }
}
