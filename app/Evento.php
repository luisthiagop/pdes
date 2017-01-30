<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Evento extends Model
{
	protected $table= 'events';
	
    protected $fillable = [
        'id','nome','vagas','inscritos','cargaHoraria', 'palestrante', 'descricao','data_evento','horario_evento','data_inicio','data_fim','has_banner','name_banner','status','disabled'
    ];

    public function users()
    {
        return $this->belongsToMany('App\User',  'inscricoes', 'evento_id', 'user_id');
    }

    public function inscricao()
    {
        return $this->hasMany('App\Inscricao');
    }
}
