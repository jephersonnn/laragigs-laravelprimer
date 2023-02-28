<?php 

namespace App\Models;

class Listing {
    public static function all(){
        return [
            [
                'id' => 1,
                'title' => 'First List',
                'desc' => 'Escucha las palabras de las brujas'
            ],
            [ 
                'id' => 2,
                'title' => 'Second List',
                'desc' => 'Los secretos escondido en la noche'
            ],
            [ 
                'id' => 3,
                'title' => 'Third Chismis',
                'desc' => 'Open your heart and add to cart'
            ]
            ];
    }

    public static function find($id) {
        $listings = self::all();

        foreach($listings as $listing){
            if($listing['id'] == $id) {
                return $listing;
            }
        }
    }
}