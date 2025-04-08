<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    use HasFactory;

    protected $fillable = [
        'item_name',
        'description',
        'reporter_name',
        'report_date',
        'category_id',
        'location_id',
        'condition_id'
    ];

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }

    public function location()
    {
        return $this->belongsTo(Location::class, 'location_id');
    }

    public function condition()
    {
        return $this->belongsTo(Condition::class, 'condition_id');
    }
}
