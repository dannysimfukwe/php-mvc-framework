<?php
class ProductController extends Controller {

    public function index($params) {
        // $product = new Product;
        // $product->name = "Test Product 3";
        // $product->save();
        $products = Product::all();
        foreach($products as $product) {
            echo "Product " . $product->name;
        }
        //$results = $this->connection::select('select * from products where id = ?', [1]);
        //die(var_dump($products));
    }
}