<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Angestellter extends Model
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
        'passwort',
        'ist_admin',
        'erstelldatum',
        'friseursalon_id',
    ];
}
