@extends('master')

@section('title', 'Order Page')

@section('place')
    <style>
        .form-control:disabled, .form-control[readonly] {
            opacity: 1;
        }
        .form-control:disabled {
            background-color: #FFFFFF !important;
            opacity: 1 !important;
            color: black !important;
        }
        .table td {
            padding: 0.75rem;
            vertical-align: middle !important;
        }
        .table th {
            padding: 0.75rem;
            vertical-align: middle !important;
        }
        .btn-group label{
            color: #6c757d !important;
        }
    </style>
@endsection
@section('content')
        <div class="row">
            <div class="col-12">
                <div class="my-1">
                    <h3 class="mb-2 font-weight-bold">Add Factory Order</h3>
                    <div class="row">
                        <div class="col-12">
                                <div class="card px-5 py-1">
                                    <form action="{{route('saveFactoryOrder',$factoryOrder->id)}}" method="post">
                                        @csrf
{{--                                        <input type="hidden" name="order_id" value="{{$main_order->id}}">--}}
{{--                                        <input type="hidden" name="order_qty" value="{{$main_order->total_quantity}}">--}}
                                        <div class="d-flex align-items-center">
                                            <label for="" class="col-2 text-primary font-weight-bold mb-0">Factory Order Number</label>
                                            <input name="factory_order_number" type="text" value="{{$factoryOrder->factory_order_number}}" readonly class="form-control-plaintext text-primary font-weight-bold" >
                                        </div>
                                        <div class="form-group mb-1 col-6">
                                            <label for="">Department Name</label>
                                            <input type="text"  class="form-control form-control-sm" name="department_name" value="{{$factoryOrder->department_name}}">
                                        </div>
                                        <div class="form-group mb-0 col-6">
                                            <label for="">Delivery Date</label>
                                            <input type="date" name="delivery_date" class="form-control form-control-sm" value="{{$factoryOrder->delivery_date ?? date('Y-m-d') }}">
                                        </div>
                                        <div class="form-group mb-0 col-6">
                                            <label for="">Remark</label>
                                            <textarea name="remark" class="form-control form-control-sm" cols="30" rows="3">{{$factoryOrder->remark ?? ""}}</textarea>
                                        </div>
                                        <div class="mt-3 row">
                                            <div class="col-3">
                                                <label class="font-weight-bold">Finish Status</label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="finish_status" id="finish_status1" value="1">
                                                <label class="form-check-label" for="finish_status1">
                                                    Yes
                                                </label>
                                              </div>
                                              <div class="form-check mx-2">
                                                <input class="form-check-input" type="radio" name="finish_status" id="finish_status2" value="0">
                                                <label class="form-check-label" for="finish_status2">
                                                  No
                                                </label>
                                              </div>
                                        </div>
                                        <div class="mb-0 col-6 form-group">
                                            <button class="btn btn-info">Save Factory Order</button>
                                        </div>
                                    </form>

                                </div>
                        </div>
                    </div>
                    <div class="row">
                            <div class="col-12" style="">
                                <div class="card" style="border-radius: 0;min-height:100vh">
                                    <div class="card-title d-flex align-items-center my-2">
                                        <a href="" class="text-primary px-2" onclick="deleteItems()"><i class="fas fa-sync"></i> Refresh
                                            Here &nbsp</a>
                                    </div>
                                    <div class="row justify-content-center">
                                        <div class="col-11">
                                            @if(session('status'))
                                                <p class="alert alert-success">{{session('status')}}</p>
                                            @endif
                                            {{-- @php
                                            $main_order= \App\Order::find($factoryOrder->order_id);
                                            @endphp --}}
                                                @foreach($main_order->customUnitOrder as $customUnit)
                                                <div class="card mb-2 shadow-sm py-2 px-5">
                                                    <div class="d-flex justify-content-between align-items-center">
                                                        <div>
                                                            <h5 class="text-primary font-weight-bold">Design</h5>
                                                            <p class="mb-0">
                                                                {{$customUnit->design_name}}
                                                            </p>
                                                        </div>
                                                        <div>
                                                            <h5 class="text-primary font-weight-bold">Fabric</h5>
                                                            <p class="mb-0">
                                                                {{$customUnit->fabric_name}}
                                                            </p>
                                                        </div>
                                                        <div>
                                                            <h5 class="text-primary font-weight-bold">Color</h5>
                                                            <p class="mb-0">
                                                                {{$customUnit->colour_name}}
                                                            </p>
                                                        </div>
                                                        <div>
                                                            <h5 class="text-primary font-weight-bold">Size</h5>
                                                            <p class="mb-0">
                                                                {{$customUnit->size_name??""}}
                                                            </p>
                                                        </div>
                                                        <div>
                                                            <h5 class="text-primary font-weight-bold">Order Quantity</h5>
                                                            <p class="mb-0 text-center">
                                                                {{$customUnit->order_qty}}
                                                            </p>
                                                        </div>
                                                        <div>
                                                            {{-- @php
                                                            $fo = \App\CustomUnitFactoryOrder::where('custom_unit_order_id',$customUnit->id)->get()->pluck('quantity');
                                                            $q=0;
                                                            foreach ($fo as $f) {
                                                                $q += $f;
                                                            }
                                                            @endphp --}}

                                                            <h5 class="text-primary font-weight-bold">Current Quantity</h5>
                                                            <p class="mb-0 text-center">
                                                             @foreach ($qty as $q )
                                                                @if ($q->custom_unit_order_id == $customUnit->id)
                                                                    {{$q->Total ?? 0}}
                                                                @endif
                                                             @endforeach
                                                            </p>
                                                        </div>
                                                        <div class="btn-group-sm">
                                                            <button title="Factory Item Details" class="btn btn-outline-info" type="button" data-toggle="collapse" data-target="#collapse_factory_order{{$customUnit->id}}" aria-expanded="false" aria-controls="collapseExample">
                                                                <i class="fas fa-info-circle"></i>
                                                            </button>
                                                            <button title="New Factory Item" class="btn btn-outline-info" data-toggle="modal" data-target="#spec{{$customUnit->id}}">
                                                                <i class="fas fa-plus-circle"></i>
                                                            </button>
{{--                                                                                                    Modal--}}
                                                            <div class="modal fade" id="spec{{$customUnit->id}}" role="dialog" aria-hidden="true">
                                                                <div class="modal-dialog" role="document">
                                                                    <div class="modal-content">
                                                                        <div class="modal-header">
                                                                            <h4 class="modal-title text-primary font-weight-bold">Add Factory Order</h4>
                                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                                <span aria-hidden="true">&times;</span>
                                                                            </button>
                                                                        </div>
                                                                        <div class="modal-body py-3 px-5">
                                                                            <form action="{{route('saveFactoryItem')}}" method="post">
                                                                                @csrf
                                                                                <input type="hidden" name="factory_order_id" value="{{$factoryOrder->id}}">
                                                                                <input type="hidden" name="custom_unit_order_id" value="{{$customUnit->id}}">
                                                                                <input type="hidden" name="design_name" value="{{$customUnit->design_name}}">
                                                                                <input type="hidden" name="design_id" value="{{$customUnit->design_id}}">
                                                                                <input type="hidden" name="fabric_name" value="{{$customUnit->fabric_name}}">
                                                                                <input type="hidden" id="fabric_ajax{{$customUnit->id}}" name="fabric_id" value="{{$customUnit->fabric_id}}">
                                                                                <input type="hidden" name="colour_name" value="{{$customUnit->colour_name}}">
                                                                                <input type="hidden" name="colour_id" value="{{$customUnit->colour_id}}">
                                                                                <div class="form-group mb-1">
                                                                                    <label class="" for="person_name">Person Name</label>
                                                                                    <input type="text" name="person_name"  class="form-control form-control-sm" required>
                                                                                </div>
                                                                                <div class="form-group mb-1">
                                                                                    <label for="">Person ID</label>
                                                                                    <input type="text" name="person_id" class="form-control form-control-sm" >
                                                                                </div>
                                                                                <div class="form-group mb-1">
                                                                                    <label for="">PP</label>
                                                                                    <div class="d-flex justify-content-between">
                                                                                        <select name="pp_design_id" id="design_ajax{{$customUnit->id}}" class="custom-select custom-select-sm mr-2" style="font-size: 14px">
                                                                                            @foreach($designs as $design)
                                                                                                <option value="{{$design->id}}" {{$customUnit->design_id == $design->id? 'selected':''}}>{{$design->design_name}}</option>
                                                                                            @endforeach

                                                                                        </select>
                                                                                        <select name="pp_colour_id" id="color_ajax{{$customUnit->id}}" class="custom-select custom-select-sm " style="font-size: 14px">
                                                                                            @foreach($colours as $colour)
                                                                                                <option value="{{$colour->id}}" {{$customUnit->colour_id == $colour->id? 'selected':''}}>{{$colour->colour_name}}</option>
                                                                                            @endforeach

                                                                                        </select>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="form-group mb-1">
                                                                                    <label for="">Gender</label>
                                                                                    <div>
                                                                                        <input type="radio" id="male{{$customUnit->id}}" class="custom-radio" name="gender" value="male">
                                                                                        <label for="male{{$customUnit->id}}">Male</label>
                                                                                        <input type="radio" id="female{{$customUnit->id}}" class="custom-radio" name="gender" value="female">
                                                                                        <label for="female{{$customUnit->id}}">Female</label>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="form-row mb-3 justify-content-between">
                                                                                    <div class="form-group col-6 mb-1">
                                                                                        <label for="">Size</label>
                                                                                        <select id="size_ajax{{$customUnit->id}}" name="size_id" class="custom-select custom-select-sm" style="font-size: 14px">
                                                                                            @foreach($sizes as $size)
                                                                                                <option value="{{$size->id}}" {{$customUnit->size_id == $size->id? 'selected':''}}>{{$size->size_name}}</option>
                                                                                            @endforeach
                                                                                       </select>
                                                                                    </div>
                                                                                    <div class="form-group col-6 mb-1">
                                                                                        <label for="">Quantity</label>
                                                                                        <input type="number" name="quantity" class="form-control form-control-sm"  onchange="setsubtotal(this.value,{{$customUnit->id}})" required>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="form-group mb-1">
                                                                                    <label for="">SubTotal</label>
                                                                                    <input type="number" id="subTotal{{$customUnit->id}}" name="subtotal" class="form-control form-control-sm text-black" readonly>
                                                                                </div>
                                                                                <div class="form-group mb-1">
                                                                                    <label for="">Remark <span class="small text-success">( Optional! )</span></label>
                                                                                    <textarea name="remark" class="form-control" rows="3"></textarea>
                                                                                </div>
                                                                                <div class="d-flex justify-content-center align-items-center">
                                                                                    <div class="">
                                                                                        <button class="btn btn-sm btn-info">Save</button>
                                                                                    </div>
                                                                                </div>
                                                                            </form>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                        </div>
                                                    </div>
                                                </div>
{{--                                                                                    Collapse--}}
                                                <div class="row justify-content-center">
                                                    <div class="col-12">
                                                        <div class="collapse" id="collapse_factory_order{{$customUnit->id}}">
                                                            <table class="table table-info table-bordered">
                                                                <thead class="">
                                                                <tr class="text-center">
                                                                    <th class="text-info font-weight-bold">Name</th>
                                                                    <th class="text-info font-weight-bold">ID</th>
                                                                    <th class="text-info font-weight-bold">Design</th>
                                                                    <th class="text-info font-weight-bold">Fabric</th>
                                                                    <th class="text-info font-weight-bold">Colour</th>
                                                                    <th class="text-info font-weight-bold">PP</th>
                                                                    <th class="text-info font-weight-bold">Male</th>
                                                                    <th class="text-info font-weight-bold">Female</th>
                                                                    <th class="text-info font-weight-bold">Quantity</th>
                                                                    <th class="text-info font-weight-bold">SubTotal(Pricing)</th>
                                                                    <th class="text-info font-weight-bold">Remark</th>
                                                                    <th class="text-info font-weight-bold">Action</th>
                                                                </tr>
                                                                </thead>
                                                                <tbody>
                                                                @forelse(\App\CustomUnitFactoryOrder::where('custom_unit_order_id',$customUnit->id)->get() as $customFactory)
                                                                    <tr class="text-center">
                                                                        <td>{{$customFactory->person_name}}</td>
                                                                        <td>{{$customFactory->person_id}}</td>
                                                                        <td>{{$customFactory->design_name}}</td>
                                                                        <td>{{$customFactory->fabric_name}}</td>
                                                                        <td>{{$customFactory->colour_name}}</td>
                                                                        <td>{{$customFactory->pp_design_name}} {{$customFactory->pp_colour_name}}</td>
                                                                        <td>{{$customFactory->male_size_name ?? "-" }}</td>
                                                                        <td>{{$customFactory->female_size_name ?? "-" }}</td>
                                                                        <td>{{$customFactory->quantity }}</td>
                                                                        <td>{{$customFactory->subtotal ??"-" }}</td>
                                                                        <td>{{$customFactory->remark ?? "-" }}</td>
                                                                        <td>
                                                                            <button class="btn btn-sm rounded btn-outline-info" title="Edit Factory Order Item" data-toggle="modal" data-target="#edit{{$customFactory->id}}">
                                                                                <i class="fas fa-pencil-alt"></i>
                                                                            </button>
                                                                            <a href="{{route('deleteFactoryItem',$customFactory->id)}}" class="btn btn-sm rounded btn-outline-danger" title="Delete Factory Order Item">
                                                                                <i class="fas fa-trash-alt"></i>
                                                                            </a>
                                                                        </td>
{{--                                                                                                                Edit Modal--}}
                                                                        <div class="modal fade" id="edit{{$customFactory->id}}" role="dialog" aria-hidden="true">
                                                                            <div class="modal-dialog" role="document">
                                                                                <div class="modal-content">
                                                                                    <div class="modal-header">
                                                                                        <h4 class="modal-title text-primary font-weight-bold">Edit Factory Order Item</h4>
                                                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                                            <span aria-hidden="true">&times;</span>
                                                                                        </button>
                                                                                    </div>
                                                                                    <div class="modal-body py-3 px-5">
                                                                                        @php
                                                                                            $currentCustomFactory = \App\CustomUnitFactoryOrder::find($customFactory->id);
                                                                                        @endphp
                                                                                        <form action="{{route('editFactoryItem',$currentCustomFactory->id)}}" method="post">
                                                                                            @csrf
                                                                                            <input type="hidden" name="factory_order_id" value="{{$factoryOrder->id}}">
                                                                                            <input type="hidden" name="custom_unit_order_id" value="{{$customUnit->id}}">
                                                                                            {{-- <input type="hidden" id="design_name{{$customUnit->id}}" name="design_name" value="{{$customUnit->design_name}}"> --}}
                                                                                            {{-- <input type="hidden" id="design_id{{$customUnit->id}}" name="design_id" value="{{$customUnit->design_id}}"> --}}
                                                                                            {{-- <input type="hidden" id="fabric_name{{$customUnit->id}}" name="fabric_name" value="{{$customUnit->fabric_name}}"> --}}
                                                                                            {{-- <input type="hidden" id="fabric_id{{$customUnit->id}}" name="fabric_id" value="{{$customUnit->fabric_id}}"> --}}
                                                                                            {{-- <input type="hidden" id="colour_name{{$customUnit->id}}" name="colour_name" value="{{$customUnit->colour_name}}"> --}}
                                                                                            {{-- <input type="hidden" id="colour_id{{$customUnit->id}}" name="colour_id" value="{{$customUnit->colour_id}}"> --}}
                                                                                            <div class="form-group mb-1">
                                                                                                <label class="" for="person_name">Person Name</label>
                                                                                                <input type="text" name="person_name"  class="form-control form-control-sm" value="{{$currentCustomFactory->person_name}}">
                                                                                            </div>
                                                                                            <div class="form-group mb-1">
                                                                                                <label for="">Person ID</label>
                                                                                                <input type="text" name="person_id" class="form-control form-control-sm" value="{{$currentCustomFactory->person_id}}">
                                                                                            </div>
                                                                                            <div class="form-group mb-1">
                                                                                                <label for="">PP</label>
                                                                                                <div class="d-flex justify-content-between">
                                                                                                    <select id="pp_design{{$currentCustomFactory->id}}" name="pp_design_id"  class="custom-select custom-select-sm mr-2" style="font-size: 14px">

                                                                                                    @foreach($designs as $design)
                                                                                                        <option value="{{$design->id}}" {{$currentCustomFactory->pp_design_id == $design->id? 'selected':''}}>{{$design->design_name}}</option>
                                                                                                    @endforeach


                                                                                                    </select>
                                                                                                    <select id="pp_colour{{$currentCustomFactory->id}}" name="pp_colour_id" class="custom-select custom-select-sm " style="font-size: 14px">
                                                                                                        @foreach($colours as $colour)
                                                                                                            <option value="{{$colour->id}}" {{$currentCustomFactory->pp_colour_id == $colour->id? 'selected':''}}>{{$colour->colour_name}}</option>
                                                                                                        @endforeach


                                                                                                    </select>
                                                                                                </div>
                                                                                            </div>
                                                                                            <div class="form-group mb-1">
                                                                                                <label for="">Gender</label>
                                                                                                <div>
                                                                                                    <input type="radio" id="male{{$currentCustomFactory->id}}" class="custom-radio" name="gender" value="male" {{$currentCustomFactory->male_size_id != null ? 'checked':''}}>
                                                                                                    <label for="male{{$currentCustomFactory->id}}">Male</label>
                                                                                                    <input type="radio" id="female{{$currentCustomFactory->id}}" class="custom-radio" name="gender" value="female" {{$currentCustomFactory->female_size_id != null ? 'checked':''}}>
                                                                                                    <label for="female{{$currentCustomFactory->id}}">Female</label>
                                                                                                </div>
                                                                                            </div>
                                                                                            <div class="form-row mb-3 justify-content-between">
                                                                                                <div class="form-group col-6 mb-1">
                                                                                                    <label for="">Size</label>
                                                                                                    <select id="size{{$currentCustomFactory->id}}" name="size_id" class="custom-select custom-select-sm" style="font-size: 14px">

                                                                                                        @if($currentCustomFactory->male_size_id)
                                                                                                        @foreach($sizes as $size)
                                                                                                            <option value="{{$size->id}}" {{$currentCustomFactory->male_size_id == $size->id? 'selected':''}}>{{$size->size_name}}</option>
                                                                                                        @endforeach


                                                                                                        @elseif($currentCustomFactory->female_size_id)
                                                                                                        @foreach($sizes as $size)
                                                                                                            <option value="{{$size->id}}" {{$currentCustomFactory->female_size_id == $size->id? 'selected':''}}>{{$size->size_name}}</option>
                                                                                                        @endforeach

                                                                @else
                                                                @foreach($sizes as $size)
                                                                                                            <option value="{{$size->id}}">{{$size->size_name}}</option>
                                                                                                        @endforeach
                                                                @endif


                                                                                                    </select>
                                                                                                </div>
                                                                                                <div class="form-group col-6 mb-1">
                                                                                                    <label for="">Quantity</label>
                                                                                                    <input type="number" name="quantity" class="form-control form-control-sm" value="{{$currentCustomFactory->quantity}}">
                                                                                                </div>
                                                                                            </div>
                                                                                            <div class="form-group mb-1">
                                                                                                <label for="">Remark <span class="small text-success">( Optional! )</span></label>
                                                                                                <textarea name="remark" class="form-control" rows="3">{{$currentCustomFactory->remark}}</textarea>
                                                                                            </div>
                                                                                            <div class="d-flex justify-content-center align-items-center">
                                                                                                <div class="">
                                                                                                    <button class="btn btn-sm btn-info">Update</button>
                                                                                                </div>
                                                                                            </div>
                                                                                        </form>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </tr>
                                                                @empty
                                                                    <tr class="text-center">
                                                                        <td colspan="11">There is no data yet! Please add FactoryOrder Item!</td>
                                                                    </tr>
                                                                @endforelse
                                                                </tbody>
                                                                <tbody>

                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>
                                                </div>
                                                @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div>
                    </div>
                </div>
            </div>
        </div>
@endsection
@section('js')

<script>
    // $(document).ready(function(){
        function setsubtotal(value,id)
    {
        var design =  $('#design_ajax'+id).val()
        var color = $('#color_ajax'+id).val()
        var size = $('#size_ajax'+id).val()
        var fabric = $('#fabric_ajax'+id).val()

        if(design && color && size && fabric != null)
        {
            $.ajax({
                        type: 'POST',
                        url: '{{ route('searchFabricCosting') }}',
                        data: {
                            "_token": "{{ csrf_token() }}",
                            "design_id": design,
                            "color_id": color,
                            "size_id": size,
                            "fabric_id":fabric,
                        },
                        success:function(data)
                        {
                          $('#subTotal'+id).val(data * value);
                        }
            })
        }
    }
    // })



</script>
@endsection




