@extends('master')
@section('content')
<div class="col-md-12 mb-4">
    <ul class="nav nav-tabs" role="tablist">
        <li class="nav-item">
            <a class="nav-link active" data-toggle="tab" href="#insert" role="tab" aria-controls="home">Insert</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-toggle="tab" href="#upd" role="tab" aria-controls="profile">Update</a>
        </li>

    </ul>

    <div class="tab-content">
        <div class="tab-pane active" id="insert" role="tabpanel">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="text">
                            <div class="card-header">
                                <i class="fa fa-align-justify"></i> Table Result
                            </div>
                            {{ csrf_field() }}
                            <div class="card-body">
                                <table class="table table-responsive-sm table-bordered table-striped table-sm">
                                    <thead>

                                    <tr>
                                        <th>Running At</th>
                                        <th>Data Source</th>
                                        <th>Result</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($dataHs as $sh)
                                        <tr>
                                            <td>{{ $sh->created_at }}</td>
                                            <td>{{ $sh->source }}</td>

                                            <td>
                                                <a href="history/insert/{{$sh->created_at}}" ><button type="button" class="btn btn-sm btn-success" >See Result</button></a>
                                            </td>
                                        </tr>
                                    @endforeach

                                    </tbody>
                                </table>
                            </div>

                        </div>
                    </div>
                </div>
                <!--/.col-->
            </div>
        </div>
        <div class="tab-pane" id="upd" role="tabpanel">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="text">
                            <div class="card-header">
                                <i class="fa fa-align-justify"></i> Table Result
                            </div>
                            <div class="card-body">
                                <table class="table table-responsive-sm table-bordered table-striped table-sm">
                                    <thead>

                                    <tr>
                                        <th>Running At</th>
                                        <th>Data Source</th>
                                        <th>Result</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($dataUp as $up)
                                        <tr>
                                            <td>{{ $up->created_at }}</td>
                                            <td>{{ $up->data_source }}</td>

                                            <td>
                                                <a href="history/update/{{$up->created_at}}" ><button type="button" class="btn btn-sm btn-success" >See Result</button></a>
                                            </td>
                                        </tr>
                                    @endforeach

                                    </tbody>
                                </table>
                            </div>

                        </div>
                    </div>
                </div>
                <!--/.col-->
            </div>
        </div>

    </div>
    </div>
</div>

</div>
</div>
@endsection