<x-layouts.app :title="__('Dashboard')">
     <x-main-nav />
    <div class="flex h-full w-full flex-1 flex-col gap-4 rounded-xl">
        <div class="flex flex-col md:flex-row gap-6 max-w-6xl mx-auto">

             <!-- Left Card -->
            <div class="w-full md:w-96 bg-gradient-to-br from-green-200 to-green-300 rounded-3xl p-8 relative overflow-hidden shadow-xl">
                <div class="absolute bottom-0 right-0 w-64 h-48 opacity-40">
                    <div class="absolute bottom-4 right-12 w-20 h-32 bg-green-700 rounded-t-full"></div>
                    <div class="absolute bottom-0 right-4 w-24 h-28 bg-green-600 rounded-t-full"></div>
                    <div class="absolute bottom-2 right-32 w-16 h-24 bg-green-800 rounded-t-full"></div>
                </div>

                <div class="relative z-10">
                    <h2 class="text-3xl font-bold text-gray-900 mb-6">
                        Today's Sales
                    </h2>

                    <div class="grid grid-cols-2 gap-4 mb-8">
                        <div>
                            <p class="text-sm text-gray-700 font-medium mb-1">In-processing</p>
                            <p class="text-2xl font-bold text-gray-900">{{ $stats['in_processing_orders'] }} Orders</p>
                        </div>
                        <div>
                            <p class="text-sm text-gray-700 font-medium mb-1">Shipped</p>
                            <p class="text-2xl font-bold text-gray-900">{{ $stats['shipped_orders'] }} Orders</p>
                        </div>
                    </div>

                    <a href="#" class="inline-flex items-center text-gray-900 font-semibold hover:text-gray-700 transition">
                        Manage stock counts
                        <svg class="w-4 h-4 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                        </svg>
                    </a>
                </div>
            </div>

            <!-- Right Card -->
            <div class="flex-1 bg-gradient-to-br from-gray-900 to-gray-800 rounded-3xl p-10 relative overflow-hidden shadow-xl">
                <div class="absolute inset-0 opacity-20">
                    <div class="absolute top-0 right-0 w-96 h-96 bg-green-900 rounded-full blur-3xl"></div>
                    <div class="absolute bottom-0 left-0 w-80 h-80 bg-green-800 rounded-full blur-3xl"></div>
                </div>

                <div class="relative z-10">
                    <h2 class="text-4xl font-bold text-green-400 mb-4">
                        Daily Sales Report right in your email
                    </h2>
                    <p class="text-gray-400 mb-8 text-lg">
                        Every evening we keep you updated with important metrics
                    </p>

                    <div class="flex gap-4">
                        <button class="bg-white text-green-600 font-semibold px-6 py-3 rounded-full hover:bg-gray-100 transition">
                            Update email recipient
                        </button>
                        <button class="bg-transparent border-2 border-white text-white font-semibold px-6 py-3 rounded-full hover:bg-white hover:text-gray-900 transition">
                            Top Sellers
                        </button>
                        <livewire:send-sales-report-modal />
                    </div>
                </div>
            </div>



        </div>
        <div class="mt-8">
            <h3 class="text-xl font-bold mb-4">Recent Sales Reports</h3>
            <livewire:sales-reports-table />
        </div>
    </div>
</x-layouts.app>
