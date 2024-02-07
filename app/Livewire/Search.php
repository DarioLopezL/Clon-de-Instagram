<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\User;

class Search extends Component
{
    public $search = '';

    public function render()
    {
        $users = User::where('name', 'like', '%' . $this->search . '%')->orWhere('username', 'like', '%' . $this->search . '%')
            ->get();
        return view('livewire.search',['users' => $users]);
    }
}
