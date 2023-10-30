<?php

namespace App\Livewire;

use App\Models\Announcement;
use Livewire\Component;

class ShowAnnouncement extends Component
{
    public $announcement;

    public function render()
    {
        return view('livewire.show-announcement', ['announcement_to_check' => $this->announcement]);
    }
}
