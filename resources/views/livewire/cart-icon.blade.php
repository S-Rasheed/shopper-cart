<a href="{{ route('my-cart') }}"
    type="button"
    class="relative size-9.5 flex justify-center items-center rounded-xl bg-white border border-gray-200 text-black hover:bg-gray-100
           dark:bg-neutral-900 dark:border-neutral-700 dark:text-white"
>
    <span class="sr-only">Cart</span>

    <!-- Cart icon -->
    <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" fill="none"
         viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
        <circle cx="8" cy="21" r="1" />
        <circle cx="19" cy="21" r="1" />
        <path d="M2.05 2.05h2l2.66 12.42a2 2 0 0 0 2 1.58h9.78a2 2 0 0 0 1.95-1.57l1.65-7.43H5.12" />
    </svg>

    @auth
        @if ($count > 0)
            <span
                class="absolute -top-1 -right-1 min-w-[18px] h-[18px] px-1
                       text-xs font-bold text-white bg-red-600
                       rounded-full flex items-center justify-center"
            >
                {{ $count }}
            </span>
        @endif
    @endauth
</a>
