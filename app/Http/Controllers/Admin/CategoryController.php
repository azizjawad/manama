<?php

namespace App\Http\Controllers\Admin;

use App\Models\CategoriesModel;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
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
                $status = CategoriesModel::where('id', $post['category_id'])->update($fields);
            } else {
                $fields['created_by'] = Auth::user()->id;
                $status = CategoriesModel::create($fields);
            }

            if ($status)
                return response(['status' => true, 'message' => 'Categories created successfully.']);
            else
                return response(['status' => false], 500);
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

    public function category_image_page(){
        $data['categories'] = CategoriesModel::all();
        return view('admin.category.image',$data);
    }
}
