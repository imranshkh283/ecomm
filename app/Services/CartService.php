<?php

namespace App\Services;

use App\Models\Cart;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;


class CartService
{
    protected string $sessionKey = 'cart';

    public function getCart()
    {

        if (Auth::guard('customer')->check()) {
            return Cart::with('items.product')
                ->where('user_id', Auth::guard('customer')->id())
                ->first();   // ✅ first()
        }

        return Cart::with('items.product')
            ->where('session_id', session()->getId())
            ->first();       // ✅ first()
    }

    public function add(array $product): void
    {
        $productId = $product['id'];
        $productModel = Product::findOrFail($productId);

        /**
         * STEP 1: Get OR create cart (NEVER duplicate)
         */
        $cart = Cart::firstOrCreate([
            'user_id' => Auth::guard('customer')->user()->id,
            'session_id' => !Auth::guard('customer')->user() ? session()->getId() : null,
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

    public function remove(int $productId): void
    {
        $cart = $this->getCart();

        if (!$cart) {
            return;
        }

        $cartItem = $cart->items()
            ->where('product_id', $productId)
            ->first();

        if (!$cartItem) {
            return;
        }

        $cartItem->delete();

        // Delete cart if it becomes empty
        if (!$cart->items()->exists()) {
            $cart->delete();
        }
    }

    public function increaseQty(int $productId): void
    {
        $cart = $this->getCart();

        if (!$cart) {
            return;
        }

        $cartItem = $cart->items()
            ->where('product_id', $productId)
            ->first();

        if (!$cartItem) {
            return;
        }

        $cartItem->increment('quantity');
    }

    public function decreaseQty(int $productId): void
    {
        $cart = $this->getCart();

        if (!$cart) {
            return;
        }

        $cartItem = $cart->items()
            ->where('product_id', $productId)
            ->first();

        if (!$cartItem) {
            return;
        }

        if ($cartItem->quantity > 1) {
            $cartItem->decrement('quantity');
        } else {
            $cartItem->delete();
        }
    }

    public function totalItems(): int
    {
        $cart = $this->getCart();

        if (!$cart) {
            return 0;
        }

        return $cart->items()->sum('quantity');
    }

    public function subtotal(): float
    {
        $cart = $this->getCart();

        return $cart
            ? $cart->items->sum(fn($item) => $item->price * $item->quantity)
            : 0;
    }

    public function clear(): void
    {
        session()->forget($this->sessionKey);
    }
}
