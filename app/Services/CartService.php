<?php

namespace App\Services;

use App\Models\Cart;
use App\Models\CartItem;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;

class CartService
{
    protected string $sessionKey = 'cart';

    public function getCart()
    {
        return Cart::with('items.product')
            ->when(auth()->check(), function ($q) {
                $q->where('user_id', auth()->id());
            }, function ($q) {
                $q->where('session_id', session()->getId())
                    ->whereNull('user_id');
            })
            ->first();
    }

    public function add(array $product): void
    {
        $productId = $product['id'];

        $productModel = Product::findOrFail($productId);

        /**
         * STEP 1: Get OR create cart (NEVER duplicate)
         */
        $cart = Cart::firstOrCreate([
            'user_id' => $product['user_id'] ?? null,
            'session_id' => $product['user_id'] ? null : $product['session_id'],
        ]);

        /**
         * STEP 2: Check if item already exists
         */
        $cartItem = $cart->items()
            ->where('product_id', $productId)
            ->first();

        /**
         * STEP 3: Update or create item
         */
        if ($cartItem) {
            $cartItem->increment('quantity');
        } else {
            $cart->items()->create([
                'product_id' => $productId,
                'quantity' => 1,
                'price' => $productModel->price,
            ]);
        }
    }

    public function remove(int $cartId): void
    {
        $cart = Cart::firstOrCreate([
            'session_id' => session()->getId(),
            'id' => $cartId,
        ]);

        $item = $cart->items()
            ->where('cart_id', $cartId)
            ->first();

        if ($item) {
            $cart->delete();
            $item->delete();
        }

        session()->put($this->sessionKey, $cart);
    }

    public function increaseQty(int $cartId): void
    {
        $cart = Cart::firstOrCreate([
            'session_id' => session()->getId(),
            'id' => $cartId,
        ]);

        $item = $cart->items()
            ->where('cart_id', $cartId)
            ->first();

        if ($item) {
            $item->increment('quantity');
        } else {
            $item = CartItem::create([
                'cart_id' => $cart->id,
                'product_id' => $cartId,
                'quantity' => 1,
                'price' => Product::findOrFail($cartId)->price,
            ]);
        }

        session()->put($this->sessionKey, $cart);
    }

    public function decreaseQty(int $cartId): void
    {
        $cart = Cart::firstOrCreate([
            'session_id' => session()->getId(),
            'id' => $cartId,
        ]);

        $item = $cart->items()
            ->where('cart_id', $cartId)
            ->first();

        if (!$item) {
            return;
        }

        if ($item->quantity > 1) {
            $item->decrement('quantity');
        } else {
            $item->delete();
        }

        session()->put($this->sessionKey, $cart);
    }
    public function totalItems(): int
    {
        return CartItem::whereHas('cart', function ($q) {
            $q->where('session_id', session()->getId());
        })->sum('quantity');
    }

    public function subtotal(): float
    {
        return collect($this->getCart())
            ->sum(fn($item) => $item->price * $item->quantity);
    }

    public function clear(): void
    {
        session()->forget($this->sessionKey);
    }
}
