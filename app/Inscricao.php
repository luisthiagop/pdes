<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Inscricao extends Model
{

	protected $table = 'inscricoes';

	protected $fillable = [
        'id','evento_id','user_id','horas'
    ];

    public function user()
    {
        return $this->belongsToMany('App\User', 'inscricoes', 'user_id', 'user_id');//->belongsTo('App\Evento');
    
}
    public function evento()
    {
        return $this->hasMany('App\Evento');
    }
}
