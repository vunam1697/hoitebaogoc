<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Posts;
use DataTables;
use File, DB;

class PostController extends Controller
{

    private $type = 'blog';
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
         if ($request->ajax()) {
            $list_post = Posts::where('type', $request->type)->orderBy('created_at', 'DESC')->get();
            return Datatables::of($list_post)
                ->addColumn('checkbox', function ($data) {
                    return '<input type="checkbox" name="chkItem[]" value="' . $data->id . '">';
                })->addColumn('image', function ($data) {
                    return '<img src="' . $data->image . '" class="img-thumbnail" width="50px" height="50px">';
                })->addColumn('author', function ($data) {
                    return $data->Author->name;
                })->addColumn('name', function ($data) {
                    if ($data->type == 'blog') {
                        return $data->name . ' <br><a href="' . asset('vi/tin-tuc/' . $data->slug) . '" target="_black">
                        <i class="fa fa-hand-o-right" aria-hidden="true"></i> Link: 
                        ' . asset('vi/tin-tuc/' . $data->slug) . '
                      </a>';
                    }
                })->addColumn('name_en', function ($data) {
                    if ($data->type == 'blog') {
                        return $data->name_en . ' <br><a href="' . asset('en/news/' . $data->slug_en) . '" target="_black">
                        <i class="fa fa-hand-o-right" aria-hidden="true"></i> Link: 
                        ' . asset('en/news/' . $data->slug_en) . '
                      </a>';
                    }
                })->addColumn('status', function ($data) {
                    if ($data->status == 1) {
                        $status = ' <span class="label label-success">Hiển thị</span>';
                    } else {
                        $status = ' <span class="label label-danger">Không hiển thị</span>';
                    }
                    if ($data->hot) {
                        $status = $status . ' <span class="label label-success">Nổi bật</span>';
                    }
                    return $status;
                })->addColumn('action', function ($data) {
                    return '<a href="' . route('posts.edit', ['id' => $data->id, 'type' => $data->type]) . '" title="Sửa">
                            <i class="fa fa-pencil fa-fw"></i> Sửa
                        </a> &nbsp; &nbsp; &nbsp;
                            <a href="javascript:;" class="btn-destroy" 
                            data-href="' . route('posts.destroy', $data->id) . '"
                            data-toggle="modal" data-target="#confim">
                            <i class="fa fa-trash-o fa-fw"></i> Xóa</a>
                        ';
                })->rawColumns(['checkbox', 'image', 'status', 'action', 'name', 'author', 'name_en'])
                ->addIndexColumn()
                ->make(true);
        }
        return view('backend.posts.list');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.posts.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,
            [
                'name'  => 'required',
                'name_en'  => 'required',
                'image' => 'required',
                'type'  => 'required',
            ],
            [
                'name'   => 'Bạn chưa nhập tên bài viết tiếng việt',
                'name_en'   => 'Bạn chưa nhập tên bài viết tiếng anh',
                'image.required' => 'Bạn chưa chọn ảnh',
                'type'           => 'Sai định dạng.',
            ]
        );

        $data = $request->all();
        $data['slug'] =  $this->createSlug(str_slug($request->name));
        $data['slug_en'] =  $this->createSlug(str_slug($request->name_en));
        $data['status'] =  $request->status == 1 ? 1 : null;
        $data['hot'] =  $request->hot == 1 ? 1 : null;
        $data['user_id'] =  \Auth::user()->id;

        $post = Posts::create($data);

        flash('Thêm mới thành công.')->success();
        return redirect()->route('posts.index', ['type' => $request->type]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Posts::findOrFail($id);
        return view('backend.posts.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
         $this->validate($request,
            [
                'name' => 'required',
                'name_en'  => 'required',
                'image' => 'required',
                'type'  => 'required',
               
            ],
            [
                'name.required' => 'Bạn chưa nhập tên bài viết tiếng việt',
                'name_en.required'   => 'Bạn chưa nhập tên bài viết tiếng anh',
                'image.required' => 'Bạn chưa chọn ảnh',
                'type'           => 'Sai định dạng.',
            ]
        );

        $data = $request->all();
        $data['status'] =  $request->status == 1 ? 1 : null;
        $data['hot'] =  $request->hot == 1 ? 1 : null;
        
        $post = Posts::findOrFail($id)->update($data);

        
        flash('Cập nhật thành công.')->success();
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Posts::destroy($id);
        flash('Xóa thành công.')->success();
        return redirect()->back();
    }

    public function deleteMuti(Request $request)
    {
         if ($request->has('chkItem')) {
            foreach ($request->chkItem as $id) {
                Posts::destroy($id);
            }
            flash('Xóa thành công.')->success();
            return redirect()->back();
        } else {
            flash('Bạn chưa chọn dữ liệu để xóa.')->error();
            return redirect()->back();
        }
    }


    public function getAjaxSlug(Request $request)
    {
        $id = $request->id;
        $post = Posts::find($id);
        if ($request->slug) {
            $slug = str_slug($request->slug);
            $post->slug = $this->createSlug($slug, $id);
            $post->save();
            return $this->createSlug($slug, $id);
        } else {
            $slug_en = str_slug($request->slug_en);
            $post->slug_en = $this->createSlug($slug_en, $id);
            $post->save();
            return $this->createSlug($slug_en, $id);
        }
    }

    public function createSlug($slugPost, $id = null)
    {
        $slug = $slugPost;
        $index = 1;
        $baseSlug = $slug;
        while ($this->checkIfExistedSlug($slug, $id)) {
            $slug = $baseSlug . '-' . $index++;
        }

        if (empty($slug)) {
            $slug = time();
        }

        return $slug;
    }


    public function checkIfExistedSlug($slug, $id = null)
    {
        $type = $this->type;
        if($id != null) {
            $count = Posts::where('type', $type)->where('id', '!=', $id)->where('slug', $slug)->count();
            return $count > 0;
        }else{
            $count = Posts::where('type', $type)->where('slug', $slug)->count();
            return $count > 0;
        }
    }
}
