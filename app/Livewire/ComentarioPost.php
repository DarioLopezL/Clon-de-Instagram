<?php

namespace App\Livewire;

use App\Models\Comentario;
use Livewire\Component;
use Illuminate\Database\Eloquent\Collection as EloquentCollection;

class ComentarioPost extends Component
{


    public $comentario;

    public $post;

    public $user;

    public EloquentCollection $comentarios;

    public function mount($post){
        $this->post = $post;
        $this->user = auth()->user();
        $this->comentarios = $post->comentarios;

    }

    public function store(){
        // validar
        $this->validate([
            'comentario' => 'required|max:255'
        ]);
        // almacenar
        $newComment= Comentario::create([
            'user_id' => $this->user->id,
            'post_id' => $this->post->id,
            'comentario' => $this->comentario
        ]);

        $this->comentarios->prepend($newComment);
        $this->reset('comentario');


    }



    public function render()
    {
        return view('livewire.comentario-post');
    }
}
