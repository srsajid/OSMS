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
        $categories = Category::all();
        $total = Category::count();
        return View::make("sells.tableView", array('categories' => $categories, 'total' => $total, 'max' => $max, 'offset' => $offset));
    }
    public function save()
    {
    }
    public function create()
    {
    }
}