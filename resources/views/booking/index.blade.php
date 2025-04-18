<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
    </head>
    <body>
    @extends('layouts.app')

    @section('title', 'Booking')

    @section('content')
        <div class="container mx-auto px-4 py-8">
          <h1 class="text-3xl font-bold text-gray-800 mb-8">Votre Panier</h1>

          <div class="flex flex-col lg:flex-row gap-8">
            <!-- Liste des articles -->
            <div class="lg:w-2/3">
              <div class="bg-white rounded-lg shadow-md overflow-hidden">
                <!-- En-tête -->
                <div class="hidden md:flex bg-gray-50 px-6 py-3 border-b">
                  <div class="w-2/5 font-medium text-gray-600">Produit</div>
                  <div class="w-1/5 font-medium text-gray-600 text-center">Prix</div>
                  <div class="w-1/5 font-medium text-gray-600 text-center">Quantité</div>
                  <div class="w-1/5 font-medium text-gray-600 text-center">Total</div>
                </div>

                @foreach($bookings as $booking)
                  <!-- Article 1 -->
                  <div class="flex flex-col md:flex-row p-6 border-b">
                    <div class="flex md:w-2/5 items-center mb-4 md:mb-0">
                      <div class="w-20 h-20 bg-gray-200 rounded-md overflow-hidden mr-4">
                        <img src="https://via.placeholder.com/80" alt="Produit" class="w-full h-full object-cover">
                      </div>
                      <div>
                        <h3 class="font-medium text-gray-800">{{ $booking->restaurant_name }}</h3>
                        <p class="text-gray-500 text-sm">{{ $booking->dishe_name }}</p>
                        <button class="text-red-500 text-sm mt-1 flex items-center">
                          <i class="fas fa-trash mr-1"></i> Supprimer
                        </button>
                      </div>
                    </div>

                    <div class="flex md:w-3/5">
                      <div class="w-1/3 flex items-center justify-center">
                        <span class="md:hidden font-medium text-gray-600 mr-2">Prix:</span>
                        <span class="font-medium">19,99 €</span>
                      </div>

                      <div class="w-1/3 flex items-center justify-center">
                        <div class="flex items-center border rounded-md">
                          <button class="px-3 py-1 text-gray-600 hover:bg-gray-100">
                            <i class="fas fa-minus"></i>
                          </button>
                          <input type="text" value="1" class="w-12 text-center border-l border-r focus:outline-none">
                          <button class="px-3 py-1 text-gray-600 hover:bg-gray-100">
                            <i class="fas fa-plus"></i>
                          </button>
                        </div>
                      </div>

                      <div class="w-1/3 flex items-center justify-center">
                        <span class="md:hidden font-medium text-gray-600 mr-2">Total:</span>
                        <span class="font-medium text-blue-600">19,99 €</span>
                      </div>
                    </div>
                  </div>
                @endforeach

                <!-- Code promo -->
                <div class="p-6">
                  <div class="flex">
                    <input type="text" placeholder="Code promo" class="flex-grow px-4 py-2 border rounded-l-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                    <button class="bg-blue-600 text-white px-4 py-2 rounded-r-md hover:bg-blue-700 transition">Appliquer</button>
                  </div>
                </div>
              </div>
            </div>

            <!-- Récapitulatif -->
            <div class="lg:w-1/3">
              <div class="bg-white rounded-lg shadow-md p-6 sticky top-4">
                <h2 class="text-xl font-bold text-gray-800 mb-4">Récapitulatif</h2>

                <div class="space-y-3 mb-6">
                  <div class="flex justify-between">
                    <span class="text-gray-600">Sous-total</span>
                    <span class="font-medium">39,98 €</span>
                  </div>
                  <div class="flex justify-between">
                    <span class="text-gray-600">Livraison</span>
                    <span class="font-medium">4,99 €</span>
                  </div>
                  <div class="flex justify-between">
                    <span class="text-gray-600">Réduction</span>
                    <span class="text-green-600">-5,00 €</span>
                  </div>

                  <div class="border-t pt-3 mt-3">
                    <div class="flex justify-between font-bold text-lg">
                      <span>Total</span>
                      <span class="text-blue-600">39,97 €</span>
                    </div>
                  </div>
                </div>

                <button class="w-full bg-blue-600 text-white py-3 rounded-md hover:bg-blue-700 transition font-medium">
                  Passer la commande
                </button>

                <div class="mt-4 text-center text-sm text-gray-500">
                  <p>Livraison estimée pour le 15 juin 2023</p>
                  <p class="mt-1">Paiement sécurisé</p>
                </div>
              </div>
            </div>
          </div>
        </div>
    @endsection
    </body>
</html>
