<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Village extends Model
{
    use HasFactory;
    protected $fillable = [
        'name', 'noted', 'status', 'trash', 'created_by' , 'updated_by'
    ];

    // public function scopeFilter($query, $request)
    // {
    //     if ($request->get('search'))
    //     {
    //         $query->where('name','LIKE',"%".$request->get('search')."%")
    //                 ->orWhere('noted','LIKE',"%".$request->get('search')."%");
    //     }
    //     return $query;
    // }
}
