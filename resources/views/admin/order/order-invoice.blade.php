@extends('admin.master')

@section('title')

    <title>Manage Order</title>

@endsection

@section('body')

    <div class="order-details col-10">
        <div class="container">
            <div class="row">
                <div class="manage-category col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <style>
                                @media print {
                                    @page {
                                        size: A3;
                                    }
                                }
                                ul {
                                    padding: 0;
                                    margin: 0 0 1rem 0;
                                    list-style: none;
                                }
                                body {
                                    font-family: "Inter", sans-serif;
                                    margin: 0;
                                }
                                table {
                                    width: 100%;
                                    border-collapse: collapse;
                                }
                                table,
                                table th,
                                table td {
                                    border: 1px solid silver;
                                }
                                table th,
                                table td {
                                    text-align: right;
                                    padding: 8px;
                                }
                                h1,
                                h4,
                                p {
                                    margin: 0;
                                }

                                .container {
                                    padding: 20px 0;
                                    width: 1000px;
                                    max-width: 90%;
                                    margin: 0 auto;
                                }

                                .inv-title {
                                    padding: 10px;
                                    border: 1px solid silver;
                                    text-align: center;
                                    margin-bottom: 30px;
                                }

                                .inv-logo {
                                    width: 150px;
                                    display: block;
                                    margin: 0 auto;
                                    margin-bottom: 40px;
                                }

                                /* header */
                                .inv-header {
                                    display: flex;
                                    margin-bottom: 20px;
                                }
                                .inv-header > :nth-child(1) {
                                    flex: 2;
                                }
                                .inv-header > :nth-child(2) {
                                    flex: 1;
                                }
                                .inv-header h2 {
                                    font-size: 20px;
                                    margin: 0 0 0.3rem 0;
                                }
                                .inv-header ul li {
                                    font-size: 15px;
                                    padding: 3px 0;
                                }

                                /* body */
                                .inv-body table th,
                                .inv-body table td {
                                    text-align: left;
                                }
                                .inv-body {
                                    margin-bottom: 30px;
                                }

                                /* footer */
                                .inv-footer {
                                    display: flex;
                                    flex-direction: row;
                                }
                                .inv-footer > :nth-child(1) {
                                    flex: 2;
                                }
                                .inv-footer > :nth-child(2) {
                                    flex: 1;
                                }
                            </style>
                            <div class="container">
                                <div class="inv-title bg-dark">
                                    <h1 class="text-white text-center">Invoice</h1>
                                </div>
                                <img src="./ZAF.jpg" class="inv-logo" />
                                <div class="inv-header">
                                    <div>
                                        <h2>Shipping Info</h2>
                                        <ul>
                                            <li>{{$shipping->full_name}}</li>
                                            <li>{{$shipping->address}}</li>
                                            <li>{{$shipping->phone_number}}</li>
                                        </ul>
                                        <h2>Billing Info</h2>
                                        <ul>
                                            <li>{{$customer->first_name.' '.$customer->last_name}}</li>          <li>{{$customer->address}}</li>
                                            <li>{{$customer->phone_number}}</li>

                                        </ul>
                                    </div>
                                    <div>
                                        <table>
                                            <tr>
                                                <th>Invoice No.</th>
                                                <td>#0000{{$order->id}}</td>
                                            </tr>
                                            <tr>
                                                <th>Date</th>
                                                <td>{{$order->created_at}}</td>
                                            </tr>
                                            <tr>
                                                <th>Amount Due</th>
                                                <td>TK.{{$order->order_total}}</td>
                                            </tr>
                                        </table>
                                    </div>
                                </div>
                                <div class="inv-body">
                                    <table>
                                        <tr>
                                        <th>Item</th>
                                        <th>Rate</th>
                                        <th>Quantity</th>
                                        <th>Price</th>
                                        </tr>
                                        @php($sum=0)
                                        @foreach($orderDetails as $orderDetail)
                                        <tr>
                                            <td>{{$orderDetail->product_name}}</td>
                                            <td>{{$orderDetail->product_price}}</td>
                                            <td>{{$orderDetail->product_quantity}}</td>
                                            <td>{{$total=$orderDetail->product_price*$orderDetail->product_quantity}}</td>
                                        </tr>
                                            @php($sum=$sum+$total)
                                        @endforeach
                                    </table>
                                </div>
                                <div class="inv-footer">
                                    <div><!-- required --></div>
                                    <div>
                                        <table>
                                            <tr>
                                                <th>Sub total</th>
                                                <td>{{$sum}}</td>
                                            </tr>
                                            <tr>
                                                <th>Vat</th>
                                                <td>{{$grand=$sum*(10/100)}}</td>
                                            </tr>
                                            <tr>
                                                <th>Grand total</th>
                                                <td>{{$grand+$sum}}</td>
                                            </tr>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
