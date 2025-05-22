<!-- resources/views/components/bottom-nav.blade.php -->
<div class="fixed bottom-0 left-0 right-0 bg-dinee shadow-lg z-50">
  <div class="relative flex justify-between items-center px-6 py-6">
    <!-- Home -->
    <a href="{{ route('home') }}" class="flex flex-col items-center text-white">
      <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-black" fill="none" viewBox="0 0 24 24" stroke="currentColor">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 9.5L12 3l9 6.5V21a1 1 0 01-1 1H4a1 1 0 01-1-1V9.5z" />
      </svg>
    </a>

    <!-- Heart -->
    <a href="{{ route('bookings') }}" class="flex flex-col items-center text-white">
      <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-black" fill="none" viewBox="0 0 24 24" stroke="currentColor">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 016.364 0L12 7.636l1.318-1.318a4.5 4.5 0 116.364 6.364L12 21.364 4.318 12.682a4.5 4.5 0 010-6.364z" />
      </svg>
    </a>

    <!-- Central Button -->
    <div class="absolute -top-8 left-1/2 transform -translate-x-1/2 bg-dinee p-2 rounded-full">
      <a href="{{ route('restaurants') }}">
        <button class="bg-white p-2 rounded-full shadow-md border border-gray-300">
          <svg xmlns="http://www.w3.org/2000/svg" class="w-8 h-8 text-black" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 11c.795 0 1.558.316 2.121.879l.379.379.379-.379A3 3 0 1112 11z" />
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 21c4.418 0 8-1.79 8-4v-2H4v2c0 2.21 3.582 4 8 4z" />
          </svg>
        </button>
      </a>
    </div>

    <a href="">

    </a>

    <!-- Cart -->
    <a href="{{ route('cart.index') }}" class="flex flex-col items-center text-white">
      <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-black" fill="none" viewBox="0 0 24 24" stroke="currentColor">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2 5h12l-2-5M9 21h.01M15 21h.01" />
      </svg>
    </a>

    <!-- Profile -->
    <a href="{{ route('profil') }}" class="flex flex-col items-center text-white">
      <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-black" fill="none" viewBox="0 0 24 24" stroke="currentColor">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5.121 17.804A9 9 0 1118.879 6.196a9 9 0 01-13.758 11.608z" />
      </svg>
    </a>
  </div>
</div>
