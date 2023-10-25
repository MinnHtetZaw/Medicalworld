@extends('master')
@section('title','Sofb')
@section('link','Sofb  List')
@section('content')

    <div class="row">
        <div class="col-12">
            <div class="">
                <div class="mt-5">
                    <h3 class="text-center font-weight-bold">Medical World Co.Ltd</h3>
                    <p class="text-center ">Statement of financial position as at 31 Dec 2021</p>
                </div>
                <div class="row">
                <div class="form-group col-md-3">
                    <label>Select Date</label>
                    <input type="date" name="dateCount" id="dateCount" class="form-control" >
                </div>
               
                <div class="form-group col-md-1">
              
                    <button class="btn btn-sm btn-primary form-control" style="margin-top:38px;" data-toggle="modal" data-target="#openingData">Opening</button>
                </div>
                
                <div class="modal fade bs-example-modal-sm" id="openingData" role="dialog" aria-hidden="true">
                    
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header bg-info">
                                <h4 class="modal-title">Opening Account Dilalog </h4>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                            </div>
                            <div class="modal-body">
                                <form action="#" method="POST">
                                    @csrf
                                <div class="form-body">
                                    <div class="row">
                                        <div class="col-md">
                                            <div class="form-group">
                                                <label class="control-label">Opening Date</label>
                                                <input type="date" class="form-control" name="bank_name" id="openingDate">
                                            </div>
                                        </div>
        
                                       
                                    </div>
                                    <div class="row">
                                        <div class="col-md">
                                            <div class="form-group">
                                                <label class="control-label">Opening Amount</label>
                                                <input type="text" class="form-control" placeholder="" name="bank_contact" id="openingAmount" disabled>
                                            </div>
                                        </div>
                                        
                                    </div>
                                   
                                   
                                      <div class="row">
                                        
                                        
                                        <div class="col-md"></div>
        
                                      </div>
                                    <div class="form-actions">
                                        <div class="row">
                                            <div class="col-md">
                                                <div class="row">
                                                    <div class=" col-md-9">
                                                        <button type="submit" class="btn btn-primary">Save</button>
                                                        <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                   </div>
                                </div>
                            </form>
                        </div>
        
                        </div>
                    </div>
                </div>
        
                </div>
                <div class="">
                    <div class="">
                        <p class="font-weight-bold">Assets</p>
                        <p class="font-weight-bold">Non-Current Assets</p>
                    </div>
                </div>
                <hr class="">
                <div class="">


                        <table class="table" id="filter_date">
                            
                            <tbody class="table-group-divider">
                            <tr>
                                <th scope="row">1</th>
                                <td>Software</td>
                                <td></td>
                                <td></td>
                            </tr>
                           
                            

                            </tbody>
                        </table>

                </div>
                <div class="mt-5">
                    <div class="">
                        <p class="text-decoration-underline font-weight-bold">Current Assets</p>
                    </div>
                    <div class="">
                            <table class="table">
                                <thead>
                                <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Amount</th>
                                    <th scope="col">Date<th>
                                </tr>
                                </thead>
                                <tbody class="table-group-divider">
                                <tr>
                                    <th scope="row">1</th>
                                    <td>Inventory-HO</td>
                                    <td></td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <th scope="row">2</th>
                                    <td>Inventory-SH</td>
                                    <td></td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <th scope="row">3</th>
                                    <td colspan="2">Inventory-MDY</td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <th scope="row">4</th>
                                    <td colspan="2">Inventory-Factory Raw</td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <th scope="row">5</th>
                                    <td colspan="2">Inventory-Factory FG</td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <th scope="row">6</th>
                                    <td colspan="2">Account Receivable-HO</td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <th scope="row">7</th>
                                    <td colspan="2">Account Receivable-SH</td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <th scope="row">8</th>
                                    <td colspan="2">Account Receivable-MDY</td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <th scope="row">9</th>
                                    <td colspan="2">Saving-YGN</td>
                                    <td></td>
                                </tr>

                                <tr>
                                    <th scope="row">10</th>
                                    <td colspan="2">Other Receivable Condo,Car rental 500000,bath 8639650</td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <th scope="row">11</th>
                                    <td colspan="2">Advance</td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <th scope="row">11</th>
                                    <td colspan="2">Other Receivable</td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <th scope="row">13</th>
                                    <td colspan="2">Prepaid Room Rental</td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <th scope="row">14</th>
                                    <td colspan="2">Cash in Hand-HO</td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <th scope="row">15</th>
                                    <td colspan="2">Cash in Bank-HO</td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <th scope="row">16</th>
                                    <td colspan="2">Cash in Hand-SH</td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <th scope="row">17</th>
                                    <td colspan="2">Cash in Hand-USD</td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <th scope="row">18</th>
                                    <td colspan="2">Cash in Hand-Bath</td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <th scope="row">19</th>
                                    <td colspan="2">Cash in Hand-MDY</td>
                                    <td></td>
                                </tr>

                                <hr class="border bottom-50 text-black">
                                <tr>
                                    <th scope="row">20</th>
                                    <td class="font-weight-bold">Total Current Assets</td>
                                </tr>
                                <tr>
                                    <th scope="row">21</th>
                                    <td class="font-weight-bold">Total  Assets</td>
                                </tr>

                                </tbody>
                            </table>
                    </div>
                    <div class="mt-5">
                        <div class="">
                            <p class="text-decoration-underline font-weight-bold">Liabilities</p>
                        </div>
                        <hr class="">
                        <div class="">

                            <table class="table">
                                <thead>
                                <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Amount</th>
                                    <th scope="col">Date<th>
                                </tr>
                                </thead>
                                <tbody class="table-group-divider">
                                <tr>
                                    <th scope="row">1</th>
                                    <td>Fabric</td>
                                    <td></td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <th scope="row">2</th>
                                    <td>Loan</td>
                                    <td></td>
                                    <td></td>
                                </tr>


                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="mt-5">
                        <div class="">
                            <p class="text-decoration-underline font-weight-bold">Non-Liabilities</p>
                        </div>
                        <hr class="">
                        <div class="">

                            <table class="table">
                                <thead>
                                <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Amount</th>
                                    <th scope="col">Date<th>
                                </tr>
                                </thead>
                                <tbody class="table-group-divider">
                                <tr>
                                    <th scope="row">1</th>
                                    <td>Other Payable</td>
                                    <td></td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <th scope="row">2</th>
                                    <td>Order</td>
                                    <td></td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <th scope="row">3</th>
                                    <td>Ag-BMA Daw Hnin Hnin Deposit bank receipt</td>
                                    <td></td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <th scope="row">4</th>
                                    <td>Current MDY</td>
                                    <td></td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <th scope="row">5</th>
                                    <td>Current MDY-Expenses</td>
                                    <td></td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <th scope="row">6</th>
                                    <td>Current-SH</td>
                                    <td></td>
                                    <td></td>
                                </tr>

                                <tr>
                                    <th scope="row">7</th>
                                    <td class="font-weight-bold">
                                        Total Liabilities
                                    </td>
                                </tr>


                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="mt-5">
                        <div class="">
                            <p class="text-decoration-underline font-weight-bold">Equity</p>
                        </div>
                        <hr class="">
                        <div class="">

                            <table class="table">
                                <thead>
                                <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Amount</th>
                                    <th scope="col">Date<th>
                                </tr>
                                </thead>
                                <tbody class="table-group-divider">
                                <tr>
                                    <th scope="row">1</th>
                                    <td>Issued Share Capital</td>
                                    <td></td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <th scope="row">2</th>
                                    <td>Retained Earnings</td>
                                    <td></td>
                                    <td></td>
                                </tr>


                                <tr>
                                    <th scope="row">3</th>
                                    <td class="fw-bolder">
                                        Total Equity
                                    </td>
                                </tr>

                                <tr>
                                    <th scope="row">4</th>
                                    <td class="font-weight-bold">
                                        Total Equity & Liabilities
                                    </td>
                                </tr>


                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
<script>
$('#dateCount').on('change', function () {
    // function date_filter(){
            // alert('hello');
            var  dateCount= $('#dateCount').val();
            // var to = $('#to').val();
            var debit = 0;
            var credit = 0;
            var balance =0;

            $.ajax({
           type:'POST',
           url:'/date/count',
           dataType:'json',
           data:{ "_token": "{{ csrf_token() }}",
           "dateCount":dateCount,
            },

           success:function(data){
           
            // console.log(data)
            var html = "";
            var html2 = "";
            var sumBalance=0;
            $.each(data.date_filter,function(i, v) {
                console.log(v);
            var date = new Date(v.created_at);
            // var options = { month: 'short', day: 'numeric', year: 'numeric' };
            // var formattedDate = date.toLocaleDateString('en-US', options);
                    var month = (date.getMonth() + 1).toString().padStart(2, '0'); // Ensure zero-padding
                    var day = date.getDate().toString().padStart(2, '0'); // Ensure zero-padding
                    var year = date.getFullYear().toString().slice(-4); // Get the last two digits of the year

            var formattedDate = month + '/' + day + '/' + year;

            sumBalance += parseFloat(v.balance);
            $('#openingAmount').val(sumBalance);
            // $('#openingDate').val(formattedDate);
            document.getElementById('openingDate').value = formattedDate;
           
            html += `
            <tbody>
                    <tr>
                            <td style="font-size:15px;" class="text-center">${++i} </td>
                            <td style="font-size:15px;" class="text-center">${v.account_code} </td>
                            <td style="font-size:15px;" class="text-center">${v.account_name} </td>
                            <td style="font-size:15px;" class="text-center col-3">${v.balance} </td>
                            <td style="font-size:15px;" class="text-center">${formattedDate} </td>
                            

                           
                    </tr>
                    <tr>
                     <td></td>
                               <td colspan="6">
                                     <div class="collapse out container mr-5" id="related${v.id}">
                                      <div class="row"> 
                   

            `;
        })
           
            console.log('Sum of balance:', sumBalance);
            html += `
                           <thead class="bg-info text-white">
                            <tr>
                                <th>#</th>
                                <th class="text-center">Code</th>

                                <th class="text-center">AccountName</th>
                                <th class="text-center">Balance</th>
                                <th class="text-center">Date</th>
                              
                            </tr>
                    </thead>
            `;

            html += `
                    

             `;
            // var totalDebitSum = 0;
            // var totalCreditSum = 0;

           


// console.log(`Total Debit Sum for account " ${totalDebitSum}`);
// console.log('Total Credit Sum for all accounts:', totalCreditSum);

//         balance = totalDebitSum - totalCreditSum;

        // html2 += `

        //     <div class="col-md-2">
        //         <label style="font-size:20px;" class="text-info">Debit: </label>
        //         <div style="font-size:20px;">${totalDebitSum}</div>
        //     </div>

        //     <div class="col-md-2">
        //         <label style="font-size:20px;" class="text-info">Credit: </label>
        //         <div style="font-size:20px;">${totalCreditSum}</div>
        //     </div>

        //     <div class="col-md-2">
        //         <label style="font-size:20px;" class="text-info">Balance: </label>
        //         <div style="font-size:20px;">${balance}</div>
        //     </div>

        // `;

        $('#filter_date').html(html);
        // $('#trial_balance').html(html2);
           }

           })
        });

</script>

@endsection

