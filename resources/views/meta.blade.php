@extends('master')
@section('content')
    <head>
        <style>

            .text {
                height: 450px;
                overflow-y: auto;
            }
        </style>
    </head>
    <div class="container-fluid">
        <div class="animate fadeIn">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <i class="fa fa-align-justify"></i> Table List Reference
                        </div>
                        <div class="card-footer">
                            <a type="button" class="btn btn-sm btn-danger" name="back" id="back" href="{{ URL::previous() }}"><i class="fa fa-ban" ></i> Back</a>
                        </div>
                        <div class="text">
                            <div class="card-body">
                                <table class="table table-responsive-sm table-bordered table-striped table-sm">
                                    <thead>

                                    <tr>
                                        <th>id</th>
                                        <th>Master Data Id</th>
                                        <th>Company Name</th>
                                        <th>Address</th>
                                        <th>Source</th>
                                        <th>Synchronized At</th>



                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($viewMet as $met)
                                        <tr>
                                            <th>{{ $met->id }}</th>
                                            <td>{{ $met->master_data_id }}</td>
                                            <td>{{ $met->company_name }}</td>
                                            <td>{{ $met->address }}</td>
                                            <td>{{ $met->data_source }}</td>
                                            <td>{{ $met->synchronized_at }}</td>



                                        </tr>
                                    @endforeach

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
