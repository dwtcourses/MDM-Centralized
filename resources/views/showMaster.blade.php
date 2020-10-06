@extends('master')
@section('content')

   <div class="container-fluid">
       <div class="animate fadeIn">

            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <i class="fa fa-align-justify"></i> Master Data Table
                        </div>
                        <br>



                        {{-- <div class="panel-body">
                            <div class="row center">

                                {!! $chart->html() !!}

                                {!! $pie->html() !!}
                            </div>
                        </div>

                        {!! Charts::scripts() !!}
                        {!! $chart->script() !!}

                        {!! $pie->script() !!} --}}

                        {!! Form::open(['method'=>'get']) !!}
                        <div class="form-group row">

                            <label class="col-md-1 col-form-label" for="select" >Source</label>
                            <div class="col-md-3">
                                {!! Form::select('source',['-1'=>'Select Data Source','ereg'=>'ereg','asrot'=>'asrot','etrack_dn'=>'etrack_dn','etrack_ln'=>'etrack_ln'],null,['class'=>'form-control','onChange'=>'form.submit()']) !!}
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


                        <div class="card-body">
                            <table class="table table-responsive-sm table-bordered table-striped table-sm">
                                <thead>

                                <tr>
                                    <th>id</th>
                                    <th>Company Name</th>
                                    <th>Address</th>
                                    <th>Source</th>
                                    <th>Used By</th>
                                    <th>Created At</th>
                                    <th>Update At</th>

                                </tr>
                                </thead>
                                <tbody>
                                @foreach($sId as $v)

                                <tr>
                                    <th>{{ $v->id }}</th>
                                    <td>{{ $v->company_name }}</td>
                                    <td>{{ $v->address }}</td>
                                    <td>{{ $v->source }}</td>
                                    <td>
                                        <a href="viewMeta/{{$v->id}}" ><button type="button" class="btn btn-sm btn-success" >See Details</button></a>
                                    </td>
                                    <td>{{ $v->created_at }}</td>
                                    <td>{{ $v->updated_at }}</td>

                                </tr>

                                @endforeach

                                </tbody>
                            </table>

                        </div>
                        {{ $sId->links('vendor.pagination.bootstrap-4') }}
                    </div>
                </div>
            </div>
       </div>
   </div>

@endsection