<?php

namespace App\Http\Services;

use Illuminate\Support\Facades\Session;

class CartService
{
  protected $cartKey = 'shopping_cart';

  public function getCart()
  {
    return Session::get($this->cartKey, []);
  }

  public function addToCart($productId, $quantity = 1, $restaurantId, $productData = [])
  {
    $cart = $this->getCart();


    if (!isset($cart['items'])) {
      $cart = [
        'restaurant_id' => $restaurantId,
        'items' => []
      ];
    }

    if (isset($cart['items'][$productId])) {
      $cart['items'][$productId]['quantity'] += $quantity;
    } else {
      $cart['items'][$productId] = [
        'quantity' => $quantity,
        'data' => $productData
      ];
    }

    Session::put($this->cartKey, $cart);
  }

  public function updateQuantity($productId, $quantity)
  {
    $cart = $this->getCart();

    if (isset($cart['items'][$productId])) {
      $cart['items'][$productId]['quantity'] = $quantity;
      Session::put($this->cartKey, $cart);
    }
  }

  public function removeFromCart($productId)
  {
    $cart = $this->getCart();

    if (isset($cart['items'][$productId])) {
      unset($cart['items'][$productId]);

      // Si plus d'articles, supprimer aussi le restaurant_id
      if (empty($cart['items'])) {
        unset($cart['restaurant_id']);
      }

      Session::put($this->cartKey, $cart);
    }
  }

  public function clearCart()
  {
    Session::forget($this->cartKey);
  }

  public function getTotal()
  {
    $cart = $this->getCart();
    $total = 0;

    if (isset($cart['items'])) {
      foreach ($cart['items'] as $item) {
        $total += $item['data']['price'] * $item['quantity'];
      }
    }

    return $total;
  }

  public function getRestaurantId()
  {
    $cart = $this->getCart();
    return $cart['restaurant_id'] ?? null;
  }

  public function itemCount()
  {
    $cart = $this->getCart();
    return isset($cart['items']) ? count($cart['items']) : 0;
  }
}
