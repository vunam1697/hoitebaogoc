<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Pages;

class PagesController extends Controller
{
   	public function getListPages()
	{
		$data = Pages::orderBy('created_at', 'ASC')->get();
		return view('backend.pages.list', compact('data'));
	}

	public function postCreatePages(Request $request)
	{
		$page = new Pages;
		$page->name_page = $request->name_page;
		$page->type = $request->type;
		$page->route = $request->route.'_vi';
		$page->lang = 'vi';
		$page->save();

		$page = new Pages;
		$page->name_page = $request->name_page_en;
		$page->type = $request->type;
		$page->route = $request->route.'_en';
		$page->lang = 'en';
		$page->save();
        flash('Thêm thành công !')->success();
		return redirect()->back();
	}

    public function getBuildPages(Request $request)
    {
		$type = $request->page;
		$data = Pages::where('type', $type)->whereLang($request->lang)->firstOrFail();
		$url = explode("/",url('/'));
        $url = $url[0].'//'.$url[2];
        if(view()->exists('backend.pages.layout.'.$type)){
            return view('backend.pages.layout.'.$type, compact('data', 'url'));
		}
    	return view('backend.pages.layout.default', compact('data', 'url'));
    }

    public function postBuildPages(Request $request)
    {
       	$type = $request->type;
		$data = Pages::where('type', $type)->whereLang($request->lang)->firstOrFail();
    	$data->content = !empty($request->content) ? json_encode($request->content) : null;
    	$data->meta_title = $request->meta_title;
    	$data->meta_description = $request->meta_description;
    	$data->meta_keyword = $request->meta_keyword;
    	$data->image = $request->image;
        $data->title_h1 = $request->title_h1;
		$data->banner = $request->banner;
    	$data->save();
        flash('Cập nhật thành công !')->success();
    	return redirect()->back();
    }
}
