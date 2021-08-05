<?php

namespace App\Http\Controllers\Admin;

use App\Models\CategoriesModel;
use App\Models\ProductsModel;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use \Illuminate\Support\Facades\Validator;
use Auth;

class CategoryController extends Controller
{
    public function category_index_page(){
        $data['categories'] = CategoriesModel::all();
        return view('admin.category.index', $data);
    }

    public function category_add_page(){
        return view('admin.category.add');
    }

    public function category_edit_page($id){
        $data['category'] = CategoriesModel::find($id);
        if(!isset($data['category']))
            return response('404');
        return view('admin.category.edit',$data);
    }

    public function save_category_details(Request $request){
        $post = $request->post();

        $validator = Validator::make($post, [
            'name'              => ['required','alpha_spaces'],
            'description'       => ['required'],
            'meta_title'        => ['required','alpha_spaces'],
            'meta_description'  => ['required'],
            'page_slug'         => ['required'],
        ]);;

        if ($validator->fails()){
            return response(['status' => false, 'errors' => $validator->errors()], 400);
        }else {

            $fields = array(
                'name'              => $post['name'],
                'description'       => $post['description'],
                'meta_title'        => $post['meta_title'],
                'meta_description'  => $post['meta_description'],
                'page_slug'         => strtolower(str_replace(' ','-',$post['page_slug'])),
            );

            if (isset($post['category_id'])) {
                $fields['modified_by'] = Auth::user()->id;
                $message = 'Category details updated successfully.';
                $status = CategoriesModel::where('id', $post['category_id'])->update($fields);
            } else {
                $fields['created_by'] = Auth::user()->id;
                $message = 'Category created successfully.';
                $status = CategoriesModel::create($fields);
            }

            if ($status)
                return response(['status' => true, 'message' => $message]);
            else
                return response(['status' => false], 500);
        }
    }

    public function save_category_image(Request $request){
        $post = $request->post();

        $validator = Validator::make($post, [
            'category'            => ['required'],
            'image.*'             => 'required|image|mimes:jpeg,png,jpg|max:2048',
        ]);;

        if ($validator->fails()){
            return response(['status' => false, 'errors' => $validator->errors()], 400);
        }else {
            if (isset($request->file('image')[0])) {
                $imagePath = $request->file('image')[0];
                $file = $imagePath->getClientOriginalName();
                $imageName = pathinfo($file, PATHINFO_FILENAME) . '-' . time() . '.' . pathinfo($file, PATHINFO_EXTENSION);;
                $path = public_path() . '/categories';
                File::isDirectory($path) or File::makeDirectory($path, 0777, true, true);
                $imagePath->storeAs('uploads/categories', $imageName, 'public');

                $fields = array('image' => $imageName);

                $fields['modified_by'] = Auth::user()->id;
                $status = CategoriesModel::where('id', $post['category'])->update($fields);

                if ($status)
                    return response(['status' => true, 'message' => 'Category image uploaded successfully.']);
                else return response(['status' => false], 500);
            }else return response(['status' => false, 'message' => 'Category image is mandatory']);
        }
    }

    public function delete_category($id){
        $status = false;
        if(is_numeric($id)) {
            $status = CategoriesModel::find($id)->delete();
            return response(['status' => $status], 200);
        }
        return response(['status' => $status], 404);
    }

    public function delete_category_image($id){
        $status = false;
        if(is_numeric($id)) {
            $status = CategoriesModel::find($id)->update(['image' => NULL]);
            return response(['status' => $status], 200);
        }
        return response(['status' => $status], 404);
    }

    public function category_image_page(){
        $data['categories'] = CategoriesModel::all();
        return view('admin.category.image',$data);
    }
}
