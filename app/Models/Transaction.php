<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;

    protected $fillable = ['total_harga', 'tgl_transaksi', 'user_id','paid'];

    public function itemTransactions()
    {
        return $this->hasMany(ItemTransaction::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}