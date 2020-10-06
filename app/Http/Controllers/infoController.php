<?php

namespace App\Http\Controllers;

use App\dim_fact_mdm;
use App\dim_lookup;
use App\dim_application;
use App\Md1_Lookup_Result;
use ConsoleTVs\Charts\Facades\Charts;
use http\Env\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class infoController extends Controller
{
    public function info(Request $request)
    {
        $lastime = DB::select("select max(created_at) as created_at from dim_times");
        $presen = DB::table('md1_lookup_results')->where('status','Not match')->count();
        $total = DB::table('md1_lookup_results')->count();
        $persen = number_format(($presen/$total)*100,2);
        $toCom = DB::select("select count(distinct(company_name)) as total from md1_lookup_results ");
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
            ->paginate(50)
            ->withPath('?search=' . $search . '&data_source=' . $source . '&field=' . $field . '&sort=' . $sort);



        $chr = dim_fact_mdm::select('total_notMatch', 'id_app')->where('id_lookup' , dim_lookup::max('id_lookup'))->groupBy('id_app')->get();
        $pie  =	Charts::create('pie', 'google')
            ->title('Percentage Total Not Match By Application')
            ->dimensions(525,300)
            ->colors(['#ff0000', '#00FFFF','#C5CAE9', '#808080'])
            ->labels(['table_app1','table_app2','table_app31','table_app32'])
            ->labels($chr->pluck('id_app'))
            ->values($chr->pluck('total_notMatch'))
            ->responsive(false);

        $mat = dim_fact_mdm::where('id_lookup' , dim_lookup::max('id_lookup'))->groupBy('id_app')->get();
        $pieCha  = Charts::create('pie', 'google')
            ->title('Percentage Total Match By Application')
            ->dimensions(525,300)
            ->colors(['#ff0000', '#00FFFF','#C5CAE9', '#808080'])
            ->labels(['table_app1','table_app2','table_app31','table_app32'])
            ->labels($mat->pluck('id_app'))
            ->values($mat->pluck('total_match'))
            ->responsive(false);




        return view('panel.home', compact('lastime','persen','toCom','pie','pieCha','customers'));
    }


}
