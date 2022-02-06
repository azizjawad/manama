<?php

namespace App\Http\Controllers;

use App\Models\CategoriesModel;
use App\Models\NewsEventModel;
use App\Models\ProductInfoModel;
use App\Models\ProductsGalleryModel;
use App\Models\ProductsModel;
use App\Models\Reviews;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Log;
use DB;

class ProductController extends Controller
{

    public function index_page()
    {
        return view('website/products');
    }

    public function category_product(Request $request, $category_slug, $product_slug = "", $product_info_id = "")
    {
        $data['category'] = CategoriesModel::where('page_slug','like',"$category_slug")->first();
        if (isset($data['category']->id)) {
            if (empty($product_slug)) {
                $data['meta_title'] = $data['category']->meta_title;
                $data['meta_description'] = $data['category']->meta_description;
                $sortyBy = $request->get('sort_by');
                $data['products'] = self::get_category_products($data['category']->id,'' ,'', $sortyBy);
                $data['sortBy'] = $sortyBy;
                return view('website/category', $data);
            } else {
                $data = array_merge($data, self::get_product($data['category']->id, $product_slug, $product_info_id));
                if (isset($data['product'][0]->meta_title)) {
                    $data['meta_title'] = $data['product'][0]->meta_title;
                    $data['meta_description'] = $data['product'][0]->meta_description;
                    $data['reviews'] = Reviews::where('product_id', $data['product'][0]->id)->where('status',1)->get();
                    return view('website/products', $data);
                }
            }
        }
        return view('errors.404');
    }

    private function get_category_products($category_id, $limit = '', $exclude_id = '', $sortyBy = ''){

        $query = ProductsModel::select(['products.id','products.image as product_image','products.page_slug as product_slug',
            'products.label','products.name as product_name','product_info.id as product_info_id'])
            ->join('product_info','product_info.product_id','products.id')
            ->where('products.category_id',$category_id)
            ->where('products.status',1);

        if (!empty($exclude_id)){
            $query->where('products.id','!=', $exclude_id);
        }
        $query->groupBy('products.id');
        if (!empty($limit)) {
            $query->limit($limit);
        } else if($sortyBy == '') {
            $query->orderBy('product_info.id', 'desc');
        }
        if($sortyBy != '' ){
            if($sortyBy == 'low_to_high'){
                $query->orderBy('product_info.cost_price','ASC');
            }elseif($sortyBy == 'high_to_low'){
                $query->orderBy('product_info.cost_price','DESC');
            }elseif($sortyBy == 'newness'){
                $query->orderBy('product_info.created_at','DESC');
            }
        }
        return $query->paginate(9);
    }

    private function get_product($category_id, $product_slug, $product_info_id): array
    {
        $related_products = [];
        $gallery = [];

        $query = ProductsModel::select(['products.*','product_info.id as product_info_id','products.name as product_name','product_info.packaging_weight',
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

    public function saveReview(Request $request){
        try {
            $post = $request->all();
            $rules = array(
                'rating' => 'required|numeric',
                'comment' => 'required',
            );
            // validator Rules
            $validator = Validator::make($post, $rules);
            if ($validator->fails()){
                return response()->json(['status' => false, 'errors' => $validator->errors()], 200);
            }

            Reviews::create([
                'user_id' => \Auth::id(),
                'product_id' => $post['product_id'],
                'rating' => $post['rating'],
                'comment' => $post['comment'],
            ]);
            return response()->json(['status' => true, 'errors' => false, 'message' => 'Review Submitted Successfully'], 200);
        } catch (\Exception $e) {
            Log::critical("Oops!! some error occured while saving review");
            Log::critical($e);
        }
    }

    public function get_product_details($product_info_id){
        $product = ProductInfoModel::find($product_info_id);
        if ($product->id){
            return response(["status" => true, "data" => $product]);
        }
        return response(["status" => false, "data" => []]);
    }

}
