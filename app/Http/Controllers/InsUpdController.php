<?php

namespace App\Http\Controllers;

use App\Insert_Master_Data_History;
use App\Md1_Lookup_Result;
use App\Update_Master_Data_History;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class InsUpdController extends Controller
{
    /**
     * @param Request $request
     * @return Factory|RedirectResponse|View
     */


    public function proses_mdm(Request $request)
    {

        if (isset($_POST['submit'])) {
            $loop = $request->check;
            $getData[] = $loop;
            foreach ($getData as $forLoop) {
                $data = Md1_Lookup_Result::find($forLoop);
                foreach ($data as $getData) {
                    $insetDataMaster = new Insert_Master_Data_History();
                    $insetDataMaster->company_name = $getData->company_name;
                    $insetDataMaster->address = $getData->address;
                    $insetDataMaster->source = $getData->data_source;
                    $insetDataMaster->save();
                }
            }
            // untuk menjalankan pentaho sesuai directori
            ini_set('max_execution_time', 600);
            set_time_limit(0);
            $exec_job_insert = 'D:\Pentaho\data-integration\kitchen.bat /file:"D:\Pentaho MDM 2.0\job_bodo_amattt.kjb" -level:"Basic"';
            shell_exec($exec_job_insert);
            return redirect()->back()->withToastSuccess('All Data Succesfully Added');
            // return view('pentaho_ins');
        } elseif (isset($_POST['update'])) {
            $loop = $request->check;
            $getData[] = $loop;
            foreach ($getData as $forLoop) {
                $data = Md1_Lookup_Result::select(
                    'company_name',
                    'address',
                    'data_source',
                    'master_data_id',
                    'master_data_company_name',
                    'master_data_address',
                    'master_data_source',
                    'status'
                )
                    ->find($forLoop);
                foreach ($data as $getData) {
                    $insetDataMaster = new Update_Master_Data_History();
                    $insetDataMaster->company_name = $getData->company_name;
                    $insetDataMaster->address = $getData->address;
                    ////                    $insetDataMaster->sector_id = $getData->sector_id;
                    $insetDataMaster->data_source = $getData->data_source;
                    $insetDataMaster->master_data_id = $getData->master_data_id;
                    $insetDataMaster->master_data_company_name = $getData->master_data_company_name;
                    $insetDataMaster->master_data_address = $getData->master_data_address;
                    ////                    $insetDataMaster->master_data_sector_id = $getData->master_data_sector_id;
                    $insetDataMaster->master_data_source = $getData->master_data_source;
                    $insetDataMaster->status = $getData->status;

                    if ($insetDataMaster->master_data_id == null) {
                        return redirect()->back()->with('toast_error','Data is Null');
                    } else {
                        $insetDataMaster->save();
                    }
                }
            }
            ini_set('max_execution_time', 600);
            set_time_limit(0);
            $exec_job_update = 'D:\Pentaho\data-integration\kitchen.bat /file:"D:\Pentaho MDM 2.0\job_update_master_data.kjb" -level:"Basic"';
            shell_exec($exec_job_update);
            // dd(shell_exec($exec_job_update));

            return redirect()->back()->withToastSuccess('All Data Succesfully Updated');
        }
    }
}
