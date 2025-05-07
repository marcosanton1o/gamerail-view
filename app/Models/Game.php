<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Game extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'price',
        'developer_id',
        'publisher_id',
        'description',
        'release_date',
        'game_category_id'
    ];
    public function category()
{
    return $this->belongsTo(GameCategory::class, 'game_category_id');
}
public function developer()
{
    return $this->belongsTo(Company::class, 'developer_id');
}

public function publisher()
{
    return $this->belongsTo(Company::class, 'publisher_id');
}
}