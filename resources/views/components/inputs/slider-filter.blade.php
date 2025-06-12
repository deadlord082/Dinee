@php
  $name = $name ?? 'filtre';
  $id = $id ?? 1;
@endphp

<form action="{{ route('search-restaurants') }}" method="GET">
  <input type="hidden" name="id" value="{{ $id }}">
  <input type="hidden" name="name" value="{{ $name }}">

  <button type="submit" class="w-full text-left">
    <div class="w-60 h-30 rounded text-lg font-semibold relative text-white">
      <div class="absolute inset-0 bg-cover bg-center rounded-xl"
           style="background-image: url('{{ $image ?? 'https://images.unsplash.com/photo-1546069901-ba9599a7e63c?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=880&q=80' }}');">
      </div>
      <div class="absolute inset-0 bg-gradient-to-l from-transparent to-black opacity-70 rounded-xl shadow"></div>
      <div class="relative z-10 p-4 text-shadow">
        {{ $name }}
      </div>
    </div>
  </button>
</form>
