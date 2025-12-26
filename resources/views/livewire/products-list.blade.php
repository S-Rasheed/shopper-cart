<div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8 lg:gap-12">
    @foreach($products as $product)
        <div class="group flex flex-col">
            <div class="relative">
                <div class="aspect-4/4 overflow-hidden rounded-2xl">
                    <img class="size-full object-cover rounded-2xl" src="{{ $product->image }}" alt="Product Image">
                </div>

                <div class="pt-4">
                    <h3 class="font-medium md:text-lg text-black dark:text-white">
                        {{ $product->name }}
                    </h3>

                    <p class="mt-2 font-bold text-orange-500">
                        ${{ $product->price }}
                    </p>
                </div>

                <a class="after:absolute after:inset-0 after:z-1" href="#"></a>
            </div>

            <div class="mb-2 mt-4 text-sm">
                <div class="flex flex-col">
                    <div class="py-3 border-t border-gray-200 dark:border-neutral-700">
                        <div>
                           {{ $product->description }}
                        </div>
                    </div>

                    <div class="py-3 border-t border-gray-200 dark:border-neutral-700">
                        <div class="grid grid-cols-2 gap-2">
                        <div>
                            <span class="font-medium text-black dark:text-white">In Stock:</span>
                        </div>

                        <div class="flex justify-end">
                            <span class="text-orange-500 dark:text-warning font-semibold">{{ $product->stock_quantity }}</span>
                        </div>
                        </div>
                    </div>

                </div>
            </div>

            <button wire:click="addToCart({{ $product->id }})" class="mt-auto py-2 px-3 w-full inline-flex justify-center items-center gap-x-2 text-sm font-medium text-nowrap rounded-xl border border-transparent bg-yellow-400 text-black hover:bg-yellow-500 focus:outline-hidden focus:bg-yellow-500 transition disabled:opacity-50 disabled:pointer-events-none" href="#">
                Add to Cart
            </button>
        </div>
    @endforeach
</div>
