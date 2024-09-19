<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ItemTransaction extends Model
{
    use HasFactory;
    protected $fillable = ['item_id', 'transaction_id', 'quantity', 'harga_kumulatif'];
    public function item()
    {
        return $this->belongsTo(Item::class);
    }
    
    public function transaction()
    {
        return $this->belongsTo(Transaction::class);
    }
}
