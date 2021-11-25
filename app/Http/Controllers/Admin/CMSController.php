<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\HomeController;
use App\Models\AdvertisementModel;
use App\Models\HomepageBannersModel;
use App\Models\NewsEventModel;
use App\Models\RecipeModel;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class CMSController extends Controller
{

    public function home_banner_page()
    {
        $data['banners'] = HomepageBannersModel::all();
        return view('admin.cms.home_banner', $data);
    }

    public function save_home_banner_page(Request $request)
    {
        $post = $request->all();
        $rules = array(
            'banner_location' => 'required',
            'image'           => 'required',
            'image.*'         => 'mimes:jpeg,jpg,png,svg|required|max:1920|min:1024',
        );
        // validator Rules
        $validator = Validator::make($post, $rules);

        // Check validation (fail or pass)
        if (!$validator->fails()) {
            if ($request->hasFile('image')) {
                $image = $request->file('image');
                $file_name = time() . '_' . $image->getClientOriginalName();
                $original_name = $image->getClientOriginalName();
                $destinationPath = public_path('/images/homepage');
                if (!file_exists($destinationPath)) {
                    mkdir($destinationPath, 0777, true);
                }
                if ($image->move($destinationPath, $file_name)) {
                    $fields = [
                        "banner_location" => $post['banner_location'],
                        "image_og"        => $original_name,
                        "image_path"      => $file_name
                    ];
                    $hasBanner = HomepageBannersModel::where('banner_location', $post['banner_location'])->exists();
                    $result = ($hasBanner) ? HomepageBannersModel::where('banner_location', $post['banner_location'])->update($fields)
                        : HomepageBannersModel::create($fields);

                    if ($result)
                        return back()->with('success', 'Image Upload successfully');

                }
            }
        }
        return back()->withErrors($validator)->withInput();
    }

    public function advertisement_page()
    {
        $data['result'] = AdvertisementModel::first();
        return view('admin.cms.advertisement', $data);
    }

    public function save_advertisement(Request $request)
    {
        $post = $request->all();
        $rules = array(
            'ads_name'       => 'required|max:250',
            'ads_start_date' => 'required',
            'ads_end_date'   => 'required',
            'ads_image'      => 'required',
            'ads_image.*'    => 'mimes:jpeg,jpg,png,svg|required',
        );
        // validator Rules
        $validator = Validator::make($post, $rules);

        // Check validation (fail or pass)
        if (!$validator->fails()) {
            if ($request->hasFile('ads_image')) {
                $image = $request->file('ads_image');
                $file_name = time() . '_' . $image->getClientOriginalName();
                $destinationPath = public_path('/images/homepage/advertisement');
                if (!file_exists($destinationPath)) {
                    mkdir($destinationPath, 0777, true);
                }
                if ($image->move($destinationPath, $file_name)) {
                    $fields = [
                        "ads_name"   => $post['ads_name'],
                        "end_date"   => date('Y-m-d', strtotime($post['ads_end_date'])),
                        "start_date" => date('Y-m-d', strtotime($post['ads_start_date'])),
                        "ads_image"  => $file_name,
                        "created_by" => auth()->id(),
                    ];
                    $id = AdvertisementModel::pluck('id')->first();
                    $result = (!empty($id))
                        ? AdvertisementModel::where('id', $id)->update($fields)
                        : AdvertisementModel::create($fields);

                    if ($result)
                        return back()->with('success', 'Advertisement Submitted Successfully!!');

                }
            }
        }
        return back()->withErrors($validator)->withInput();
    }

    public function save_recipes(Request $request)
    {
        $post = $request->all();
        $rules = array(
            'rcp_name'             => 'required|max:250',
            'rcp_description'      => 'required',
            'rcp_meta_description' => 'required',
            'rcp_page_slug'        => 'required',
            'youtube_url'          => 'url',
            'rcp_meta_title'       => 'required',
            'rcp_display_img'      => 'required',
            'rcp_homepage_img'     => 'required',
            'rcp_display_img.*'    => 'mimes:jpeg,jpg,png,svg|required|max:600|min:600',
            'rcp_homepage_img.*'   => 'mimes:jpeg,jpg,png,svg|required|max:900|min:600',
        );
        // validator Rules
        $validator = Validator::make($post, $rules);

        // Check validation (fail or pass)
        if (!$validator->fails()) {
            if ($request->hasFile('rcp_display_img')) {
                $image = $request->file('rcp_display_img');
                $display_file_name = time() . '_' . $image->getClientOriginalName();
                $destinationPath = public_path('/images/recipe/display-img');
                if (!file_exists($destinationPath)) {
                    mkdir($destinationPath, 0777, true);
                }
                $image->move($destinationPath, $display_file_name);
            }
            if ($request->hasFile('rcp_homepage_img')) {
                $image = $request->file('rcp_homepage_img');
                $homepage_file_name = time() . '_' . $image->getClientOriginalName();
                $destinationPath = public_path('/images/recipe/homepage');
                if (!file_exists($destinationPath)) {
                    mkdir($destinationPath, 0777, true);
                }
                $image->move($destinationPath, $homepage_file_name);
            }
            $fields = [
                'rcp_name'             => $post['rcp_name'],
                'rcp_description'      => $post['rcp_description'],
                'rcp_meta_description' => $post['rcp_meta_description'],
                'rcp_page_slug'        => $post['rcp_page_slug'],
                'youtube_url'          => $post['youtube_url'],
                'rcp_meta_title'       => $post['rcp_meta_title'],
                'rcp_display_img'      => $display_file_name ?? null,
                'rcp_homepage_img'     => $homepage_file_name ?? null,
                'created_by'           => auth()->id(),
            ];

            if (RecipeModel::create($fields))
                return back()->with('success', 'Recipe Created Successfully!!');

        }
        return back()->withErrors($validator)->withInput();
    }

    public function recipes_page()
    {
        $data['recipes'] = RecipeModel::all();
        return view('admin.cms.recipes', $data);
    }

    public function news_events_page()
    {
        $data['result'] = NewsEventModel::all();
        return view('admin.cms.news_events', $data);
    }
    public function save_news_events(Request $request)
    {
        $post = $request->all();
        $rules = array(
            'event_name'             => 'required|max:250',
            'event_description'      => 'required',
            'event_end_date'         => 'required',
            'event_meta_title'       => 'required',
            'event_youtube_url'      => 'url',
            'event_meta_description' => 'required',
            'event_page_slug'        => 'required',
            'event_image'            => 'required',
            'event_image.*'          => 'mimes:jpeg,jpg,png,svg|required|max:1920|min:1080',
        );
        // validator Rules
        $validator = Validator::make($post, $rules);

        // Check validation (fail or pass)
        if (!$validator->fails()) {
            if ($request->hasFile('event_image')) {
                $image = $request->file('event_image');
                $file_name = time() . '_' . $image->getClientOriginalName();
                $destinationPath = public_path('/images/news-events');
                if (!file_exists($destinationPath)) {
                    mkdir($destinationPath, 0777, true);
                }
                $image->move($destinationPath, $file_name);
            }

            $fields = [
                'event_name'             => $post['event_name'],
                'event_description'      => $post['event_description'],
                'event_end_date'         => date('Y-m-d',strtotime($post['event_end_date'])),
                'event_meta_title'       => $post['event_meta_title'],
                'event_youtube_url'      => $post['event_youtube_url'],
                'event_meta_description' => $post['event_meta_description'],
                'event_page_slug'        => $post['event_page_slug'],
                'event_featured_img'     => $file_name,
                'created_by'             => auth()->id(),
            ];

            if (NewsEventModel::create($fields))
                return back()->with('success', 'Events Created Successfully!!');

        }
        return back()->withErrors($validator)->withInput();
    }
    public function news_events_gallery_page()
    {
        return view('admin.cms.news_events_gallery');
    }

    public function meta_page()
    {
        return view('admin.cms.metas');
    }
}
