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
                            <i class="fa fa-align-justify"></i> Insert Table History
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
                                        <th>Company Name</th>
                                        <th>Address</th>
                                        {{-- <th>Sector ID</th> --}}
                                        {{-- <th>Role</th> --}}
                                        <th>Source</th>
                                        <th>Created At</th>


                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($hisIns as $his)
                                        <tr>
                                            <th>{{ $his->id }}</th>
                                            <td>{{ $his->company_name }}</td>
                                            <td>{{ $his->address }}</td>
                                            {{-- <td>{{ $his->sector_id }}</td> --}}
                                            {{-- <td>{{ $his->role }}</td> --}}
                                            <td>{{ $his->source }}</td>
                                            <td>{{ $his->created_at }}</td>


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