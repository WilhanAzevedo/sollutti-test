<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/*
● Nome
    ○ String;
    ○ máx 60 caracteres;
    ○ min 3 caracteres;
    ○ mensagem de erros para cada validação em português;
● Valor
    ○ Integer
    ○ Mínimo de 2 caracteres;
    ○ Máximo de 6 caracteres;
    ○ Mensagem de erro para cada validação em português;
● Loja_id;
    ○ Integer;
● Ativo
    ○ Boolean;

*/

class Produto extends Model
{
    use HasFactory;
    protected $table = 'produtos';
    protected $fillable = ['nome', 'valor', 'loja_id', 'ativo'];
    protected $hidden = ['created_at', 'updated_at'];


    public function getValorAttribute($value)
    {
        $value = $value / 100;
        return 'R$ ' . number_format($value, 2, ',', '');
    }
}
