<?php

namespace App\Http\Controllers\Admin;

use App\Models\CategoriesModel;
use App\Models\ProductsModel;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;
use Auth;

class ProductsController extends Controller
{

    public function products_index_page(){
        return view('admin.products.index');
    }

    public function products_add_page(){
        $data['categories'] = CategoriesModel::select('id','name')->get();
        return view('admin.products.add', $data);
    }

    public function products_bestseller_page(){
        return view('admin.products.bestseller');
    }

    public function products_price_page(){
        return view('admin.products.price');
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
            'image.*'             => 'required|image|mimes:jpeg,png,jpg|max:2048',
        ]);;

        if ($validator->fails()){
            return response(['status' => false, 'errors' => $validator->errors()], 400);
        }else {
            if (isset($request->file('image')[0])) {
                $imagePath = $request->file('image')[0];
                $file = $imagePath->getClientOriginalName();
                $imageName = pathinfo($file, PATHINFO_FILENAME) . '-' . time() . '.' . pathinfo($file, PATHINFO_EXTENSION);;
                $path = public_path() . '/products';
                File::isDirectory($path) or File::makeDirectory($path, 0777, true, true);
                $imagePath->storeAs('uploads/products', $imageName, 'public');

                $fields = array(
                    'category_id' => $post['category_id'],
                    'name' => $post['name'],
                    'image' => $imageName,
                    'label' => $post['label'],
                    'description' => $post['description'],
                    'meta_title' => $post['meta_title'],
                    'meta_description' => $post['meta_description'],
                    'page_slug' => strtolower(str_replace(' ', '-', $post['page_slug'])),
                );

                if (isset($post['product_id'])) {
                    $fields['modified_by'] = Auth::user()->id;
                    $status = ProductsModel::where('id', $post['product_id'])->update($fields);
                } else {
                    $fields['created_by'] = Auth::user()->id;
                    $status = ProductsModel::create($fields);
                }

                if ($status)
                    return response(['status' => true, 'message' => 'Product created successfully.']);
                else
                    return response(['status' => false], 500);
            }else return response(['status' => false, 'message' => 'Product image is mandatory']);
        }
    }
}
