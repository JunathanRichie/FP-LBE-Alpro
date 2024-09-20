<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transaction;
use App\Models\ItemsTransaction;
use Carbon\Carbon;
use Illuminate\Support\Facades\Log;

class CartController extends Controller
{
    public function addToCart(Request $request)
    {
        // Validasi input
        try {
            $validated = $request->validate([
                'id_user' => 'required|integer',
                'id_item' => 'required|string',
                'kuantitas' => 'required|integer|min:1'
            ]);
        
            // Cari transaksi yang belum dibayar
            $transaction = Transaction::where('id_user', $validated['id_user'])
                ->where('paid', 0)
                ->first();
            
            // Jika transaksi belum ada, buat transaksi baru
            if (!$transaction) {
                // echo "masuk if";
                $transaction = Transaction::create([
                    'id_user' => $validated['id_user'],
                    'total_harga' => 0,
                    'tgl_transaksi' => Carbon::now(),
                    'paid' => false
                ]);
            }
            $id_transaction_input = $transaction->id_transaction;
            // Tambahkan item ke transaction
            $itemsTransaction = ItemsTransaction::where('id_transaction', $id_transaction_input)
            ->where('id_item', $validated['id_item'])
            ->first();
            // echo $itemsTransaction->kuantitas;
            if ($itemsTransaction) {
                // Update kuantitas jika item sudah ada di cart
                $itemsTransaction->kuantitas += $validated['kuantitas'];
                $itemsTransaction->save();
            } else {
                // Tambahkan item baru ke cart
                $itemsTransaction = ItemsTransaction::create([
                    'id_transaction' => $id_transaction_input,
                    'id_item' => $validated['id_item'],
                    'kuantitas' => $validated['kuantitas']
                ]);
            }
            $itemsTransactions = ItemsTransaction::join('items', 'items.id_item', '=', 'items_transactions.id_item')
            ->where('items_transactions.id_transaction', $transaction->id_transaction)
            ->select('items.harga_item', 'items_transactions.kuantitas')
            ->get();
            $totalHarga = $itemsTransactions->sum(function($itemTransaction) {
                return $itemTransaction->harga_item * $itemTransaction->kuantitas;
            });            
            $transaction->total_harga = $totalHarga;
            $transaction->save();
            return response()->json([
                'message' => 'Item berhasil ditambahkan ke cart',
                'transaction' => $itemsTransaction,
                'total_harga' => $totalHarga
            ]);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Internal Server Error', 'message' => $e->getMessage()], 500);
        }
    }

    public function index()
    {
        return view('cart');
    }
}