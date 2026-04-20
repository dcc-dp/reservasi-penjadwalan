<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Pembayaran;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class PembayaranSiswaController extends Controller
{
    public function index()
    {
        $pembayaranList = Pembayaran::with(['reservasi.kursus', 'reservasi.paket'])
            ->whereHas('reservasi', function ($query) {
                $query->where('id_user', Auth::id());
            })
            ->latest()
            ->get();

        return view('user.pembayaran.index', compact('pembayaranList'));
    }

    public function show($id)
    {
        $pembayaran = Pembayaran::with(['reservasi.kursus', 'reservasi.paket'])
            ->findOrFail($id);

        return view('user.pembayaran.show', compact('pembayaran'));
    }

    public function bayar($id)
    {
        $pembayaran = Pembayaran::with(['reservasi.kursus', 'reservasi.paket'])
            ->findOrFail($id);

        $user = Auth::user();

        \Midtrans\Config::$serverKey = config('midtrans.server_key');
        \Midtrans\Config::$isProduction = config('midtrans.is_production');
        \Midtrans\Config::$isSanitized = true;
        \Midtrans\Config::$is3ds = true;

        if (!$pembayaran->snap_token) {

            $params = [
                'transaction_details' => [
                    'order_id' => $pembayaran->order_id,
                    'gross_amount' => (int) $pembayaran->total,
                ],
                'customer_details' => [
                    'first_name' => $user->name,
                    'email' => $user->email,
                    'phone' => $user->notelp,
                ]
            ];

            $snapToken = \Midtrans\Snap::getSnapToken($params);

            $pembayaran->update([
                'snap_token' => $snapToken
            ]);

            if ($pembayaran->status == 'settlement') {
    $pembayaran->reservasi->update([
        'status' => 'aktif'
    ]);
}
        }

        return view('user.pembayaran.show', compact('pembayaran'));
    }

    // 🔥 CALLBACK FINAL
    public function callback(Request $request)
    {
        Log::info('MIDTRANS CALLBACK MASUK', $request->all());

        try {
            \Midtrans\Config::$serverKey = config('midtrans.server_key');
            \Midtrans\Config::$isProduction = config('midtrans.is_production');

            $notif = new \Midtrans\Notification();

            $transactionStatus = $notif->transaction_status;
            $paymentType = $notif->payment_type ?? null;
            $orderId = $notif->order_id ?? null;
            $transactionId = $notif->transaction_id ?? null;

            $pembayaran = Pembayaran::where('order_id', $orderId)->first();

            if (!$pembayaran) {
                return response()->json(['message' => 'Not found'], 404);
            }

            $status = 'pending';
            $paidAt = null;

            if (in_array($transactionStatus, ['capture', 'settlement'])) {
                $status = 'settlement';
                $paidAt = now();
            } elseif ($transactionStatus == 'pending') {
                $status = 'pending';
            } elseif ($transactionStatus == 'deny') {
                $status = 'deny';
            } elseif ($transactionStatus == 'expire') {
                $status = 'expire';
            } elseif ($transactionStatus == 'cancel') {
                $status = 'cancel';
            } else {
                $status = 'failure';
            }

            $pembayaran->update([
                'transaction_id' => $transactionId,
                'payment_type' => $paymentType,
                'metode_bayar' => $paymentType,
                'status' => $status,
                'paid_at' => $paidAt,
            ]);

            // 🔥 AKTIFKAN RESERVASI
            if ($status == 'settlement') {
                $pembayaran->reservasi?->update([
                    'status' => 'aktif'
                ]);
            }

            return response()->json(['message' => 'OK'], 200);

        } catch (\Throwable $e) {
            Log::error('CALLBACK ERROR', [
                'message' => $e->getMessage()
            ]);

            return response()->json(['error' => 'callback error'], 500);
        }
    }
}