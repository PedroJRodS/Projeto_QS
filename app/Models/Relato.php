<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Relato extends Model
{
    use HasFactory;

    protected $fillable = [
        'item_name',
        'description',
        'reporter_name',
        'report_date',
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
