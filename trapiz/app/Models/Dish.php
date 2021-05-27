<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dish extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = [
        "menu_item_id",
        "name",
        "image_url",
        "description",
        "price",
        "is_promotion",
    ];

    public function menu_item()
    {
        return $this->belongsTo(MenuItem::class);
    }
}
