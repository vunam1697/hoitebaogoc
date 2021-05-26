<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Construction;
use DataTables;
use File, DB;

class ConstructionController extends Controller
{
    protected function module(){
        return [
            'name' => 'Công trình',
            'module' => 'construction',
            'table' =>[
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
            // 'name_en' => 'required',
        ];
    }


    protected function messages()
    {
        return [
            'name.required' => 'Tiêu đề tiếng việt không được bỏ trống.',
            // 'name_en.required' => 'Tiêu đề tiếng anh không được bỏ trống.',
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
            $list_construction = Construction::orderBy('created_at', 'DESC')->get();
            return Datatables::of($list_construction)
                    ->addColumn('checkbox', function ($data) {
                        return '<input type="checkbox" name="chkItem[]" value="' . $data->id . '">';
                    })->addColumn('name', function ($data) {
                        return $data->name;
                    })->addColumn('name_en', function ($data) {
                        return $data->name_en;
                    })->addColumn('status', function ($data) {
                        if ($data->status == 1) {
                            $status = ' <span class="label label-success">Hiển thị</span>';
                        } else {
                            $status = ' <span class="label label-danger">Không hiển thị</span>';
                        }
                        return $status;
                    })->addColumn('action', function ($data) {
                        return '<a href="' . route('construction.edit', ['id' => $data->id ]) . '" title="Sửa">
                                <i class="fa fa-pencil fa-fw"></i> Sửa
                            </a> &nbsp; &nbsp; &nbsp;
                                <a href="javascript:;" class="btn-destroy" 
                                data-href="' . route('construction.destroy', $data->id) . '"
                                data-toggle="modal" data-target="#confim">
                                <i class="fa fa-trash-o fa-fw"></i> Xóa</a>
                            ';
                    })->rawColumns(['checkbox', 'action', 'name', 'name_en', 'status'])
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

        $construction = Construction::create($input);

        flash('Thêm mới thành công.')->success();

        return redirect()->route($this->module()['module'].'.edit', $construction);
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
        $data['data'] = Construction::findOrFail($id);
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

        $construction = Construction::findOrFail($id)->update($input);

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

        Construction::destroy($id);

        return redirect()->back();
    }

    public function deleteMuti(Request $request)
    {
        if(!empty($request->chkItem)){
            foreach ($request->chkItem as $id) {
                Construction::destroy($id);
            }
            flash('Xóa thành công.')->success();
            return back();
        }
        flash('Bạn chưa chọn dữ liệu cần xóa.')->error();
        return back();
    }
    
}
