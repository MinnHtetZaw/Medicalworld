@extends('master')
@section('title','Sopl')
@section('link','Sopl  List')
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="">
                <div class="mt-5">
                    <h3 class="text-center font-weight-bold">Medical World Co.Ltd</h3>
                    <p class="text-center">Statement of financial position as at 31 Dec 2021</p>
                </div>
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
              <div class="card-header">

                <div class="col-12">
             
    
              <div class="row" id="trial_balance">
    
              </div>
    
              </div>
    
            </div>
           
                <div class="">
                    <div class="">
                        <p class="text-decoration-underline font-weight-bold">Revenue </p>
                    </div>
                </div>
                <hr class="">
                    <div class="col" style="background-color: rgb(247, 250, 243);">
                        <table class="table" >
                            <thead  style="background-color: rgba(208, 251, 149, 0.902);">
                            <tr >
                                <th scope="col">No</th>
                                <th scope="col" class="col-4 text-center" >Name</th>
                                <th scope="col">Amount<th>
                                <th scope="col">Total Amount<th>




                            </tr>
                            </thead>
                            <tbody class="table-group-divider">
                            
                                <?php $i = 1; $totalRevenue = 0; ?>
                                @foreach ($accountLists as $data)
                                <tr class="text-center">
                                <td style="font-size:15px; width:50px" class="border-0">{{$i++}}</td>
                                {{-- <td style="font-size:15px; width:50px" class="border-0">{{$data->account_code}}</td> --}}
                               
                                <td style="font-size:15px; width:50px" class="border-0">{{$data->account_name}} </td>
                                <td style="font-size:15px; width:50px" class="border-0">{{$data->balance}} </td>
                                </tr>
                               
                             
                                @endforeach

                            </tbody>
                            <tr>
                                <th scope="col"></th>
                                <th scope="col"></th>
                                <th scope="col"><th>
                                <th scope="col">{{ number_format($totalRevenueAmount, 2) }}<th>




                            </tr>
                            
                            
                        </table>
                       
                            
                      
                        
                        
                        
                       
                    </div>
                    


                    <div class="mt-5">
                        <div class="">
                            <p class="font-weight-bold">Direct Cost</p>
                        </div>
                        <hr class="">
                        <div class="" style="background-color: rgb(247, 250, 243);">
                            <table class="table" >
                                <thead  style="background-color: rgba(208, 251, 149, 0.902);">
                                <tr>
                                    <th scope="col">No</th>
                                    <th scope="col" class="col-4 text-center">Name</th>
                                    <th scope="col">Amount<th>
                                     <th scope="col">Total Amount<th>

                                    
                                </tr>
                                </thead>
                                <tbody class="table-group-divider">
                                
                                    <?php $i = 1; $totalRevenue = 0; ?>
                                    @foreach ($costofSaleList as $data)
                                    <tr class="text-center">
                                    <td style="font-size:15px; width:50px" class="border-0">{{$i++}}</td>
                                   
                                    <td style="font-size:15px; width:50px" class="border-0">{{$data->account_name}} </td>
                                    <td style="font-size:15px; width:50px" class="border-0">{{$data->balance}} </td>
                                    </tr>
                                   
                                 
                                    @endforeach
    
                                </tbody>
                                <tr>
                                    <th scope="col"></th>
                                    <th scope="col"></th>
                                    <th scope="col"><th>
                                    <th scope="col">{{ number_format($costofSaleAmount, 2) }}<th>

    
                                </tr>
                                <tr>
                                    <th scope="col"></th>
                                    <th scope="col">#Gross Profit:</th>
                                    <th scope="col"><th>
                                    <th scope="col">{{ number_format($grossProfit, 2) }}<th>

    
                                </tr>
                                
                                
                            </table>
                        
                            
                           
                        </div>
                        <hr>
                        
                    </div>
                    <hr>

                    <div class="mt-5">
                        <div class="">
                            <p class="text-decoration-underline font-weight-bold">Marketing Expenses</p>
                        </div>
                        <hr class="">
                        <div class="" style="background-color: rgb(247, 250, 243);">
                            <table class="table" >
                                <thead  style="background-color: rgba(208, 251, 149, 0.902);">
                                <tr>
                                    <th scope="col">No</th>
                                    <th scope="col" class="col-4 text-center">Name</th>
                                    <th scope="col">Amount<th>
                                    <th scope="col">TotalAmount<th>

    
                                </tr>
                                </thead>
                                <tbody class="table-group-divider">
                                
                                    <?php $i = 1; $totalRevenue = 0; ?>
                                    @foreach ($marketingExpLists as $data)
                                    <tr class="text-center">
                                    <td style="font-size:15px; width:50px" class="border-0">{{$i++}}</td>
                                   
                                    <td style="font-size:15px; width:50px" class="border-0">{{$data->account_name}} </td>
                                    <td style="font-size:15px; width:50px" class="border-0">{{$data->balance}} </td>
                                    </tr>
                                   
                                 
                                    @endforeach
    
                                </tbody>
                                <tr>
                                    <th scope="col"></th>
                                    <th scope="col"></th>
                                    <th scope="col"><th>
                                    <th scope="col">{{ number_format($marketingExpAmount, 2) }}<th>

                                </tr>
                                
                            </table>
                            <div class="col ">
                               
    
                            </div>
                            
                           
                        </div>
                    </div>
                    <hr>
                    <div class="mt-5">
                        <div class="">
                            <p class="text-decoration-underline font-weight-bold">Administrative Expenses</p>
                        </div>
                        <hr class="">
                        <div class="" style="background-color: rgb(247, 250, 243);">
                            <table class="table" >
                                <thead  style="background-color: rgba(208, 251, 149, 0.902);">
                                <tr>
                                    <th scope="col">No</th>
                                    <th scope="col" class="col-4 text-center">Name</th>
                                    <th scope="col">Amount<th>
                                    <th scope="col">TotalAmount<th>

    
                                </tr>
                                </thead>
                                <tbody class="table-group-divider">
                                
                                    <?php $i = 1; $totalRevenue = 0; ?>
                                    @foreach ($administrativeExpenseList as $data)
                                    <tr class="text-center">
                                    <td style="font-size:15px; width:50px" class="border-0">{{$i++}}</td>
                                   
                                    <td style="font-size:15px; width:50px" class="border-0">{{$data->account_name}} </td>
                                    <td style="font-size:15px; width:50px" class="border-0">{{$data->balance}} </td>
                                    </tr>
                                   
                                 
                                    @endforeach
    
                                </tbody>
                                <tr>
                                    <th scope="col"></th>
                                    <th scope="col"></th>
                                    <th scope="col"><th>
                                    <th scope="col">{{ number_format($AdministrativeExpAmount, 2) }}<th>

                                </tr>
                               
                            </table>
                            
                           
                        </div>
                    </div>
                    <hr>
                    <div class="mt-5">
                        <div class="">
                            <p class="text-decoration-underline font-weight-bold">Finance Expenses</p>
                        </div>
                        <hr class="">
                        <div class="" style="background-color: rgb(247, 250, 243);">
                            <table class="table" >
                                <thead  style="background-color: rgba(208, 251, 149, 0.902);">
                                <tr>
                                    <th scope="col">No</th>
                                    <th scope="col" class="col-4 text-center">Name</th>
                                    <th scope="col">Amount<th>
                                    <th scope="col">TotalAmount<th>

    
                                </tr>
                                </thead>
                                <tbody class="table-group-divider">
                                
                                    <?php $i = 1; $totalRevenue = 0; ?>
                                    @foreach ($financialExpLists as $data)
                                    <tr class="text-center">
                                    <td style="font-size:15px; width:50px" class="border-0">{{$i++}}</td>
                                   
                                    <td style="font-size:15px; width:50px" class="border-0">{{$data->account_name}} </td>
                                    <td style="font-size:15px; width:50px" class="border-0">{{$data->balance}} </td>
                                    </tr>
                                   
                                 
                                    @endforeach
    
                                </tbody>
                                <tr>
                                    <th scope="col"></th>
                                    <th scope="col"></th>
                                    <th scope="col"><th>
                                    <th scope="col">{{ number_format($financialExpAmount, 2) }}<th>

                                </tr>
                                
                            </table>
                           
                        </div>
                    </div>
                    <hr>
                    <div class="mt-5">
                        <div class="">
                            <p class="text-decoration-underline font-weight-bold"> 	Depreciation  Expenses</p>
                        </div>
                        <hr class="">
                        <div class="" style="background-color: rgb(247, 250, 243);">
                            <table class="table" >
                                <thead  style="background-color: rgba(208, 251, 149, 0.902);">
                                <tr>
                                    <th scope="col">No</th>
                                    <th scope="col" class="col-4 text-center">Name</th>
                                    <th scope="col">Amount<th>
                                    <th scope="col">Total Amount<th>

    
                                </tr>
                                </thead>
                                <tbody class="table-group-divider">
                                
                                    <?php $i = 1; $totalRevenue = 0; ?>
                                    @foreach ($depreciationExpLists as $data)
                                    <tr class="text-center">
                                    <td style="font-size:15px; width:50px" class="border-0">{{$i++}}</td>
                                   
                                    <td style="font-size:15px; width:50px" class="border-0">{{$data->account_name}} </td>
                                    <td style="font-size:15px; width:50px" class="border-0">{{$data->balance}} </td>
                                    </tr>
                                   
                                 
                                    @endforeach
    
                                </tbody>
                                <tr>
                                    <th scope="col"></th>
                                    <th scope="col"></th>
                                    <th scope="col"><th>
                                    <th scope="col">{{ number_format($depreciationExpAmount, 2) }}<th>

                                </tr>
                                
                            </table>
                           
                            
                        </div>
                            <hr>
                           
                        </div>
                    </div>
                    <hr>
                    <div class="mt-5">
                        <div class="">
                            <p class="text-decoration-underline font-weight-bold"> 	Other Expenses</p>
                        </div>
                        <hr class="">
                        <div class="" style="background-color: rgb(247, 250, 243);">
                            <table class="table" >
                                <thead  style="background-color: rgba(208, 251, 149, 0.902);">
                                <tr>
                                    <th scope="col">No</th>
                                    <th scope="col" class="col-4 text-center">Name</th>
                                    <th scope="col">Amount<th>
                                    <th scope="col">TotalAmount<th>

    
                                </tr>
                                </thead>
                                <tbody class="table-group-divider">
                                
                                    <?php $i = 1; $totalRevenue = 0; ?>
                                    @foreach ($otherExpLists as $data)
                                    <tr class="text-center">
                                    <td style="font-size:15px; width:50px" class="border-0">{{$i++}}</td>
                                   
                                    <td style="font-size:15px; width:50px" class="border-0">{{$data->account_name}} </td>
                                    <td style="font-size:15px; width:50px" class="border-0">{{$data->balance}} </td>
                                    </tr>
                                   
                                 
                                    @endforeach
    
                                </tbody>
                                <tr>
                                    <th scope="col"></th>
                                    <th scope="col"></th>
                                    <th scope="col"><th>
                                    <th scope="col"> {{ number_format($otherExpAmount, 2) }}<th>

                                </tr>
                                <tr>
                                    <th scope="col"></th>
                                    <th scope="col">#Total All Expense Amount:</th>
                                    <th scope="col"><th>
                                    <th scope="col">{{ number_format($totalAllExpAmount, 2) }}<th>

    
                                </tr>
                                <tr>
                                    <th scope="col"></th>
                                    <th scope="col">#Earning Before Tax & Emotization:</th>
                                    <th scope="col"><th>
                                    <th scope="col">{{ number_format($EBTA, 2) }}<th>

    
                                </tr>
                                
                                
                            </table>
                            
                           
                        </div>
                    </div>
                    <hr>
                    <div class="mt-5">
                        <div class="">
                            <p class="text-decoration-underline font-weight-bold"> 	Taxation Expenses</p>
                        </div>
                        <hr class="">
                        <div class="" style="background-color: rgb(247, 250, 243);">
                            <table class="table" >
                                <thead  style="background-color: rgba(208, 251, 149, 0.902);">
                                <tr>
                                    <th scope="col">No</th>
                                    <th scope="col" class="col-4 text-center" >Name</th>
                                    <th scope="col">Amount<th>
                                    <th scope="col">Total Amount<th>

    
                                </tr>
                                </thead>
                                <tbody class="table-group-divider">
                                
                                    <?php $i = 1; $totalRevenue = 0; ?>
                                    @foreach ($taxExpLists as $data)
                                    <tr class="text-center">
                                    <td style="font-size:15px; width:50px" class="border-0">{{$i++}}</td>
                                   
                                    <td style="font-size:15px; width:50px" class="border-0">{{$data->account_name}} </td>
                                    <td style="font-size:15px; width:50px" class="border-0">{{$data->balance}} </td>
                                    </tr>
                                   
                                 
                                    @endforeach
    
                                </tbody>
                                <tr>
                                    <th scope="col"></th>
                                    <th scope="col"></th>
                                    <th scope="col"><th>
                                    <th scope="col"> {{ number_format($taxExpAmount, 2) }}<th>

                                </tr>
                                <tr>
                                    <th scope="col"></th>
                                    <th scope="col">#Net Profit:</th>
                                    <th scope="col"><th>
                                    <th scope="col">{{ number_format($netProfit, 2) }}<th>

    
                                </tr>
                               
                            </table>
                           
                          
                           
                        </div>
                    </div>
                    <hr>
                    
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
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
           url:'/accouting_filter',
           dataType:'json',
           data:{ "_token": "{{ csrf_token() }}",
           "from":from,
           "to" : to,
            },

           success:function(data){

            console.log(data)
            var html = "";
            var html2 = "";
            var totalDebitSum = 0;
            var totalCreditSum = 0;

            $.each(data.date_filter, function(i, v) {
                console.log(v);
                var debitSum = v.transactions.reduce((total, transaction) => {
                    return total + parseFloat(transaction.debit_sum);
                    console.log(transaction);
                }, 0);
                var creditSum = v.transactions.reduce((total, transaction) => {
                    return total + parseFloat(transaction.credit_sum);
                }, 0);


                totalDebitSum += debitSum;
                totalCreditSum += creditSum; 
               
         
            html += `
                    
                   

            `;
        })


console.log(`Total Debit Sum for account " ${totalDebitSum}`);
console.log('Total Credit Sum for all accounts:', totalCreditSum);

        balance = totalDebitSum - totalCreditSum;

        html2 += `

            <div class="col-md-2">
                <label style="font-size:20px;" class="text-info">Debit: </label>
                <div style="font-size:20px;">${totalDebitSum}</div>
            </div>

            <div class="col-md-2">
                <label style="font-size:20px;" class="text-info">Credit: </label>
                <div style="font-size:20px;">${totalCreditSum}</div>
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

@endsection
