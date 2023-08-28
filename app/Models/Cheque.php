<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Product;

class Cheque extends Model
{
    use HasFactory;

    protected $table = 'cheque';

    protected $fillable = [
        'date',
        'recipient',
        'phone'
    ];

    public function products(){
        return $this->belongsToMany(Product::class);
    }
}
