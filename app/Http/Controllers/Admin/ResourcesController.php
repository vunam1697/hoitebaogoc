<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Resources;
use DataTables;
use File, DB;

class ResourcesController extends Controller
{
    protected function module(){
        return [
            'name' => 'Tài nguyên',
            'module' => 'resources',
            'table' =>[
                'image' => [
                    'title' => 'Hình ảnh', 
                    'with' => '100px',
                ],
                'name' => [
                    'title' => 'Tiêu đề tiếng việt', 
                    'with' => '',
                ],
                'name_en' => [
                    'title' => 'Tiêu đề tiếng anh', 
                    'with' => '',
                ],
                'status' => [
                    'title' => 'Trạng thái',
                    'with' => '',
                ],
            ]
        ];
    }

    protected function fields()
    {
        return [
            'name' => 'required',
            'name_en' => 'required',
            'image' => 'required',
        ];
    }


    protected function messages()
    {
        return [
            'name.required' => 'Tiêu để tiếng việt không được bỏ trống.',
            'name_en.required' => 'Tiêu để tiếng anh không được bỏ trống.',
            'image.required' => 'Bạn chưa chọn hình ảnh',
        ];
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request) 
    {
        if ($request->ajax()) {
            $list_resources = Resources::orderBy('created_at', 'DESC')->get();
            return Datatables::of($list_resources)
                    ->addColumn('checkbox', function ($data) {
                        return '<input type="checkbox" name="chkItem[]" value="' . $data->id . '">';
                    })->addColumn('image', function ($data) {
                        return '<img src="' . url('/').$data->image . '" class="img-thumbnail" width="50px" height="50px">';
                    })->addColumn('name', function ($data) {
                        return $data->name. ' <br><a href="' . route('home.resources-single_vi', $data->slug) . '" target="_black">
                        <i class="fa fa-hand-o-right" aria-hidden="true"></i> Link: 
                        ' . route('home.resources-single_vi', $data->slug) . '</a>';
                    })->addColumn('name_en', function ($data) {
                        return $data->name_en. ' <br><a href="' . route('home.resources-single_en', $data->slug_en) . '" target="_black">
                        <i class="fa fa-hand-o-right" aria-hidden="true"></i> Link: 
                        ' . route('home.resources-single_en', $data->slug_en) . '</a>';
                    })->addColumn('status', function ($data) {
                        if ($data->status == 1) {
                            $status = ' <span class="label label-success">Hiển thị</span>';
                        } else {
                            $status = ' <span class="label label-danger">Không hiển thị</span>';
                        }
                        return $status;
                    })->addColumn('action', function ($data) {
                        return '<a href="' . route('resources.edit', ['id' => $data->id ]) . '" title="Sửa">
                                <i class="fa fa-pencil fa-fw"></i> Sửa
                            </a> &nbsp; &nbsp; &nbsp;
                                <a href="javascript:;" class="btn-destroy" 
                                data-href="' . route('resources.destroy', $data->id) . '"
                                data-toggle="modal" data-target="#confim">
                                <i class="fa fa-trash-o fa-fw"></i> Xóa</a>
                            ';
                    })->rawColumns(['checkbox', 'action', 'name', 'image', 'status', 'name_en'])
                    ->addIndexColumn()
                    ->make(true);
        }
        $data['module'] = $this->module();
        return view("backend.{$this->module()['module']}.list", $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['module'] = $this->module();
        return view("backend.{$this->module()['module']}.create-edit", $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
    	$this->validate($request, $this->fields(), $this->messages());

        $input = $request->all();
        $input['slug'] =  str_slug($request->name);
        $input['slug_en'] =  str_slug($request->name_en);
        $input['status'] =  $request->status == 1 ? 1 : null;

        $resources = Resources::create($input);

        flash('Thêm mới thành công.')->success();

        return redirect()->route($this->module()['module'].'.edit', $resources);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data['module'] = array_merge($this->module(),[
            'action' => 'update'
        ]);
        $data['data'] = Resources::findOrFail($id);
        return view("backend.{$this->module()['module']}.create-edit", $data);
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
        $this->validate($request, $this->fields(), $this->messages());
        
        $input = $request->all();
        $input['slug'] =  str_slug($request->name);
        $input['slug_en'] =  str_slug($request->name_en);
        $input['status'] =  $request->status == 1 ? 1 : null;

        $resources = Resources::findOrFail($id)->update($input);

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
        flash('Xóa thành công.')->success();

        Resources::destroy($id);

        return redirect()->back();
    }

    public function deleteMuti(Request $request)
    {
        if(!empty($request->chkItem)){
            foreach ($request->chkItem as $id) {
                Resources::destroy($id);
            }
            flash('Xóa thành công.')->success();
            return back();
        }
        flash('Bạn chưa chọn dữ liệu cần xóa.')->error();
        return back();
    }
    
}
