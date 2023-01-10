<?php

namespace App\Http\Controllers;

use App\Models\Village;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class VillageController extends Controller
{
    public function index(Request $request)
    {
        $vill_count = Village::count();
        $count_publish = Village::where('status',1)->count();
         $villages = Village::simplePaginate(8);
        
         return view('village.index', compact('villages','vill_count','count_publish'));
      
    }

    // search 
    // public function search(Request $request){
    //     $query = Village::query();
        
    //     if ($request->ajax()) {
    //         $data = Village::where('name','LIKE','%'.$request->search.'%')
    //         ->orWhere('noted','LIKE','%'.$request->search.'%')->get();
    //         return response()->json(['data' => $data]);
    //     }else{
    //         $villages = $query->get();
    //         return view('village.index', compact('villages'));
    //     }       
    // }
    
    function fetch_data(Request $request)
    {
        if($request->ajax())
        {
            $villages = Village::simplePaginate(8);
            return view('village.paginate', compact('villages'))->render();
        }
    }

    public function create()
    {
        return view('village.form');
    }

    public function store(Request $request)
    {
        $this->Validate($request, [
            'name' => 'required',
            'status' => 'required'
        ]);
        $input = $request->all();
        $input['created_by'] = Auth::user()->id;
        Village::create($input);
        return redirect()->route('villages.index')->with('message','Village created');
    }

    public function show(Village $village)
    {
        //
    }

    public function edit(Village $village)
    {
        return view('village.form', compact('village'));
    }

    public function update(Request $request, Village $village)
    {
        $this->Validate($request, [
            'name' => 'required',
            'status' => 'required'
        ]);
        $village['updated_by'] = Auth::user()->id;
        $village->update($request->all());
        return redirect()->route('villages.index')->with('message','Village updated');
    }

    public function destroy(Village $village)
    {
        $village->delete();
        return redirect()->route('villages.index')->with('message','Village deleted');
    }
}
