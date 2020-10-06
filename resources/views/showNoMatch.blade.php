@extends('master')
@section('content')
    <head>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
{{--        <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">--}}
    </head>
    @if(session()->has('message'))
        <div class="alert alert-success">
            {{ session()->get('message') }}
        </div>
    @endif
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    {!! Form::open(['method'=>'get']) !!}
                    <div class="form-group row">
                        <label class="col-md-1 col-form-label" for="select">Select</label>
                        <div class="col-md-2">
                            {!! Form::select('data_source',['-1'=>'Select Data Source','table_app1'=>'table_app1','table_app2'=>'table_app2','table_app31'=>'table_app3-1','table_app32'=>'table_app3-2'],null,['class'=>'form-control','onChange'=>'form.submit()']) !!}
                        </div>

                        <br>


                        <div class="col-md-6">
                            <div class="input-group">
                                            <span class="input-group-btn">
                                                 <button type="button" class="btn btn-primary"><i class="fa fa-search"></i> Search</button>
                                            </span>
                                <input type="text" id="search" name="search" class="form-control" value="{{ request('search') }}" placeholder="">
                            </div>
                        </div>
                        <input type="hidden" value="{{request('field')}}" name="field"/>
                        <input type="hidden" value="{{request('sort')}}" name="sort"/>
                    </div>

                    {!! Form::close() !!}
                    <form action="{{url('insert')}}" method="post">
                        {{ csrf_field() }}
                        @if (session('error'))
                            <div class="alert alert-danger">{{ session('error') }}</div>
                        @endif

                        <div class="card-header">
                            <i class="fa fa-align-justify"></i> Table Result Data No Match<Match></Match>
                        </div>

                        <div class="container">
                            <table class="table table-responsive-sm table-bordered table-striped table-sm">
                                <thead>
                                <tr>
                                    <th colspan="4">App Data</th>
                                    <th colspan="3">Master Data</th>
                                </tr>
                                <tr>
                                    <th></th>
                                    <th>Nama Perusahaan</th>
                                    <th>Alamat</th>
                                    {{-- <th>ID Sektor</th> --}}
                                    <th>Nama Perusahaan</th>
                                    <th>Alamat</th>
                                    {{-- <th>ID Sektor</th> --}}


                                </tr>
                                </thead>
                                <tbody>


                                @foreach($customers as $cs)
                                    <tr>
                                        <td>
                                            <input type="checkbox" name="check[]" id="check"
                                                   value="{{$cs->id}}"/>
                                        </td>
                                        <td>{{ $cs->company_name }}</td>
                                        <td>{{ $cs->address }}</td>
                                        {{-- <td>{{ $cs->sector_id }}</td> --}}
                                        <td>{{ $cs->master_data_company_name }}</td>
                                        <td>{{ $cs->master_data_address }}</td>
                                        {{-- <td>{{ $cs->master_data_sector_id }}</td> --}}
                                    </tr>

                                @endforeach


                                </tbody>

                            </table>


                        </div>

                        {{ $customers->links('vendor.pagination.bootstrap-4') }}

{{--                        <div class="card-footer">--}}
{{--                            <button type="submit" class="btn btn-sm btn-primary" name="submit" id="submit"><i--}}
{{--                                        class="fa fa-dot-circle-o"></i>--}}
{{--                                Insert--}}
{{--                            </button>--}}

{{--                            <button type="submit" class="btn btn-sm btn-danger" name="update" id="update"><i class="fa fa-ban"></i> Update</button>--}}
{{--                            <button type="submit" class="btn btn-sm " name="send" id="send">Send</button>--}}
{{--                        </div>--}}
                    </form>

                </div>
            </div>
        </div>
    </div>




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
                                                    <th></th>
                                                    <th>Running At</th>
                                                    <th>Data Source</th>
                                                    <th>Result</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                @foreach($dataHs as $sh)
                                                    <tr>
                                                        <td></td>
                                                        <td>{{ $sh->created_at }}</td>
                                                        <td>{{ $sh->source }}</td>

                                                        <td>
                                                            <a href="viewHistori/insert/{{$sh->created_at}}" ><button type="button" class="btn btn-sm btn-success" >See Result</button></a>
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
                                                    <th></th>
                                                    <th>Running At</th>
                                                    <th>Data Source</th>
                                                    <th>Result</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                @foreach($dataUp as $up)
                                                    <tr>
                                                        <td></td>
                                                        <td>{{ $up->created_at }}</td>
                                                        <td>{{ $up->data_source }}</td>

                                                        <td>
                                                            <a href="viewHistori/update/{{$up->created_at}}" ><button type="button" class="btn btn-sm btn-success" >See Result</button></a>
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

