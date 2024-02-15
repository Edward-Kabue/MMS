   <div class="relative bg-white overflow-hidden">
       <div class="max-w-screen-xl mx-auto">
           <div class="relative z-10  bg-white  lg:max-w-2xl lg:w-full " x-data="{ open: false }">
               <svg class="hidden lg:block absolute right-0 inset-y-0 h-full w-48 text-white transform translate-x-1/2"
                   fill="currentColor" viewBox="0 0 100 100" preserveAspectRatio="none">
                   <polygon points="50,0 100,0 50,100 0,100" />
               </svg>

               <div class="relative pt-6 px-4 sm:px-6 lg:px-8">
                   <nav class="relative flex items-center justify-between sm:h-10 lg:justify-start">
                       <div class="flex items-center flex-grow flex-shrink-0 lg:flex-grow-0">
                           <div class="flex items-center justify-between w-full md:w-auto">
                               <a href="{{ route('welcome') }}" class="hover:zoom-1">

                               </a>
                               <div class="-mr-2 flex items-center md:hidden">
                                   <button type="button"
                                       class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500 transition duration-150 ease-in-out"
                                       @click="open = true">
                                       <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                                           <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                               d="M4 6h16M4 12h16M4 18h16" />
                                       </svg>
                                   </button>
                               </div>
                           </div>
                       </div>

                       <div class="hidden md:block md:ml-10 md:pr-4">
                           <a href="{{ route('welcome') }}"
                               class="font-medium text-gray-500 hover:text-gray-900 focus:outline-none focus:text-gray-900 transition duration-150 ease-in-out">
                               {{ config('app.name') }}
                           </a>
                           <a href="#"
                               class="ml-8 font-medium text-gray-500 hover:text-gray-900 focus:outline-none focus:text-gray-900 transition duration-150 ease-in-out">
                               Destinations
                           </a>
                           <a href="{{ route('post.index') }}"
                               class="ml-8 font-medium text-gray-500 hover:text-gray-900 focus:outline-none focus:text-gray-900 transition duration-150 ease-in-out">
                               Blog
                           </a>
                           <a href="{{ route('lead.create') }}"
                               class="ml-8 font-medium text-gray-500 hover:text-gray-900 focus:outline-none focus:text-gray-900 transition duration-150 ease-in-out">
                               Bookings
                           </a>

                           @auth
                               <a href=""
                                   class="ml-8 font-medium text-indigo-600 hover:text-indigo-900 focus:outline-none focus:text-indigo-700 transition duration-150 ease-in-out">
                                   {{ __('Dashboard') }}
                               </a>
                           @else
                               <a href="/admin/login"
                                   class="ml-8 font-medium text-indigo-600 hover:text-indigo-900 focus:outline-none focus:text-indigo-700 transition duration-150 ease-in-out">
                                   {{ __('Login') }}
                               </a>
                           @endauth
                       </div>
                   </nav>
               </div>

               <div x-show="open" @click.away="open = false"
                   class="absolute top-0 inset-x-0 p-2 transition transform origin-top-right md:hidden">
                   <div class="rounded-lg shadow-md">
                       <div class="rounded-lg bg-white shadow-xs overflow-hidden">
                           <div class="px-5 pt-4 flex items-center justify-between">
                               <div>

                               </div>
                               <div class="-mr-2" @click="open = false">
                                   <button type="button"
                                       class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500 transition duration-150 ease-in-out">

                                   </button>
                               </div>
                           </div>

                           <div class="px-2 pt-2 pb-3">
                               <a href=""
                                   class="block px-3 py-2 rounded-md text-base font-medium text-gray-700 hover:text-gray-900 hover:bg-gray-50 focus:outline-none focus:text-gray-900 focus:bg-gray-50 transition duration-150 ease-in-out">
                                   {{ config('app.name') }}
                               </a>
                               <a href="#"
                                   class="mt-1 block px-3 py-2 rounded-md text-base font-medium text-gray-700 hover:text-gray-900 hover:bg-gray-50 focus:outline-none focus:text-gray-900 focus:bg-gray-50 transition duration-150 ease-in-out">
                                   Destinations
                               </a>
                               <a href="{{ route('post.index') }}"
                                   class="mt-1 block px-3 py-2 rounded-md text-base font-medium text-gray-700 hover:text-gray-900 hover:bg-gray-50 focus:outline-none focus:text-gray-900 focus:bg-gray-50 transition duration-150 ease-in-out">
                                   Blog
                               </a>
                               <a href="#"
                                   class="mt-1 block px-3 py-2 rounded-md text-base font-medium text-gray-700 hover:text-gray-900 hover:bg-gray-50 focus:outline-none focus:text-gray-900 focus:bg-gray-50 transition duration-150 ease-in-out">
                                   About
                               </a>
                           </div>

                           <div>
                               @auth
                                   <a href=""
                                       class="block w-full px-5 py-3 text-center font-medium text-indigo-600 bg-gray-50 hover:bg-gray-100 hover:text-indigo-700 focus:outline-none focus:bg-gray-100 focus:text-indigo-700 transition duration-150 ease-in-out">
                                       {{ __('Dashboard') }}
                                   </a>
                               @else
                                   <a href="/admin/login"
                                       class="block w-full px-5 py-3 text-center font-medium text-indigo-600 bg-gray-50 hover:bg-gray-100 hover:text-indigo-700 focus:outline-none focus:bg-gray-100 focus:text-indigo-700 transition duration-150 ease-in-out">
                                       {{ __('Login') }}
                                   </a>
                               @endauth
                           </div>
                       </div>
                   </div>
               </div>


           </div>
       </div>
       <div class="lg:absolute lg:inset-y-0 lg:right-0 lg:w-1/2">
       </div>
   </div>
