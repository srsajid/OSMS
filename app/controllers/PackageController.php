<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 5/30/14
 * Time: 4:08 PM
 */

class Package {

    public function loadTable() {
        $max = Input::get("max") ? intval(Input::get("max")): 10;
        $offset = Input::get("offset") ? intval(Input::get("offset")) : 0;
        $searchText = Input::get("searchText") ? Input::get("searchText") : "";
        $products = PackageService::getProducts();
        $total = PackageService::getCounts();
        return View::make("product.tableView", array(
            'products' => $products,
            'total' => $total,
            'max' => $max,
            'offset' => $offset,
            'searchText' => $searchText
        ));
    }

}