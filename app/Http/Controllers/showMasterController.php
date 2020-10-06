<?php

namespace App\Http\Controllers;

use App\dim_application;
use App\Master_Data_Company;
use App\dim_lookup;
use App\Md1_Lookup_Result;
use ConsoleTVs\Charts\Facades\Charts;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class showMasterController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->get('search');
        $source = $request->get('source') != '' ? $request->get('source') : -1;
        $field = $request->get('field') != '' ? $request->get('field') : 'company_name';
        $sort = $request->get('sort') != '' ? $request->get('sort') : 'asc';
        $view = new Master_Data_Company();
        $sId = $view->orderBy('id', 'ASC');

        if ($source != -1)
            $sId = $sId->where('source', $source);
        $sId = $sId->where('company_name', 'like', '%' . $search . '%')
            ->orderBy($field, $sort)
            ->paginate(10)
            ->withPath('?search=' . $search . '&source=' . $source . '&field=' . $field . '&sort=' . $sort);

        $juml = Master_Data_Company::count();


        $users = Master_Data_Company::where(DB::raw("(DATE_FORMAT(created_at,'%Y'))"),date('Y'))->get();
        $chart = Charts::database($users, 'bar', 'google')
            ->title("Master Data By Monthly")
            ->elementLabel("Total Data")
            ->dimensions(550, 250)
            ->responsive(false)
            ->groupByMonth(date('Y'), true);


        $chr = Master_Data_Company::select(DB::raw('count(*) as total'), 'source')->groupBy('source')->get();
        $pie  =	 Charts::create('donut', 'highcharts')
            ->title('Total Data Master')
            ->dimensions(550,300)
            ->colors(['#ff0000', '#00FFFF','#C5CAE9', '#808080'])
            ->labels($chr->pluck('source'))
            ->values($chr->pluck('total'))
            ->responsive(false);

        // $presen = DB::table('md1_lookup_results')->where('status','Not match')->count();
        // $total = DB::table('md1_lookup_results')->count();
        // $persen = number_format(($presen/$total)*100,2);


        return view('.showMaster',compact('pie','chart','sId','juml'));

//        SELECT master_data_companies.id, COUNT(metadata.master_data_id) FROM master_data_companies LEFT JOIN metadata on master_data_companies.id = metadata.master_data_id GROUP by master_data_companies.id
    }

    public function masterUser(Request $request)
    {
        $search = $request->get('search');
        $source = $request->get('source') != '' ? $request->get('source') : -1;
        $field = $request->get('field') != '' ? $request->get('field') : 'company_name';
        $sort = $request->get('sort') != '' ? $request->get('sort') : 'asc';
        $view = new Master_Data_Company();
        if ($source != -1)
            $view = $view->where('source', $source);
        $view = $view->where('company_name', 'like', '%' . $search . '%')
            ->orderBy($field, $sort)
            ->paginate(10)
            ->withPath('?search=' . $search . '&source=' . $source . '&field=' . $field . '&sort=' . $sort);


        return view('.masterUser',compact('view'));
    }
}
