<?php

class Package extends Eloquent {
    public function products() {
        return $this->belongsToMany('Product');
    }
}