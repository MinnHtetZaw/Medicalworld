@extends('master')

@section('title','Purchase History')

@section('place')

@endsection

@section('content')

<div class="row page-titles">
    <div class="col-md-5 col-8 align-self-center">
        <h4 class="font-weight-normal">Financial Master Setting</h4>
    </div>

    @if ($data == null)
    <div class="col-md-7 col-4 align-self-center">
        <div class="d-flex m-t-10 justify-content-end">

            <a href="#"  data-toggle="modal" data-target="#add_setting" class="btn btn-outline-primary">
                <i class="fas fa-plus"></i>
                Setting  @lang('lang.create')
            </a>
        </div>
    </div>
    @endif

</div>

<div class="row justify-content-center">
    <div class="card shadow">
        <div class="card-body">
            <div class="table-responsive text-black">
                <table class="table">
                    <thead>
                        <tr class="text-center">
                            <th>Financial Year From</th>
                            <th>Financial Year To</th>
                            <th>Showroom Sales Account</th>
                            <th>B2B Sales Account</th>
                            <th>Purchase Account</th>
                            <th class="text-center">@lang('lang.action')</th>
                        </tr>
                    </thead>
                    <tbody class="text-center">
                            @if ($data != null)

                            <tr>

                                <th>{{ $data->financial_year_from}}</th>
                                <th>{{$data->financial_year_to}}</th>
                                <th>{{$data->showroom->account_name}}</th>
                                <th>{{$data->b2bSales->account_name}}</th>
                                <th>{{$data->purchaseAccount->account_name}}</th>

                                <th class="text-center">
                                    <a href="#" data-toggle="modal" data-target="#update_setting" class="btn btn-outline-primary">
                                        Update
                                    </a>
                                </th>
                            </tr>
                            @endif

                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="add_setting" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Setting</h4>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
            </div>

            <div class="modal-body">

                <form action="{{route('settingCreate')}}" method="POST">


                    @csrf

                    <div class="form-group mt-3">
                        <label class="control-label">Financial Year From</label>
                        <input type="date" class="form-control" name="year_from">

                    </div>

                    <div class="form-group mt-3">
                        <label class="control-label">Financial Year to</label>
                        <input type="date" class="form-control" name="year_to">

                    </div>

                    <div class="form-group mt-3">
                        <label class="control-label">Showroom Sales Account</label>
                        <select class="form-control sales_account"  style="width: 100%" name="sales_account" >
                            <option hidden>Showroom Sales Account</option>
                           @foreach ($accounts as $acc)

                            <option value="{{$acc->id}}">{{$acc->account_name}}-{{$acc->account_code}}-{{$acc->currency->name}}</option>
                           @endforeach
                        </select>
                    </div>


                    <div class="form-group mt-3" >
                        <label class="control-label">B2B Sales Account</label>
                        <select class="form-control b2b_sale"  style="width: 100%" name="b2b_sale">
                            <option hidden>Select B2B Sales Account</option>
                           @foreach ($accounts as $acc)

                            <option value="{{$acc->id}}">{{$acc->account_name}}-{{$acc->account_code}}-{{$acc->currency->name}}</option>
                           @endforeach
                        </select>
                    </div>

                            <div class="form-group mt-3">

                                <label class="control-label">Purchase Account</label>
                                <select class="form-control purchase_acc"  style="width: 100%" name="purchase_acc">
                                    <option hidden>Purchase Account</option>
                                   @foreach ($accounts as $acc)
                                    <option value="{{$acc->id}}">{{$acc->account_name}}-{{$acc->account_code}}-{{$acc->currency->name}}</option>
                                   @endforeach

                                </select>
                            </div>

                                <div class="row">
                                    <div class="mt-4 col-md-9">
                                        <button type="submit" class="btn btn-success">Submit</button>
                                        <button type="button" class="btn btn-inverse btn-dismiss" data-dismiss="modal">Cancel</button>
                                    </div>
                                </div>

                </form>
            </div>
        </div>
    </div>
</div>


<div class="modal fade" id="update_setting" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Setting</h4>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
            </div>

            <div class="modal-body">

                <form action="{{route('settingUpdate')}}" method="POST">


                    @csrf

                    <div class="form-group mt-3">
                        <label class="control-label">Financial Year From</label>
                        <input type="date" class="form-control" name="year_from" value={{$data->financial_year_from}}>

                    </div>

                    <div class="form-group mt-3">
                        <label class="control-label">Financial Year to</label>
                        <input type="date" class="form-control" name="year_to"  value={{$data->financial_year_to}}>

                    </div>

                    <div class="form-group mt-3">
                        <label class="control-label">Showroom Sales Account</label>
                        <select class="form-control sales_account" style="width: 100%" name="sales_account" >
                            <option value={{$data->showroom_sales_account_id}}>{{$data->showroom->account_name}}</option>

                           @foreach ($accounts as $acc)
                            @if($data->showroom_sales_account_id != $acc->id)
                            <option value="{{$acc->id}}">{{$acc->account_name}}-{{$acc->account_code}}-{{$acc->currency->name}}</option>
                            @endif
                           @endforeach
                        </select>
                    </div>


                    <div class="form-group mt-3" >
                        <label class="control-label">B2B Sales Account</label>
                        <select class="form-control b2b_sale"  style="width: 100%" name="b2b_sale">
                            <option value={{$data->b2b_sales_account_id}}>{{$data->b2bSales->account_name}}</option>
                           @foreach ($accounts as $acc)
                           @if($data->b2b_sales_account_id != $acc->id)
                            <option value="{{$acc->id}}">{{$acc->account_name}}-{{$acc->account_code}}-{{$acc->currency->name}}</option>
                            @endif
                           @endforeach
                        </select>
                    </div>

                            <div class="form-group mt-3">

                                <label class="control-label">Purchase Account</label>
                                <select class="form-control purchase_acc"  style="width: 100%" name="purchase_acc">
                                    <option value={{$data->purchase_account_id}}>{{$data->purchaseAccount->account_name}}</option>
                                   @foreach ($accounts as $acc)
                                   @if($data->purchase_account_id != $acc->id)
                                    <option value="{{$acc->id}}">{{$acc->account_name}}-{{$acc->account_code}}-{{$acc->currency->name}}</option>
                                    @endif
                                   @endforeach

                                </select>
                            </div>

                                <div class="row">
                                    <div class="mt-4 col-md-9">
                                        <button type="submit" class="btn btn-success">Update</button>
                                        <button type="button" class="btn btn-inverse btn-dismiss" data-dismiss="modal">Cancel</button>
                                    </div>
                                </div>

                </form>
            </div>
        </div>
    </div>
</div>
@endsection
@section('js')
    <script  type="text/javascript">

            $(document).ready(function(){

                $('.sales_account').select2();
                $('.purchase_acc').select2();
                $('.b2b_sale').select2();

            });


    </script>
@endsection
