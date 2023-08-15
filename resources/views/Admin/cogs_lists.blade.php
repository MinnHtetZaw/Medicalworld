@extends('master')
@section('title','Cogs List')
@section('link','Cogs List')
@section('content')
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
                      <th>Quantity</th>
                      <th>Cost Per Unit</th>
                      <th>Action</th>

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
                              <td>{{$cc->quantity}}</td>
                              <td>
                                  ${{($cc->fabric_cost+$cc->labor_cost+$cc->transportation_cost+$cc->other_overhead_cost) / $cc->quantity}}
                              </td>
                              <td>
                               
                                  <a href="" class="btn btn-sm btn-warning" data-toggle="modal" data-target=" #update_cogs{{$cc->id}}">Update</a>
                                  <a href="{{route('cogs#delete',$cc->id)}} " class="btn btn-danger" title="Delete Data" id="delete"><i class="fa fa-trash"></i> </a>

                              </td>
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
        <form action="{{route('create#cogs')}} " method="post">
            @csrf
        <div class="modal-body">
            <label for="name">Select Sale Product</label>
            <div class="form-group">
               
                <select class="form-control" name="sale_product_id" id="">
                    @foreach ($sale_items as $sale_item )
                    <option value="{{$sale_item->id}}">{{$sale_item->item_name}} </option>
                    @endforeach
                   
                </select>
            </div>
            <div class="form-group">
                <label for="name">Fabric Cost</label>
                <input type="number" class="form-control border border-info" name="fabric_cost">
            </div>
            <div class="form-group">
                <label for="name">Labour Cost</label>
                <input type="number" class="form-control border border-info" name="labor_cost" placeholder="eg. USD">
            </div>
            <div class="form-group">
                <label for="name"> Transportation Cost</label>
                <input type="number" class="form-control border border-info" name="transportation_cost">
            </div>
            <div class="form-group">
                <label for="name"> Other Overhead Cost</label>
                <input type="number" class="form-control border border-info" name="other_overhead_cost">
            </div>
            <div class="form-group">
                <label for="name">Quantity </label>
                <input type="number" class="form-control border border-info" name="quantity">
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
            <button type="submit" class="btn btn-primary">Set</button>
        </div>
        </form>
        </div>
    </div>
</div>

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
            <label for="name">Select Sale Product</label>
            <div class="form-group">
                <input type="hidden" name="id"  value ="{{$cc->id}}">
               
                <select class="form-control" name="sale_product_id" id="">
                    @foreach ($sale_items as $sale_item )
                    <option value="{{$sale_item->id}}"  {{$sale_item->id == $cc->sale_product_id  ? 'selected':''}}>{{$sale_item->item_name}} </option>
                    @endforeach
                   
                </select>
            </div>
            <div class="form-group">
                <label for="name">Fabric Cost</label>
                <input type="number" class="form-control border border-info" name="fabric_cost" value="{{$cc->fabric_cost}}">
            </div>
            <div class="form-group">
                <label for="name">Labour Cost</label>
                <input type="number" class="form-control border border-info" name="labor_cost" placeholder="eg. USD" value="{{$cc->labor_cost}}">
            </div>
            <div class="form-group">
                <label for="name"> Transportation Cost</label>
                <input type="number" class="form-control border border-info" name="transportation_cost" value="{{$cc->transportation_cost}}">
            </div>
            <div class="form-group">
                <label for="name"> Other Overhead Cost</label>
                <input type="number" class="form-control border border-info" name="other_overhead_cost" value="{{$cc->other_overhead_cost}}">
            </div>
            <div class="form-group">
                <label for="name">Quantity </label>
                <input type="number" class="form-control border border-info" name="quantity" value="{{$cc->quantity}}">
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
            <button type="submit" class="btn btn-primary">Set</button>
        </div>
        </form>
        </div>
    </div>
</div>
@endforeach

@endsection
