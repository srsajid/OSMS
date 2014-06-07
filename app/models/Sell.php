<?php
/**
 * Created by PhpStorm.
 * User: Sajid
 * Date: 6/7/14
 * Time: 8:02 AM
 */

class Sell extends Eloquent {

    public function items() {
        return $this->hasMany("SellItem");
    }

    public function user() {
        return $this->belongsTo("User");
    }
} 