@extends('master')
@section('title','Tri List')
@section('link','Tri List')
@section('content')

<div class="row mt-4">
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
  <div class="offset-md-1 col-md-5 mt-2">
    <div class="card mb-3" style="max-width: 540px;">
        <div class="row no-gutters ">
          <div class="">
            {{-- <img src="..." class="card-img" alt="..."> --}}
          </div>
          <div class="col">
            <div class="card-body">
                <div class="row">
                    <h5 class="card-title col-6">Debit Amount Total:</h5>
                    <h5 class="card-title  col-6 ">{{number_format($debitTotal,0,'',',') }} MMK</h5>

                </div>
                <div class="row">
                    <h5 class="card-title col-6">Credit Amount Total:</h5>
                    <h5 class="card-title  col-6 ">{{number_format($creditTotal,0,'',',') }} MMK </h5>

                </div>
                <hr>
                <div class="row">
                   @if ($netDebitTotal > $netCreditTotal)
                   <h5 class="card-title col-6">Net Debit Amount: </h5>
                    <h5 class="card-title  col-6 ">{{$netDebitTotal}} </h5>
                    @else
                    <h5 class="card-title col-6">Net Credit Amount: </h5>
                    <h5 class="card-title  col-6 ">{{ number_format($netCreditTotal,0,'',',') }}MMK </h5>  
                   @endif
                   

                </div>
            </div>
          </div>
        </div>
      </div>
  </div>
  </div>

<div class="row">
    <div class="col-12">
          <div class="card">
          <div class="card-header">

            <div class="col-12">
          <div class="row justify-content-between">

              <label class="">Account List<span class="float-right">

          </div>

          <div class="row" id="trial_balance">

          </div>

          </div>

        </div>
        <div class="card-body">
            <div class="row">
        <div class="col-md-12">

            <div class="table-responsive" id="slimtest2">

                <table class="table table-hover table-striped" >


                            <thead class="bg-info text-white text-center">
                            <tr>
                                <th>#</th>
                                <th>Account Code</th>
                                <th>Account Name</th>
                                <th>Subheading</th>
                                <th>Balance</th>
                                <th>Debit</th>
                                <th>Credit</th>
                                <th>Nature</th>
                                <th>Currency</th>
                                <th>Date</th>

                            </tr>
                        </thead>
                        <tbody id="filter_date">
                            <?php $i = 1; ?>
                            @foreach ($accountLists as $data)

                            <tr class="text-center">
                            <td style="font-size:15px; width:50px" class="border-0">{{$i++}}</td>
                            <td style="font-size:15px; width:50px" class="border-0">{{$data->account_code}}</td>
                           
                            <td style="font-size:15px; width:50px" class="border-0">{{$data->account_name}} </td>
                           
                            <td style="font-size:15px; width:50px" class="border-0">{{$data->subheading->name}} </td>
                            
                           
                            <td style="font-size:15px; width:50px" class="border-0">{{$data->balance}}</td>
                            @if ($data->nature == 1 )
                             <td style="font-size:15px; width:50px" class="border-0">{{$data->balance}} </td>   
                            @elseif ($data->nature !=null ||$data->nature == 2)
                            <td style="font-size:15px; width:50px" class="border-0">-</td>
       
                            @endif
                            
                            @if ($data->nature == 1 )
                             <td style="font-size:15px; width:50px" class="border-0">-</td>   
                            @elseif ($data->nature !=null ||$data->nature == 2)
                            <td style="font-size:15px; width:50px" class="border-0">{{$data->balance}} </td>
       
                            @endif
                            
                           
                            {{-- <td style="font-size:15px; width:50px" class="border-0">{{$data->nature}} </td> --}}
                            @if ($data->nature == 1 )
                             <td style="font-size:15px; width:50px" class="border-0">Debit</td>   
                            @elseif ($data->nature !=null ||$data->nature == 2)
                            <td style="font-size:15px; width:50px" class="border-0">Credit</td>
       
                            @endif
                            
                           
                            <td style="font-size:15px; width:50px" class="border-0">{{$data->currency->name}}</td>
                            <td style="font-size:15px; width:50px" class="border-0">{{$data->created_at->format('m/d/y') }}</td>


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

<script>

    function date_filter(){
            // alert('hello');
            var from = $('#from').val();
            var to = $('#to').val();
            var debit = 0;
            var credit = 0;
            var balance =0;

            $.ajax({
           type:'POST',
           url:'/financial_transaction_filter',
           dataType:'json',
           data:{ "_token": "{{ csrf_token() }}",
           "from":from,
           "to" : to,
            },

           success:function(data){

            console.log(data)
            var html = "";
            var html2 = "";

            $.each(data.date_filter, function(i, v) {
                if(v.type == "Debit"){
                    debit += v.amount;
                }else{
                    credit += v.amount;
                }
            html += `


                    <tr>
                            <td style="font-size:15px;" class="text-center">${++i}</td>
                            <td style="font-size:15px;" class="text-center">${v.accounting.account_code}-${v.accounting.account_name}</td>
                            <td style="font-size:15px;" class="text-center">${v.type}</td>
                            <td style="font-size:15px;" class="text-center">${v.date}</td>
                            <td style="font-size:15px;" class="text-center">${v.amount}</td>
                            <td style="font-size:15px;" class="text-center">${v.remark}</td>

                    </tr>

            `;
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
