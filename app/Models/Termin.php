<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;

class Termin extends Model
{
    use Sortable;

    protected $table = 'termin';

    protected $fillable = ['datum', 'von', 'bis'];

    public $sortable = ['datum', 'id', 'von', 'bis'];
}
