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
        //  $villages = Village::simplePaginate(2);

        //search date 
        $dateRange = $request->searchDate;
        $dateArray = explode('-',$dateRange);		
        $fromDate= null;
        $toDate = null;
        $rows = Village::query();
       
        if($dateArray[0] != null){   		
            $fromDate = date("y-m-d",strtotime($dateArray['0']));  
            $toDate = date("y-m-d",strtotime($dateArray['1']));
        }
 	    if($fromDate && $toDate){
            $rows->whereDate('created_at','>=',$fromDate)
                ->whereDate('created_at','<=',$toDate)->latest();
        }      
     
        // search name 
        $rows->where([
            ['name', '!=', Null],
            [function ($query) use ($request) {
                if (($s = $request->search)) {
                    $query->orWhere('name', 'LIKE', '%' . $s . '%')
                        ->orWhere('noted', 'LIKE', '%' . $s . '%')
                        ->first();
                }
            }]
        ]);

        // search with button selection
        if ($request->status == 'active') {
            $rows->where('status',1);
            $status = 'Active';
        }
        elseif ($request->status == 'inactive') {
            $rows->where('status', 0);
            $status = 'Inactive';
        }
        else {
            $status = 'All Status';
        }                                                                                                                                                                                                                                       

        $villages = $rows->latest()->simplePaginate(4);

        return view('village.index', compact('villages','status','vill_count','count_publish'));
    }

    // paginate with ajax request
    function fetch_data(Request $request)
    {
        if($request->ajax())
        {
            $villages = Village::simplePaginate(4);
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
