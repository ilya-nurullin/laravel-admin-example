<?php

namespace App\Models;

use App\View\Components\Contracts\AsTable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Token extends Model
{
    use HasFactory;

    protected $primaryKey = 'token';
    protected $keyType = 'string';
}
