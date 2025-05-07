<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'image',
        'description',
        'price',
        'manufacturer_id',
        'release_date',
        'total_sales',
        'category'
    ];
    public function category()
{
    return $this->belongsTo(ProdCategory::class, 'category_id');

}
public function manufacturer()
{
    return $this->belongsTo(Company::class, 'manufacturer_id');
}
}