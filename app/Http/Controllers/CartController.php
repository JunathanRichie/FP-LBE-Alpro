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
            $itemsTransactions = ItemsTransaction::where('id_transaction', $transactions->id_transaction)->get();
            if ($itemsTransactions->isEmpty()) {
                return response()->json(['message' => 'No transactions found for this ID.']);
            }
    
            return response()->json(['data' => $itemsTransactions], 200);
            
        } catch (\Exception $e) {
            return response()->json(['error' => 'Internal Server Error', 'message' => $e->getMessage()], 500);
        }
    }

    public function index()
    {
        return view('cart');
    }

    public function removeItem($transaction_id, $item_id)
    {
        try {
            // Try to find the entry in the item_transaction table
            $itemTransaction = DB::table('item_transaction')
                ->where('transaction_id', $transaction_id)
                ->where('item_id', $item_id)
                ->first();

            // If the entry does not exist, return a 404 response
            if (!$itemTransaction) {
                return response()->json([
                    'error' => 'Item or transaction not found.'
                ], 404);
            }

            // Delete the item transaction entry
            DB::table('item_transaction')
                ->where('transaction_id', $transaction_id)
                ->where('item_id', $item_id)
                ->delete();

            // Return a success response
            return response()->json([
                'message' => 'Item successfully removed from the cart.'
            ], 200);
        } catch (Exception $e) {
            // Catch any exceptions and return an error message with details
            return response()->json([
                'error' => 'An error occurred while deleting the item.',
                'details' => $e->getMessage()
            ], 500);
        }
    }

    public function removeCart(Request $request)
    {
        try {
            $validated = $request->validate([
                'transaction_id' => 'required|integer',
                'item_id' => 'required|string'
            ]);
            $entry = DB::table('item_transaction')
                ->where('transaction_id', $validated['transaction_id'])
                ->where('item_id', $validated['item_id'])
                ->first();

            if (!$entry) {
                return response()->json([
                    'error' => 'Item or transaction not found.'
                ], 404);
            }
            if ($entry) {
                DB::table('item_transaction')
                    ->where('transaction_id', $validated['transaction_id'])
                    ->where('item_id', $validated['item_id'])
                    ->delete();
                return response()->json([
                    'message' => 'Item successfully removed from the cart.'
                ], 200);
            }
        } catch (Exception $e) {
            // Catch any exceptions and return an error message with details
            return response()->json([
                'error' => 'An error occurred while deleting the cart.',
                'details' => $e->getMessage()
            ], 500);
        }
    }
}