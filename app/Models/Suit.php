<?php

namespace App\Models;

use Glhd\Bits\Database\HasSnowflakes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Suit extends Model
{
    use HasFactory;
    use HasSnowflakes;
    use SoftDeletes;

    /**
     * @var string[]
     */
    protected $fillable = [
        'name',
        'symbol',
        'color',
    ];

    public function getRouteKeyName(): string
    {
        return 'name';
    }
}
