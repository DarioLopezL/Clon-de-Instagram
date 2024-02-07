<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;


    protected $fillable = [
        'titulo',
        'descripcion',
        'imagen',
        'user_id'

    ];

    public function user()
    {
        return $this->belongsTo(User::class)->select(['name', 'username']);
    }

    public function comentarios()
    {
        return $this->hasMany(Comentario::class)->latest();
    }

    // relacion muchos a muchos de megusta de varios posts y de varios usuaarios
    public function likes()
    {
        return $this->hasMany(Like::class);
    }

    public function CheckLike(User $user)
    {
        return $this->likes->contains('user_id',$user->id);

    }
}
