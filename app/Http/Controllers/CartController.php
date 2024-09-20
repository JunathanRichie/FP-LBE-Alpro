<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transaction;
use App\Models\ItemsTransaction;
use Carbon\Carbon;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;

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

    public function getCart(Request $request, $userId)
    {
        try {
            $transactions = Transaction::where('id_user', $userId)
            ->where('paid', 0)
            ->first(); // Ambil hanya 1
            if (!$transactions) {
                return response()->json(['message' => 'No unpaid transactions found for this user.']);
            }
            $itemsTransactions = ItemsTransaction::join('items', 'items.id_item', '=', 'items_transactions.id_item')
            ->where('items_transactions.id_transaction', $transactions->id_transaction)
            ->select('items.nama_item','items.image','items.harga_item', 'items_transactions.id_item', 'items_transactions.kuantitas', 'items_transactions.created_at', 'items_transactions.updated_at')
            ->get();
            if ($itemsTransactions->isEmpty()) {
                return response()->json(['message' => 'No transactions found for this ID.']);
            }
            $totalHarga = $itemsTransactions->sum(function($itemTransaction) {
                return $itemTransaction->harga_item * $itemTransaction->kuantitas;
            });
            return response()->json(['data' => $itemsTransactions,'total_harga' => $totalHarga], 200);
            
        } catch (\Exception $e) {
            return response()->json(['error' => 'Internal Server Error', 'message' => $e->getMessage()], 500);
        }
    }

    public function removeCart(Request $request)
    {
        try {
            // Validasi input
            $validated = $request->validate([
                'id_user' => 'required|integer',
                'id_item' => 'required|string'
            ]);
    
            // Cari transaksi yang unpaid berdasarkan id_user
            $transaction = Transaction::where('id_user', $validated['id_user'])
                ->where('paid', 0)
                ->first();
    
            // Jika transaksi tidak ditemukan
            if (!$transaction) {
                return response()->json([
                    'error' => 'Unpaid transaction not found for this user.'
                ], 404);
            }
    
            // Cari item di tabel item_transaction berdasarkan transaction_id dan id_item
            $entry = ItemsTransaction::where('id_transaction', $transaction->id_transaction)
                ->where('id_item', $validated['id_item'])
                ->first();
    
            // Jika item tidak ditemukan dalam transaksi tersebut
            if (!$entry) {
                return response()->json([
                    'error' => 'Item not found in this transaction.'
                ], 404);
            }
    
            // Hapus item dari item_transaction
            $entry->delete();
    
            return response()->json([
                'message' => 'Item successfully removed from the transaction.'
            ], 200);
    
        } catch (\Exception $e) {
            // Tangani exception dan kirimkan error message
            return response()->json([
                'error' => 'An error occurred while deleting the item from the transaction.',
                'details' => $e->getMessage()
            ], 500);
        }
    }
    
    public function index()
    {
        $userId = Auth::id();
        return view('cart', ['userId' => $userId]);
    }
}