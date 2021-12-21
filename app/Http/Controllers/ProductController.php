<?php

namespace App\Http\Controllers;

use App\Models\CategoriesModel;
use App\Models\NewsEventModel;
use App\Models\ProductsGalleryModel;
use App\Models\ProductsModel;
use Illuminate\Http\Request;

class ProductController extends Controller
{

    public function index_page()
    {
        return view('website/products');
    }

    public function category_product($category_slug, $product_slug = "", $product_info_id = "")
    {
        $data['category'] = CategoriesModel::where('page_slug','like',"$category_slug")->first();
        if (isset($data['category']->id)) {
            if (empty($product_slug)) {
                $data['meta_title'] = $data['category']->meta_title;
                $data['meta_description'] = $data['category']->meta_description;
                $data['products'] = self::get_category_products($data['category']->id);
                return view('website/category', $data);
            } else {
                $data = array_merge($data, self::get_product($data['category']->id, $product_slug, $product_info_id));
                if (isset($data['product'][0]->meta_title)) {
                    $data['meta_title'] = $data['product'][0]->meta_title;
                    $data['meta_description'] = $data['product'][0]->meta_description;
                    return view('website/products', $data);
                }
            }
        }
        return view('errors.404');
    }

    private function get_category_products($category_id, $limit = '', $exclude_id = ''){

        $query = ProductsModel::select(['products.image as product_image','products.page_slug as product_slug',
            'products.label','product_info.listing_name as product_name','product_info.packaging_weight','product_info.id as product_info_id','is_in_stock',
            'product_info.packaging_type','product_info.cost_price'])
            ->join('product_info','product_info.product_id','products.id')
            ->where('products.category_id',$category_id)
            ->where('products.status',1);

        if (!empty($exclude_id)){
            $query->where('products.id','!=', $exclude_id);
        }
        if (!empty($limit)) {
            $query->limit($limit);
        } else {
            $query->orderBy('product_info.id', 'desc');
        }
        return $query->get();
    }

    private function get_product($category_id, $product_slug, $product_info_id): array
    {
        $related_products = [];
        $gallery = [];

        $query = ProductsModel::select(['products.*','product_info.id as product_info_id','product_info.listing_name as product_name','product_info.packaging_weight',
            'product_info.packaging_type','product_info.cost_price','product_info.sku_code','product_info.barcode','is_in_stock'])
            ->join('product_info','product_info.product_id','products.id')
            ->where('products.category_id',$category_id)
            ->where('products.page_slug','like',"$product_slug")
            ->where('products.status',1);
        if (!empty($product_info_id)) {
            $query->orderByRaw("FIELD(product_info.id , $product_info_id) DESC");
        }
        $products = $query->get();
        if (isset($products[0]->id)) {
            $related_products = self::get_category_products($category_id, 4, $products[0]->id);
            $gallery = ProductsGalleryModel::select('image_label', 'image_path')->where('product_id', $products[0]->id)->get();
        }

        return ['product' => $products, 'gallery' => $gallery, 'related_products' => $related_products];
    }

}
