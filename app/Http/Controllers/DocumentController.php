<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Document;
use Validator;
use Yajra\DataTables\Facades\DataTables;
use Brian2694\Toastr\Facades\Toastr;
use Carbon\Carbon;

class DocumentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.documents.index');
    }

    // public function getDocument(Request $request){

    //     if ($request->ajax()) {
    //         $data = Document::latest()->get();
    //         return Datatables::of($data)
    //             ->addIndexColumn()
    //             ->addColumn('action', function($row){
    //                 $actionBtn = '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="javascript:void(0)" data-toggle="tooltip" class="editLeave" data-id="'.$row->id.'"><i class="fa-solid fa-pencil">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</i></a><a href="javascript:void(0)" data-toggle="tooltip" class="deleteLeave" data-id="'.$row->id.'"><i class="fa-solid fa-trash"></i></a>';
    //                 return $actionBtn;
    //             })
    //             // ->addColumn('adhar_card', function($row){
    //             //     $url= asset('adhar_card/'.$row->adhar_card);
    //             //     return '<img src="' . $url . '" border="0"class="img-thumbnail" align="center" width="200" />';
    //             // })
    //             ->addColumn('adhar_card', function ($row) {
    //                 // You can access the array of file paths directly
    //                 $adharCardPaths = $row->adhar_card;
    //                 $html = '';
    //                 foreach ($adharCardPaths as $path) {
    //                     $url = asset($path);
    //                     $html .= '<img src="' . $url . '" border="0" class="img-thumbnail" align="center" width="200" />';
    //                 }
    //                 return $html;
    //             })
    //             ->rawColumns(['action', 'adhar_card'])
    //             ->make(true);
    //     }
    // }

    public function getDocument(Request $request){

        // if ($request->ajax()) {
        //     $data = Document::latest('5')->get();
        //     return Datatables::of($data)
        //         ->addIndexColumn()
        //         ->addColumn('action', function($row){
        //             $actionBtn = '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="javascript:void(0)" data-toggle="tooltip" class="editSalary" data-id="'.$row->id.'"><i class="fa-solid fa-pencil">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</i></a><a href="javascript:void(0)" data-toggle="tooltip" class="deleteSalary" data-id="'.$row->id.'"><i class="fa-solid fa-trash"></i></a>';                 
        //             return $actionBtn;
        //         })
        //         ->rawColumns(['action'])
        //         ->make(true);
        // }
        if ($request->ajax()) {
            $data = DB::table('user_documents')->get();
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function($row){
                    $actionBtn = '<a href="javascript:void(0)" class="edit btn btn-success btn-sm">Edit</a> <a href="javascript:void(0)" class="delete btn btn-danger btn-sm">Delete</a>';
                    return $actionBtn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
      return view('admin.documents.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    // public function store(Request $request)
    // {
    //     // Validate the form data
    //     $validatedData = $request->validate([
    //         'adhar_card.*' => 'required|mimes:jpeg,png,pdf|max:2048',
    //         'pan_card.*' => 'required|mimes:jpeg,png,pdf|max:2048',
    //         'voter_card.*' => 'required|mimes:jpeg,png,pdf|max:2048',
    //         'standard_10_markshhet.*' => 'required|mimes:jpeg,png,pdf|max:2048',
    //         'standard_12_markshhet.*' => 'required|mimes:jpeg,png,pdf|max:2048',
    //     ]);

    //     // Process and store the uploaded files
    //     $document = new Document();

    //     if ($request->hasFile('adhar_card')) {
    //         $adharCardPaths = [];
    //         foreach ($request->file('adhar_card') as $file) {
    //             $path = $file->store('public/documents/adhar_card'); // Store in public/storage/documents/adhar_card directory
    //             $adharCardPaths[] = $path;
    //         }
    //         $document->adhar_card = json_encode($adharCardPaths);
    //     }

    //     if ($request->hasFile('pan_card')) {
    //         $panCardPaths = [];
    //         foreach ($request->file('pan_card') as $file) {
    //             $path = $file->store('public/documents/pan_card'); // Store in public/storage/documents/pan_card directory
    //             $panCardPaths[] = $path;
    //         }
    //         $document->pan_card = json_encode($panCardPaths);
    //     }

    //     if ($request->hasFile('voter_card')) {
    //         $voterCardPaths = [];
    //         foreach ($request->file('voter_card') as $file) {
    //             $path = $file->store('public/documents/voter_card'); // Store in public/storage/documents/voter_card directory
    //             $voterCardPaths[] = $path;
    //         }
    //         $document->voter_card = json_encode($voterCardPaths);
    //     }

    //     if ($request->hasFile('standard_10_markshhet')) {
    //         $marksheet10Paths = [];
    //         foreach ($request->file('standard_10_markshhet') as $file) {
    //             $path = $file->store('public/documents/standard_10_markshhet'); // Store in public/storage/documents/standard_10_markshhet directory
    //             $marksheet10Paths[] = $path;
    //         }
    //         $document->standard_10_markshhet = json_encode($marksheet10Paths);
    //     }

    //     if ($request->hasFile('standard_12_markshhet')) {
    //         $marksheet12Paths = [];
    //         foreach ($request->file('standard_12_markshhet') as $file) {
    //             $path = $file->store('public/documents/standard_12_markshhet'); // Store in public/storage/documents/standard_12_markshhet directory
    //             $marksheet12Paths[] = $path;
    //         }
    //         $document->standard_12_markshhet = json_encode($marksheet12Paths);
    //     }

    //     $document->save();
    //    return redirect()->route('documents')->with('success', 'Document(s) uploaded successfully');
    
    // }

    public function store(Request $request){
        try {
            $validateUser = Validator::make($request->all(), [
                'adhar_card' => 'required|mimes:jpeg,png,pdf|max:2048',
                'pan_card' =>'required|mimes:jpeg,png,pdf|max:2048',
                'voter_card' =>'required|mimes:jpeg,png,pdf|max:2048',
                'standard_10_markshhet' =>'required|mimes:jpeg,png,pdf|max:2048',
                'standard_12_markshhet' =>'required|mimes:jpeg,png,pdf|max:2048',
            ]);
           
            // $auth=Auth::id();
            if($validateUser->fails()){
                return back();
            }
            if ($request->hasFile('adhar_card')) {
                $file = $request->file('adhar_card');
                $extension = $file->getClientOriginalExtension();
                $filename = time() . '.' . $extension;
                $file->move('adhar_card', $filename);
                $adhar_card = $filename;
            }
            if ($request->hasFile('pan_card')) {
                $file = $request->file('pan_card');
                $extension = $file->getClientOriginalExtension();
                $filename = time() . '.' . $extension;
                $file->move('pan_card', $filename);
                $pan_card = $filename;
            }
            if ($request->hasFile('voter_card')) {
                $file = $request->file('voter_card');
                $extension = $file->getClientOriginalExtension();
                $filename = time() . '.' . $extension;
                $file->move('voter_card', $filename);
                $voter_card = $filename;
            }
            if ($request->hasFile('standard_10_markshhet')) {
                $file = $request->file('standard_10_markshhet');
                $extension = $file->getClientOriginalExtension();
                $filename = time() . '.' . $extension;
                $file->move('standard_10_markshhet', $filename);
                $standard_10_markshhet = $filename;
            }
            if ($request->hasFile('standard_12_markshhet')) {
                $file = $request->file('standard_12_markshhet');
                $extension = $file->getClientOriginalExtension();
                $filename = time() . '.' . $extension;
                $file->move('standard_12_markshhet', $filename);
                $standard_12_markshhet = $filename;
            }
       
            Document::create([
                // 'user_id' =>$auth,
               'adhar_card' => $adhar_card,
               'pan_card'=>$pan_card,
               'voter_card'=>$voter_card,
               'standard_10_markshhet'=>$standard_10_markshhet,
               'standard_12_markshhet'=>$standard_12_markshhet
            ]);

            Toastr::success('Success! Document Saved Successfully');
            return redirect()->route('documents');
           
            return back();
        } catch (\Throwable $th) {
            return back();
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
       $a=Document::find($id);
     
       return view('admin.documents.edit',compact('a'));
       
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        try {
            $validateUser = Validator::make($request->all(), [
                'adhar_card' => 'required|mimes:jpeg,png,pdf|max:2048',
                'pan_card' =>'required|mimes:jpeg,png,pdf|max:2048',
                'voter_card' =>'required|mimes:jpeg,png,pdf|max:2048',
                'standard_10_markshhet' =>'required|mimes:jpeg,png,pdf|max:2048',
                'standard_12_markshhet' =>'required|mimes:jpeg,png,pdf|max:2048',
            ]);

            if($validateUser->fails()){
                return back();
            }
            
            if ($request->hasFile('adhar_card')) {
                $file = $request->file('adhar_card');
                $extension = $file->getClientOriginalExtension();
                $filename = time() . '.' . $extension;
                $file->move('adhar_card', $filename);
                $adhar_card ->update($filename);
            }
            if ($request->hasFile('pan_card')) {
                $file = $request->file('pan_card');
                $extension = $file->getClientOriginalExtension();
                $filename = time() . '.' . $extension;
                $file->move('pan_card', $filename);
                $pan_card = $filename;
            }
            if ($request->hasFile('voter_card')) {
                $file = $request->file('voter_card');
                $extension = $file->getClientOriginalExtension();
                $filename = time() . '.' . $extension;
                $file->move('voter_card', $filename);
                $voter_card = $filename;
            }
            if ($request->hasFile('standard_10_markshhet')) {
                $file = $request->file('standard_10_markshhet');
                $extension = $file->getClientOriginalExtension();
                $filename = time() . '.' . $extension;
                $file->move('standard_10_markshhet', $filename);
                $standard_10_markshhet = $filename;
            }
            if ($request->hasFile('standard_12_markshhet')) {
                $file = $request->file('standard_12_markshhet');
                $extension = $file->getClientOriginalExtension();
                $filename = time() . '.' . $extension;
                $file->move('standard_12_markshhet', $filename);
                $standard_12_markshhet = $filename;
            }
           
            $document=Document::where('id',$id);
          
            $document->update([
                // 'user_id' =>$auth,
               'adhar_card' => $adhar_card,
               'pan_card'=>$pan_card,
               'voter_card'=>$voter_card,
               'standard_10_markshhet'=>$standard_10_markshhet,
               'standard_12_markshhet'=>$standard_12_markshhet,
               'updated_at'=>Carbon::now(),
            ]);
            Toastr::success('Success! Document update Successfully');
            return redirect()->route('documents');
            // return back();
        } catch (\Throwable $th) {
            return back();
        }
    }

      /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {    
        Document::find($id)->delete();
        Toastr::success('Success! User Document Deleted Successfully');
        return redirect()->route('documents');
    }
}
