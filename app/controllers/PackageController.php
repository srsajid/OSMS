<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 5/30/14
 * Time: 4:08 PM
 */

class PackageController extends BaseController{

    public function loadTable() {
        $max = Input::get("max") ? intval(Input::get("max")): 10;
        $offset = Input::get("offset") ? intval(Input::get("offset")) : 0;
        $searchText = Input::get("searchText") ? Input::get("searchText") : "";
        $packages = PackageService::getPackages();
        $total = PackageService::getCounts();
        return View::make("package.tableView", array(
            'packages' => $packages,
            'total' => $total,
            'max' => $max,
            'offset' => $offset,
            'searchText' => $searchText
        ));
    }

}