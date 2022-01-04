<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Log;
use App\Models\WishListModel;

class WishlistController extends Controller
{
    public static function add_to_wishlist($product_info_id){
        try {
            $authUser = \Auth::user();
            // check if product exists
            $productExists = WishListModel::where('product_info_id', $product_info_id)->where('created_by', $authUser->id)->exists();
            if($productExists){
                WishListModel::where('product_info_id', $product_info_id)->where('created_by', $authUser->id)->delete();
                return response()->json(['success' => true, 'message'=> 'product removed from wishlist'], 200);
            }
            // Add product to wishlist
            $newWishlist = new WishListModel();
            $newWishlist->product_info_id = $product_info_id;
            $newWishlist->created_by  = $authUser->id;
            $newWishlist->save();
            return response()->json(['success' => true, 'message'=> 'product added to wishlist'], 200);
        } catch (\Exception $e) {
            Log::critical("Oops!! some error occured while adding product to wishlist");
            Log::critical($e);
        }
    }
}
