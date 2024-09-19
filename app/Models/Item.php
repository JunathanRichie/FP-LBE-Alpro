<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    protected $table = 'items';
    protected $primaryKey = 'id_item';
    public $incrementing = false;
    protected $keyType = 'char';

    protected $fillable = [
        'nama_item',
        'stock_item',
        'harga_item',
        'image',
    ];
    public function itemTransactions()
    {
        return $this->hasMany(ItemTransaction::class);
    }
}
