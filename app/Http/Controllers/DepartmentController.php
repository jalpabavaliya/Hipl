<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Department;
use Validator;
use Yajra\DataTables\Facades\DataTables;
use Brian2694\Toastr\Facades\Toastr;

class DepartmentController extends Controller
{
    public function index()
    {
        $department = department::get();
        return view('admin.department.index', compact('department'));
    }

    public function getDepartment(Request $request){

        if ($request->ajax()) {
            $data = Department::latest()->get();
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function($row){
                    $actionBtn = '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="javascript:void(0)" data-toggle="tooltip" class="editDepartment" data-id="'.$row->id.'"><i class="fa-solid fa-pencil">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</i></a><a href="javascript:void(0)" data-toggle="tooltip" class="deleteDepartment" data-id="'.$row->id.'"><i class="fa-solid fa-trash"></i></a>';
                    return $actionBtn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }

    }

    public function store(Request $request){

      dd($request);



      $data = $request->input();

        $ins = array(
            'dept_id' => $data['dept_id'] ? $data['dept_id'] : 'N/A',
            'p_name' => $data['p_name'] ? $data['p_name'] : 'N/A',
            'p_slug' => Str::slug($data['p_name'], '-') . '-' . Str::random(6),
            'item_code' => $data['item_code'] ? $data['item_code'] : 'N/A',
            'p_size' => $data['p_size'] ? $data['p_size'] : 'N/A',
            'p_rate' => $data['p_rate'] ? $data['p_rate'] : 'N/A',
            'p_weight' => $data['p_weight'] ? $data['p_weight'] : 'N/A',
            'weight_stock' => $data['weight_stock'] ? $data['weight_stock'] : 'N/A',
            // 'p_image'=>ImageManager::upload('modal/', 'png', $request->file('p_image')),
            'p_status' => '1',
        );

        if (!empty($data['p_id'])) {
            if ($request->has('p_image')) {
                $ins['p_image'] = ImageManager::update('modal/', $data['p_image'], 'png', $request->file('p_image'));
            }

            product::where('p_id', $data['p_id'])->update($ins);

            product_link::where('product_id', $data['p_id'])->delete();

            if (count($request->link_name) > 0 && count($request->weight_percent) > 0) {
                foreach ($request->link_name as $key => $link_name) {
                    $ps = new product_link;
                    $ps->product_id = $data['p_id'];
                    $ps->link_name = $link_name;
                    $ps->weight_percent = $request->weight_percent[$key];
                    $ps->save();
                }
            }

            Toastr::success('Success! Product Updated');

            return redirect()->route('panel.Products.list');
        } else {
            $ins['p_image'] = ImageManager::upload('modal/', 'png', $request->file('p_image'));

            $prod = product::create($ins)->p_id;

            if (count($request->link_name) > 0 && count($request->weight_percent) > 0) {
                foreach ($request->link_name as $key => $link_name) {
                    $ps = new product_link;
                    $ps->product_id = $prod;
                    $ps->link_name = $link_name;
                    $ps->weight_percent = $request->weight_percent[$key];
                    $ps->save();
                }
            }

            Toastr::success('Success! Product Inserted');

            return redirect()->route('panel.Products.add-product');
        }






        try {
            $validateUser = Validator::make($request->all(), [
                'name' => 'required',
            ]);
            if($validateUser->fails()){
                return back();
            }
            Department::updateOrCreate([
                'id' => $request->department_id,
            ],
            [
                'name' => $request->name,
            ]);
            Toastr::info('Success! Deparment Save Successfully');
            return back();
        } catch (\Throwable $th) {
            return back();
        }    
    }

    public function edit($d_id)
    {
        $department = department::where('id', $d_id)->orderBy('id', 'DESC')->first();
        return response()->json($department);
    }

    public function destroy($id)
    {
        Department::find($id)->delete();
        Toastr::success('Success! Deparment Deleted Successfully');
    }
}
