<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 5/18/14
 * Time: 1:03 PM
 */

class ProductService {
    public static function updateInventory($quantity, $comment, $productId) {
        DB::transaction(function() use ($quantity, $comment, $productId){
            $product = Product::find($productId);
            $product->available_stock = $product->available_stock + $quantity;
            $product->save();
            $user = User::first();
            $history = new InventoryHistory();
            $history->quantity = $quantity;
            $history->comment = $comment;
            $history->product()->associate($product);
            $history->user()->associate($user);
            $history->save();
        });
        return true;
    }
} 