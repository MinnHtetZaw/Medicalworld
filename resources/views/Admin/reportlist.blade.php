@extends('master')
@section('title','Report')
@section('link','Report  List')
@section('content')
    <div class="row">
        <div class="col-12 mt-5">

            <div class="d-flex justify-content-around align-items-center ">
                <div class="card p-3">

                    <div class="card-body">
                        <h5 class="card-title">Statement of Financial</h5>
                        <a href="{{ route('sofbList') }}" class="btn btn-primary">Go to Detail List</a>
                    </div>
                </div>
                <div class="card p-3">

                    <div class="card-body">
                        <h5 class="card-title">Statement of Profit and Loss</h5>
                        <a href="{{ route('soplList') }}" class="btn btn-primary">Go to Detail List</a>
                    </div>
                </div>
                <div class="card p-3">

                    <div class="card-body">
                        <h5 class="card-title">Tril Balance Sheet</h5>
                        <a href="{{ route('trilList') }}" class="btn btn-primary">Go to Detail List</a>
                    </div>
                </div>
            </div>
        </div>
    </div>






@endsection

@section('js')

@endsection

