@extends('master')
@section('title','Cogs List')
@section('link','Cogs List')
@section('content')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" integrity="sha512-nMNlpuaDPrqlEls3IX/Q56H36qvBASwb3ipuo3MxeWbsQB1881ox0cRv7UPTgBlriqoynt35KjEwgGUeUXIPnw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

<div class="row mt-4">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title mt-3">Cogs Caculator List</h3>

              <button id="" class="btn btn-primary float-right" data-toggle="modal" data-target="#currency"> <i class="fa fa-plus"></i> Create Cogs</button>
            </div>
            <div class="card-body">

                <table id="example1" class="table">
                  <thead class="text-center bg-info">
                      <tr>
                      <th>No</th>
                      <th>Sale Product</th>
                      <th>Fabric Cost</th>
                      <th>Labor Cost</th>
                      <th>Transportation Cost</th>
                      <th>Overhead Cost</th>
                      <th>Accessory Cost</th>
                      <th> Packaging Cost</th>
                      <th> Fabric Qty</th>
                      <th>Quantity</th>
                      <th>Cost Per Unit</th>
                      {{-- <th>Action</th> --}}

                    </tr>
                  </thead>
                  <?php $i=1; ?>
                  <tbody class="text-center">
                      @foreach ($cogs as $cc)
                          <tr>
                              <td>{{$i++}}</td>
                              <td>{{$cc->saleitem['item_name']}}</td>
                              <td>{{$cc->fabric_cost}}</td>
                              <td>{{$cc->labor_cost}}</td>
                              <td>{{$cc->transportation_cost}}</td>
                              <td>{{$cc->other_overhead_cost}}</td>
                             
                              <td>{{$cc->accessory_cost}}</td>
                              <td>{{$cc->packaging_cost}}</td>
                              <td>{{$cc->fabric_qty}}</td>  
                              <td>{{$cc->quantity}}</td>
                              
                              <td>
                                ${{ number_format(($cc->fabric_cost + $cc->labor_cost + $cc->transportation_cost + $cc->other_overhead_cost + $cc->accessory_cost + $cc->packaging_cost) / $cc->quantity, 2) }}
                            {{-- </td>
                              <td>
                               
                                  <a href="" class="btn btn-sm btn-warning" data-toggle="modal" data-target=" #update_cogs{{$cc->id}}">Update</a>
                                  <a href="{{route('cogs#delete',$cc->id)}} " class="btn btn-danger" title="Delete Data" id="delete"><i class="fa fa-trash"></i> </a>

                              </td> --}}
                          </tr>
                      @endforeach
                  </tbody>
                </table>
          </div>
        </div>
    </div>
</div>

<div class="modal fade" id="currency" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        <div class="modal-header bg-info">
            <h5 class="modal-title" id="exampleModalLabel">Add Cogs </h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>

        {{-- Create section --}}
        <form action="{{route('create#cogs')}} " method="post">
            @csrf
        <div class="modal-body">
            <label for="name">Select Sale Product</label>
            <div class="form-group">
               
                <select class="form-control" name="sale_product_id" id="sale_product_id" onchange="filterCountingUnit(this.value)" >
                    <option hidden>Select -One-</option>

                    @foreach ($sale_items as $sale_item )
                    <option value="{{$sale_item->id}}">{{$sale_item->item_name}} </option>
                    @endforeach
                   
                </select>
            </div>
            <div class="form-group" id="counting_unit_div">
                <input type="hidden" name="id"  value ="{{$cc->id}}">
                <label for="name">Select Counting Unit </label>

                <select class="form-control counting_unit_multiple" style="width: 100%"  name="count_unit_id[]" multiple="multiple">
                    
                   
                </select>
            </div>
            <div class="form-group">
                <label for="name">Fabric Cost</label>
                <input type="number" class="form-control border border-info" name="fabric_cost" id="fabricCost" onchange="calculateCost()">
            </div>
            <div class="form-group">
                <label for="name"> Fabric Quantity</label>
                <input type="number" class="form-control border border-info" name="fabric_qty" >
            </div>
            <div class="form-group">
                <label for="name">Labour Cost</label>
                <input type="number" class="form-control border border-info" name="labor_cost" placeholder="eg. USD" id="labourCost" onchange="calculateCost()">
            </div>
            <div class="form-group">
                <label for="name"> Transportation Cost</label>
                <input type="number" class="form-control border border-info" name="transportation_cost" id="transportationCost" onchange="calculateCost()">
            </div>
            <div class="form-group">
                <label for="name"> Other Overhead Cost</label>
                <input type="number" class="form-control border border-info" name="other_overhead_cost" id="overheadCost" onchange="calculateCost()">
            </div>
            <div class="form-group">
                <label for="name"> Accessory Cost</label>
                <input type="number" class="form-control border border-info" name="accessory_cost" id="accessoryCost" onchange="calculateCost()">
            </div>
            <div class="form-group">
                <label for="name"> Packaging Cost</label>
                <input type="number" class="form-control border border-info" name="packaging_cost" id="packagingCost" onchange="calculateCost()">
            </div>
            
            <div class="form-group">
                <label for="name">Quantity </label>
                <input type="number" class="form-control border border-info" name="quantity" id="quantity" onchange="calculateCost()">
            </div>
            <div class="form-group">
                <label for="name">Selling Price </label>
                <input type="number" class="form-control border border-info" name="selling_price" value="{{$cc->selling_price}}">
            </div>
            <div class="">
                <label for="name">Cost Per Unit</label>
                {{-- <input class="form-control" type="text" id="result"  name="costPerUnit" disabled> --}}
                <button  class="form-control text-bold" id="result">
                </button>


                <input hidden class="form-control" type="text" id="cost_per_unit" name="cost_per_unit">
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal" id="calculateButton" onmouseover="showCost()">Check Cost Per Unit</button>
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
            <button type="submit" class="btn btn-primary">Set</button>
        </div>
        </form>
        </div>
    </div>
</div>
{{-- Update Section --}}
@foreach ($cogs as $cc)
<div class="modal fade" id="update_cogs{{$cc->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        <div class="modal-header bg-info">
            <h5 class="modal-title" id="exampleModalLabel">Update Cogs</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <form action="{{route('cogs#update')}}" method="post">
            @csrf
        <div class="modal-body">
            <div class="form-group">
               <label for="name">Select Sale Product</label>
                <select class="form-control" name="sale_product_id" id="sale_product_id" 
                value="{{$cc->saleitem['item_name']}}"
                onchange="filterCountingUnitUp(this.value)" >
                
                    @foreach ($sale_items as $sale_item )
                    <option value="{{$sale_item->id}}" {{$sale_item->id == $cc->sale_product_id ? 'selected':''}}>{{$sale_item->item_name}} </option>
                    @endforeach
                   
                </select>
            </div>
            {{-- <div class="form-group">
                <input type="hidden" name="id"  value ="{{$cc->id}}">
                <label for="name">Select Counting Unit </label>

                <select class="form-control count_unit_id"  name="count_unit_id" id="count_unit_id" multiple="multiple">
                    
                   
                </select>
            </div> --}}
            <div class="form-group" id="counting_unit_div">
                <input type="hidden" name="id"  value ="{{$cc->id}}">
                <label for="name">Select Counting Unit </label>

                <select class="form-control counting_unit_multiple" style="width: 100%"  name="count_unit_id[]" multiple="multiple" >
                    
                   
                </select>
            </div>
         
            <div class="form-group">
                <label for="name">Fabric Cost</label>
                <input type="number" class="form-control border border-info" name="fabric_cost" value="{{$cc->fabric_cost}}" id="fabricCostUp" onchange="calculateCostUp()">
            </div>
            <div class="form-group">
                <label for="name"> Fabric Quantity</label>
                <input type="number" class="form-control border border-info" value="{{$cc->fabric_qty}}" name="fabric_qty">
            </div>
            <div class="form-group">
                <label for="name">Labour Cost</label>
                <input type="number" class="form-control border border-info" name="labor_cost" placeholder="eg. USD" value="{{$cc->labor_cost}}" id="labourCostUp" onchange="calculateCostUp()">
            </div>
            <div class="form-group">
                <label for="name"> Transportation Cost</label>
                <input type="number" class="form-control border border-info" name="transportation_cost" value="{{$cc->transportation_cost}}" id="transportationCostUp" onchange="calculateCostUp()">
            </div>
            <div class="form-group">
                <label for="name"> Other Overhead Cost</label>
                <input type="number" class="form-control border border-info" name="other_overhead_cost" value="{{$cc->other_overhead_cost}}" id="overheadCostUp" onchange="calculateCostUp()">
            </div>
            <div class="form-group">
                <label for="name"> Accessory Cost</label>
                <input type="number" class="form-control border border-info" value="{{$cc->accessory_cost}}" name="accessory_cost" id="accessoryCostUp" onchange="calculateCostUp()">
            </div>
            <div class="form-group">
                <label for="name"> Packaging Cost</label>
                <input type="number" class="form-control border border-info" value="{{$cc->packaging_cost}}" name="packaging_cost" id="packagingCostUp" onchange="calculateCostUp()">
            </div>
            
            <div class="form-group">
                <label for="name">Quantity </label>
                <input type="number" class="form-control border border-info" name="quantity" value="{{$cc->quantity}}" id="quantityUp" onchange="calculateCostUp()">
            </div>
            <div class="form-group">
                <label for="name">Selling Price </label>
                <input type="number" class="form-control border border-info" name="selling_price" value="{{$cc->selling_price}}">
            </div>
            {{-- <div class="">
                <button disabled id="resultUp">
                </button>
            </div> --}}
            <div class="">
                <button class="form-control" disabled  id="resultUp">
                </button>

                <input hidden type="text" class="form-control" id="cost_per_unit_up" name="cost_per_unit">
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal"  onmouseover="showCostUp()" id="calculateButtonUp" >Check Cost Per Unit</button>
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
            <button type="submit" class="btn btn-primary">Set</button>
        </div>
        </form>
        </div>
    </div>
</div>



@endforeach

@endsection

@section('js')

<script type="text/javascript">

    //    Show  Data
    
    $(document).ready(function() {
                   $('.counting_unit_multiple').select2({
                    width: 'resolve'
                   });
                    $('#counting_unit_div').hide();
               });   

           function filterCountingUnit(value){
                
                if (sale_product_id != null || undefined || 0) {
                    $.ajax({
                        url: '{{ route('cogs#CountingUnitAjax') }}',
                        type: 'POST',
                        data: {
                            "_token": "{{ csrf_token() }}",
                            "sale_product_id": value
                        },
                        success:function(data){
                            console.log(data);
                            $('#counting_unit_div').show();

                            // $('select[name="count_unit_id[]"]').html('');
                            // var d =$('select[name="count_unit_id[]"]');
                            var d =$('.counting_unit_multiple');

                            $.each(data, function(key, value){
                                d.append('<option value="'+ value.id + '">' + value.unit_name + '</option>');
                            });
                        },
                    });
                } else {
                    alert('danger');
                }
            };//Filter count unit end

            //Filtr for update data unit count
            function filterCountingUnitUp(value){
                
                if (sale_product_id != null || undefined || 0) {
                    $.ajax({
                        url: '{{ route('cogs#CountingUnitAjax') }}',
                        type: 'POST',
                        data: {
                            "_token": "{{ csrf_token() }}",
                            "sale_product_id": value
                        },
                        success:function(data){
                            console.log(data);
                            $('#counting_unit_div').show();

                            // $('select[name="count_unit_id[]"]').html('');
                            // var d =$('select[name="count_unit_id[]"]');
                            var d =$('.counting_unit_multiple');

                            $.each(data, function(key, value){
                                d.append('<option value="'+ value.id + '">' + value.unit_name + '</option>');
                            });
                        },
                    });
                } else {
                    alert('danger');
                }
            };//Filter count unit end



            //   $('#result').hide();
           //Caculation create
          
               function calculateCost() {
        var fabricCost = parseFloat($("#fabricCost").val());
        var accessoryCost = parseFloat($("#accessoryCost").val());
        var packagingCost = parseFloat($("#packagingCost").val());
        var overheadCost = parseFloat($("#overheadCost").val());
        var transportationCost = parseFloat($("#transportationCost").val());
        var labourCost = parseFloat($("#labourCost").val());
        var quantity = parseFloat($("#quantity").val());
        
        // Calculate total cost
        var totalCost = fabricCost + accessoryCost + packagingCost + overheadCost + labourCost +transportationCost;
        
        // Calculate cost per unit
        var costPerUnit = totalCost / quantity;
        
        $("#result").text("Cost per Unit: " + costPerUnit.toFixed(2));
        $("#cost_per_unit").val(costPerUnit);
        // return   console.log(costPerUnit,'cost');

    };
//method end

//Update Caculation
            // $('#resultUp').hide();
    
            function calculateCostUp() {       
        var fabricCostdUp = parseFloat($("#fabricCostUp").val());
        var accessoryCostdUp = parseFloat($("#accessoryCostUp").val());
        var packagingCostdUp = parseFloat($("#packagingCostUp").val());
        var overheadCostdUp = parseFloat($("#overheadCostUp").val());
        var transportationCostdUp = parseFloat($("#transportationCostUp").val());
        var labourCostdUp = parseFloat($("#labourCostUp").val());
        var quantitydUp = parseFloat($("#quantityUp").val());
        
        // Calculate total cost
        var totalCostdUp = fabricCostdUp + accessoryCostdUp + packagingCostdUp + overheadCostdUp + labourCostdUp +transportationCostdUp;
        
        // Calculate cost per unit
        var costPerUnitUp = totalCostdUp / quantitydUp;
        
        // Update result on the frontend
          
        $("#resultUp").text("Cost per Unit: " + costPerUnitUp.toFixed(2));
        $("#cost_per_unit_up").val(costPerUnitUp);


    };
    

    function showCost(){
        $('#result').show();
        
    };
    function showCostUp(){
        $('#resultUp').show();
    };
    
    
    
    
        
    </script>
           

@endsection




    
