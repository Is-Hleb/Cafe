<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Restaurant extends Model
{
    use HasFactory;

    protected $table = "restaurants";

    public $timestamps = false;

    protected $fillable = [
        'address',
        'phone',
    ];

    public static function boot() {
        parent::boot();

    }

    public function admin(): \Illuminate\Database\Eloquent\Relations\HasOne
    {
        return $this->hasOne(User::class, "restaurant_id", "id");
    }

}
