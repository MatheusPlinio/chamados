<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Call extends Model
{
    use HasFactory;
    protected $table = 'calls';
    protected $fillable = ['titulo', 'solicitacao', 'solicitante', 'setor', 'prioridade', 'status'];
    protected $date = ['updated_at'];
}
