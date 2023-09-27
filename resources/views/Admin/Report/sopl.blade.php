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





           
                <div class="">
                    <div class="">
                        <p class="text-decoration-underline font-weight-bold">Revenue </p>
                    </div>
                </div>
                <hr class="">
                    <div class="" style="background-color: rgb(247, 250, 243);">
                        <table class="table" >
                            <thead  style="background-color: rgba(208, 251, 149, 0.902);">
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Name</th>
                                <th scope="col">Amount<th>
                                <th scope="col">Date</th>
                                <th scope="col font-bold">Total Amount</th>
                                <th scope="col font-bold">Gross Profit</th>
                                <th scope="col font-bold">Earnign Before Tax & Emotization</th>
                                <th scope="col font-bold">Net Profit</th>


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
                                <td style="font-size:15px; width:50px" class="border-0">{{$data->created_at->format('Y-m-d')}} </td>
                                </tr>
                               
                             
                                @endforeach

                            </tbody>
                            <tr style="background-color: rgb(247, 250, 243);">
                                <th scope="col"></th>
                                <th scope="col"></th>
                                <th scope="col"><th>
                                <th scope="col"></th>
                                <th scope="col font-bold">{{ number_format($totalRevenueAmount, 2) }}</th>
                                <th scope="col font-bold">{{ number_format($grossProfit, 2) }}</th>
                                <th scope="col font-bold">{{ number_format($EBTA, 2) }}</th>
                                <th scope="col font-bold">{{ number_format($netProfit, 2) }}</th>



                            </tr>
                            
                        </table>
                        
                       
                    </div>
                    

                {{-- <div class="mt-5">
                    <div class="">
                        <p class="text-decoration-underline font-weight-bold">Cost of Good Sold</p>
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
                                    <td>Opening Inventory</td>
                                    <td></td>
                                    <td></td>
                                </tr>


                                </tbody>
                            </table>
                        </div>
                </div> --}}

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
                                    <th scope="col">Name</th>
                                    <th scope="col">Amount<th>
                                    <th scope="col">Date</th>
                                    <th scope="col font-bold">Total Amount</th>
                                    
                                </tr>
                                </thead>
                                <tbody class="table-group-divider">
                                
                                    <?php $i = 1; $totalRevenue = 0; ?>
                                    @foreach ($costofSaleList as $data)
                                    <tr class="text-center">
                                    <td style="font-size:15px; width:50px" class="border-0">{{$i++}}</td>
                                    {{-- <td style="font-size:15px; width:50px" class="border-0">{{$data->account_code}}</td> --}}
                                   
                                    <td style="font-size:15px; width:50px" class="border-0">{{$data->account_name}} </td>
                                    <td style="font-size:15px; width:50px" class="border-0">{{$data->balance}} </td>
                                    <td style="font-size:15px; width:50px" class="border-0">{{$data->created_at->format('Y-m-d')}} </td>
                                    </tr>
                                   
                                 
                                    @endforeach
    
                                </tbody>
                                <tr style="background-color: rgb(247, 250, 243);">
                                    <th scope="col"></th>
                                    <th scope="col"></th>
                                    <th scope="col"><th>
                                    <th scope="col"></th>
                                    <th scope="col font-bold">{{ number_format($costofSaleAmount, 2) }}</th>
                                </tr>
                                
                            </table>
                            
                           
                        </div>
                        
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
                                    <th scope="col">Name</th>
                                    <th scope="col">Amount<th>
                                    <th scope="col">Date</th>
                                    <th scope="col font-bold">Total Amount</th>
                                    <th scope="col font-bold">Total All Expense Amount</th>
    
                                </tr>
                                </thead>
                                <tbody class="table-group-divider">
                                
                                    <?php $i = 1; $totalRevenue = 0; ?>
                                    @foreach ($marketingExpLists as $data)
                                    <tr class="text-center">
                                    <td style="font-size:15px; width:50px" class="border-0">{{$i++}}</td>
                                   
                                    <td style="font-size:15px; width:50px" class="border-0">{{$data->account_name}} </td>
                                    <td style="font-size:15px; width:50px" class="border-0">{{$data->balance}} </td>
                                    <td style="font-size:15px; width:50px" class="border-0">{{$data->created_at->format('Y-m-d')}} </td>
                                    </tr>
                                   
                                 
                                    @endforeach
    
                                </tbody>
                                <tr style="background-color: rgb(247, 250, 243);">
                                    <th scope="col"></th>
                                    <th scope="col"></th>
                                    <th scope="col"><th>
                                    <th scope="col"></th>
                                    <th scope="col font-bold">{{ number_format($marketingExpAmount, 2) }}</th>
                                    <th scope="col font-bold">{{ number_format($totalAllExpAmount, 2) }}</th>
    
                                </tr>
                                
                            </table>
                            
                           
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
                                    <th scope="col">Name</th>
                                    <th scope="col">Amount<th>
                                    <th scope="col">Date</th>
                                    <th scope="col font-bold">Total Amount</th>
    
                                </tr>
                                </thead>
                                <tbody class="table-group-divider">
                                
                                    <?php $i = 1; $totalRevenue = 0; ?>
                                    @foreach ($administrativeExpenseList as $data)
                                    <tr class="text-center">
                                    <td style="font-size:15px; width:50px" class="border-0">{{$i++}}</td>
                                   
                                    <td style="font-size:15px; width:50px" class="border-0">{{$data->account_name}} </td>
                                    <td style="font-size:15px; width:50px" class="border-0">{{$data->balance}} </td>
                                    <td style="font-size:15px; width:50px" class="border-0">{{$data->created_at->format('Y-m-d')}} </td>
                                    </tr>
                                   
                                 
                                    @endforeach
    
                                </tbody>
                                <tr style="background-color: rgb(247, 250, 243);">
                                    <th scope="col"></th>
                                    <th scope="col"></th>
                                    <th scope="col"><th>
                                    <th scope="col"></th>
                                    <th scope="col font-bold">{{ number_format($AdministrativeExpAmount, 2) }}</th>
    
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
                                    <th scope="col">Name</th>
                                    <th scope="col">Amount<th>
                                    <th scope="col">Date</th>
                                    <th scope="col font-bold">Total Amount</th>
    
                                </tr>
                                </thead>
                                <tbody class="table-group-divider">
                                
                                    <?php $i = 1; $totalRevenue = 0; ?>
                                    @foreach ($financialExpLists as $data)
                                    <tr class="text-center">
                                    <td style="font-size:15px; width:50px" class="border-0">{{$i++}}</td>
                                   
                                    <td style="font-size:15px; width:50px" class="border-0">{{$data->account_name}} </td>
                                    <td style="font-size:15px; width:50px" class="border-0">{{$data->balance}} </td>
                                    <td style="font-size:15px; width:50px" class="border-0">{{$data->created_at->format('Y-m-d')}} </td>
                                    </tr>
                                   
                                 
                                    @endforeach
    
                                </tbody>
                                <tr style="background-color: rgb(247, 250, 243);">
                                    <th scope="col"></th>
                                    <th scope="col"></th>
                                    <th scope="col"><th>
                                    <th scope="col"></th>
                                    <th scope="col font-bold">{{ number_format($financialExpAmount, 2) }}</th>
    
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
                                    <th scope="col">Name</th>
                                    <th scope="col">Amount<th>
                                    <th scope="col">Date</th>
                                    <th scope="col font-bold">Total Amount</th>
    
                                </tr>
                                </thead>
                                <tbody class="table-group-divider">
                                
                                    <?php $i = 1; $totalRevenue = 0; ?>
                                    @foreach ($depreciationExpLists as $data)
                                    <tr class="text-center">
                                    <td style="font-size:15px; width:50px" class="border-0">{{$i++}}</td>
                                   
                                    <td style="font-size:15px; width:50px" class="border-0">{{$data->account_name}} </td>
                                    <td style="font-size:15px; width:50px" class="border-0">{{$data->balance}} </td>
                                    <td style="font-size:15px; width:50px" class="border-0">{{$data->created_at->format('Y-m-d')}} </td>
                                    </tr>
                                   
                                 
                                    @endforeach
    
                                </tbody>
                                <tr style="background-color: rgb(247, 250, 243);">
                                    <th scope="col"></th>
                                    <th scope="col"></th>
                                    <th scope="col"><th>
                                    <th scope="col"></th>
                                    <th scope="col font-bold">{{ number_format($depreciationExpAmount, 2) }}</th>
    
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
                                    <th scope="col">Name</th>
                                    <th scope="col">Amount<th>
                                    <th scope="col">Date</th>
                                    <th scope="col font-bold">Total Amount</th>
    
                                </tr>
                                </thead>
                                <tbody class="table-group-divider">
                                
                                    <?php $i = 1; $totalRevenue = 0; ?>
                                    @foreach ($taxExpLists as $data)
                                    <tr class="text-center">
                                    <td style="font-size:15px; width:50px" class="border-0">{{$i++}}</td>
                                   
                                    <td style="font-size:15px; width:50px" class="border-0">{{$data->account_name}} </td>
                                    <td style="font-size:15px; width:50px" class="border-0">{{$data->balance}} </td>
                                    <td style="font-size:15px; width:50px" class="border-0">{{$data->created_at->format('Y-m-d')}} </td>
                                    </tr>
                                   
                                 
                                    @endforeach
    
                                </tbody>
                                <tr style="background-color: rgb(247, 250, 243);">
                                    <th scope="col"></th>
                                    <th scope="col"></th>
                                    <th scope="col"><th>
                                    <th scope="col"></th>
                                    <th scope="col font-bold">{{ number_format($taxExpAmount, 2) }}</th>
    
                                </tr>
                                
                            </table>
                            
                           
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
                                    <th scope="col">Name</th>
                                    <th scope="col">Amount<th>
                                    <th scope="col">Date</th>
                                    <th scope="col font-bold">Total Amount</th>
    
                                </tr>
                                </thead>
                                <tbody class="table-group-divider">
                                
                                    <?php $i = 1; $totalRevenue = 0; ?>
                                    @foreach ($otherExpLists as $data)
                                    <tr class="text-center">
                                    <td style="font-size:15px; width:50px" class="border-0">{{$i++}}</td>
                                   
                                    <td style="font-size:15px; width:50px" class="border-0">{{$data->account_name}} </td>
                                    <td style="font-size:15px; width:50px" class="border-0">{{$data->balance}} </td>
                                    <td style="font-size:15px; width:50px" class="border-0">{{$data->created_at->format('Y-m-d')}} </td>
                                    </tr>
                                   
                                 
                                    @endforeach
    
                                </tbody>
                                <tr style="background-color: rgb(247, 250, 243);">
                                    <th scope="col"></th>
                                    <th scope="col"></th>
                                    <th scope="col"><th>
                                    <th scope="col"></th>
                                    <th scope="col font-bold">{{ number_format($otherExpAmount, 2) }}</th>
    
                                </tr>
                                
                            </table>
                            
                           
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')

@endsection
