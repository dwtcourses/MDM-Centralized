@extends('master')
@section('content')
    <div class="container-fluid">
        <div class="animated fadeIn">
            <div class="row">

                <div class="col-sm-6 col-md-12">
                    <div class="card">
                        <div class="card-header">
                            Result
                        </div>

                        <div class="card-body">
                            <pre>
<!--                           --><?php
                                ini_set('max_execution_time', 600);
                                set_time_limit(0);
                                $exec_insert_master_data = 'D:\Software\Pentaho\data-integration\pan.bat /file:"E:\Kuliah\TA\Backup Server\Pentaho\insert_data_master.ktr" -level:"Basic"';
                                shell_exec($exec_insert_master_data);

                                $exec_sinkronisasi_master_data = 'D:\Software\Pentaho\data-integration\pan.bat /file:"E:\Kuliah\TA\Backup Server\Pentaho\sinkronisasi_semua_data_aplikasi.ktr" -level:"Basic"';
                                shell_exec($exec_sinkronisasi_master_data);

                                $exec_lookup_master_data = 'D:\Software\Pentaho\data-integration\kitchen.bat /file:"E:\Kuliah\TA\Backup Server\Pentaho\job_lookup_all_database_star_schema.kjb" -level:"Basic"';
                                shell_exec($exec_lookup_master_data);

                                printf(shell_exec($exec_insert_master_data));
                                echo $exec_insert_master_data;

                                printf(shell_exec($exec_sinkronisasi_master_data));
                                echo $exec_sinkronisasi_master_data;

                                printf(shell_exec($exec_lookup_master_data));
                                echo $exec_lookup_master_data;
                                ////trigger pentaho on linux environment
                                //                                ini_set('max_execution_time', 600);
                                //                                set_time_limit(0);
                                //                                $exec_insert_master_data = 'bash /opt/data-integration/pan.sh -file=/opt/data-integration/insert_data_master.ktr -level:"Basic"';
                                //                                echo shell_exec($exec_insert_master_data);

                                //                                $exec_sinkronisasi_master_data = 'bash /opt/data-integration/kitchen.sh -file=/opt/data-integration/job untuk sinkronisasi.kjb -level:"Basic"';
                                //                                echo shell_exec($exec_sinkronisasi_master_data);

                                //                                $exec_lookup_master_data = 'bash /opt/data-integration/kitchen.sh -file=/opt/data-integration/job lookup all database star schema.kjb -level:"Basic"';
                                //                                echo shell_exec($exec_lookup_master_data);
                                //                            ?>
                            </pre>
                        </div>
                        <div class="card-footer">
                            <a type="button" class="btn btn-sm btn-danger" name="back" id="back"
                               href="{{ URL::previous() }}"><i class="fa fa-ban"></i> Back</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

