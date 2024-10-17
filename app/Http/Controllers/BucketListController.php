<?php

namespace App\Http\Controllers;

use Symfony\Component\Routing\Annotation\Route;
use App\Models\BucketList;
use Illuminate\Http\Request;



class BucketListController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
         // appends : menambahkan/membawa request pagination (data-data pagination tidak berubah meskipun ada request)
         $bucketLists = BucketList::where('name', 'LIKE', '%'.$request->cari.'%')->simplePaginate(5)->appends($request->all());
         // compact() -> mengirimkan data ($) agar data $nya bisa dipake di blade
         return view('pages.list', compact('bucketLists'));  
          
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        return view('bucketlist.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:100',
            'price' => 'required|numeric',
            'type' => 'required',
        ]);

        $proses = BucketList::create([
            'name' => $request->name,
            'price' => $request->price,
            'type' => $request->type,
        ]);
    

        if  ($proses) {
        return redirect()->route('bucket_list')->with('success', 'Bucket list added successfully!');
    } else {
        return redirect()->route('tambah')->with('error', 'Failed to add bucket list!');
    }
    }

    /**
     * Display the specified resource.
     */
    public function show(BucketList $bucketList)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $bucketLists = BucketList::find($id);
        return view('template.edit', compact('bucketLists'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|max:100',
            'type' => 'required',
            'price' => 'required|numeric'
        ]);

        BucketList::where('id', $id)->update([
            'name' => $request->name,
            'type' => $request->type,
            'price' => $request->price,
        ]);

        return redirect()->route('bucket_list.data')->with('success', 'Bucket list edited    successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        BucketList::where('id', $id)->delete();

        return redirect()->back()->with('success', 'Successfully Deleted the bucket list!');
    }
}
