<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Item;
use App\Models\Transaction;

class ItemsTransaction extends Model
{
    use HasFactory;
    protected $primaryKey = 'id_transaction';
    protected $table = 'items_transactions'; // Menentukan nama tabel
    protected $fillable = ['id_item', 'id_transaction', 'kuantitas', 'harga_kumulatif'];
    public function item()
    {
        return $this->belongsTo(Item::class);
    }
    
    public function transaction()
    {
        return $this->belongsTo(Transaction::class);
    }
}
