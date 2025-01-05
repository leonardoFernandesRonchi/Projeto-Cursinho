<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Anotacoes extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'date', 'activity', 'title'];

    // Definindo explicitamente o nome da tabela caso tenha sido alterado
    protected $table = 'anotacoes';

    // Relacionamento com o modelo User (pertence a um usuário)
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
