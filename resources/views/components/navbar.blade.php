<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Home</title>
  @vite('resources/css/app.css')
</head>
<body>
<nav class="bg-white border-gray-200 dark:bg-gray-900 dark:border-gray-700">
  <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">
    <a href="{{ route('home') }}" class="flex items-center space-x-3 rtl:space-x-reverse">
      <img src="logo" class="h-8" alt="Logo"/>
      <span class="self-center text-2xl font-semibold whitespace-nowrap dark:text-white">Dinee</span>
    </a>
    <button data-collapse-toggle="navbar-dropdown" type="button"
            class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600"
            aria-controls="navbar-dropdown" aria-expanded="false">
      <span class="sr-only">Open main menu</span>
      <svg id="burger-button" class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 17 14">
        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
              d="M1 1h15M1 7h15M1 13h15"/>
      </svg>
    </button>
    <div class="hidden w-full md:block md:w-auto" id="navbar-dropdown">
      <ul
        class="flex flex-col font-medium p-4 md:p-0 mt-4 border border-gray-100 rounded-lg bg-gray-50 md:space-x-8 rtl:space-x-reverse md:flex-row md:mt-0 md:border-0 md:bg-white dark:bg-gray-800 md:dark:bg-gray-900 dark:border-gray-700">
        <li>
          <a href="{{ route('home') }}"
             class="block py-2 px-3 rounded-sm md:p-0 {{ request()->routeIs('home') ? 'text-blue-700 dark:text-blue-500' : 'text-gray-900 hover:text-blue-700 dark:text-white dark:hover:text-blue-500' }}"
            {{ request()->routeIs('home') ? 'aria-current="page"' : '' }}>Home</a>
        </li>
        <li>
          <button id="dropdownNavbarLink" data-dropdown-toggle="dropdownNavbar"
                  class="flex items-center w-full py-2 px-3 rounded-sm hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 md:w-auto dark:hover:bg-gray-700 md:dark:hover:bg-transparent cursor-pointer {{ request()->routeIs('profil') ? 'text-blue-700 dark:text-blue-500' : 'text-gray-900 dark:text-white' }}">
                  @if (Auth::user()->image)
                    <img class="w-5 h-5 rounded-full" src="{{ Auth::user()->image  }}" alt="">
                  @else
                    <svg xmlns='http://www.w3.org/2000/svg' width='24' height='24' viewBox='0 0 24 24'><g id="user_4_line" fill='none' fill-rule='evenodd'><path d='M24 0v24H0V0zM12.594 23.258l-.012.002-.071.035-.02.004-.014-.004-.071-.036c-.01-.003-.019 0-.024.006l-.004.01-.017.428.005.02.01.013.104.074.015.004.012-.004.104-.074.012-.016.004-.017-.017-.427c-.002-.01-.009-.017-.016-.018m.264-.113-.014.002-.184.093-.01.01-.003.011.018.43.005.012.008.008.201.092c.012.004.023 0 .029-.008l.004-.014-.034-.614c-.003-.012-.01-.02-.02-.022m-.715.002a.023.023 0 0 0-.027.006l-.006.014-.034.614c0 .012.007.02.017.024l.015-.002.201-.093.01-.008.003-.011.018-.43-.003-.012-.01-.01z'/><path fill='#09244BFF' d='M12 2c5.523 0 10 4.477 10 10a9.959 9.959 0 0 1-2.258 6.33l.02.022-.132.112A9.978 9.978 0 0 1 12 22c-2.95 0-5.6-1.277-7.43-3.307l-.2-.23-.132-.11.02-.024A9.958 9.958 0 0 1 2 12C2 6.477 6.477 2 12 2m0 15c-1.86 0-3.541.592-4.793 1.406A7.965 7.965 0 0 0 12 20a7.965 7.965 0 0 0 4.793-1.594A8.897 8.897 0 0 0 12 17m0-13a8 8 0 0 0-6.258 12.984C7.363 15.821 9.575 15 12 15s4.637.821 6.258 1.984A8 8 0 0 0 12 4m0 2a4 4 0 1 1 0 8 4 4 0 0 1 0-8m0 2a2 2 0 1 0 0 4 2 2 0 0 0 0-4'/></g></svg>
                  @endif
                  Profil
            <svg class="w-2.5 h-2.5 ms-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                 viewBox="0 0 10 6">
              <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="m1 1 4 4 4-4"/>
            </svg>
          </button>
          <!-- Dropdown menu -->
          <div id="dropdownNavbar"
               class="z-10 font-normal bg-white divide-y divide-gray-100 rounded-lg shadow-sm w-44 dark:bg-gray-700 dark:divide-gray-600 hidden absolute">
            <ul class="py-2 text-sm text-gray-700 dark:text-gray-400" aria-labelledby="dropdownLargeButton">
              <li>
                <a href="{{ route('profil') }}"
                   class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white {{ request()->routeIs('profil') ? 'bg-gray-100 dark:bg-gray-600' : '' }}">Profil</a>
              </li>
            </ul>
            <div class="py-1">
              <a href="{{ route('logout') }}"
                 class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Logout</a>
            </div>
          </div>
        </li>
        <li>
          <a href="{{ route('bookings') }}"
             class="block py-2 px-3 rounded-sm md:p-0 {{ request()->routeIs('bookings') ? 'text-blue-700 dark:text-blue-500' : 'text-gray-900 hover:text-blue-700 dark:text-white dark:hover:text-blue-500' }}"
            {{ request()->routeIs('bookings') ? 'aria-current="page"' : '' }}>Réservations</a>
        </li>
        <li>
          <a href="{{ route('cart.index') }}"
             class="block py-2 px-3 rounded-sm md:p-0 {{ request()->routeIs('cart.index') ? 'text-blue-700 dark:text-blue-500' : 'text-gray-900 hover:text-blue-700 dark:text-white dark:hover:text-blue-500' }}"
            {{ request()->routeIs('cart.index') ? 'aria-current="page"' : '' }}>Panier</a>
        </li>
        <li>
          <a href="{{ route('restaurants') }}"
             class="block py-2 px-3 rounded-sm md:p-0 {{ request()->routeIs('restaurants') ? 'text-blue-700 dark:text-blue-500' : 'text-gray-900 hover:text-blue-700 dark:text-white dark:hover:text-blue-500' }}"
            {{ request()->routeIs('restaurants') ? 'aria-current="page"' : '' }}>Restaurants</a>
        </li>
      </ul>
    </div>
  </div>
</nav>
</body>
</html>
