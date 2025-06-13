<?php

namespace App\Http\Controllers;

use App\Models\Dishe;
use App\Models\Restaurant;
use App\Models\RestaurantType;
use App\Models\Type;
use App\Models\User;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use function PHPUnit\Framework\returnArgument;

class SettingController extends Controller
{
    public function edit_profil(){
        $user = Auth::user();
        
        $restaurant = Restaurant::select('id', 'name', 'localisation', 'nb_places', 'image')
        ->where('user_id', $user->id)
        ->first();

        if (!$restaurant) {
            return view('settings.edit_profil', [
                'user' => $user
            ]);
        }
        $types = Type::select('name', 'id')->get();

        $restaurantTypes = RestaurantType::all()
        ->where('restaurant_id', $restaurant->id)
        ->all();

        foreach($types as $type){
            foreach($restaurantTypes as $restaurantType){
                $type->checked = 'off';
                if ($type->id == $restaurantType->id){
                    $type->checked = 'on';
                }
            }
        }
        
        return view('settings.edit_profil_restaurant', [
            'user' => $user,
            'restaurant' => $restaurant,
            'types' => $types
        ]);
    }

    public function update_profil(Request $request){
        $user['id'] = Auth::id();
        $user = User::findOrFail($user['id']);
        
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:255',
            'email' => 'required|email|max:225',
            'password' => 'required|max:225',
            'image' => 'required'
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        $user->fill([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password,
            'image' => $request->image,
        ]);

        if($request->restaurant_name && $request->restaurant_localisation && $request->restaurant_nb_places && $request->restaurant_image){
            $validatorRestaurant = Validator::make($request->all(), [
                'restaurant_name' => 'required|max:255',
                'restaurant_localisation' => 'required|max:225',
                'restaurant_nb_places' => 'required|integer|max:225',
                'restaurant_image' => 'required',
                'id' => 'required|max:255'
            ]);

            if ($validatorRestaurant->fails()) {
            return redirect()->back()
                ->withErrors($validatorRestaurant)
                ->withInput();
            }
            $restaurant = Restaurant::findOrFail($request->id);
            // TODO: ne marche plus depuis l'ajout de on off sur la vue
            foreach($request->types as $type){
                $type['value'] = $type['value'] ?? 'off';
                $restaurantTypes = RestaurantType::all()
                    ->where('type_id',$type['id'])
                    ->where('restaurant_id',$restaurant->id)
                    ->all();

                if($type['value'] == 'on' && count($restaurantTypes) == 0){
                    $restaurant_type = New RestaurantType();
                    $restaurant_type->fill([
                        'type_id' => $type['id'],
                        'restaurant_id' => $restaurant->id
                    ]);
                    $restaurant_type->save();
                }
                elseif($type['value'] == 'off' && count($restaurantTypes) >= 1){
                    foreach($restaurantTypes as $restaurantType){
                        $restaurantType->delete();
                    }
                }
            }

            $restaurant->fill([
                'name' => $request->restaurant_name,
                'localisation' => $request->restaurant_localisation,
                'nb_places' => $request->restaurant_nb_places,
                'image' => $request->restaurant_image,
            ]);
            $restaurant->save();
        }
        $user->save();
        return redirect(route('profil'));
    }
    
}
