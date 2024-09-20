<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\ItemsTransaction;
use App\Models\User;

class Transaction extends Model
{
    use HasFactory;

    protected $fillable = ['total_harga', 'tgl_transaksi', 'id_user','paid'];

    public function itemsTransactions()
    {
        return $this->hasMany(ItemsTransaction::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // public function calculateTotal() {
    //     $total = 0;
    //     foreach ($this->itemTransactions as $itemTransaction) {
    //         $total += $itemTransaction->harga_kumulatif;
    //     }
    //     $this->total_harga = $total;
    //     $this->save();
    // }
}