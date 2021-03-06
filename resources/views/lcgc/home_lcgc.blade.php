@extends('lcgc')
@section('content')

    <div class="container-fluid">
        <div class="animated fadeIn">
            <div class="card-columns cols-2">
                <div class="row ">




                    <div class="container-fluid">
                        <div class="animate fadeIn">
                            <div class="row">
                                <div class="col-6">

                                    <iframe src="http://localhost:8000/lcgc/chart" height="550px" width="1100"></iframe>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    {!! Form::open(['method'=>'get']) !!}
                    <div class="form-group row">
                                                <label class="col-md-1 col-form-label" for="select">Select</label>
                                                <div class="col-md-2">
                                                    {!! Form::select('data_source',['-1'=>'Select Data Source','LCGC_subkontraktor'=>'LCGC Sub Contractor','LCGC_supplier'=>'LCGC Supplier'],null,['class'=>'form-control','onChange'=>'form.submit()']) !!}
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
                    <form action="{{url('insert_lcgc')}}" method="post">
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
                                    <th>ID Sektor</th>
                                    <th>Nama Perusahaan</th>
                                    <th>Alamat</th>
                                    <th>ID Sektor</th>


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
                                        <td>{{ $cs->sector_id }}</td>
                                        <td>{{ $cs->master_data_company_name }}</td>
                                        <td>{{ $cs->master_data_address }}</td>
                                        <td>{{ $cs->master_data_sector_id }}</td>
                                    </tr>

                                @endforeach


                                </tbody>

                            </table>


                        </div>

                        {{ $customers->links('vendor.pagination.bootstrap-4') }}

                        <div class="card-footer">
                            <button type="submit" class="btn btn-sm btn-primary" name="submit" id="submit"><i
                                        class="fa fa-dot-circle-o"></i>
                                Insert
                            </button>

                            <button type="submit" class="btn btn-sm btn-danger" name="update" id="update"><i class="fa fa-ban"></i> Update</button>
{{--                            <button type="submit" class="btn btn-sm " name="send" id="send">Send</button>--}}
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>

@endsection

