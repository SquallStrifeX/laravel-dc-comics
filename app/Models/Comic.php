<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comic extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'thumb',
        'price',
        'series',
        'sale_date',
        'type',
        'artists',
        'writers',
    ];

    protected $dates = ['sale_date'];
// or
protected $casts = [
    'sale_date' => 'datetime',
];

    // Il resto del codice del modello...
}
