<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class productPageController extends Controller
{
    function index()
    {
        return view('frontend.product.productHome');
    }

    function products($catName, $catId)
    {
        $catId = decrypt($catId);
        $products = getProduct($catId, 'category');
        $categories = getCategories($catId, 'all');
        $categoryName = getCategories($catId, 'spe')[0];
        return view('frontend.product.products', compact('products', 'categories', 'categoryName'));
    }

    function vendorProducts($vendorCompany, $vendorId)
    {
        $vendorId = decrypt($vendorId);
        $products = getProduct($vendorId, 'vendor');
        $categories = getCategories($vendorId, 'all');
        $vendorName = getEnterprise($vendorId, 'spe')[0];
        return view('frontend.product.vendorProduct', compact('products', 'categories', 'vendorName'));
    }

    function productItem($product, $id)
    {
        $pId = decrypt($id);
        $products = getProduct($pId, 'spe');
        return view('frontend.product.productItem', compact('products'));
    }

    function productAbout()
    {
        return view('frontend.product.about');
    }

    function productContact()
    {
        return view('frontend.product.contact');
    }

}
