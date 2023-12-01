<?php
namespace App\Models;

class Listing {
    public static function all(){
        return [
            [
                'id'=>1,
                'title'=>'listings one',
                'description'=>'Lorem ipsum dolor sit amet consectetur adipisicing elit. Repellendus cum ullam, consequuntur repudiandae sunt facilis voluptatum molestias optio voluptates laborum dolore placeat? Excepturi ipsam voluptates ad quibusdam veniam iste ipsum?'
            ],
            [
                'id'=>2,
                'title'=>'listings two',
                'description'=>'Lorem ipsum dolor sit amet consectetur adipisicing elit. Repellendus cum ullam, consequuntur repudiandae sunt facilis voluptatum molestias optio voluptates laborum dolore placeat? Excepturi ipsam voluptates ad quibusdam veniam iste ipsum?'
            ],

        ];
    }

    public static function find($id){
        $listings = self::all();
        foreach($listings as $listing){
            if($listing['id']==$id){
                return $listing;
            }
        }
    }
}