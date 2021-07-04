@extends('Admin.layouts.master')
@section('title','View Orders')
@section('content')

<div id="message_success" style="display: none;" class="alert alert-sm alert-success">Status Enabled</div>
<div id="message_error" style="display: none;" class="alert alert-sm alert-danger">Status Disabled</div>

<div class="content mt-3">
            <div class="animated fadeIn">
                <div class="row">

                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <strong class="card-title">Orders</strong>
                            </div>
                            <div class="card-body">
                                <table id="bootstrap-data-table-export" class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Order ID</th>
                                            <th>Order Date</th>
                                            <th>Customer Name</th>
                                            <th>Customer Email</th>
                                            <th>Ordered Product</th>
                                            <th>Order Amount</th>
                                            <th>Order Status</th>
                                            <th>Payment Method</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($orders as $order)
                                        <tr> 
                                            <td>{{$order->id}}</td>
                                            <td>{{$order->created_at}}</td>
                                            <td>{{$order->name}}</td>
                                            <td>{{$order->user_email}}</td>
                                            <td>
                                                @foreach($order->orders as $pro)
                                                {{$pro->product_code}}
                                                ({{$pro->product_qty}})<br>
                                                @endforeach
                                            </td>
                                            <td>{{$order->grand_total}}</td>
                                            <td>{{$order->order_status}}</td>
                                            <td>{{$order->payment_method}}</td>
                                            <td>
                                            <a href="{{url('/admin/orders/'.$order->id)}}" target="_blank" class="btn btn-primary">View Order Details</a>
                                            </td>
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