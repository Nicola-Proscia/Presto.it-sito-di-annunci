<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Announcement;
use Illuminate\Http\Request;

class Index extends Component
{
    public function render(Request $request)
    {
        $announcements = Announcement::search($request->searched)->where('is_accepted', true)->orderBy('created_at', 'desc')->paginate(8);
        return view('livewire.index', compact('announcements'));
    }
}
