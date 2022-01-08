<?php

namespace App\Http\Controllers;

use App\Models\HomepageBannersModel;
use App\Models\ProductsModel;
use App\Models\RecipeModel;
use Illuminate\Http\Request;
use DB;

class WebsiteController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
//    public function __construct()
//    {
//    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $this->middleware('auth');

        return view('home');
    }

    public function homepage(){
        $data['banners'] = HomepageBannersModel::orderBy('banner_location')->get();
        $data['new_products'] = $this->get_label_wise_products(1);
        $data['featured_products'] = $this->get_label_wise_products(2);
        return view('welcome', $data);
    }


    private function get_label_wise_products($label){
        return DB::table("products")->select(['products.*','categories.page_slug as category_slug','product_info.id as product_info_id','product_info.listing_name as product_name','product_info.packaging_weight',
            'product_info.packaging_type','product_info.cost_price','product_info.sku_code','product_info.barcode','is_in_stock'])
            ->join('product_info','products.id','product_info.product_id')
            ->join('categories','categories.id','products.category_id')
            ->where('products.status',1)
            ->where('products.label',$label)
            ->groupBy('products.id')
            ->limit(3)
            ->get();
    }

    public function recipe_corner(){
        $data['recipes'] = RecipeModel::all();
        return view('website.recipe_corner', $data);
    }

    public function get_recipe($recipe_id){
        return response(['status' => true, 'data' => RecipeModel::find($recipe_id)]);
    }

    public function about_us(){
        return view('website.about_us');
    }

    public function contact_us(){
        return view('website.contact_us');
    }

    public function customer_testimonials(){
        return view('website.customer_testimonials');
    }

    public function our_distributors(){
        return view('website.our_distributors');
    }

    public function tips_techniques(){
        return view('website.tips_techniques');
    }

    public function tips_techniques_single(){
        return view('website.tips_techniques_single');
    }

    public function payment_fail(){
        return view('website.payment_fail');
    }

    public function support_center(){
        return view('website.account.support-center');
    }

    public function shipping_policy(){
        return view('website.shipping-policy');
    }

    public function terms_and_conditions(){
        return view('website.terms-and-conditions');
    }

    public function download_brochure(){
        return view('website.download-brochure');
    }

    public function privacy_policy(){
        return view('website.privacy-policy');

    }

    public function return_refund_policy(){
        return view('website.return_refund_policy');

    }
    public function payu_payments(){

        // Merchant key here as provided by Payu
        $MERCHANT_KEY = "jFqU9mn5";

        // Merchant Salt as provided by Payu
        $SALT = "zxDxPv6Bdq";

        $txnid = substr(hash('sha256', mt_rand() . microtime()), 0, 20);

        $url = "https://test.payu.in/_payment";
        $req = curl_init($url);
        curl_setopt($req, CURLOPT_URL, $url);
        curl_setopt($req, CURLOPT_POST, true);
        curl_setopt($req, CURLOPT_RETURNTRANSFER, true);
        $headers = array( "Content-Type: application/x-www-form-urlencoded", );
        curl_setopt($req, CURLOPT_HTTPHEADER, $headers);

        $data = array (
            'key' => $MERCHANT_KEY,
            'txnid' => $txnid,
            'amount' => '10.00',
            'productinfo' => 'iPhone',
            'firstname' => 'PayU User',
            'email' => 'test@gmail.com',
            'phone' => '9876543210',
            'pg' => '',
            'bankcode' => '',
            'surl' => 'https://apiplayground-response.herokuapp.com/',
            'furl' => 'https://apiplayground-response.herokuapp.com/',
            'ccnum' => '',
            'ccexpmon' => '',
            'ccexpyr' => '',
            'ccvv' => '',
            'ccname' => '',
            'txn_s2s_flow' => '',
        );
        $hashSequence = "key|txnid|amount|productinfo|firstname|email|udf1|udf2|udf3|udf4|udf5|udf6|udf7|udf8|udf9|udf10";

        $hashVarsSeq = explode('|', $hashSequence);
        $hash_string = '';
        foreach($hashVarsSeq as $hash_var) {
            $hash_string .= isset($data[$hash_var]) ? $data[$hash_var] : '';
            $hash_string .= '|';
        }

        $hash_string .= $SALT;
        $data['hash'] = hash("sha512", $hash_string);;
        curl_setopt($req, CURLOPT_POSTFIELDS, http_build_query($data));
        $resp = curl_exec($req);
        curl_close($req);
        echo $resp;
    }
}
