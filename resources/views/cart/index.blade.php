@extends('layouts.app')

@section('content')
  <div class="container mx-auto px-4 py-8">
    <h1 class="text-3xl font-bold mb-6">Votre Panier</h1>

    @if($cart && isset($cart['items']) && count($cart['items']) > 0)
      <div class="bg-white rounded-lg shadow-md overflow-hidden">
        <div class="hidden md:flex bg-gray-50 px-6 py-3 border-b">
          <div class="w-2/5 font-medium">Produit</div>
          <div class="w-1/5 font-medium text-center">Prix</div>
          <div class="w-1/5 font-medium text-center">Quantité</div>
          <div class="w-1/5 font-medium text-center">Total</div>
        </div>

        @foreach($cart['items'] as $productId => $item)
          <div class="flex flex-col md:flex-row p-6 border-b">
            <div class="flex md:w-2/5 items-center mb-4 md:mb-0">
              <div class="w-20 h-20 bg-gray-200 rounded-md overflow-hidden mr-4">
                <img src="{{ asset('storage/' . $item['data']['image']) }}" alt="{{ $item['data']['name'] }}" class="w-full h-full object-cover">
              </div>
              <div>
                <h3 class="font-medium">{{ $item['data']['name'] }}</h3>
                <form action="{{ route('cart.remove', $productId) }}" method="POST" class="inline">
                  @csrf
                  @method('DELETE')
                  <button type="submit" class="text-red-500 text-sm mt-1 flex items-center">
                    <i class="fas fa-trash mr-1"></i> Supprimer
                  </button>
                </form>
              </div>
            </div>

            <div class="flex md:w-3/5">
              <div class="w-1/3 flex items-center justify-center">
                <span class="md:hidden font-medium mr-2">Prix:</span>
                <span>{{ number_format($item['data']['price'], 2) }} €</span>
              </div>

              <div class="w-1/3 flex items-center justify-center">
                <form action="{{ route('cart.update', $productId) }}" method="POST" class="flex items-center">
                  @csrf
                  @method('PATCH')
                  <div class="flex items-center border rounded-md">
                    <button type="button" class="px-3 py-1 text-gray-600 hover:bg-gray-100 decrement-btn">
                      <i class="fas fa-minus"></i>
                    </button>
                    <input type="number" name="quantity" value="{{ $item['quantity'] }}" min="1" class="w-12 text-center border-l border-r focus:outline-none quantity-input">
                    <button type="button" class="px-3 py-1 text-gray-600 hover:bg-gray-100 increment-btn">
                      <i class="fas fa-plus"></i>
                    </button>
                  </div>
                </form>
              </div>

              <div class="w-1/3 flex items-center justify-center">
                <span class="md:hidden font-medium mr-2">Total:</span>
                <span class="font-medium text-blue-600">{{ number_format($item['data']['price'] * $item['quantity'], 2) }} €</span>
              </div>
            </div>
          </div>
        @endforeach

        <div class="p-6 border-t">
          <div class="flex justify-between items-center">
            <form action="{{ route('cart.clear') }}" method="POST">
              @csrf
              @method('POST')
              <button type="submit" class="text-red-500 hover:text-red-700 flex items-center">
                <i class="fas fa-trash mr-2"></i> Vider le panier
              </button>
            </form>

            <div class="text-right">
              <div class="text-xl font-bold mb-2">Total: {{ number_format($total, 2) }} €</div>
              <a href="{{ route('cart.index') }}" class="bg-blue-600 text-white px-6 py-2 rounded-md hover:bg-blue-700 transition font-medium">
                Passer la commande
              </a>
            </div>
          </div>
        </div>
      </div>
    @else
      <div class="bg-white rounded-lg shadow-md p-8 text-center">
        <i class="fas fa-shopping-cart text-5xl text-gray-300 mb-4"></i>
        <h2 class="text-xl font-medium text-gray-700 mb-2">Votre panier est vide</h2>
        <p class="text-gray-500 mb-4">Ajoutez des produits pour commencer vos achats</p>
        <a href="{{ route('restaurants') }}" class="bg-blue-600 text-white px-6 py-2 rounded-md hover:bg-blue-700 transition font-medium inline-block">
          Voir les restaurants
        </a>
      </div>
    @endif
  </div>

  <script>
    document.querySelectorAll('.increment-btn').forEach(button => {
      button.addEventListener('click', function() {
        const input = this.parentNode.querySelector('.quantity-input');
        input.value = parseInt(input.value) + 1;
        input.dispatchEvent(new Event('change'));
      });
    });

    document.querySelectorAll('.decrement-btn').forEach(button => {
      button.addEventListener('click', function() {
        const input = this.parentNode.querySelector('.quantity-input');
        if (parseInt(input.value) > 1) {
          input.value = parseInt(input.value) - 1;
          input.dispatchEvent(new Event('change'));
        }
      });
    });

    document.querySelectorAll('.quantity-input').forEach(input => {
      input.addEventListener('change', function() {
        this.closest('form').submit();
      });
    });
  </script>
@endsection
