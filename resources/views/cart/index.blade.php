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
                <img src="{{ $item['data']['image'] ?? 'https://images.unsplash.com/photo-1546069901-ba9599a7e63c?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=880&q=80' }}" alt="{{ $item['data']['name'] }}" class="w-full h-full object-cover">
              </div>
              <div>
                <h3 class="font-medium">{{ $item['data']['name'] }}</h3>
                <form action="{{ route('cart.remove', $productId) }}" method="POST" class="inline">
                  @csrf
                  @method('DELETE')
                  <button type="submit" class="cursor-pointer text-red-500 text-sm mt-1 flex items-center">
                    <svg xmlns='http://www.w3.org/2000/svg' width='24' height='24' viewBox='0 0 24 24'><title>delete_line</title><g id="delete_line" fill='none'><path d='M24 0v24H0V0zM12.593 23.258l-.011.002-.071.035-.02.004-.014-.004-.071-.035c-.01-.004-.019-.001-.024.005l-.004.01-.017.428.005.02.01.013.104.074.015.004.012-.004.104-.074.012-.016.004-.017-.017-.427c-.002-.01-.009-.017-.017-.018m.265-.113-.013.002-.185.093-.01.01-.003.011.018.43.005.012.008.007.201.093c.012.004.023 0 .029-.008l.004-.014-.034-.614c-.003-.012-.01-.02-.02-.022m-.715.002a.023.023 0 0 0-.027.006l-.006.014-.034.614c0 .012.007.02.017.024l.015-.002.201-.093.01-.008.004-.011.017-.43-.003-.012-.01-.01z'/><path fill='red' d='M20 5a1 1 0 1 1 0 2h-1l-.003.071-.933 13.071A2 2 0 0 1 16.069 22H7.93a2 2 0 0 1-1.995-1.858l-.933-13.07A1.017 1.017 0 0 1 5 7H4a1 1 0 0 1 0-2zm-3.003 2H7.003l.928 13h8.138zM14 2a1 1 0 1 1 0 2h-4a1 1 0 0 1 0-2z'/></g></svg>
                    Supprimer
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
                    <button type="button" class="px-3 py-1 text-gray-600 hover:bg-gray-100 decrement-btn cursor-pointer">
                      <svg xmlns='http://www.w3.org/2000/svg' width='24' height='24' viewBox='0 0 24 24'><title>minimize_line</title><g id="minimize_line" fill='none' fill-rule='evenodd'><path d='M24 0v24H0V0zM12.593 23.258l-.011.002-.071.035-.02.004-.014-.004-.071-.035c-.01-.004-.019-.001-.024.005l-.004.01-.017.428.005.02.01.013.104.074.015.004.012-.004.104-.074.012-.016.004-.017-.017-.427c-.002-.01-.009-.017-.017-.018m.265-.113-.013.002-.185.093-.01.01-.003.011.018.43.005.012.008.007.201.093c.012.004.023 0 .029-.008l.004-.014-.034-.614c-.003-.012-.01-.02-.02-.022m-.715.002a.023.023 0 0 0-.027.006l-.006.014-.034.614c0 .012.007.02.017.024l.015-.002.201-.093.01-.008.004-.011.017-.43-.003-.012-.01-.01z'/><path fill='#09244BFF' d='M3 12a1 1 0 0 1 1-1h16a1 1 0 1 1 0 2H4a1 1 0 0 1-1-1'/></g></svg>
                    </button>
                    <input type="number" name="quantity" value="{{ $item['quantity'] }}" min="1" class="w-12 text-center border-l border-r focus:outline-none quantity-input">
                    <button type="button" class="px-3 py-1 text-gray-600 hover:bg-gray-100 increment-btn cursor-pointer">
                      <svg xmlns='http://www.w3.org/2000/svg' width='24' height='24' viewBox='0 0 24 24'><title>add_line</title><g id="add_line" fill='none'><path d='M24 0v24H0V0zM12.593 23.258l-.011.002-.071.035-.02.004-.014-.004-.071-.035c-.01-.004-.019-.001-.024.005l-.004.01-.017.428.005.02.01.013.104.074.015.004.012-.004.104-.074.012-.016.004-.017-.017-.427c-.002-.01-.009-.017-.017-.018m.265-.113-.013.002-.185.093-.01.01-.003.011.018.43.005.012.008.007.201.093c.012.004.023 0 .029-.008l.004-.014-.034-.614c-.003-.012-.01-.02-.02-.022m-.715.002a.023.023 0 0 0-.027.006l-.006.014-.034.614c0 .012.007.02.017.024l.015-.002.201-.093.01-.008.004-.011.017-.43-.003-.012-.01-.01z'/><path fill='#09244BFF' d='M11 20a1 1 0 1 0 2 0v-7h7a1 1 0 1 0 0-2h-7V4a1 1 0 1 0-2 0v7H4a1 1 0 1 0 0 2h7z'/></g></svg>
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
              <button type="submit" class="text-red-500 hover:text-red-700 flex items-center cursor-pointer">
                <svg xmlns='http://www.w3.org/2000/svg' width='24' height='24' viewBox='0 0 24 24'><title>delete_2_line</title><g id="delete_2_line" fill='none'><path d='M24 0v24H0V0zM12.593 23.258l-.011.002-.071.035-.02.004-.014-.004-.071-.035c-.01-.004-.019-.001-.024.005l-.004.01-.017.428.005.02.01.013.104.074.015.004.012-.004.104-.074.012-.016.004-.017-.017-.427c-.002-.01-.009-.017-.017-.018m.265-.113-.013.002-.185.093-.01.01-.003.011.018.43.005.012.008.007.201.093c.012.004.023 0 .029-.008l.004-.014-.034-.614c-.003-.012-.01-.02-.02-.022m-.715.002a.023.023 0 0 0-.027.006l-.006.014-.034.614c0 .012.007.02.017.024l.015-.002.201-.093.01-.008.004-.011.017-.43-.003-.012-.01-.01z'/><path fill='red' d='M14.28 2a2 2 0 0 1 1.897 1.368L16.72 5H20a1 1 0 1 1 0 2l-.003.071-.867 12.143A3 3 0 0 1 16.138 22H7.862a3 3 0 0 1-2.992-2.786L4.003 7.07A1.01 1.01 0 0 1 4 7a1 1 0 0 1 0-2h3.28l.543-1.632A2 2 0 0 1 9.721 2zm3.717 5H6.003l.862 12.071a1 1 0 0 0 .997.929h8.276a1 1 0 0 0 .997-.929zM10 10a1 1 0 0 1 .993.883L11 11v5a1 1 0 0 1-1.993.117L9 16v-5a1 1 0 0 1 1-1m4 0a1 1 0 0 1 1 1v5a1 1 0 1 1-2 0v-5a1 1 0 0 1 1-1m.28-6H9.72l-.333 1h5.226z'/></g></svg>
                Vider le panier
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
