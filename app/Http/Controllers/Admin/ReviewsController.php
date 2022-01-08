<?php

namespace App\Http\Controllers\Admin;

use App\Models\Reviews;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class ReviewsController extends Controller
{

    public function new_reviews_page(){
        $data['reviews'] = Reviews::select(['reviews.*','product_info.listing_name', 'users.name'])->join('product_info','product_info.id','reviews.product_id')
                            ->join('users','reviews.user_id','users.id')
                            ->get();

        return view('admin.reviews.new', $data);
    }

    public function get_review($review_id){
        $data = Reviews::select(['reviews.*','product_info.listing_name', 'users.name','users.email'])->join('product_info','product_info.id','reviews.product_id')
            ->join('users','reviews.user_id','users.id')
            ->where('reviews.id', $review_id)
            ->first();

        if ($data){
            return response(['status' => true, 'data' => $data]);
        }
        return response(['status' => false, 'data' => []]);
    }

    public function moderated_reviews_page(){
        return view('admin.reviews.moderated');
    }

    public function update_review(Request $request){
        $post = $request->post();

        $validator = Validator::make($post, [
            'review_id'  => ['required','numeric'],
            'status'  => ['required']
        ]);

        if (!$validator->fails()){
            Reviews::where('id', $post['review_id'])->update(['status' => $post['status']]);
            return response(array('status' => true));
        }
        return response(array('status' => false));
    }
}
