@extends('master')
@section('title','Sale Project List')
@section('link','Sale Project List')
@section('content')

<div class="row">
  <div class="col-md-6">
      <div class="row">
    <div class="form-group col-md-5">
        <label>From</label>
        <input type="date" name="from" id="from" class="form-control">
    </div>
    <div class="form-group col-md-5">
        <label>To</label>
        <input type="date" name="to" id="to" class="form-control">
    </div>
    <div class="form-group col-md-2">

        <button class="btn btn-sm btn-primary form-control" style="margin-top:38px;" onclick="date_filter()">Search</button>
    </div>
</div>

</div>
<div class="offset-md-1 col-md-5">
    <div class="input-group" style="margin-top:35px;">
        <input type="search" class="form-control rounded" id="search_code" placeholder="Enter Account Code" aria-label="Search" aria-describedby="search-addon" />
        <button type="button" class="btn btn-outline-primary" onclick="acc_code_search()">search</button>
      </div>
</div>
</div>
<div class="col-md-6 mt-8">
    <div class="d-flex">
        <form action="{{route('financialExpenseImport')}}" enctype="multipart/form-data" method="POST">
            @csrf
            <input type="file" name="import_file" required>

            <button type="submit" class="btn btn-danger">Expense Import</button>
        </form>
        
        <a href="{{ route('financialExpenseExport') }}" class="btn btn-primary mx-2">Expense Export</a>

        {{-- <form action="#" enctype="multipart/form-data" method="POST">
            @csrf
            <input type="file" name="import_file" required>
            <button type="submit" class="btn btn-danger">UnitImport</button>
        </form> --}}
    </div>
</div>
<div class="row">
    <div class="col-12">
          <div class="card">
          <div class="card-header">

            <div class="col-12">
          <div class="row justify-content-between">
           <label for="name">Expense Transaction List</label>

                    <span class="float-right"><button type="button" data-toggle="modal" data-target="#add_expenses" class="btn btn-primary" onclick="hide_bank_acc()"><i class="fas fa-plus"></i> Add Expense</button> </span>

          </div>

          <div class="row" id="trial_balance">

          </div>

          </div>

        </div>
        <div class="card-body">
            <div class="row">
        <div class="col-md-12">

            <div class="table-responsive text-black" id="slimtest2">

                <table class="table table-hover" id="filter_date">


                            <thead class="bg-info text-white">
                            <tr>
                                <th>#</th>
                                <th class="text-center">Code</th>
                                <th class="text-center">Account</th>
                                <th class="text-center">Date</th>
                                <th class="text-center">Debit</th>
                                <th class="text-center">Credit</th>
                                <th class="col-3 text-center">Remark</th>
                                <th class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = 1; ?>
                            @foreach ($expense_tran as $trans)
                            @if($trans->type_flag == 1)
                            <tr class="text-center">
                            <td style="font-size:15px;width:15%;" >{{$i++}}</td>
                            <td style="font-size:15px;width:15%;" >{{$trans->accounting->account_code}} </td>
                            <td style="font-size:15px;width:15%;" >{{$trans->accounting->account_name}}</td>
                            <td style="font-size:15px;width:15%;" >{{$trans->date}}</td>
                            <td style="font-size:15px;width:15%;" >{{$trans->amount}}-{{$trans->currency->name}}</td>
                            <td style="font-size:15px;width:15%;" >-</td>


                            {{-- <td style="font-size:15px;" class="text-center">{{$trans->voucher_id}}</td> --}}
                            <td style="font-size:15px;width:15%;" >{{$trans->remark}}</td>
                            <td class="col-2">
                                <a class="btn btn-primary btn-sm " data-toggle="collapse" href="#related{{$trans->id}}" role="button" aria-expanded="false" aria-controls="multiCollapseExample1">Related</a>
                                <a href="{{route('financial_expense_delete',$trans->id)}}" class="btn btn-danger btn-sm">Delete</a>
                            </td>
                            </tr>

                            <tr>

                                <td colspan="9">
                                    <div class="collapse out container mr-5" id="related{{$trans->id}}">

                                            <?php $j=1 ?>
                                            @foreach($bank_cash_tran as $transa)
                                            @if($trans->related_transaction_id == $transa->id)
                                            @if($transa->type_flag == 2)

                                            <table class="table table-responsive">
                                                <tbody>
                                                    <tr class="text-center">
                                                        <td style="font-size:15px; width:15%;" >-</td>
                                                        <td style="font-size:15px; width:15%;">{{$transa->accounting->account_code}}</td>
                                                        <td style="font-size:15px; width:15%;">{{$transa->accounting->account_name}}</td>
                                                        <td style="font-size:15px; width:15%;">{{$transa->date}}</td>
                                                        <td style="font-size:15px; width:15%;">-</td>
                                                        <td style="font-size:15px; width:15%;">{{$transa->transactionFormat()}}</td>
                                                        <td style="font-size:15px; width:15%;" class="text-center">{{$transa->remark}}</td>
                                                        <td style="font-size:15px; width:15%;">-</td>
                                                        </tr>
                                                </tbody>
                                            </table>
                                            @endif
                                            @endif
                                           @endforeach

                                    </div>

                                <td>
                                </tr>
                        </tbody>
                        @endif
                        @endforeach
                </table>

            </div>
        </div>
    </div>
        </div>
    </div>
</div>
</div>
        <div class="modal fade" id="add_expenses" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Expense</h4>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                    </div>

                    <div class="modal-body">

                        <form action="{{route('store_financial_expense')}}" method="POST">
                            {{-- @php
                                $currency = App\Currency::get();
                            @endphp
                            <input type="hidden" id="{{$currency->id}}"> --}}

                            @csrf
                            <div class="row offset-md-5">
                                <div class="col-md-2">
                                <div class="form-check form-check-inline">

                                    <input class="form-check-input" type="radio" name="account" id="bank" value="1" onclick="show_bank_acc()">

                                    <label class="form-check-label text-success" for="bank">Bank</label>
                                  </div>
                                </div>
                                <div class="col-md-2">
                                  <div class="form-check form-check-inline">


                                    <input class="form-check-input" type="radio" name="account" id="cash" value="2" onclick="show_cash_acc()">

                                    <label class="form-check-label text-success" for="cash">Cash</label>
                                </div>
                                </div>
                            </div>

                            <div class="form-group mt-3" id="bankkk">
                                <label class="control-label">Bank Account</label>
                                <select class="form-control" name="bank_acc" id="bank_acc" class="bk">
                                    <option value="">Select Bank Account</option>
                                   @foreach ($bank_account as $acc)

                                    <option value="{{$acc->id}}">{{$acc->account_name}}-{{$acc->account_code}}-{{$acc->currency->name}}</option>
                                   @endforeach
                                </select>
                            </div>


                            <div class="form-group mt-3" id="cashhh">
                                <label class="control-label">Cash Account</label>
                                <select class="form-control" name="cash_acc" id="cash_acc">
                                    <option value="">Select Cash Account</option>
                                   @foreach ($cash_account as $acc)

                                    <option value="{{$acc->id}}">{{$acc->account_name}}-{{$acc->account_code}}-{{$acc->currency->name}}</option>
                                   @endforeach
                                </select>
                            </div>

                                    <div class="form-group mt-3">

                                        <label class="control-label">Expense Account</label>
                                        <select class="form-control" name="exp_acc">
                                            <option value="">Select Expense Account</option>
                                           @foreach ($exp_account as $acc)
                                            <option value="{{$acc->id}}">{{$acc->account_name}}-{{$acc->account_code}}-{{$acc->currency->name}}</option>
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
                                        <label class="control-label">Voucher Number</label>
                                        <input type="text" class="form-control" name="voucher_id">
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

@endsection

<script>


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

function acc_code_search(){
    // alert('hello');
    var code = $('#search_code').val();
    var debit = 0;
    var credit = 0;
    var balance =0;
    // alert(code);
    $.ajax({
           type:'POST',
           url:'/ajax_code_search',
           dataType:'json',
           data:{ "_token": "{{ csrf_token() }}",
           "code":code,
            },
           success:function(data){
            var html = "";
            var html2 = "";

            html += `
            <thead class="bg-info text-white">
                            <tr>
                                <th>#</th>
                                <th class="text-center">Code</th>

                                <th class="text-center">Account</th>
                                <th class="text-center">Type</th>
                                <th class="text-center">Date</th>
                                <th class="text-center">Amount</th>
                                <th class="text-center">Remark</th>
                                <th class="text-center">Action</th>
                            </tr>
                    </thead>
            `;
            $.each(data.code, function(i, v) {
                // ${v.accounting.account_name}-${v.accounting.account_code}
                // alert(v.remark);
                if(v.type == "Debit"){
                    debit += v.amount;
                }else{
                    credit += v.amount;
                }
                html += `
                    <tbody>
                    <tr>
                            <td style="font-size:15px;" class="text-center">${++i}</td>
                            <td style="font-size:15px;" class="text-center">${v.accounting.account_code}</td>
                            <td style="font-size:15px;" class="text-center">${v.accounting.account_name} </td>
                            <td style="font-size:15px;" class="text-center">${v.type}</td>
                            <td style="font-size:15px;" class="text-center">${v.date}</td>
                            <td style="font-size:15px;" class="text-center">${v.amount}</td>
                            <td style="font-size:15px;" class="text-center">${v.remark}</td>
                            <td class="text-center"><a class="btn btn-primary btn-sm " data-toggle="collapse" href="#related${v.id}" role="button" aria-expanded="false" aria-controls="multiCollapseExample1">Related</a></td>
                    </tr>
                    <tr>
                     <td></td>
                               <td colspan="6">
                                     <div class="collapse out container mr-5" id="related${v.id}">
                                      <div class="row">

             `;

            $.each(data.code_relate, function(j, b) {
                console.log(b);
                if(v.related_transaction_id == b.id){

                    html += `
                    <div class="col-md-2">
                                            <label style="font-size:15px;" class="text-info">No</label>
                                            <div style="font-size:15px;">${++j}</div>

                                            </div>
                                            <div class="col-md-2">
                                                <label style="font-size:15px;" class="text-info">Code</label>

                                                <div style="font-size:15px;">${b.accounting.account_code}</div>

                                            </div>
                                            <div class="col-md-2">
                                                <label style="font-size:15px;" class="text-info">Account</label>

                                                <div style="font-size:15px;">${b.accounting.account_name}</div>
                                            </div>
                                            <div class="col-md-2">
                                                <label style="font-size:15px;" class="text-info">Type</label>
                                                <div style="font-size:15px;">${b.type}</div>

                                            </div>
                                            <div class="col-md-2">
                                                <label style="font-size:15px;" class="text-info">Date</label>

                                                <div style="font-size:15px;">${b.date}</div>

                                            </div>
                                            <div class="col-md-2">
                                                <label style="font-size:15px;" class="text-info">Amount</label>

                                                <div style="font-size:15px;">${b.amount}</div>

                                            </div>
                                            
                    `;
                    if(b.project_id == null){
                        html += `
                        <div class="col-md-2">
                            <label style="font-size:15px;" class="text-info">Projected Related</label>
                            <div style="font-size:15px;">No</div>

                        </div>
                        `;
                    }
                    else if(b.project_id != null){
                        html += `
                        <div class="col-md-2">
                            <label style="font-size:15px;" class="text-info">Projected Related</label>
                            <div style="font-size:15px;">Yes</div>

                        </div>


                        `;
                    }
                    html += `
                            </div>
                                    </div>

                                <td>
                            </tr>
                        </tbody>
                    `;
                }
            })
        })

        balance = debit - credit;

        html2 += `

            <div class="col-md-2">
                <label style="font-size:20px;" class="text-info">Debit: </label>
                <div style="font-size:20px;">${debit}</div>
            </div>

            <div class="col-md-2">
                <label style="font-size:20px;" class="text-info">Credit: </label>
                <div style="font-size:20px;">${credit}</div>
            </div>

            <div class="col-md-2">
                <label style="font-size:20px;" class="text-info">Balance: </label>
                <div style="font-size:20px;">${balance}</div>
            </div>

        `;

        $('#filter_date').html(html);
        $('#trial_balance').html(html2);
           }
           })
}

function show_bank_acc(){
    // alert('hello');
    $('#cashhh').hide();
    $('#bankkk').show();

}
function show_cash_acc(){
    // alert('hello');
    $('#bankkk').hide();
    $('#cashhh').show();
}
function hide_bank_acc(){
    // alert('hello');
    $('#bankkk').hide();
    $('#cashhh').hide();
    $('#proj').hide();
}


function show_project(){

        $('#proj').show();
    }
    function hide_project(){

        $('#proj').hide();
    }


    function showPeriod(value){

        var show_options = value;

        if( show_options == 1){
            $('#mdate').prop("disabled",true);
            $('#period').prop("disabled",false);
            }

        else{

            $('#mdate').prop("disabled",false);
            $('#period').prop("disabled",true);
        }
    }

    function date_filter(){
            // alert('hello');
            var from = $('#from').val();
            var to = $('#to').val();
            var debit = 0;
            var credit = 0;
            var balance =0;
            // alert(from);
            // alert(to);
            $.ajax({
           type:'POST',
           url:'/ajax_filter_date',
           dataType:'json',
           data:{ "_token": "{{ csrf_token() }}",
           "from":from,
           "to" : to,
            },
           success:function(data){
            //    alert(data.date_filter);
            var html = "";
            var html2 = "";
            html += `
            <thead class="bg-info text-white">
                            <tr>
                                <th>#</th>
                                <th class="text-center">Code</th>
                                <th class="text-center">Account</th>
                                <th class="text-center">Type</th>
                                <th class="text-center">Date</th>
                                <th class="text-center">Amount</th>
                                <th class="text-center">Remark</th>
                                <th class="text-center">Action</th>
                            </tr>
                </thead>
            `;
            $.each(data.date_filter, function(i, v) {
                if(v.type == "Debit"){
                    debit += v.amount;
                }else{
                    credit += v.amount;
                }
            html += `

                    <tbody>
                    <tr>
                            <td style="font-size:15px;" class="text-center">${++i}</td>
                            <td style="font-size:15px;" class="text-center">${v.accounting.account_code}</td>
                            <td style="font-size:15px;" class="text-center">${v.accounting.account_name}</td>
                            <td style="font-size:15px;" class="text-center">${v.type}</td>
                            <td style="font-size:15px;" class="text-center">${v.date}</td>
                            <td style="font-size:15px;" class="text-center">${v.amount}</td>
                            <td style="font-size:15px;" class="text-center">${v.remark}</td>
                            <td class="text-center"><a class="btn btn-primary btn-sm "   href="#related${v.id}" role="button" aria-expanded="false" aria-controls="multiCollapseExample1">Related</a></td>
                    </tr>
                    <tr>
                    <td></td>

                                <td colspan="6">
                                    <div class="collapse out container mr-5" id="related${v.id}">
                                        <div class="row">
            `;
            $.each(data.date_filt, function(j, b) {
                if(v.related_transaction_id == b.id){
                    html += `
                    <div class="col-md-2">
                                            <label style="font-size:15px;" class="text-info">No</label>
                                            <div style="font-size:15px;">${++j}</div>

                                            </div>
                                            <div class="col-md-2">
                                                <label style="font-size:15px;" class="text-info">Account</label>

                                                <div style="font-size:15px;">${v.accounting.account_code}</div>


                                            </div>
                                            <div class="col-md-2">
                                                <label style="font-size:15px;" class="text-info">Account</label>

                                                <div style="font-size:15px;">${v.accounting.account_name}</div>


                                            </div>
                                            <div class="col-md-2">
                                                <label style="font-size:15px;" class="text-info">Type</label>
                                                <div style="font-size:15px;">${b.type}</div>

                                            </div>
                                            <div class="col-md-2">
                                                <label style="font-size:15px;" class="text-info">Date</label>

                                                <div style="font-size:15px;">${b.date}</div>

                                            </div>
                                            <div class="col-md-2">
                                                <label style="font-size:15px;" class="text-info">Amount</label>

                                                <div style="font-size:15px;">${b.amount}</div>

                                            </div>
                            </div>
                                    </div>

                                <td>
                            </tr>
                        </tbody>
                    `;
                }
            })


        })

        balance = debit - credit;

        html2 += `

            <div class="col-md-2">
                <label style="font-size:20px;" class="text-info">Debit: </label>
                <div style="font-size:20px;">${debit}</div>
            </div>

            <div class="col-md-2">
                <label style="font-size:20px;" class="text-info">Credit: </label>
                <div style="font-size:20px;">${credit}</div>
            </div>

            <div class="col-md-2">
                <label style="font-size:20px;" class="text-info">Balance: </label>
                <div style="font-size:20px;">${balance}</div>
            </div>

        `;

        $('#filter_date').html(html);
        $('#trial_balance').html(html2);
           }

           })
        }



</script>
