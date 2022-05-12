@extends('layouts.app')
@section('content')
<div class="container-fluid">
    <div class="col-lg-12">
        <div class="row">
            <div class="col-md-9">
                <div class="card">
                    <div class="card-header">
                        <h4 style="float: left">Order Products</h4>
                        <a href="#" style="float: right" class="btn btn-dark" data-bs-toggle="modal" data-bs-target="#addproduct"><i class=" fa fa-plus">Add New Products</i></a>
                        <br><br>
                        <div class="card-body">
                            <table class="table table-bordered table-left">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Product Name</th>
                                        <th>Qty</th>
                                        <th>Price</th>
                                        <th>Disc (%)</th>
                                        <th>Total</th>
                                        <th><a href="#" class="btn btn-sm btn-success add_more"><i class="fa fa-plus"></i></a></th>
                                    </tr>
                                </thead>
                                <tbody class="addMoreProduct">
                                    <tr>
                                        <td>1</td>
                                        <td>
                                            <select name="product_id" id="product_id" class="form-control product_id"> @foreach($products as $product)
                                                <option value="{{$product->id}}">{{$product->product_name}}</option>@endforeach
                                            </select>
                                        </td>
                                        <td>
                                            <input type="number" name="qty[]" id="qty" class="form-control">
                                        </td>
                                        <td>
                                            <input type="number" name="price[]" id="price" class="form-control">
                                        </td>
                                        <td>
                                            <input type="number" name="discount[]" id="discount" class="form-control">
                                        </td>
                                        <td>
                                            <input type="number" name="total[]" id="total" class="form-control">
                                        </td>
                                        <td><a href="#" class="btn btn-sm btn-danger delete"><i class="fa fa-times"></i></a></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card">
                    <div class="card-header">
                        <h4>Search product</h4>
                        <div class="card-body"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal -->
    <div class="modal right fade" id="addproduct" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Product</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{route('orders.store')}}" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="">Product Name</label>
                            <input type="text" name="product_name" id="" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="">Brand</label>
                            <input type="text" name="brand" id="" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="">Price</label>
                            <input type="number" name="price" id="" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="">Qty</label>
                            <input type="number" name="qty" id="" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="">Alert Stock</label>
                            <input type="number" name="alert_stock" id="" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="">Description</label>
                            <textarea name="description" id="" cols="30" rows="2" class="form-control"></textarea>
                        </div>
                        <div class="modal-footer">
                            <button class="btn btn-primary btn-block">Save Data</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <style>
        .modal.right .modal-dialog {
            top: 0;
            right: 0;
            margin-right: 15vh;
        }

        .modal.fade:not(.in).right .modal-dialog {
            -webkit-transform: translate3d(25%, 0, 0);
            transform: translate3d(25%, 0, 0);
        }
    </style>
</div>
@endsection
@section('script')
<script>
    $('.add_more').on('click', function() {
        var product = $('.product_id').html();
        var numberofrow = ($('.addMoreProduct tr').length - 0) + 1;
        var tr = '<tr><td class"no"">' + numberofrow + '</td>' + '<td> <select class="form-control product_id" name"product_id[]">' + product + '</select></td>' +
            '<td> <input type="number" class="form-control" name"qty[]"></td>' +
            '<td> <input type="number" class="form-control" name"price[]"></td>' +
            '<td> <input type="number" class="form-control" name"discount[]"></td>' +
            '<td> <input type="number" class="form-control" name"total[]"></td>' +
            '<td><a class="btn btn-sm btn-danger delete rounded circle"><i class="fa fa-times-circle"></i></a></td>';
        $('.addMoreProduct').append(tr);
    })
</script>
@endsection