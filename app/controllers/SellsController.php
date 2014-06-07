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
        return View::make("sells.create");
    }

    public function save() {
    }
}