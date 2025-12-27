<div class="grid grid-cols-1 lg:grid-cols-3 gap-8">

    <!-- Cart Items Section -->
    <div class="lg:col-span-2 space-y-4">
        @if($cartItems->isEmpty())
            <div class="bg-white rounded-lg p-8 text-center">
                <p class="text-gray-600 text-lg mb-4">Your cart is empty</p>
                <a href="{{ route('home') }}" class="text-blue-600 hover:text-blue-700 font-medium">
                    Start Shopping →
                </a>
            </div>
        @else
            @foreach($cartItems as $item)
                <div wire:key="cart-item-{{ $item->id }}-{{ $item->quantity }}" class="bg-white rounded-lg p-6 shadow-sm">
                    <div class="flex gap-6">

                        <!-- Product Image-->
                        <div class="flex-shrink-0">
                            <div class="w-24 h-24 bg-gray-200 rounded-lg flex items-center justify-center">
                                <img class="size-full object-cover rounded-2xl" src="{{ $item->product?->image ?? asset('images/placeholder.png') }}" alt="Product Image">
                            </div>
                        </div>

                        <!-- Product Details -->
                        <div class="flex-grow">
                            <h3 class="font-semibold text-lg mb-2">{{ $item->product->name }}</h3>
                            <p class="text-gray-600 text-sm mb-4">{{ $item->product->description }}</p>

                            <!-- Actions -->
                            <div class="flex gap-4 items-center">
                                <button class="text-gray-600 hover:text-gray-700 flex items-center gap-1 text-sm">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"></path>
                                    </svg>
                                    Add to Favorites
                                </button>
                                <button
                                    wire:click="removeItem({{ $item->id }})"
                                    class="text-red-600 hover:text-red-700 flex items-center gap-1 text-sm"
                                    wire:loading.attr="disabled"
                                    wire:target="removeItem({{ $item->id }})">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                                    </svg>
                                    <span wire:loading.remove wire:target="removeItem.{{ $item->id }}">Remove</span>
<span wire:loading wire:target="removeItem.{{ $item->id }}">Removing...</span>
                                </button>
                                <button
                                    wire:click="checkOutItem({{ $item->id }}, {{ $item->quantity }})"
                                    class="text-green-900 hover:text-green-900 flex items-center gap-1 text-sm"
                                    wire:loading.attr="disabled"
                                    wire:target="checkOutItem({{ $item->id }}, {{ $item->quantity }})">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <rect x="2" y="5" width="20" height="14" rx="2" ry="2"
                                            stroke-linecap="round" stroke-linejoin="round" stroke-width="2" />
                                        <line x1="2" y1="10" x2="22" y2="10"
                                            stroke-linecap="round" stroke-linejoin="round" stroke-width="2" />
                                    </svg>

                                    <span wire:loading.remove wire:target="checkOutItem({{ $item->id }}, {{ $item->quantity }})">Checkout this item</span>
                                    <span wire:loading wire:target="checkOutItem({{ $item->id }}, {{ $item->quantity }})">Checking out...</span>
                                </button>
                            </div>

                            <!-- Quantity limits info -->
                            @if($item->quantity >= 10)
                                <p class="text-xs text-orange-600 mt-2">Maximum quantity reached (10 per item)</p>
                            @endif
                        </div>

                        <!-- Quantity and Price -->
                            <div class="flex flex-col items-end justify-between">
                                <!-- Quantity Controls -->
                                <div class="flex items-center gap-3 border border-gray-300 rounded-lg">
                                    <button
                                        wire:click="decrementQuantity({{ $item->id }})"
                                        class="px-3 py-2 hover:bg-gray-100 rounded-l-lg disabled:opacity-50 disabled:cursor-not-allowed"
                                        wire:loading.attr="disabled"
                                        wire:target="decrementQuantity({{ $item->id }}), incrementQuantity({{ $item->id }})">
                                        <span wire:loading.remove wire:target="decrementQuantity({{ $item->id }})">−</span>
                                        <span wire:loading wire:target="decrementQuantity({{ $item->id }})">
                                            <svg class="animate-spin h-4 w-4 text-gray-600" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                                <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                                                <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                                            </svg>
                                        </span>
                                    </button>

                                    <span class="text-center w-12">{{ $item->quantity }}</span>

                                    <button
                                        wire:click="incrementQuantity({{ $item->id }})"
                                        class="px-3 py-2 hover:bg-gray-100 rounded-r-lg disabled:opacity-50 disabled:cursor-not-allowed"
                                        wire:loading.attr="disabled"
                                        wire:target="incrementQuantity({{ $item->id }}), decrementQuantity({{ $item->id }})"
                                        @if($item->quantity >= 10) disabled @endif>
                                        <span wire:loading.remove wire:target="incrementQuantity({{ $item->id }})">+</span>
                                        <span wire:loading wire:target="incrementQuantity({{ $item->id }})">
                                            <svg class="animate-spin h-4 w-4 text-gray-600" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                                <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                                                <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                                            </svg>
                                        </span>
                                    </button>
                                </div>

                                <!-- Price -->
                                <div class="text-right">
                                    <p class="text-2xl font-bold">${{ number_format($item->product->price * $item->quantity, 2) }}</p>
                                </div>
                            </div>

                    </div>
                </div>
            @endforeach
        @endif
    </div>

    <!-- Summary Section -->
    <div class="lg:col-span-1">
        <div class="bg-white rounded-lg p-6 shadow-sm lg:sticky lg:top-4">
            <h2 class="text-xl font-bold mb-6">Order summary</h2>

            <div class="space-y-4 mb-6">
                <!-- Original Price -->
                <div class="flex justify-between text-gray-600">
                    <span>Original price</span>
                    <span>${{ $total }}</span>
                </div>

                <!-- Savings -->
                <div class="flex justify-between text-green-600">
                    <span>Savings</span>
                    <span>${{ $savings}}</span>
                </div>

                <!-- Store Pickup -->
                <div class="flex justify-between text-gray-600">
                    <span>Store Pickup</span>
                    <span>${{ $store_pickup}}</span>
                </div>

                <!-- Tax -->
                <div class="flex justify-between text-gray-600">
                    <span>Tax</span>
                    <span>${{ $tax}}</span>
                </div>
            </div>

            <!-- Total -->
            <div class="border-t pt-4 mb-6">
                <div class="flex justify-between items-center">
                    <span class="text-xl font-bold">Total</span>
                    <span class="text-2xl font-bold">${{ $totalAfterTax }}</span>
                </div>
            </div>

            <!-- Checkout Button -->
            <button class="w-full bg-blue-600 hover:bg-blue-700 text-white font-semibold py-3 rounded-lg mb-4 transition">
                Proceed to Bulk Checkout
            </button>

            <!-- Continue Shopping Link -->
            <div class="text-center">
                <span class="text-gray-600 text-sm">or </span>
                <a href="{{ route('home') }}" class="text-blue-600 hover:text-blue-700 text-sm font-medium">
                    Continue Shopping →
                </a>
            </div>
        </div>
    </div>
</div>



