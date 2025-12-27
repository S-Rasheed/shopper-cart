<x-layouts.app :title="__('Dashboard')">
    <x-main-nav />
    <div class="flex h-full w-full flex-1 flex-col gap-4 rounded-xl">
        <div class="flex flex-col md:flex-row gap-6 max-w-6xl mx-auto">

            <!-- Left Card -->
            <div class="flex-1 bg-gradient-to-br from-gray-900 to-gray-800 rounded-3xl p-10 relative overflow-hidden shadow-xl">
                <div class="absolute inset-0 opacity-20">
                    <div class="absolute top-0 right-0 w-96 h-96 bg-green-900 rounded-full blur-3xl"></div>
                    <div class="absolute bottom-0 left-0 w-80 h-80 bg-green-800 rounded-full blur-3xl"></div>
                </div>

                <div class="relative z-10">
                    <h2 class="text-4xl font-bold text-green-400 mb-4">
                        Create and sell extraordinary products
                    </h2>
                    <p class="text-gray-400 mb-8 text-lg">
                        The world's first and largest handmade products marketplace
                    </p>

                    <div class="flex gap-4">
                        <button class="bg-white text-green-600 font-semibold px-6 py-3 rounded-full hover:bg-gray-100 transition">
                            Explore More
                        </button>
                        <button class="bg-transparent border-2 border-white text-white font-semibold px-6 py-3 rounded-full hover:bg-white hover:text-gray-900 transition">
                            Top Sellers
                        </button>
                    </div>
                </div>
            </div>

            <!-- Right Card -->
            <div class="w-full md:w-96 bg-gradient-to-br from-green-200 to-green-300 rounded-3xl p-8 relative overflow-hidden shadow-xl">
                <div class="absolute bottom-0 right-0 w-64 h-48 opacity-40">
                    <div class="absolute bottom-4 right-12 w-20 h-32 bg-green-700 rounded-t-full"></div>
                    <div class="absolute bottom-0 right-4 w-24 h-28 bg-green-600 rounded-t-full"></div>
                    <div class="absolute bottom-2 right-32 w-16 h-24 bg-green-800 rounded-t-full"></div>
                </div>

                <div class="relative z-10">
                    <h2 class="text-3xl font-bold text-gray-900 mb-6">
                        My Stats
                    </h2>

                    <div class="grid grid-cols-2 gap-4 mb-8">
                        <div>
                            <p class="text-sm text-gray-700 font-medium mb-1">Today</p>
                            <p class="text-2xl font-bold text-gray-900">{{ $stats['today_orders'] }} Orders</p>
                        </div>
                        <div>
                            <p class="text-sm text-gray-700 font-medium mb-1">This Month</p>
                            <p class="text-2xl font-bold text-gray-900">{{ $stats['month_orders'] }} Orders</p>
                        </div>
                    </div>

                    <a href="#" class="inline-flex items-center text-gray-900 font-semibold hover:text-gray-700 transition">
                        Go to my orders
                        <svg class="w-4 h-4 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                        </svg>
                    </a>
                </div>
            </div>

        </div>
        <div class="relative h-full flex-1 overflow-hidden rounded-xl border border-neutral-200 dark:border-neutral-700">
            <div>
                <div class="relative overflow-hidden bg-white shadow-md dark:bg-gray-800 sm:rounded-lg">
                    <div class="flex flex-col px-4 py-3 space-y-3 lg:flex-row lg:items-center lg:justify-between lg:space-y-0 lg:space-x-4">
                        <div class="flex items-center flex-1 space-x-4">
                            <h5>
                                <span class="text-gray-500">All Products:</span>
                                <span class="dark:text-white">{{ $stats['total_products'] }}</span>
                            </h5>
                            <h5>
                                <span class="text-gray-500">Total Revenue:</span>
                                <span class="dark:text-white">${{ number_format($stats['total_revenue'], 2) }}</span>
                            </h5>
                        </div>
                        <div class="flex flex-col flex-shrink-0 space-y-3 md:flex-row md:items-center lg:justify-end md:space-y-0 md:space-x-3">
                            <button type="button" class="flex items-center justify-center px-4 py-2 text-sm font-medium text-white rounded-lg bg-primary-700 hover:bg-primary-800 focus:ring-4 focus:ring-primary-300 dark:bg-primary-600 dark:hover:bg-primary-700 focus:outline-none dark:focus:ring-primary-800">
                                <svg class="h-3.5 w-3.5 mr-2" fill="currentColor" viewbox="0 0 20 20" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                                    <path clip-rule="evenodd" fill-rule="evenodd" d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z" />
                                </svg>
                                Add new product
                            </button>
                            <button type="button" class="flex items-center justify-center flex-shrink-0 px-3 py-2 text-sm font-medium text-gray-900 bg-white border border-gray-200 rounded-lg focus:outline-none hover:bg-gray-100 hover:text-primary-700 focus:z-10 focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">
                                <svg class="w-4 h-4 mr-2" xmlns="http://www.w3.org/2000/svg" aria-hidden="true" fill="none" viewbox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M16.023 9.348h4.992v-.001M2.985 19.644v-4.992m0 0h4.992m-4.993 0l3.181 3.183a8.25 8.25 0 0013.803-3.7M4.031 9.865a8.25 8.25 0 0113.803-3.7l3.181 3.182m0-4.991v4.99" />
                                </svg>
                                Update stocks 1/250
                            </button>
                            <button type="button" class="flex items-center justify-center flex-shrink-0 px-3 py-2 text-sm font-medium text-gray-900 bg-white border border-gray-200 rounded-lg focus:outline-none hover:bg-gray-100 hover:text-primary-700 focus:z-10 focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">
                                <svg class="w-4 h-4 mr-2" xmlns="http://www.w3.org/2000/svg" fill="none" viewbox="0 0 24 24" stroke-width="2" stroke="currentColor" aria-hidden="true">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M3 16.5v2.25A2.25 2.25 0 005.25 21h13.5A2.25 2.25 0 0021 18.75V16.5m-13.5-9L12 3m0 0l4.5 4.5M12 3v13.5" />
                                </svg>
                                Export
                            </button>
                        </div>
                    </div>
                    <div class="overflow-x-auto">
                        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                <tr>
                                    <th scope="col" class="p-4">
                                        <div class="flex items-center">
                                            <input id="checkbox-all" type="checkbox" class="w-4 h-4 bg-gray-100 border-gray-300 rounded text-primary-600 focus:ring-primary-500 dark:focus:ring-primary-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                            <label for="checkbox-all" class="sr-only">checkbox</label>
                                        </div>
                                    </th>
                                    <th scope="col" class="px-4 py-3">Product</th>
                                    <th scope="col" class="px-4 py-3">Category</th>
                                    <th scope="col" class="px-4 py-3">Stock</th>
                                    <th scope="col" class="px-4 py-3">Sales/Day</th>
                                    <th scope="col" class="px-4 py-3">Sales/Month</th>
                                    <th scope="col" class="px-4 py-3">Rating</th>
                                    <th scope="col" class="px-4 py-3">Sales</th>
                                    <th scope="col" class="px-4 py-3">Revenue</th>
                                    <th scope="col" class="px-4 py-3">Last Update</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($stats['products'] as $product)
                                    <tr class="border-b dark:border-gray-600 hover:bg-gray-100 dark:hover:bg-gray-700">
                                        <td class="w-4 px-4 py-3">
                                            <div class="flex items-center">
                                                <input id="checkbox-table-search-1" type="checkbox" onclick="event.stopPropagation()" class="w-4 h-4 bg-gray-100 border-gray-300 rounded text-primary-600 focus:ring-primary-500 dark:focus:ring-primary-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                                <label for="checkbox-table-search-1" class="sr-only">checkbox</label>
                                            </div>
                                        </td>
                                        <th scope="row" class="flex items-center px-4 py-2 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                            <img src="{{ $product['image'] ?? 'https://via.placeholder.com/50' }}"
                                                alt="{{ $product['name'] }}"
                                                class="w-auto h-8 mr-3 rounded">
                                            {{ $product['name'] }}
                                        </th>
                                        <td class="px-4 py-2">
                                            <span class="bg-blue-100 text-blue-800 text-xs font-medium px-2 py-0.5 rounded">
                                                {{ $product['category'] }}
                                            </span>
                                        </td>
                                        <td class="px-4 py-2 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                            <div class="flex items-center">
                                                @if($product['stock'] > 50)
                                                    <div class="inline-block w-4 h-4 mr-2 bg-green-400 rounded-full"></div>
                                                @elseif($product['stock'] > 20)
                                                    <div class="inline-block w-4 h-4 mr-2 bg-yellow-300 rounded-full"></div>
                                                @else
                                                    <div class="inline-block w-4 h-4 mr-2 bg-red-500 rounded-full"></div>
                                                @endif
                                                {{ $product['stock'] }}
                                            </div>
                                        </td>
                                        <td class="px-4 py-2 font-medium text-gray-900 whitespace-nowrap dark:text-white">{{ $product['sales_today'] }}</td>
                                        <td class="px-4 py-2 font-medium text-gray-900 whitespace-nowrap dark:text-white">{{ $product['sales_month'] }}</td>
                                        <td class="px-4 py-2 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                            <div class="flex items-center">
                                                    @for($i = 0; $i < floor($product['rating']); $i++)
                                                    <svg class="w-5 h-5 text-yellow-400" fill="currentColor" viewBox="0 0 20 20">
                                                        <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                                                    </svg>
                                                @endfor
                                                <span class="ml-1 text-gray-500">{{ number_format($product['rating'], 1) }}</span>
                                            </div>
                                        </td>
                                        <td class="px-4 py-2 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                            <div class="flex items-center">
                                                <svg xmlns="http://www.w3.org/2000/svg" viewbox="0 0 24 24" fill="currentColor" class="w-5 h-5 mr-2 text-gray-400" aria-hidden="true">
                                                    <path d="M2.25 2.25a.75.75 0 000 1.5h1.386c.17 0 .318.114.362.278l2.558 9.592a3.752 3.752 0 00-2.806 3.63c0 .414.336.75.75.75h15.75a.75.75 0 000-1.5H5.378A2.25 2.25 0 017.5 15h11.218a.75.75 0 00.674-.421 60.358 60.358 0 002.96-7.228.75.75 0 00-.525-.965A60.864 60.864 0 005.68 4.509l-.232-.867A1.875 1.875 0 003.636 2.25H2.25zM3.75 20.25a1.5 1.5 0 113 0 1.5 1.5 0 01-3 0zM16.5 20.25a1.5 1.5 0 113 0 1.5 1.5 0 01-3 0z" />
                                                </svg>
                                                {{ number_format($product['total_sales']) }}
                                            </div>
                                        </td>
                                        <td class="px-4 py-2">${{ number_format($product['total_revenue'], 2) }}</td>
                                        <td class="px-4 py-2 font-medium text-gray-900 whitespace-nowrap dark:text-white">{{ $product['last_update']->diffForHumans() }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-layouts.app>
