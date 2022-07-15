<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Property extends Model
{
    use HasFactory;

    protected $fillable = [
        'propertyjobs_id',
        'name'
    ];

    public function propertyjobs()
    {
        return $this->hasMany(Propertyjob::class);
    }
}
