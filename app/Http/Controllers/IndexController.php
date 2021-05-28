<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pages;
use App\Models\Options;
use DateTime;
use SEO;
use SEOMeta;
use OpenGraph;
use App\Models\Menu;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Lang;
use App\Models\Image;
use JsValidator;
use App\Models\Posts;
use App\Models\Customer;
use App\Models\Contact;
use App\Models\Construction;
use App\Models\Question;
use App\Models\Resources;
use DB;

class IndexController extends Controller
{

	public $config_info;

    public function __construct()
    {
        $site_info = Options::where('type', 'general')->first();
        if ($site_info) {
            $site_info = json_decode($site_info->content);
            $this->config_info = $site_info;

            OpenGraph::setUrl(\URL::current());
            OpenGraph::addProperty('locale', 'vi');
            OpenGraph::addProperty('type', 'article');
            OpenGraph::addProperty('author', 'GCO-GROUP');

            SEOMeta::addKeyword($site_info->site_keyword);

            $menuHeader = Menu::where('id_group', 1)->orderBy('position')->get();
            $menuFooter = Menu::where('id_group', 2)->orderBy('position')->get();
            view()->share(compact('site_info', 'menuHeader', 'menuFooter'));
        }
    }

    public function createSeo($dataSeo = null)
    {
        $site_info = $this->config_info;
        if (!empty($dataSeo->meta_title)) {
            SEO::setTitle($dataSeo->meta_title);
        } else {
            SEO::setTitle($site_info->site_title);
        }
        if (!empty($dataSeo->meta_description)) {
            SEOMeta::setDescription($dataSeo->meta_description);
            OpenGraph::setDescription($dataSeo->meta_description);
        } else {
            SEOMeta::setDescription($site_info->site_description);
            OpenGraph::setDescription($site_info->site_description);
        }
        if (!empty($dataSeo->image)) {
            OpenGraph::addImage($dataSeo->image, ['height' => 400, 'width' => 400]);
        } else {
            OpenGraph::addImage($site_info->logo_share, ['height' => 400, 'width' => 400]);
        }
        if (!empty($dataSeo->meta_keyword)) {
            SEOMeta::addKeyword($dataSeo->meta_keyword);
        }
    }

    public function createSeoPost($data)
    {
        if(!empty($data->meta_title)){
            SEO::setTitle($data->meta_title);
        }else {
            SEO::setTitle($data->name);
        }
        if(!empty($data->meta_description)){
            SEOMeta::setDescription($data->meta_description);
            OpenGraph::setDescription($data->meta_description);
        }else {
            SEOMeta::setDescription($this->config_info->site_description);
            OpenGraph::setDescription($this->config_info->site_description);
        }
        if (!empty($data->image)) {
            OpenGraph::addImage($data->image, ['height' => 400, 'width' => 400]);
        } else {
            OpenGraph::addImage($this->config_info->logo_share, ['height' => 400, 'width' => 400]);
        }
        if (!empty($data->meta_keyword)) {
            SEOMeta::addKeyword($data->meta_keyword);
        }
    }

    public function getChangeLanguage($lang, Request $request)
    {
        session(['lang' => $lang]);

        $route = $request->route;

        $slug = $request->slug;

        if (strpos($route, '_en') !== false) {

            $route_next = str_replace('_en', '_vi', $route);
            
        }else{

            $route_next = str_replace('_vi', '_en', $route);
            
        }
        if (strpos($route, '_en') !== false) {

            $route_next = str_replace('_en', '_vi', $route);
            
        }else{

            $route_next = str_replace('_vi', '_en', $route);
            
        }

        if($slug==''){
            if (!empty($request->search)) {
                return redirect()->route($route_next,['q'=>$request->search]);
            } else {
                return redirect()->route($route_next);
            }
        }else{
            return redirect()->route($route_next,['slug'=>$slug]);
        }
        

        return redirect()->back();
    }

    public function getHomePage() {
        $lang = Lang::locale() == 'en' ? 'en' : 'vi';

        return redirect()->route('home.index_'.$lang);
    }

    public function getHome()
    { 
    	$this->createSeo();
        $slider = Image::where('type', 'slider')->where('status', 1)->orderBy('created_at', 'DESC')->get();
        $contentHome = Pages::where('type', 'home')->whereLang(app()->getLocale())->first();
        $content = json_decode(@$contentHome->content);
        $news = Posts::where(['status' => 1, 'hot' => 1, 'type' => 'blog'])->orderBy('created_at','DESC')->take(5)->get();

    	return view('frontend.pages.home', compact('slider', 'content', 'news'));
    }


    public function getSearch(Request $request)
    {
        $this->createSeo();
        if (app()->getLocale() == 'vi') {
            SEO::setTitle('Tìm kiếm từ khóa: '.$request->q);
        } else {
            SEO::setTitle('Search for keywords: '.$request->q);
        }
        $dataSeo = Pages::where('type', 'news_events')->whereLang(app()->getLocale())->first();
        $q = $request->q;
        $data = Posts::where(function ($query) use ($request) {
            return $query->where('name', 'like', '%' . $request->q . '%')->orWhere('name_en', 'like', '%' . $request->q . '%');
        })->where(['status' => 1, 'type' => 'blog'])->orderBy('created_at', 'DESC')->paginate(5);
        
        return view('frontend.pages.archives-news', compact('dataSeo', 'data', 'q'));
    }

    public function getCells()
    {
        $dataSeo = Pages::where('type', 'stem_cell_association')->whereLang(app()->getLocale())->first();
        $content = json_decode(@$dataSeo->content);
        $this->createSeo($content);
        $data = [];
        return view('frontend.pages.cells', compact('content', 'data', 'dataSeo'));
    }
    
    public function getStemCells()
    {
        $dataSeo = Pages::where('type', 'stem_cells')->whereLang(app()->getLocale())->first();
        $content = json_decode(@$dataSeo->content);
        $this->createSeo($content);
        $data = [];
        return view('frontend.pages.stem_cells', compact('content', 'data', 'dataSeo'));
    }
    
    public function getStemCellsTherapy()
    {
        $dataSeo = Pages::where('type', 'therapy_tbg')->whereLang(app()->getLocale())->first();
        $content = json_decode(@$dataSeo->content);
        $this->createSeo($content);
        $data = [];
        return view('frontend.pages.stem_cells_therapy', compact('content', 'data', 'dataSeo'));
    }

    public function getResearchTrainingStemCells()
    {
        $dataSeo = Pages::where('type', 'research_training_sc')->whereLang(app()->getLocale())->first();
        $content = json_decode(@$dataSeo->content);
        $this->createSeo($content);
        $data = [];
        return view('frontend.pages.research_training_stem_cells', compact('content', 'data', 'dataSeo'));
    }

    public function getMemberResearchWork() {

        $dataSeo = Pages::where('type', 'member_research_work')->whereLang(app()->getLocale())->first();
        $this->createSeo($dataSeo);
        $data = Construction::where('status', 1)->orderBy('created_at','DESC')->paginate(8);

        $news = Posts::where(['status' => 1, 'type' => 'blog'])->orderBy('created_at','DESC')->take(3)->get();
        if (!empty($data)) {
            return view('frontend.pages.construction', compact('data', 'dataSeo', 'news'));
        } else {
            abort(404);
        }
    }

    public function getListNews() {

        $dataSeo = Pages::where('type', 'news_events')->whereLang(app()->getLocale())->first();
        $this->createSeo($dataSeo);
        $data = Posts::where(['status' => 1, 'type' => 'blog'])->orderBy('created_at','DESC')->paginate(4);
        $notification = Posts::where(['status' => 1, 'hot' => 1, 'type' => 'notification'])->orderBy('created_at','DESC')->take(4)->get();
        if (!empty($data)) {
            return view('frontend.pages.archives-news', compact('data', 'dataSeo', 'notification'));
        } else {
            abort(404);
        }
    }

    public function getSingleNews($slug)
    {
        $dataSeo = Pages::where('type', 'news_events')->whereLang(app()->getLocale())->first();
        $data = Posts::where('type', 'blog')->where('status', 1)->where('slug', $slug)->orWhere('slug_en', $slug)->firstOrFail();
        $this->createSeoPost($data);
        $notification = Posts::where('type', 'notification')->where('status', 1)->take(4)->orderBy('created_at', 'DESC')->get();
        
        $post_same = Posts::where('id', '!=', $data->id)->where('type', 'blog')->where('status', 1)->orderBy('created_at', 'DESC')->take(4)->get();
        
        return view('frontend.pages.single-news', compact('dataSeo', 'data', 'post_same', 'notification'));
    }
    
    public function getQuestion() {

        $dataSeo = Pages::where('type', 'question')->whereLang(app()->getLocale())->first();
        $this->createSeo($dataSeo);
        $data = Question::where('status', 1)->orderBy('created_at','DESC')->paginate(10);
        if (!empty($data)) {
            $news = Posts::where(['status' => 1, 'hot' => 1, 'type' => 'blog'])->orderBy('created_at','DESC')->take(5)->get();
            return view('frontend.pages.archives-question', compact('data', 'dataSeo', 'news'));
        } else {
            abort(404);
        }
    }

    public function getSingleQuestion($slug)
    {
        $dataSeo = Pages::where('type', 'question')->whereLang(app()->getLocale())->first();
        $data = Question::where('slug', $slug)->orWhere('slug_en', $slug)->where('status', 1)->firstOrFail();
        $this->createSeoPost($data);
        
        $question_same = Question::where('id', '!=', $data->id)->where('status', 1)->orderBy('created_at', 'DESC')->take(4)->get();
        
        return view('frontend.pages.single-question', compact('dataSeo', 'data', 'question_same'));
    }

    public function getResources() {

        $dataSeo = Pages::where('type', 'resources')->whereLang(app()->getLocale())->first();
        $this->createSeo($dataSeo);
        $data = Resources::where('status', 1)->orderBy('created_at','DESC')->paginate(4);

        $news = Posts::where(['status' => 1, 'type' => 'blog'])->orderBy('created_at','DESC')->paginate(4);
        if (!empty($data)) {
            return view('frontend.pages.archives-resources', compact('data', 'dataSeo', 'news'));
        } else {
            abort(404);
        }
    }

    public function getSingleResources($slug)
    {
        $dataSeo = Pages::where('type', 'resources')->whereLang(app()->getLocale())->first();
        $data = Resources::where('slug', $slug)->orWhere('slug_en', $slug)->where('status', 1)->firstOrFail();
        $this->createSeoPost($data);
        
        $resources_same = Resources::where('id', '!=', $data->id)->where('status', 1)->orderBy('created_at', 'DESC')->take(4)->get();
        
        return view('frontend.pages.single-resources', compact('dataSeo', 'data', 'resources_same'));
    }

    public function getSingleNotification($slug)
    {
        $dataSeo = Pages::where('type', 'news_events')->whereLang(app()->getLocale())->first();
        $data = Posts::where('type', 'notification')->where('status', 1)->where('slug', $slug)->orWhere('slug_en', $slug)->firstOrFail();
        $this->createSeoPost($data);
        
        $notification_same = Posts::where('id', '!=', $data->id)->where('type', 'notification')->where('status', 1)->orderBy('created_at', 'DESC')->take(4)->get();
        
        return view('frontend.pages.single-notification', compact('dataSeo', 'data', 'notification_same'));
    }

    public function getContact()
    {
        $dataSeo = Pages::where('type', 'contact')->whereLang(app()->getLocale())->first();
        $content = json_decode(@$dataSeo->content);
        $this->createSeo($dataSeo);
        $data = [];
        return view('frontend.pages.contact', compact('content', 'dataSeo'));
    }

    public function postContact(Request $request)
    {
        $result = [];
        if ($request->name == '' || $request->name == null) {
            $result['message_name'] = trans('message.ban_chua_nhap_ho_ten');
        }

        if ($request->email == '' || $request->email == null) {
            $result['message_email'] = trans('message.ban_chua_nhap_email');
        } else {
            if (!filter_var($request->email, FILTER_VALIDATE_EMAIL)) {
                $result['message_email'] = trans('message.email_phai_la_mot_dia_chi_email_hop_le');

            }
        }

        if ($request->phone == '' || $request->phone == null) {
            $result['message_phone'] = trans('message.ban_chua_nhap_so_dien_thoai');
        } else {
            if (!is_numeric($request->phone) || strlen($request->phone) != 10) {
                $result['message_phone'] = trans('message.so_dien_thoai_sai');
            }
        }

        if ($request->address == '' || $request->address == null) {
            $result['message_address'] = trans('message.ban_chua_nhap_dia_chi');
        }

        if ($request->topic == '' || $request->topic == null) {
            $result['message_topic'] = trans('message.ban_chua_nhap_chu_de');
        }

        if (empty($request->myfile)) {
            $result['message_myfile'] = trans('message.ban_chua_upload_file');
        } else {
            $myfile = $request->myfile;
            $size = $request->myfile->getClientSize();
            $allowed = [
                'application/vnd.openxmlformats-officedocument.wordprocessingml.document', // docx
                'application/pdf', // pdf
            ];
            $filetype = $myfile->getMimeType();
            if (!in_array($filetype, $allowed)) {
                $result['message_myfile'] = trans('message.khong_dung_dinh_dang');
            } else {
                if($size > 6097152) { 
                    $result['message_myfile'] = trans('message.dung_luong_file_qua_lon');
                }
            }
        }
        
        if (strlen($request->content) > 500) {
            $result['message_content'] = trans('message.noi_dung_khong_duoc_lon_hon_500_ky_tu');
        }

        if ($request->CaptchaCode == '' || $request->CaptchaCode == null) {
            $result['message_captchacode'] = trans('message.ban_chua_nhap_ma_captcha');
        } else {
            $check = captcha_check($request->CaptchaCode);
            if (!$check) {
                $result['message_captchacode'] = trans('message.sai_ma_captcha');
            }
        }


        if($result != []){
            
            return json_encode($result);
        }

        if (!empty($request->myfile)) {
            $file = $request->myfile;
            $file_name = time() . '_' . $file->getClientOriginalName();
            $path = "uploads/files/";
            $file->move($path, $file_name);
        }

        $data = [
            'name' => $request->name,
            'phone' => $request->phone,
            'email' => $request->email,
            'address' => $request->address,
        ];

        if ($request->type == 'contact') {
            $customer = Customer::create($data);
            $contact = new Contact;
            $contact->title = 'Liên hệ từ khách hàng';
            $contact->customer_id = $customer->id;
            $contact->type = $request->type;
            $contact->content = $request->content;
            $contact->topic = $request->topic;
            $contact->file_upload = $path . $file_name;
            $contact->status = 0;
            $contact->save();
    
            $content_email = [
                'title' => 'Liên hệ từ khách hàng',
                'name' => $request->name,
                'phone' => $request->phone,
                'email' => $request->email,
                'address' => $request->address,
                'type' => $request->type,
                'content' => $request->content,
                'link_file' => url('/') . '/' . $path . $file_name,
                'topic' => $request->topic,
                'url' => route('contact.edit', $contact->id),
            ];
            $email_admin = getOptions('general', 'email_admin');
            $mail = getMail();

            Mail::send('frontend.mail.mail-teamplate', $content_email, function ($msg) use($email_admin, $mail) {
                $msg->from($mail, 'Website - HỘI TẾ BÀO GỐC');
                $msg->to($email_admin, 'Website - HỘI TẾ BÀO GỐC')->subject('Khách hàng liên hệ');
            });
        }
        
        $result['success'] = trans('message.thong_bao_thanh_cong');
        $result['notification'] = trans('message.thong_bao');
        $result['captcha'] = captcha_img();

        return json_encode($result);
    }

    public function refreshCaptcha() {
        return response()->json(['captcha'=> captcha_img()]);
    }

}
