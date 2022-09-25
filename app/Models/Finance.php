<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Finance extends Model
{
    use HasFactory;

    protected $fillable =
    [
        'amount',
        'reference',
        'method_pay',
        'type_finance',
        'date',
        'status',
        'financeable_id',
        'financeable_type',
        'temple_id'
    ];
    //relacion polimorfica
    public $timestamps = false;

    public function financeable()
    {
        return $this->morphTo();
    }
}
