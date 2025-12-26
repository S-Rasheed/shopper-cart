@extends('layouts.app')

@section('content')

    <!-- Main Content -->
    <main id="content" class="container mx-auto px-4 max-w-7xl">
        <h1 class="text-3xl font-bold my-8">My Shopping Cart</h1>

        @livewire('cart-items-list')
    </main>
    <!--End Main Content -->
@endsection
