<?php

namespace App\Services;

class CartService
{
    protected string $sessionKey = 'cart';

    public function getCart(): array
    {
        return session()->get($this->sessionKey, []);
    }

    public function add(array $product): void
    {
        $cart = $this->getCart();

        $productId = $product['id'];

        if (isset($cart[$productId])) {
            $cart[$productId]['qty']++;
        } else {
            $cart[$productId] = [
                'id' => $product['id'],
                'name' => $product['name'],
                'price' => $product['price'],
                'image' => $product['image'],
                'qty' => 1,
            ];
        }

        session()->put($this->sessionKey, $cart);
    }

    public function remove(int $productId): void
    {
        $cart = $this->getCart();

        if (isset($cart[$productId])) {
            unset($cart[$productId]);
        }

        session()->put($this->sessionKey, $cart);
    }

    public function increaseQty(int $productId): void
    {
        $cart = $this->getCart();

        if (isset($cart[$productId])) {
            $cart[$productId]['qty']++;
        }

        session()->put($this->sessionKey, $cart);
    }

    public function decreaseQty(int $productId): void
    {
        $cart = $this->getCart();

        if (isset($cart[$productId])) {
            $cart[$productId]['qty']--;

            if ($cart[$productId]['qty'] <= 0) {
                unset($cart[$productId]);
            }
        }

        session()->put($this->sessionKey, $cart);
    }
    public function totalItems(): int
    {
        return collect($this->getCart())->sum('qty');
    }

    public function subtotal(): float
    {
        return collect($this->getCart())
            ->sum(fn($item) => $item['price'] * $item['qty']);
    }

    public function clear(): void
    {
        session()->forget($this->sessionKey);
    }
}
