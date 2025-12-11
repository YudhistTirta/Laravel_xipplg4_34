<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SchoolClass extends Model
{
    use HasFactory;

    /**
     * Kolom yang boleh diisi secara massal (dari form).
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'major',
    ];
}