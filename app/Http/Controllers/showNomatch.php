<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Md1_Lookup_Result;



class showNomatch extends Controller
{
    public function viewData(Request $request)
    {
        $search = $request->get('search');
        $source = $request->get('data_source') != '' ? $request->get('data_source') : -1;
        $field = $request->get('field') != '' ? $request->get('field') : 'company_name';
        $sort = $request->get('sort') != '' ? $request->get('sort') : 'asc';
        $customer = new Md1_Lookup_Result();
        $customers = $customer->where('status', 'Not match');
        if ($source != -1)
            $customers = $customers->where('data_source', $source);
        $customers = $customers->where('company_name', 'like', '%' . $search . '%')
            ->orderBy($field, $sort)
            ->paginate(30)
            ->withPath('?search=' . $search . '&data_source=' . $source . '&field=' . $field . '&sort=' . $sort);
        // dd($customers);
        // return view('', compact('dataHs', 'dataUp', 'customers'));
        return view('panel.home', compact('customers'));
    }
}
