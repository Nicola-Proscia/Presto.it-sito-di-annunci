<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Announcement;


class AnnouncementCard extends Component
{
    public $title, $body, $price, $category_id;
    public function render()
    {
        $announcements = Announcement::where('is_accepted', true)->take(4)->orderBy('created_at', 'desc')->get();
        return view('livewire.announcement-card', compact('announcements'));
    }
}
