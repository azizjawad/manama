<?php

namespace App\Http\Controllers\Admin;

use App\Models\CategoriesModel;
use App\Models\ProductInfoModel;
use App\Models\ProductsModel;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;
use Auth;

class ProductsController extends Controller
{

    public function products_index_page(){
        $data['products'] = ProductsModel::select('products.*','cat.name as category_name')
            ->join('categories as cat','products.category_id','cat.id')
            ->get();

        return view('admin.products.index',$data);
    }

    public function products_add_page(){
        $data['categories'] = CategoriesModel::select('id','name')->get();
        return view('admin.products.add', $data);
    }

    public function products_edit_page($id){
        $data['categories'] = CategoriesModel::select('id','name')->get();
        $data['product'] = ProductsModel::find($id);
        return view('admin.products.edit', $data);
    }

    public function products_bestseller_page(){
        return view('admin.products.bestsellers');
    }

    public function products_price_page(){
        $data['product_info'] = ProductInfoModel::select('product_info.*','products.name as product_name')->join('products','products.id','product_info.product_id')->get();
        $data['products'] = ProductsModel::select('id','name')->get();
        return view('admin.products.price',$data);
    }

    public function products_gallery_page(){
        return view('admin.products.gallery');
    }

    public function products_visibility_page(){
        return view('admin.products.visibility');
    }

    public function save_product(Request $request){

        $post = $request->post();

        $validator = Validator::make($post, [
            'name'              => ['required','alpha_spaces'],
            'description'       => ['required'],
            'meta_title'        => ['required','alpha_spaces'],
            'meta_description'  => ['required'],
            'page_slug'         => ['required'],
            'image.*'             => 'image|mimes:jpeg,png,jpg|max:2048',
        ]);;

        if ($validator->fails()){
            return response(['status' => false, 'errors' => $validator->errors()], 400);
        }else {

            $fields = array(
                'category_id' => $post['category_id'],
                'name' => $post['name'],
                'label' => $post['label'],
                'description' => $post['description'],
                'meta_title' => $post['meta_title'],
                'meta_description' => $post['meta_description'],
                'page_slug' => strtolower(str_replace(' ', '-', $post['page_slug'])),
            );

            if (isset($request->file('image')[0])) {
                $imagePath = $request->file('image')[0];
                $file = $imagePath->getClientOriginalName();
                $imageName = pathinfo($file, PATHINFO_FILENAME) . '-' . time() . '.' . pathinfo($file, PATHINFO_EXTENSION);;
                $path = public_path() . '/products';
                File::isDirectory($path) or File::makeDirectory($path, 0777, true, true);
                $imagePath->storeAs('uploads/products', $imageName, 'public');
                $fields['image'] = $imageName;
            }

            if (isset($post['product_id'])) {
                $fields['modified_by'] = Auth::user()->id;
                $status = ProductsModel::where('id', $post['product_id'])->update($fields);
            } else {

                if(isset($fields['image']))
                    return response(['status' => false, 'message' => 'Product image is mandatory']);

                $fields['created_by'] = Auth::user()->id;
                $status = ProductsModel::create($fields);
            }

            if ($status)
                return response(['status' => true, 'message' => 'Product created successfully.']);
            else
                return response(['status' => false], 500);
        }
    }

    public function delete_product($id){
        $status = false;
        if(is_numeric($id)) {
            $status = ProductsModel::find($id)->delete();
            return response(['status' => $status], 200);
        }
        return response(['status' => (bool) $status], 404);
    }

    public function save_product_info(Request $request){
        $post = $request->post();

        $validator = Validator::make($post, [
            'product_id'  => ['required'],
            'listing_name'=> ['required'],
            'packaging_weight'=> ['required'],
            'packaging_type'=> ['required'],
            'cost_price'=> ['required'],
            'barcode'=> ['required'],
            'sku_code'=> ['required'],
            'hsn_code'=> ['required'],
        ]);;

        if ($validator->fails()){
            return response(['status' => false, 'errors' => $validator->errors()], 400);
        }else {

            $fields = array(
                'product_id' => $post['product_id'],
                'listing_name' => $post['listing_name'],
                'packaging_weight' => $post['packaging_weight'],
                'packaging_type' => $post['packaging_type'],
                'cost_price' => $post['cost_price'],
                'barcode' => $post['barcode'],
                'sku_code' => $post['sku_code'],
                'hsn_code' => $post['hsn_code'],
                'sell_as_single' => $post['sell_as_single'] ?? 0
            );
            $status = ProductInfoModel::where('product_id', $post['product_id'])->exists();

            if ($status) {
                $fields['modified_by'] = Auth::user()->id;
                $status = ProductInfoModel::where('product_id', $post['product_id'])->update($fields);
            } else {
                $fields['created_by'] = Auth::user()->id;
                $status = ProductInfoModel::create($fields);
            }

            if ($status)
                return response(['status' => true, 'message' => 'Product Info submitted successfully.']);
            else
                return response(['status' => false], 500);
        }
    }
}
