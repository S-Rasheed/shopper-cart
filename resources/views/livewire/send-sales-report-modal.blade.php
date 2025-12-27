<div>
    <button wire:click="openModal" type="button" class="bg-transparent border-2 border-white text-white font-semibold px-6 py-3 rounded-full hover:bg-white hover:text-gray-900 transition">
        Send Sales Report
    </button>

    @if($showModal)
        <div class="fixed inset-0 z-50 overflow-y-auto" role="dialog" aria-modal="true">

            <!-- Overlay -->
            <div
                class="fixed inset-0 z-40" style="background-color: rgba(0,0,0,0.6);"
                wire:click="closeModal">
            </div>

            <!-- Modal container -->
            <div class="flex min-h-screen items-center justify-center px-4">
                <div class="relative z-50 bg-white rounded-lg shadow-xl sm:max-w-lg sm:w-full">

                    <form wire:submit.prevent="sendReport">
                        <div class="px-6 py-5">
                            <h3 class="text-lg font-medium text-gray-900 mb-4">
                                Send Sales Report
                            </h3>

                            <div class="mb-4">
                                <label class="block text-sm font-medium text-gray-700 mb-2">
                                    Email Address
                                </label>
                                <input
                                    type="email"
                                    wire:model="email"
                                    class="w-full border rounded-md px-3 py-2 text-black focus:ring-green-500 focus:border-green-500"
                                >
                                @error('email') <p class="text-red-500 text-sm">{{ $message }}</p> @enderror
                            </div>

                            <div class="mb-4">
                                <label class="block text-sm font-medium text-gray-700 mb-2">
                                    Report Date
                                </label>
                                <input
                                    type="date"
                                    wire:model="reportDate"
                                    class="w-full border rounded-md px-3 py-2 text-black focus:ring-green-500 focus:border-green-500" readonly
                                >
                                @error('reportDate') <p class="text-red-500 text-sm">{{ $message }}</p> @enderror
                            </div>
                        </div>

                        <div class="bg-gray-50 px-6 py-3 flex justify-end gap-3">
                            <button
                                type="button"
                                    wire:click="closeModal"
                                    class="px-4 py-2 bg-red-600 text-white rounded-md hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-1"
                                >
                                Cancel
                            </button>

                            <button
                                type="submit"
                                class="px-4 py-2 bg-green-600 text-white rounded-md"
                                wire:loading.attr="disabled"
                            >
                                <span wire:loading.remove>Send Report</span>
                                <span wire:loading>Sending...</span>
                            </button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    @endif

</div>
