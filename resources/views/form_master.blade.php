@extends('default_master')
@section('css')
    <style>
        .form-group.required label:after {
            content: " *";
            color: red;
            font-weight: bold;
        }
    </style>
@endsection
@section('content')
    <div class="container">
        <div class="col-md-8 offset-md-2">
            <h1>{{isset($customer)?'Edit':'New'}} Customer</h1>
            <hr/>
            @if(isset($customer))
                {!! Form::model($customer,['method'=>'put']) !!}
            @else
                {!! Form::open() !!}
            @endif
            <div class="form-group row required">
                {!! Form::label("name","Name",["class"=>"col-form-label col-md-3 col-lg-2"]) !!}
                <div class="col-md-8">
                    {!! Form::text("name",null,["class"=>"form-control".($errors->has('name')?" is-invalid":""),"autofocus",'placeholder'=>'Name']) !!}
                    {!! $errors->first('name','<span class="invalid-feedback">:message</span>') !!}
                </div>
            </div>
            <div class="form-group row">
                {!! Form::label("source","data_source",["class"=>"col-form-label col-md-3 col-lg-2"]) !!}
                <div class="col-md-8">
                    {!! Form::select("source",['BMDTP'=>'BMDTP','IJEPA'=>'IJEPA','LCGC_subkontraktor'=>'LCGC Sub Contractor','LCGC_supplier'=>'LCGC Supplier'],null,["class"=>"form-control"]) !!}
                </div>
            </div>
            <div class="form-group row required">
                {!! Form::label("email","Email",["class"=>"col-form-label col-md-3 col-lg-2"]) !!}
                <div class="col-md-8">
                    {!! Form::text("email",null,["class"=>"form-control".($errors->has('email')?" is-invalid":""),'placeholder'=>'Email']) !!}
                    {!! $errors->first('email','<span class="invalid-feedback">:message</span>') !!}
                </div>
            </div>
            <div class="form-group row">
                <div class="col-md-3 col-lg-2"></div>
                <div class="col-md-4">
                    <a href="{{url('laravel-crud-search-sort')}}" class="btn btn-danger">
                        Back</a>
                    {!! Form::button("Save",["type" => "submit","class"=>"btn
                btn-primary"])!!}
                </div>
            </div>
            {!! Form::close() !!}
        </div>
    </div>
@endsection

