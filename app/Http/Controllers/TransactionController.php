<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class TransactionController extends Controller
{
    // ADMIN: Read all (dengan data relasi customer dan book)
    public function index()
    {
        $transactions = Transaction::with([
            'customer:id,name,email',
            'book:id,title,price,stock',
        ])->get();

        return response()->json([
            'success' => true,
            'message' => 'Daftar data transaksi',
            'data'    => $transactions,
        ]);
    }

    // CUSTOMER: Create
    public function store(Request $request)
    {
        $validated = $request->validate([
            'book_id'  => 'required|exists:books,id',
            'quantity' => 'required|integer|min:1',
        ]);

        $book = Book::find($validated['book_id']);

        if ($book->stock < $validated['quantity']) {
            return response()->json([
                'success' => false,
                'message' => 'Stok buku tidak mencukupi',
            ], 422);
        }

        $transaction = Transaction::create([
            'order_number' => 'ORD-' . strtoupper(Str::random(8)),
            'customer_id'  => $request->user()->id,
            'book_id'      => $book->id,
            'total_amount' => $book->price * $validated['quantity'],
        ]);

        $book->decrement('stock', $validated['quantity']);

        return response()->json([
            'success' => true,
            'message' => 'Transaksi berhasil dibuat',
            'data'    => $transaction->load([
                'customer:id,name,email',
                'book:id,title,price,stock',
            ]),
        ], 201);
    }

    // CUSTOMER: Show (hanya transaksi miliknya)
    public function show(Request $request, $id)
    {
        $transaction = Transaction::with([
            'customer:id,name,email',
            'book:id,title,price,stock',
        ])->find($id);

        if (!$transaction) {
            return response()->json([
                'success' => false,
                'message' => 'Transaksi tidak ditemukan',
            ], 404);
        }

        if ($transaction->customer_id !== $request->user()->id) {
            return response()->json([
                'success' => false,
                'message' => 'Anda tidak berhak melihat transaksi ini',
            ], 403);
        }

        return response()->json([
            'success' => true,
            'message' => 'Detail data transaksi',
            'data'    => $transaction,
        ]);
    }

    // CUSTOMER: Update (hanya transaksi miliknya)
    public function update(Request $request, $id)
    {
        $transaction = Transaction::find($id);

        if (!$transaction) {
            return response()->json([
                'success' => false,
                'message' => 'Transaksi tidak ditemukan',
            ], 404);
        }

        if ($transaction->customer_id !== $request->user()->id) {
            return response()->json([
                'success' => false,
                'message' => 'Anda tidak berhak mengubah transaksi ini',
            ], 403);
        }

        $validated = $request->validate([
            'book_id'  => 'required|exists:books,id',
            'quantity' => 'required|integer|min:1',
        ]);

        $book = Book::find($validated['book_id']);

        $transaction->update([
            'book_id'      => $book->id,
            'total_amount' => $book->price * $validated['quantity'],
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Transaksi berhasil diperbarui',
            'data'    => $transaction->load([
                'customer:id,name,email',
                'book:id,title,price,stock',
            ]),
        ]);
    }

    // ADMIN: Destroy
    public function destroy($id)
    {
        $transaction = Transaction::find($id);

        if (!$transaction) {
            return response()->json([
                'success' => false,
                'message' => 'Transaksi tidak ditemukan',
            ], 404);
        }

        $transaction->delete();

        return response()->json([
            'success' => true,
            'message' => 'Transaksi berhasil dihapus',
        ]);
    }
}