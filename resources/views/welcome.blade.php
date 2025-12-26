@extends('layouts.app')

@section('content')

    <!-- Main Content -->
    <main id="content">
        <!-- Hero slideshow -->
        <div id="default-carousel" class="relative w-full border" data-carousel="slide">
            <div class="relative h-60 overflow-hidden rounded-base md:h-100">
                <div class="hidden duration-700 ease-in-out" data-carousel-item="active">
                    <img src="{{ asset('assets/img/featured/1.png') }}" class="absolute block w-full  h-full object-cover" alt="...">
                </div>
                <div class="hidden duration-700 ease-in-out" data-carousel-item>
                    <img src="{{ asset('assets/img/featured/2.jpg') }}" class="absolute block w-full h-full object-cover" alt="...">
                </div>
                <div class="hidden duration-700 ease-in-out" data-carousel-item>
                    <img src="{{ asset('assets/img/featured/3.jpg') }}" class="absolute block w-full  h-full object-cover" alt="...">
                </div>
            </div>

            <!-- Slider indicators -->
            <div class="absolute z-30 flex -translate-x-1/2 bottom-5 left-1/2 space-x-3 rtl:space-x-reverse">
                <button type="button" class="w-3 h-3 rounded-base" aria-current="true" aria-label="Slide 1" data-carousel-slide-to="0"></button>
                <button type="button" class="w-3 h-3 rounded-base" aria-current="false" aria-label="Slide 2" data-carousel-slide-to="1"></button>
                <button type="button" class="w-3 h-3 rounded-base" aria-current="false" aria-label="Slide 3" data-carousel-slide-to="2"></button>
            </div>

            <!-- Slider controls -->
            <button type="button" class="absolute top-0 start-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none" data-carousel-prev>
                <span class="inline-flex items-center justify-center w-10 h-10 rounded-base bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
                    <svg class="w-5 h-5 text-white rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24"><path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m15 19-7-7 7-7"/></svg>
                    <span class="sr-only">Previous</span>
                </span>
            </button>
            <button type="button" class="absolute top-0 end-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none" data-carousel-next>
                <span class="inline-flex items-center justify-center w-10 h-10 rounded-base bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
                    <svg class="w-5 h-5 text-white rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24"><path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m9 5 7 7-7 7"/></svg>
                    <span class="sr-only">Next</span>
                </span>
            </button>

        </div>
        <!-- End Hero Slideshow-->

        <!-- Featured section -->
        <div class="max-w-7xl px-4 sm:px-6 lg:px-8 py-12 lg:py-24 mx-auto">
            <div class="mb-6 sm:mb-10 max-w-2xl text-center mx-auto">
                <h1 class="font-medium text-black text-3xl sm:text-4xl dark:text-white">
                End the year in Style & Sizzle
                </h1>
            </div>
        </div>

        <!-- Testimonials -->
        <div class="py-10 md:py-16 lg:py-20 bg-orange-100">
            <div class="px-4 sm:px-6 lg:px-8">

                <div class="grid grid-cols-1 md:grid-cols-2 md:items-center">
                    <div class="relative h-80 md:h-150 bg-gray-100 rounded-2xl dark:bg-neutral-800">
                        <img class="absolute inset-0 size-full object-cover rounded-2xl" src="{{ asset('assets/img/featured/4.jpg') }}" alt="Testimonials Image">
                    </div>

                    <div class="pt-10 md:p-10">
                        <blockquote class="max-w-4xl mx-auto">
                        <p class="mb-6 md:text-lg font-bold">
                        We deliver to over 123 countries and expanding our network everyday
                        </p>

                        <p class="text-xl sm:text-2xl lg:text-3xl lg:leading-normal text-gray-800 dark:text-neutral-200">
                            Browse, find your pick, select your specifications and order. Then sit back and watch Shopper Customer Conveniency System come to play in delivering your good to your doorstep, intact and in style, right at your doorstep
                        </p>

                        <footer class="mt-6 md:mt-10">
                            <div class="border-neutral-700">
                            <button type="button" class="group inline-flex items-center gap-x-3 text-gray-800 dark:text-neutral-200 text-sm focus:outline-hidden disabled:opacity-50 disabled:pointer-events-none">
                                <span class="size-8 md:size-10 flex flex-col justify-center items-center bg-black text-white rounded-full group-hover:scale-105 group-focus:scale-105 transition-transform duration-300 ease-in-out dark:bg-white dark:text-black">
                                <svg class="shrink-0 size-5" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
                                    <path d="m11.596 8.697-6.363 3.692c-.54.313-1.233-.066-1.233-.697V4.308c0-.63.692-1.01 1.233-.696l6.363 3.692a.802.802 0 0 1 0 1.393" />
                                </svg>
                                </span>
                                Hear from our satisfied customers
                            </button>
                            </div>
                        </footer>
                        </blockquote>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Testimonials -->

    <!-- Contact -->
    <div class="max-w-7xl px-4 sm:px-6 lg:px-8 py-12 lg:py-24 mx-auto">
      <div class="mb-6 sm:mb-10 max-w-2xl text-center mx-auto">
        <h2 class="font-medium text-black text-2xl sm:text-4xl dark:text-white">
          Ready to help, whenever!
        </h2>
      </div>

      <div class="grid grid-cols-1 lg:grid-cols-2 lg:items-center gap-6 md:gap-8 lg:gap-12">
        <div class="aspect-w-16 aspect-h-6 lg:aspect-h-14 overflow-hidden bg-gray-100 rounded-2xl dark:bg-neutral-800">
          <img class="group-hover:scale-105 group-focus:scale-105 transition-transform duration-500 ease-in-out object-cover rounded-2xl" src="{{ asset('assets/img/featured/5.jpg')}}" alt="Contacts Image">
        </div>

        <div class="space-y-8 lg:space-y-16">
          <div>
            <h3 class="mb-5 font-semibold text-black dark:text-white">
              Our address
            </h3>

            <div class="grid sm:grid-cols-2 gap-4 sm:gap-6 md:gap-8 lg:gap-12">
              <div class="flex gap-4">
                <svg class="shrink-0 size-5 text-gray-500 dark:text-neutral-500" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                  <path d="M20 10c0 6-8 12-8 12s-8-6-8-12a8 8 0 0 1 16 0Z"></path>
                  <circle cx="12" cy="10" r="3"></circle>
                </svg>

                <div class="grow">
                  <p class="text-sm text-gray-600 dark:text-neutral-400">
                    United Kingdom
                  </p>
                  <address class="mt-1 text-black not-italic dark:text-white">
                    300 Bath Street, Tay House<br>
                    Glasgow G2 4JR
                  </address>
                </div>
              </div>
            </div>
          </div>

          <div>
            <h3 class="mb-5 font-semibold text-black dark:text-white">
              Our contacts
            </h3>

            <div class="grid sm:grid-cols-2 gap-4 sm:gap-6 md:gap-8 lg:gap-12">
              <div class="flex gap-4">
                <svg class="shrink-0 size-5 text-gray-500 dark:text-neutral-500" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                  <path d="M21.2 8.4c.5.38.8.97.8 1.6v10a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V10a2 2 0 0 1 .8-1.6l8-6a2 2 0 0 1 2.4 0l8 6Z"></path>
                  <path d="m22 10-8.97 5.7a1.94 1.94 0 0 1-2.06 0L2 10"></path>
                </svg>

                <div class="grow">
                  <p class="text-sm text-gray-600 dark:text-neutral-400">
                    Email us
                  </p>
                  <p>
                    <a class="relative inline-block font-medium text-black before:absolute before:bottom-0.5 before:start-0 before:-z-1 before:w-full before:h-1 before:bg-yellow-400 hover:before:bg-black focus:outline-hidden focus:before:bg-black dark:text-white dark:hover:before:bg-white dark:focus:before:bg-white" href="mailto:example@site.so">
                      hello@example.so
                    </a>
                  </p>
                </div>
              </div>

              <div class="flex gap-4">
                <svg class="shrink-0 size-5 text-gray-500 dark:text-neutral-500" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                  <path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z" />
                </svg>

                <div class="grow">
                  <p class="text-sm text-gray-600 dark:text-neutral-400">
                    Call us
                  </p>
                  <p>
                    <a class="relative inline-block font-medium text-black before:absolute before:bottom-0.5 before:start-0 before:-z-1 before:w-full before:h-1 before:bg-yellow-400 hover:before:bg-black focus:outline-hidden focus:before:bg-black dark:text-white dark:hover:before:bg-white dark:focus:before:bg-white" href="mailto:example@site.so">
                      +44 222 777-000
                    </a>
                  </p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    </main>
    <!-- End Main Content -->
@endsection
