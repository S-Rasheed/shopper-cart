@extends('layouts.app')

@section('content')

    <!-- Main Content -->
    <main id="content" class="container mx-auto px-4 max-w-7xl">
        <h1 class="text-3xl font-bold my-8">My Shopping Cart</h1>

        <!-- Floating notifications -->
        <div x-data="{ show: false, message: '' }" x-on:checkout-processed.window="message = $event.detail.message; show = true; setTimeout(() => show = false, 8000)" x-show="show"
        class="fixed bottom-4 left-1/2 -translate-x-1/2 bg-black text-white px-6 py-3 rounded-lg shadow-lg z-50"
        >
            <span x-text="message"></span>
        </div>

        @livewire('cart-items-list')
    </main>
    <!--End Main Content -->
@endsection
