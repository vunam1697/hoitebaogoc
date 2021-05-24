<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Options;


class SettingController extends Controller
{
    public function getDeveloperConfig()
    {
        $content = Options::where('type', 'dev-config')->first();
    	$content = json_decode(@$content->content);
    	return view('backend.options.developer-config', compact('content'));
    }

    public function postDeveloperConfig(Request $request)
    {
    	$options = Options::where('type', 'dev-config')->first();
		$options->content = !empty($request->content) ? json_encode($request->content) : null;
    	$options->save();
    	flash('Cập nhật thành công.')->success();
    	return back();
    }

    public function getGeneralConfig()
    {
        $content = Options::where('type', 'general')->first();
        $content = json_decode(@$content->content);
        return view('backend.options.general', compact('content'));
    }

    public function postGeneralConfig(Request $request)
    {
        $options = Options::where('type', 'general')->first();
        $options->content = !empty($request->content) ? json_encode($request->content) : null;
        $options->save();
        flash('Cập nhật thành công.')->success();
        return back();
    }

    public function getAboutConfig()
    {
        $content = Options::where('type', 'config-about')->first();
        $content = json_decode(@$content->content);
        return view('backend.options.about', compact('content'));
    }

    public function postAboutConfig(Request $request)
    {
        $options = Options::where('type', 'config-about')->first();
        $options->content = !empty($request->content) ? json_encode($request->content) : null;
        $options->save();
        flash('Cập nhật thành công.')->success();
        return back();
    }

    public function getContactConfig()
    {
        $content = Options::where('type', 'config-contact')->first();
        $content = json_decode(@$content->content);
        return view('backend.options.contact', compact('content'));
    }

    public function postContactConfig(Request $request)
    {
        $options = Options::where('type', 'config-contact')->first();
        $options->content = !empty($request->content) ? json_encode($request->content) : null;
        $options->save();
        flash('Cập nhật thành công.')->success();
        return back();
    }
}
