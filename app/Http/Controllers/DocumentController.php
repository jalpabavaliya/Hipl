<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Document;
use Validator;
use Yajra\DataTables\Facades\DataTables;
use Brian2694\Toastr\Facades\Toastr;

class DocumentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.documents.index');
    }

    public function getDocument(Request $request){

        if ($request->ajax()) {
            $data = Document::latest()->get();
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function($row){
                    $actionBtn = '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="javascript:void(0)" data-toggle="tooltip" class="editLeave" data-id="'.$row->id.'"><i class="fa-solid fa-pencil">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</i></a><a href="javascript:void(0)" data-toggle="tooltip" class="deleteLeave" data-id="'.$row->id.'"><i class="fa-solid fa-trash"></i></a>';
                    return $actionBtn;
                })
                // ->addColumn('adhar_card', function($row){
                //     $url= asset('adhar_card/'.$row->adhar_card);
                //     return '<img src="' . $url . '" border="0"class="img-thumbnail" align="center" width="200" />';
                // })
                ->addColumn('adhar_card', function ($row) {
                    // You can access the array of file paths directly
                    $adharCardPaths = $row->adhar_card;
                    $html = '';
                    foreach ($adharCardPaths as $path) {
                        $url = asset($path);
                        $html .= '<img src="' . $url . '" border="0" class="img-thumbnail" align="center" width="200" />';
                    }
                    return $html;
                })
                ->rawColumns(['action', 'adhar_card'])
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
    public function store(Request $request)
    {
        // Validate the form data
        $validatedData = $request->validate([
            'adhar_card.*' => 'required|mimes:jpeg,png,pdf|max:2048',
            'pan_card.*' => 'required|mimes:jpeg,png,pdf|max:2048',
            'voter_card.*' => 'required|mimes:jpeg,png,pdf|max:2048',
            'standard_10_markshhet.*' => 'required|mimes:jpeg,png,pdf|max:2048',
            'standard_12_markshhet.*' => 'required|mimes:jpeg,png,pdf|max:2048',
        ]);

        // Process and store the uploaded files
        $document = new Document();

        if ($request->hasFile('adhar_card')) {
            $adharCardPaths = [];
            foreach ($request->file('adhar_card') as $file) {
                $path = $file->store('public/documents/adhar_card'); // Store in public/storage/documents/adhar_card directory
                $adharCardPaths[] = $path;
            }
            $document->adhar_card = json_encode($adharCardPaths);
        }

        if ($request->hasFile('pan_card')) {
            $panCardPaths = [];
            foreach ($request->file('pan_card') as $file) {
                $path = $file->store('public/documents/pan_card'); // Store in public/storage/documents/pan_card directory
                $panCardPaths[] = $path;
            }
            $document->pan_card = json_encode($panCardPaths);
        }

        if ($request->hasFile('voter_card')) {
            $voterCardPaths = [];
            foreach ($request->file('voter_card') as $file) {
                $path = $file->store('public/documents/voter_card'); // Store in public/storage/documents/voter_card directory
                $voterCardPaths[] = $path;
            }
            $document->voter_card = json_encode($voterCardPaths);
        }

        if ($request->hasFile('standard_10_markshhet')) {
            $marksheet10Paths = [];
            foreach ($request->file('standard_10_markshhet') as $file) {
                $path = $file->store('public/documents/standard_10_markshhet'); // Store in public/storage/documents/standard_10_markshhet directory
                $marksheet10Paths[] = $path;
            }
            $document->standard_10_markshhet = json_encode($marksheet10Paths);
        }

        if ($request->hasFile('standard_12_markshhet')) {
            $marksheet12Paths = [];
            foreach ($request->file('standard_12_markshhet') as $file) {
                $path = $file->store('public/documents/standard_12_markshhet'); // Store in public/storage/documents/standard_12_markshhet directory
                $marksheet12Paths[] = $path;
            }
            $document->standard_12_markshhet = json_encode($marksheet12Paths);
        }

        $document->save();

        return redirect()->route('documents')->with('success', 'Document(s) uploaded successfully');
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
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
