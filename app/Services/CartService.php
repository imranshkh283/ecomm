<?php

namespace App\Services;

use App\Models\Cart;
use App\Models\CartItem;
use App\Models\Product;

class CartService
{
    protected string $sessionKey = 'cart';

    public function getCart()
    {
        // cartItem beolongsTo product

        return Cart::where('session_id', session()->getId())
            ->with('items', 'items.product')->get();
    }

    public function add(array $product): void
    {
        $cart = $this->getCart();

        $productId = $product['id'];

        $product = Product::findOrFail($productId);

        if (isset($cart[$productId])) {
        } else {
            $cart->put($productId, [

                'id' => $productId,
                'name' => $product->name,
                'price' => $product->price,
                'qty' => 1,
            ]);
        }

        $cart = Cart::create([
            'session_id' => session()->getId(),
            'created_at' => now(),
        ]);

        $cartItem = CartItem::create([
            'cart_id' => $cart->id,
            'product_id' => $product['id'],
            'quantity' => 1,
            'price' => $product['price'],
        ]);

        session()->put($this->sessionKey, $cart);
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
