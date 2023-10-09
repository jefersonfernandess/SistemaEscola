<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Professores extends Model
{
    use HasFactory;

    protected $table = 'professores';
    protected $fillable = ['nome', 'diciplina', 'telefone'];

    public static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            $model->nome = strtoupper($model->nome);
            $model->diciplina = strtoupper($model->diciplina);
            $model->telefone = strtoupper($model->telefone);
            
        });

        static::updating(function ($model) {
            $model->nome = strtoupper($model->nome);
            $model->diciplina = strtoupper($model->diciplina);
            $model->telefone = strtoupper($model->telefone);
        });
    }
}
