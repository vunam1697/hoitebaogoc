<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Question;
use DataTables;
use File, DB;

class QuestionController extends Controller
{
    protected function module(){
        return [
            'name' => 'Hỏi & Đáp',
            'module' => 'question',
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
            'content' => 'required',
            // 'content_en' => 'required',
        ];
    }


    protected function messages()
    {
        return [
            'name.required' => 'Câu hỏi tiếng việt không được bỏ trống.',
            // 'name_en.required' => 'Câu hỏi tiếng anh không được bỏ trống.',
            'content.required' => 'Câu trả lời tiếng việt không được bỏ trống.',
            // 'content_en.required' => 'Câu trả lời tiếng anh không được bỏ trống.',
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
            $list_question = Question::orderBy('created_at', 'DESC')->get();
            return Datatables::of($list_question)
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
                        return '<a href="' . route('question.edit', ['id' => $data->id ]) . '" title="Sửa">
                                <i class="fa fa-pencil fa-fw"></i> Sửa
                            </a> &nbsp; &nbsp; &nbsp;
                                <a href="javascript:;" class="btn-destroy" 
                                data-href="' . route('question.destroy', $data->id) . '"
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

        $question = Question::create($input);

        flash('Thêm mới thành công.')->success();

        return redirect()->route($this->module()['module'].'.edit', $question);
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
        $data['data'] = Question::findOrFail($id);
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

        $question = Question::findOrFail($id)->update($input);

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

        Question::destroy($id);

        return redirect()->back();
    }

    public function deleteMuti(Request $request)
    {
        if(!empty($request->chkItem)){
            foreach ($request->chkItem as $id) {
                Question::destroy($id);
            }
            flash('Xóa thành công.')->success();
            return back();
        }
        flash('Bạn chưa chọn dữ liệu cần xóa.')->error();
        return back();
    }
    
}
