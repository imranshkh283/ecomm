<?php

namespace App\Services;

use App\Models\Cart;

class CartMergeService
{
    public function merge(string $sessionId, $user)
    {
        $sessionCart = Cart::where('session_id', $sessionId)
            ->with('items')
            ->first();

        if (! $sessionCart) return;

        $userCart = Cart::firstOrCreate([
            'user_id' => $user->id,
        ]);

        foreach ($sessionCart->items as $item) {

            $existing = $userCart->items()
                ->where('product_id', $item->product_id)
                ->first();

            if ($existing) {
                $existing->increment('quantity', $item->quantity);
            } else {
                $userCart->items()->create([
                    'product_id' => $item->product_id,
                    'quantity' => $item->quantity,
                    'price' => $item->price,
                ]);
            }
        }

        $sessionCart->delete();
    }
}
