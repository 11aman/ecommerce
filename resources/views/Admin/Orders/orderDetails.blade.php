@extends('Admin.layouts.master')
@section('title','Order Details')
@section('content')

<div id="message_success" style="display: none;" class="alert alert-sm alert-success">Status Enabled</div>
<div id="message_error" style="display: none;" class="alert alert-sm alert-danger">Status Disabled</div>

@if(session('message'))
<p class="alert alert-success">
{{session('message')}}
<button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
</button>
</p>
@endif

@if(session('delete'))
<p class="alert alert-danger">
{{session('delete')}}
<button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
</button>
</p>
@endif

<div class="content mt-3">
            <div class="animated fadeIn">
                <div class="row">
                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-header">
                                <strong class="card-title">Order {{$orderDetails->id}}</strong>
                            </div>
                            <div class="card-body">
                                <table id="bootstrap-data-table-export" class="table table-striped table-bordered">
                                    <tbody>
                                        <tr>
                                            <td class="taskDesc"> Order Date</td>
                                            <td class="taskStatus"> {{$orderDetails->created_at->format('Y-m-d')}}</td>
                                        </tr>
                                        <tr>
                                            <td class="taskDesc"> Order Status</td>
                                            <td class="taskStatus"> {{$orderDetails->order_status}}</td>
                                        </tr>
                                        <tr>
                                            <td class="taskDesc"> Order Total</td>
                                            <td class="taskStatus"> {{$orderDetails->grand_total}}</td>
                                        </tr>
                                        <tr>
                                            <td class="taskDesc"> Shipping Charges</td>
                                            <td class="taskStatus"> {{$orderDetails->shipping_charges}}</td>
                                        </tr>
                                        <tr>
                                            <td class="taskDesc"> Coupon Code</td>
                                            <td class="taskStatus"> {{$orderDetails->coupon_code}}</td>
                                        </tr>
                                        <tr>
                                            <td class="taskDesc"> Coupon Amount</td>
                                            <td class="taskStatus"> {{$orderDetails->coupon_amount}}</td>
                                        </tr>
                                        <tr>
                                            <td class="taskDesc"> Payment Method</td>
                                            <td class="taskStatus"> {{$orderDetails->payment_method}}</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header">
                                <strong class="card-title">Billing Address</strong>
                            </div>
                            <div class="card-body">
                                <table id="bootstrap-data-table-export" class="table table-striped table-bordered">
                                    <tbody>
                                        <tr>
                                            <td class="taskDesc"> Name</td>
                                            <td class="taskStatus"> {{$orderDetails->name}}</td>
                                        </tr>
                                        <tr>
                                            <td class="taskDesc"> Address</td>
                                            <td class="taskStatus"> {{$orderDetails->address}}</td>
                                        </tr>
                                        <tr>
                                            <td class="taskDesc"> City</td>
                                            <td class="taskStatus"> {{$orderDetails->city}}</td>
                                        </tr>
                                        <tr>
                                            <td class="taskDesc"> State</td>
                                            <td class="taskStatus"> {{$orderDetails->state}}</td>
                                        </tr>
                                        <tr>
                                            <td class="taskDesc"> Country</td>
                                            <td class="taskStatus"> {{$orderDetails->country}}</td>
                                        </tr>
                                        <tr>
                                            <td class="taskDesc"> Pin Code</td>
                                            <td class="taskStatus"> {{$orderDetails->pincode}}</td>
                                        </tr>
                                        <tr>
                                            <td class="taskDesc"> Mobile</td>
                                            <td class="taskStatus"> {{$orderDetails->mobile}}</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-header">
                                <strong class="card-title">Customer Details</strong>
                            </div>
                            <div class="card-body">
                                <table id="bootstrap-data-table-export" class="table table-striped table-bordered">
                                    <tbody>
                                        <tr>
                                            <td class="taskDesc"> Customer Name</td>
                                            <td class="taskStatus"> {{$orderDetails->name}}</td>
                                        </tr>
                                        <tr>
                                            <td class="taskDesc"> Customer Email</td>
                                            <td class="taskStatus"> {{$orderDetails->user_email}}</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header">
                                <strong class="card-title">Shipping Address Update</strong>
                            </div>
                            <form action="{{url('/admin/update-order-status')}}" method="post">
                                {{csrf_field()}}
                                <input type="hidden" name="order_id" value="{{$orderDetails->id}}">
                                <table id="bootstrap-data-table-export" class="table table-striped table-bordered">
                                    <tbody>
                                    <tr>
                                        <td>
                                            <select name="order_status" id="order_status" class="form-control">
                                                <option value="New" @if($orderDetails->order_status == "New") selected @endif>New</option>
                                                <option value="Pending" @if($orderDetails->order_status == "Pending") selected @endif>Pending</option>
                                                <option value="In Process" @if($orderDetails->order_status == "In Process") selected @endif>In Process</option>
                                                <option value="Shipped" @if($orderDetails->order_status == "Shipped") selected @endif>Shipped</option>
                                                <option value="Delivered" @if($orderDetails->order_status == "Delivered") selected @endif>Delivered</option>
                                                <option value="Cancelled" @if($orderDetails->order_status == "Cancelled") selected @endif>Cancelled</option>
                                                <option value="Paid" @if($orderDetails->order_status == "Paid") selected @endif>Paid</option>
                                            </select>
                                        </td>
                                        <td>
                                            <input type="submit" value="Update Status" class="btn btn-sm btn-success">
                                        </td>
                                    </tr>
                                </tbody>
                                </table>
                            </form>
                        </div>
                        <div class="card">
                            <div class="card-header">
                                <strong class="card-title">Shipping Address</strong>
                            </div>
                            <div class="card-body">
                                <table id="bootstrap-data-table-export" class="table table-striped table-bordered">
                                    <tbody>
                                        <tr>
                                            <td class="taskDesc"> Name</td>
                                            <td class="taskStatus"> {{$orderDetails->name}}</td>
                                        </tr>
                                        <tr>
                                            <td class="taskDesc"> Address</td>
                                            <td class="taskStatus"> {{$orderDetails->address}}</td>
                                        </tr>
                                        <tr>
                                            <td class="taskDesc"> City</td>
                                            <td class="taskStatus"> {{$orderDetails->city}}</td>
                                        </tr>
                                        <tr>
                                            <td class="taskDesc"> State</td>
                                            <td class="taskStatus"> {{$orderDetails->state}}</td>
                                        </tr>
                                        <tr>
                                            <td class="taskDesc"> Country</td>
                                            <td class="taskStatus"> {{$orderDetails->country}}</td>
                                        </tr>
                                        <tr>
                                            <td class="taskDesc"> Pin Code</td>
                                            <td class="taskStatus"> {{$orderDetails->pincode}}</td>
                                        </tr>
                                        <tr>
                                            <td class="taskDesc"> Mobile</td>
                                            <td class="taskStatus"> {{$orderDetails->mobile}}</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <strong class="card-title">Ordered Products</strong>
                            </div>
                            <div class="card-body">
                                <table id="bootstrap-data-table-export" class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Product Code</th>   
                                            <th>Product Name</th>
                                            <th>Product Weight</th>
                                            <th>Product Price</th>
                                            <th>Product Quantity</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($orderDetails->orders as $pro)
                                        <tr class="rem1">
                                        <td class="invert">{{$pro->product_code}}</td>
                                        <td class="invert">{{$pro->product_name}}</td>
                                        <td class="invert">{{$pro->product_size}}</td>
                                        <td class="invert">{{$pro->product_price}}</td>
                                        <td class="invert">{{$pro->product_qty}}</td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div><!-- .animated -->
        </div><!-- .content -->
        @endsection