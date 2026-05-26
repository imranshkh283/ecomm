<div>

    <h2 class="mb-4">Shopping Cart</h2>

    @forelse($cartItems as $item)

    <div class="border p-3 mb-3 d-flex align-items-center justify-content-between">

        <div>
            <img src="{{ asset($item['image']) }}" width="80">
        </div>

        <div>
            <h5>{{ $item['name'] }}</h5>
            <p>${{ number_format($item['price'], 2) }}</p>
        </div>

        <div>
            <button wire:click="decrease({{ $item['id'] }})" class="btn btn-sm btn-danger">-</button>

            <span class="mx-2">{{ $item['qty'] }}</span>

            <button wire:click="increase({{ $item['id'] }})" class="btn btn-sm btn-success">+</button>
        </div>

        <div>
            ${{ number_format($item['price'] * $item['qty'], 2) }}
        </div>

        <div>
            <button wire:click="remove({{ $item['id'] }})" class="btn btn-sm btn-dark">
                Remove
            </button>
        </div>

    </div>

    @empty

    <div class="alert alert-warning">
        Cart is empty
    </div>

    @endforelse

    <div class="mt-4">
        <h4>
            Subtotal: ${{ number_format($subtotal, 2) }}
        </h4>
    </div>

</div>