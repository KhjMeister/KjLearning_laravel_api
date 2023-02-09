<?php

namespace App\Http\Controllers\Home;
use Illuminate\Support\Collection;
use Illuminate\Http\Request;
use App\Http\Controllers\Home\HomeBaseController as BaseController;
use App\Models\Category;
use App\Models\Product;
use Validator;
use App\Http\Resources\Home\CategoryResource;
use App\Http\Resources\Home\ProductResource;


class HomeCategoriesController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    
    public function index()
    {
        $categories = Category::all();
        return $this->sendResponse(CategoryResource::collection($categories), 'Categories retrieved successfully.');
    }
    
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $category = Category::find($id);
        if (is_null($category)) {
            return $this->sendError('category not found.');
        }
        return $this->sendResponse(new CategoryResource($category), 'Category retrieved successfully.');
    }
    public function search($id)
    {
        $products = Product::Where('category_id', '=', $id)->paginate(10);

        if (is_null($products)) {
            return $this->sendError('products not found.');
        }
        return new Collection($products);
        // return $this->sendResponse(new ProductResource($products), 'prdoucts retrieved successfully.');

        
    }
   
}
