<?php

class ProductsController extends BaseController {

    public function index()
    {

        $products = Product::all();

        return View::make('products.index', compact('products'));

    }

    public function create()
    {
        return View::make('products.create');

    }


    public function show($id)
    {

        $product = Product::findorfail($id);

        return View::make('products.show', compact('product'));

    }


}