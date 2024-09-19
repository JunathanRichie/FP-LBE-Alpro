<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use App\Models\ItemTransaction;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    public function updateItem(Request $request, $transactionId, $itemId)
    {
        $transaction = Transaction::findOrFail($transactionId);

        // Validasi data yang dikirimkan
        $request->validate([
            'quantity' => 'required|integer',
        ]);

        // Cari item transaction yang sudah ada
        $existingItemTransaction = $transaction->itemTransactions()->where('item_id', $itemId)->first();

        if ($existingItemTransaction) {
            // Update kuantitas jika item sudah ada
            $existingItemTransaction->quantity = $request->quantity;
            $existingItemTransaction->save();
        } else {
            // Buat item transaction baru jika belum ada
            $itemTransaction = new ItemTransaction;
            $itemTransaction->transaction_id = $transactionId;
            $itemTransaction->item_id = $itemId;
            $itemTransaction->quantity = $request->quantity;
            $itemTransaction->save();
        }

        // Hitung ulang total harga transaksi
        $transaction->calculateTotal();

        return response()->json($transaction, 200);
    }
}