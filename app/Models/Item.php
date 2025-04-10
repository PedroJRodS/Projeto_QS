<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'found_date',
        'status',
        'return_date',
        'returned_to',
        'category_id',
        'location_id'
    ];

    public function categoria()
    {
        return $this->belongsTo(Categoria::class, 'category_id');
    }

    public function local()
    {
        return $this->belongsTo(Local::class, 'location_id');
    }
}
