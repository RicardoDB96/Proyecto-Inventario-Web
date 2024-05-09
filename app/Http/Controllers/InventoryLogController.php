<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\InventoryLog;

class InventoryLogController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Obtener todos los productos
        $inventory_logs = InventoryLog::latest()->paginate(5);

        return view('bitacories.index', ['inventory_logs'=>$inventory_logs]);
    }

    public function search(Request $request)
    {
        $search_text = $request->query('query');;
        $inventory_logs = InventoryLog::where('initial_inventory','LIKE', '%' . $search_text . '%')
        ->orWhereHas('product', function ($query) use ($search_text) {
            $query->where('name', 'LIKE', '%' . $search_text . '%');
        })
        ->paginate(3);

        $inventory_logs->appends(['query' => $search_text]);

        return view('bitacories.search',compact('inventory_logs'));
    }

    public function filter(Request $request){
        $startDate=$request->input('start_date');
        $endDate=$request->input('end_date');

        $inventory_logs = InventoryLog::whereBetween('creation_date', [$startDate, $endDate])
                            ->paginate(4);
                            $inventory_logs->appends(['start_date' => $startDate])
                                    ->appends(['end_date'=>$endDate]);

        return view('bitacories.index',compact('inventory_logs'));
    }
}
