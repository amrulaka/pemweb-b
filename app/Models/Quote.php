<?php

namespace App\Models;
use Auth;
use Illuminate\Database\Eloquent\Model;

class Quote extends Model
{
    public function user()
    {
      return $this->BelongsTo('App\Models\User');
    }
    protected $fillable = [
        'title', 'slug', 'subject','user_id'
    ];

    public function IsOwner()
    {
       return Auth::user()->id ==$this->user->id;
    }
}
