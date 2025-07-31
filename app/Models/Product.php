<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'category_id', 'stock_id', 'shop_id', 'price', 'created_by'];

    public function category() {
        return $this->belongsTo(Category::class);
    }

    public function stock() {
        return $this->belongsTo(Stock::class);
    }

    public function shop() {
        return $this->belongsTo(Shop::class);
    }

    public function creator() {
        return $this->belongsTo(User::class, 'created_by');
    }

    public function purchaseItems() {
        return $this->hasMany(PurchaseItem::class);
    }
}

