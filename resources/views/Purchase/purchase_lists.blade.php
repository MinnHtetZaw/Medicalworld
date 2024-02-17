@extends('master')

@section('title','Purchase History')

@section('place')

{{-- <div class="col-md-5 col-8 align-self-center">
    <h3 class="text-themecolor m-b-0 m-t-0">@lang('lang.purchase_history') @lang('lang.list')</h3>
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{route('index')}}">@lang('lang.back_to_dashboard')</a></li>
        <li class="breadcrumb-item active">@lang('lang.purchase_history') @lang('lang.list')</li>
    </ol>
</div> --}}

@endsection

@section('content')

<div class="row page-titles">
    <div class="col-md-5 col-8 align-self-center">
        <h4 class="font-weight-normal">@lang('lang.purchase_history') @lang('lang.list')</h4>
    </div>

    <div class="col-md-7 col-4 align-self-center">
        <div class="d-flex m-t-10 justify-content-end">
            <a href="{{route('create_purchase')}}" class="btn btn-outline-primary">
                <i class="fas fa-plus"></i>
                @lang('lang.purchase_history') @lang('lang.create')
            </a>
        </div>
    </div>
</div>

<div class="row justify-content-center">
    <div class="card shadow">
        <div class="card-body">
            <div class="table-responsive text-black">
                <table class="table">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>@lang('lang.purchase_date')</th>
                            <th>@lang('lang.total') @lang('lang.quantity')</th>
                            <th>@lang('lang.total') @lang('lang.price')</th>
                            <th>Type</th>
                            <th>@lang('lang.purchase_by')</th>

                            <th>@lang('lang.supplier_name')</th>
                            <th class="text-center">@lang('lang.action')</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i=1;?>
                        @foreach($purchase_lists as $list)
                            <tr>
                                <th>{{$i++}}</th>
                                <th>{{date('d-m-Y', strtotime($list->purchase_date))}}</th>
                                <th>{{$list->total_quantity}}</th>
                                <th>{{$list->total_price}}</th>
                                <th>{{$list->factory_po_number ?? "Default Purchase"}}</th>
                                <th>{{$list->user->name}}</th>
                                <th>{{$list->supplier_name}}</th>
                                <th class="text-center">
                                    <a href="{{route('purchase_details',$list->id)}}" class="btn btn-outline-primary">
                                        <i class="fas fa-check"></i>
                                        Check Details
                                    </a>
                                </th>
                                <th class="text-center"><a class="btn btn-primary btn-sm " data-toggle="collapse" href="#related{{$list->id}}" role="button" aria-expanded="false" aria-controls="multiCollapseExample1">Related</a></th>
                                    <th> <button type="button" data-toggle="modal" data-target="#add_expenses{{$list->id}}" class="btn btn-primary" onclick="hide_bank_acc({{$list->id}})"><i class="fas fa-plus"></i> Add Expense</button>
                                        <tr >
                                            <td colspan="9">
                                                <div class="collapse offset-2" id="related{{$list->id}}">
                                                    <table class="table" style="background-color:blanchedalmond">
                                                        <thead>
                                                            <tr >
                                                                <th>No</th>
                                                                <th>Account</th>
                                                                <th>Debit</th>
                                                                <th>Credit</th>
                                                                <th>Date</th>

                                                            </tr>

                                                        </thead>
                                                        <tbody>
                                                            <?php $j=1 ?>
                                                            @foreach($bank_cash_tran as $transa)
                                                            @if($transa->purchase_id == $list->id)

                                                            <tr>
                                                                <td>{{$j++}}</td>
                                                                <td>{{$transa->accounting->account_code}}-({{$transa->accounting->account_name}})</td>
                                                                @if ($transa->type == 'Debit')
                                                                    <td>{{$transa->transactionFormat()}}</td>
                                                                    <td>-</td>
                                                                @elseif ($transa->type == 'Credit')
                                                                    <td>-</td>
                                                                    <td>{{$transa->transactionFormat()}}</td>
                                                                @endif

                                                                <td>{{$transa->date}}</td>
                                                            </tr>
                                                            @endif
                                                            @endforeach

                                                        </tbody>
                                                    </table>
                                                    {{-- <div class=" mt-3">
                                                        {{$purchase_lists->links()}}
                                   
                                                       {{$purchase_lists->appends(request()->query())->links()}}
                                                   </div> --}}

                                                </div>

                                            <td>
                                            </tr>
                                    </th>
                            </tr>

                            <div class="modal fade" id="add_expenses{{$list->id}}" role="dialog" aria-hidden="true">
                                <div class="modal-dialog modal-lg" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h4 class="modal-title">Expense</h4>
                                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                              </button>
                                        </div>

                                        <div class="modal-body">

                                            <form action="{{route('store_factorypo_expense')}}" method="POST">

                                                @csrf
                                                <input type="text" value="{{$list->id}}" name="purchase_id" hidden>
                                                <div class="row offset-md-5">
                                                    <div class="col-md-2">
                                                    <div class="form-check form-check-inline">

                                                        <input class="form-check-input" type="radio" name="account" id="bank{{$list->id}}" value="1" onclick="show_bank_acc({{$list->id}})">

                                                        <label class="form-check-label text-success" for="bank{{$list->id}}">Bank</label>
                                                      </div>
                                                    </div>
                                                    <div class="col-md-2">
                                                      <div class="form-check form-check-inline">


                                                        <input class="form-check-input" type="radio" name="account" id="cash{{$list->id}}" value="2" onclick="show_cash_acc({{$list->id}})">

                                                        <label class="form-check-label text-success" for="cash{{$list->id}}">Cash</label>
                                                    </div>
                                                    </div>
                                                </div>

                                                <div class="form-group mt-3 bbbb" id="bankkk{{$list->id}}" >
                                                    <label class="control-label">Bank Account</label>
                                                    <select class="form-control" name="bank_acc" id="bank_acc" class="bk">
                                                        <option value="">Select Bank Account</option>

                                                       @foreach ($bank_account as $acc)


                                                        <option value={{$acc->id}}>{{$acc->account_name}}-{{$acc->account_code}}-{{$acc->currency->name}}</option>


                                                       @endforeach
                                                    </select>
                                                </div>


                                                <div class="form-group mt-3 cccc" id="cashhh{{$list->id}}" >
                                                    <label class="control-label">Cash Account</label>
                                                    <select class="form-control" name="cash_acc" id="cash_acc">
                                                        <option value="">Select Cash Account</option>
                                                       @foreach ($cash_account as $acc)


                                                        <option value={{$acc->id}}>{{$acc->account_name}}-{{$acc->account_code}}-{{$acc->currency->name}}</option>


                                                        @endforeach
                                                    </select>
                                                </div>


                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="control-label">Iitial Amount</label>

                                                <input type="number" class="form-control" name="initial_amount" id="convert_amount" value="0">

                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="control-label">Initial Currency</label>

                                                <select name="initial_currency_id" id="initial_currency" class="form-control mt-1">

                                                    <option value="">Choose Currency</option>
                                                    @foreach ($currency as $curr)
                                                        <option value="{{$curr->id}}">{{$curr->name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="control-label">Final Amount</label>

                                                <input type="number" class="form-control" name="final_amount" id="final_value" value="0">

                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="control-label">Final Currency</label>

                                                <select name="final_currency_id" id="" class="form-control mt-1" onchange="convert(this.value)">

                                                    <option value="">Choose Currency</option>
                                                    @foreach ($currency as $curr)
                                                        <option value="{{$curr->id}}"  > <p id="convert-mmk-to-usd-button"> {{$curr->name}}</p></option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                                        <div class="form-group">
                                                            <label class="control-label">Date</label>

                                                            <input type="date" class="form-control"  name="date">

                                                        </div>

                                                        <div class="form-group">
                                                            <label class="control-label">Remark</label>
                                                            <input type="text" class="form-control" name="remark">
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
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<div class="row justify-content-center mt-3">
    <div class="col-4"></div>
    <div class="col-8">
        {{ $purchase_lists->links() }}
    </div>
</div>
@endsection

@section('js')

<script>
$( document ).ready(function() {
        $('.bbbb').hide();
        $('.cccc').hide();
    });

function show_bank_acc(id){
    // alert('hello');
    $('#cashhh'+id).hide();
    $('#bankkk'+id).show();

}

function show_cash_acc(id){
    // alert('hello');
    $('#bankkk'+id).hide();
    $('#cashhh'+id).show();
}

function hide_bank_acc(id){
    // alert('hello');
    $('#bankkk'+id).hide();
    $('#cashhh'+id).hide();
    $('#proj').hide();
}

function show_project(){
        // alert('hello');
        $('#proj').show();
}

function hide_project(){
        // alert('hello');
        $('#proj').hide();
}

function convert(val){


$.ajax({
       type:'GET',
       url:'/financial_ajax_convert',
       dataType:'json',
       data:{ "_token": "{{ csrf_token() }}",
        },
       success:function(data){
            swal({
                    title: "Are You Sure Convert Currency?",
                    icon: 'warning',
                    buttons: ["No", "Yes"]
                })
                .then((isConfirm) => {

                if (isConfirm) {
                   var initial_curr = $('#initial_currency').val();
                   var amt =  $('#convert_amount').val();

                //    console.log(initial_curr,'af',amt,'ata',val);
                   if(val == 4 && initial_curr == 5){
                       var con_amt = amt * data.usd_rate.exchange_rate;
                       $('#final_value').val(con_amt);
                   }
                   else if(val == 4 && initial_curr == 6){
                    var con_amt = amt * data.euro_rate.exchange_rate;
                       $('#final_value').val(con_amt);
                   }
                   else if(val == 4 && initial_curr == 9){
                    var con_amt = amt * data.sgp_rate.exchange_rate;
                       $('#final_value').val(con_amt);
                   }
                   else if(val == 4 && initial_curr == 10){
                    var con_amt = amt * data.jpn_rate.exchange_rate;
                       $('#final_value').val(con_amt);
                   }
                   else if(val == 4 && initial_curr == 11){
                    var con_amt = amt * data.chn_rate.exchange_rate;
                       $('#final_value').val(con_amt);
                   }
                   else if(val == 4 && initial_curr == 12){
                    var con_amt = amt * data.idn_rate.exchange_rate;
                       $('#final_value').val(con_amt);
                   }
                   else if(val == 4 && initial_curr == 13){
                    var con_amt = amt * data.mls_rate.exchange_rate;
                       $('#final_value').val(con_amt);
                   }
                   else if(val == 4 && initial_curr == 14){
                    var con_amt = amt * data.thai_rate.exchange_rate;
                       $('#final_value').val(con_amt);
                   }
                   else if(val == 5 && initial_curr == 4){
                    var con_amt = parseInt(amt / data.usd_rate.exchange_rate);

                       $('#final_value').val(con_amt);
                   }
                   else if(val == 6 && initial_curr == 4){
                    var con_amt = parseInt(amt / data.euro_rate.exchange_rate);
                       $('#final_value').val(con_amt);
                   }
                   else if(val == 9 && initial_curr == 4){
                    var con_amt = parseInt(amt / data.sgp_rate.exchange_rate);
                       $('#final_value').val(con_amt);
                   }
                   else if(val == 10 && initial_curr == 4){
                    var con_amt = parseInt(amt / data.jpn_rate.exchange_rate);
                       $('#final_value').val(con_amt);
                   }
                   else if(val == 11 && initial_curr == 4){
                    var con_amt = parseInt(amt / data.chn_rate.exchange_rate);
                       $('#final_value').val(con_amt);
                   }
                   else if(val == 12 && initial_curr == 4){
                    var con_amt = parseInt(amt / data.idn_rate.exchange_rate);
                       $('#final_value').val(con_amt);
                   }
                   else if(val == 13 && initial_curr == 4){
                    var con_amt = parseInt(amt / data.mls_rate.exchange_rate);
                       $('#final_value').val(con_amt);
                   }
                   else if(val == 14 && initial_curr == 4){
                    var con_amt = parseInt(amt / data.thai_rate.exchange_rate);
                       $('#final_value').val(con_amt);
                   }
                }
            })

       }
});
}

</script>
@endsection
