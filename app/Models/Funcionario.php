<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Funcionario extends Model
{
    use HasFactory;

    protected $fillable = ['nome', 'cargo', 'telefone', 'descricao', 'nivel'];

    public static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            $model->nome = strtoupper($model->nome);
            $model->cargo = strtoupper($model->cargo);
            $model->telefone = strtoupper($model->telefone);
            $model->descricao = strtoupper($model->descricao);
            $model->nivel = strtoupper($model->nivel);
            
        });

        static::updating(function ($model) {
            $model->nome = strtoupper($model->nome);
            $model->cargo = strtoupper($model->cargo);
            $model->telefone = strtoupper($model->telefone);
            $model->descricao = strtoupper($model->descricao);
            $model->nivel = strtoupper($model->nivel);
        });
    }
}
