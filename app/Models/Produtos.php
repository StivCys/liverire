<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produtos extends Model
{
    use HasFactory;
    protected $fillable=['nome','descricao','peso','estoque_disponivel','preco_custo','preco_venda','estoque_minimo','estoque_maximo','flag_tipo'];
}
