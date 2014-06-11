<?php
/**
 * Created by PhpStorm.
 * User: Sajid
 * Date: 6/10/14
 * Time: 9:56 PM
 */

class SellsService {
    public static function save($ids, $quantities) {
        if(!Auth::check()) {
            throw new Exception("No user logged in");
        }
        DB::transaction(function() use($ids, $quantities) {
            $user = Auth::user();
            $sells = new Sell();
            $sells->user()->associate($user);
            $sells->save();
            $size = count($ids);
            for($i=0; $i < $size; $i++) {
                $id = (int) $ids[$i];
                $quantity = (int) $quantities[$i];
                $product = Product::find($id);
                $item = new SellItem();
                $item->productId = $product->id;
                $item->productName = $product->name;
                $item->productPrice = $product->sale_price;
                $item->quantity = $quantity;
                $item->sell()->associate($sells);
                $item->save();
                ProductService::updateInventory($quantity * -1, "After sells# $sells->id", $id);
            }
        });
        return true;
    }
} 