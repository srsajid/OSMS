<?php
/**
 * Created by PhpStorm.
 * User: USER
 * Date: 5/31/14
 * Time: 6:43 PM
 */

class SellsController extends BaseController {
    public function loadTable() {
        $max = Input::has("max") ? Input::get("max") : "10";
        $offset = Input::has("offset") ? Input::get("offset") : "0";
        return View::make("sells.tableView", array('total' => 10, 'max' => $max, 'offset' => $offset));
    }

    public function create() {
        $packageList = Package::all();
        $packages = array('' => "None");
        foreach($packageList as $pack) {
            $packages[$pack->id] = $pack->name;
        }
        return View::make("sells.create", array('packages' => $packages));
    }

    public function save() {

    }

    public function selection() {
        $packageId = Input::get("package");
        if($packageId) {
            $package = Package::find(intval($packageId));
            return View::make("sells.packSelection", array('pack' => $package));
        }
        $max = Input::get("max") ? intval(Input::get("max")): 10;
        $offset = Input::get("offset") ? intval(Input::get("offset")) : 0;
        $searchText = Input::get("searchText") ? Input::get("searchText") : "";
        $products = ProductService::getProducts();
        $total = ProductService::getCounts();
        return View::make("sells.productsSelection", array(
            'products' => $products,
            'total' => $total,
            'max' => $max,
            'offset' => $offset,
            'searchText' => $searchText
        ));
    }
}