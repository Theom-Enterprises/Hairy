<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Angestellter extends Authenticatable
{
    use HasFactory;

    public $timestamps = false;

    protected $table = 'angestellter';

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'friseurkuerzel',
        'vorname',
        'nachname',
        'email',
        'password',
        'ist_admin',
        'erstelldatum',
        'friseursalon_id',
    ];
}
