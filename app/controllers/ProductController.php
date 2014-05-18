<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 5/17/14
 * Time: 5:40 PM
 */

class ProductController extends BaseController {
    public function loadTable() {
        $max = Input::has("max") ? Input::get("max") : "10";
        $offset = Input::has("offset") ? Input::get("offset") : "0";
        $products = Product::all();
        $total = Product::count();
        return View::make("product.tableView", array(
           'products' => $products,
            'total' => $total,
            'max' => $max,
            'offset' => $offset)
        );
    }

    public function create() {
        $id = Input::has("id") ? intval(Input::get("id")) : null;
        $product = null;
        if($id) {
            $product = Product::find($id);
        } else {
            $product = new Product();
        }
        $categories = Category::all();
        return View::make("product.form", array(
            'product' => $product,
            'categories' => $categories
        ));
    }

    public function save() {
        $rules = array(
           'name' => 'required',
           'salePrice' => 'required|numeric',
           'costPrice' => 'required|numeric',
           'category' => 'required|integer'
        );
        $inputs = Input::all();
        $validator = Validator::make($inputs, $rules);
        if($validator->fails()) {
            return array('status' => 'error', 'message' => $validator->messages()->all());
        }
        $product = null;
        if(Input::get('id')) {
            $id = (int)$inputs['id'];
            $product = Product::find($id);
        } else {
            $product = new Product();
        }
        $id = (int) $inputs['category'];
        $category = Category::find($id);
        $product->name = $inputs['name'];
        $product->cost_price = doubleval($inputs['costPrice']);
        $product->sale_price = doubleval($inputs['salePrice']);
        $product->category()->associate($category);
        $product->save();
        return array('status' => 'success', 'message' => 'Product has been saved successfully.');
    }

    public function loadInventoryForm() {
        $id = Input::get("id");
        if(!$id) {
            App::abort(404);
        }
        $product = Product::find(intval($id));
        return View::make("product.inventoryUpdate", array('product' => $product));
    }
}