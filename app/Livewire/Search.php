<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\User;

class Search extends Component
{
    public $searchTerm = '';

    public function render()
    {
        $users = User::when($this->searchTerm, function ($query){
                $query->where('username', 'LIKE', "%" . $this->searchTerm . "%");
        })->get();
        //dd('$searchTerm');
        return view('livewire.search',
        ['users' => $users]);
    }
}
