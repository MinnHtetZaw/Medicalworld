@extends('master')

@section('title', 'Fabric Costing')

@section('place')

    {{-- <div class="col-md-5 col-8 align-self-center">
    <h3 class="text-themecolor m-b-0 m-t-0">@lang('lang.branch')</h3>
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{route('index')}}">@lang('lang.back_to_dashboard')</a></li>
        <li class="breadcrumb-item active">@lang('lang.category') @lang('lang.list')</li>
    </ol>
</div> --}}

@endsection

@section('content')

    <div class="row page-titles">
        <div class="col-md-5 col-8 align-self-center">
            <h4 class="font-weight-normal">Fabric Costing List</h4>
        </div>
    </div>

    <div class="row">
        <div class="col-md-5">
            <div class="card shadow-sm rounded">
                <div class="card-header">
                    <div class="d-flex">
                        <form action="{{route('fabric_costing_import')}}" enctype="multipart/form-data" method="post">
                        @csrf
                        <input type="file" name="import_file" required>
                        <button type="submit" class="btn btn-danger">Import</button>
                    </form>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-8">
            <div class="card shadow">
                <div class="card-body">
                    <div class="table-responsive text-black">
                        <table class="table table-hover">
                            <thead class="text-center">
                                <tr>
                                    <th>#</th>
                                    <th>Design</th>
                                    <th>Fabric</th>
                                    <th>Color</th>
                                    <th>Size</th>
                                    <th>Yards</th>
                                    <th>Pricing</th>
                                    <th>SubTotal</th>

                                </tr>
                            </thead>
                            <tbody id="category_table">

                                @foreach ($fabricCost as $index => $cost)
                                    <tr class="text-center">
                                        <td>{{ ++$index }}</td>
                                        <td>{{ $cost->design->design_name }}</td>
                                        <td>{{ $cost->fabric->fabric_name }}</td>
                                        <td>{{ $cost->color->colour_name }}</td>
                                        <td>{{ $cost->size->size_name }}</td>
                                        <td>{{ $cost->yards }}</td>
                                        <td>{{ $cost->pricing }}</td>
                                        <td>{{ $cost->subtotal() }}</td>

                                        <td class="text-center">
                                            <a href="#" class="btn btn-outline-warning" data-toggle="modal"
                                                data-target="#edit_costing{{ $cost->id }}"><i class="fas fa-edit"></i>
                                            </a>

                                            <a href="#" class="btn btn-outline-danger"
                                                onclick="ApproveLeave('{{ $cost->id }}')">
                                                <i class="fas fa-trash-alt"></i></a>
                                        </td>

                                        <div class="modal fade" id="edit_costing{{ $cost->id }}" role="dialog"
                                            aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h4 class="modal-title">Edit Fabric Costing </h4>
                                                        <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>

                                                    <div class="modal-body">
                                                        <form class="form-material m-t-40" method="post"
                                                            action="{{ route('fabric_costing_update', $cost->id) }}">
                                                            @csrf

                                                            <div class="form-group">
                                                                <label class="font-weight-bold">Designs</label>
                                                                <select name="design" class="form-control">
                                                                    <option value={{$cost->design->id}}>{{$cost->design->design_name}}</option>
                                                                    @foreach ($designs as $design)
                                                                    @if ($design->id != $cost->design->id)
                                                                    <option value={{ $design->id }}>{{ $design->design_name }}</option>
                                                                    @endif

                                                                    @endforeach
                                                                </select>

                                                            </div>
                                                            <div class="form-group">
                                                                <label class="font-weight-bold">Fabrics</label>
                                                                <select name="fabric" class="form-control" id="fabric_update" onchange="changeColorUpdate()">
                                                                    <option value={{$cost->fabric->id}}>{{ $cost->fabric->fabric_name }}</option>
                                                                    @foreach ($fabrics as $fabric)
                                                                    @if ( $fabric->id !=$cost->fabric->id )
                                                                    <option value={{ $fabric->id }}>{{ $fabric->fabric_name }}</option>
                                                                    @endif

                                                                    @endforeach
                                                                </select>

                                                            </div>
                                                            <div class="form-group">
                                                                <label class="font-weight-bold">Colors</label>
                                                                <select name="color" class="form-control" id="color_update">
                                                                    <option value={{$cost->color->id}}>{{ $cost->color->colour_name }}</option>
                                                                    @foreach ($colors as $color)
                                                                    @if ($color->id != $cost->color->id && $color->fabric_id == $cost->fabric->id)
                                                                        <option value={{ $color->id }}>{{ $color->colour_name }}</option>
                                                                    @endif

                                                                    @endforeach
                                                                </select>

                                                            </div>
                                                            <div class="form-group">
                                                                <label class="font-weight-bold">Sizes</label>
                                                                <select name="size" class="form-control">
                                                                    <option value={{$cost->size->id}}>{{ $cost->size->size_name }}</option>
                                                                    @foreach ($sizes as $size)
                                                                    @if ($size->id != $cost->size->id)
                                                                    <option value={{ $size->id }}>{{ $size->size_name }}</option>
                                                                    @endif

                                                                    @endforeach
                                                                </select>

                                                            </div>
                                                            <div class="form-group">
                                                                <label class="font-weight-bold">Yards</label>
                                                                <input type="text" name="yards" class="form-control" placeholder="Enter Yards" value={{ $cost->yards}}
                                                                    required>
                                                            </div>

                                                            <div class="form-group">
                                                                <label class="font-weight-bold">Pricing</label> <label class="text-muted">per Yard</label>
                                                                <input type="text" name="pricing" class="form-control" placeholder="Enter Pricing" value={{ $cost->pricing }}
                                                                    required>
                                                            </div>

                                                            <input type="submit" name="btnsubmit"
                                                                class="btnsubmit float-right btn btn-primary"
                                                                value="Update">
                                                        </form>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card shadow">
                <div class="card-body">
                    <h3 class="card-title">@lang('lang.create_category_form')</h3>

                    <form action="{{ route('fabric_costing_save') }}" method="POST">
                        @csrf
                        <div class="form-material m-t-40">


                            <div class="form-group">
                                <label class="font-weight-bold">Designs</label>
                                <select name="design" class="form-control">
                                    <option hidden>Choose Design</option>
                                    @foreach ($designs as $design)
                                        <option value={{ $design->id }}>{{ $design->design_name }}</option>
                                    @endforeach
                                </select>

                            </div>

                            <div class="form-group">
                                <label class="font-weight-bold">Fabrics</label>
                                <select name="fabric" class="form-control" id="fabric" onchange="changeColor()">
                                    <option hidden>Choose Fabric</option>
                                    @foreach ($fabrics as $fabric)
                                        <option value={{ $fabric->id }}>{{ $fabric->fabric_name }}</option>
                                    @endforeach
                                </select>

                            </div>

                            <div class="form-group" id="color_form">
                                <label class="font-weight-bold">Colors</label>
                                <select name="color" class="form-control" id="color">

                                </select>

                            </div>

                            <div class="form-group">
                                <label class="font-weight-bold">Sizes</label>
                                <select name="size" class="form-control">
                                    <option hidden>Choose Size</option>
                                    @foreach ($sizes as $size)
                                        <option value={{ $size->id }}>{{ $size->size_name }}</option>
                                    @endforeach
                                </select>

                            </div>
                            <div class="form-group">
                                <label class="font-weight-bold">Yards</label>
                                <input type="text" name="yards" class="form-control" placeholder="Enter Yards"
                                    required>
                            </div>

                            <div class="form-group">
                                <label class="font-weight-bold">Pricing</label> <label class="text-muted">per Yard</label>
                                <input type="text" name="pricing" class="form-control" placeholder="Enter Pricing"
                                    required>
                            </div>

                            <input type="submit" class="float-right btn btn-primary" value="Save Costing">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('js')
    <script>
        $(document).ready(function() {
            $('#color_form').hide();
        });

        function ApproveLeave(value) {

            swal({
                    title: "@lang('lang.confirm')",
                    icon: 'warning',
                    buttons: ["@lang('lang.no')", "@lang('lang.yes')"]
                })

                .then((isConfirm) => {

                    if (isConfirm) {

                        $.ajax({
                            type: 'POST',
                            url: 'fabric_costing/delete',
                            dataType: 'json',
                            data: {
                                "_token": "{{ csrf_token() }}",
                                "cost_id": value,
                            },

                            success: function() {

                                swal({
                                    title: "Success!",
                                    text: "Successfully Deleted!",
                                    icon: "success",
                                });

                                setTimeout(function() {
                                    window.location.reload()
                                }, 1000);


                            },
                        });
                    }
                });


        }

        function changeColor() {

            $('#color_form').show();
            $('#color').empty();

            var val = $('#fabric').val();

            $.ajax({
                type: 'POST',
                url: '/color_search',
                dataType: 'json',
                data: {
                    "_token": "{{ csrf_token() }}",
                    "fabric_id": val,
                },

                success: function(data) {
                    console.log(data)
                    if (data.length > 0) {
                        $('#color').append($('<option>').text('Choose Color'));
                        $.each(data, function(i, value) {
                            $('#color').append($('<option>').text(value.colour_name).attr('value', value
                                .id));
                        });
                    } else {
                        $('#color').append($('<option>').text('No Color'));
                    }
                },

            });

        };

         function changeColorUpdate() {


            $('#color_update').empty();

            var val = $('#fabric_update').val();

            $.ajax({
                type: 'POST',
                url: '/color_search',
                dataType: 'json',
                data: {
                    "_token": "{{ csrf_token() }}",
                    "fabric_id": val,
                },

                success: function(data) {
                    console.log(data)
                    if (data.length > 0) {
                        $('#color_update').append($('<option>').text('Choose Color'));
                        $.each(data, function(i, value) {
                            $('#color_update').append($('<option>').text(value.colour_name).attr('value', value
                                .id));
                        });
                    } else {
                        $('#color_update').append($('<option>').text('No Color'));
                    }
                },

            });

        };
    </script>
@endsection
