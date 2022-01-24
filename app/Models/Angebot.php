<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Angebot extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $table = 'angebot';
    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'bezeichnung',
        'beschreibung',
        'preis',
    ];
}
