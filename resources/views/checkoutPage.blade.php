@extends('layouts.navbarAndHeader')

@section('nav')
<div class="container">
    <section id="checkout">
        <div class="row">
            <div class="col-md-12">
                <div class="checkout-area">
                    <div class="row">
                        <div class="col-md-7">
                            <div class="checkout-left">
                                <h4>Order Summary</h4>
                                <div class="aa-order-summary-area">
                                    <table class="table table-responsive">
                                        <thead>
                                            <th style="font-size:14px; font-weight:bold;; width:500px ">Courses
                                            </th>
                                            <th style="font-size:14px; font-weight:bold;; width:100px ">Total Price
                                            </th>
                                        </thead>
                                        <tbody>
                                            @php $total = 0 @endphp
                                            @foreach($cartData as $details)
                                            @php $total += $details['cart_TotalPrice'] @endphp
                                            <td>
                                                <p>{{ $details->course['title'] }}</p>
                                            </td>
                                            <td class="text-center">${{ $details['cart_TotalPrice'] }}</td>
                                            <td><a class="btn btn-primary" href="{{url('/')}}/removeCourse/{{ $details['course_id']}}">delete</a></td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <td colspan="5" class="text-right">
                                                    <h3><strong>Total ${{ $total }}</strong></h3>
                                                </td>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="checkout-right">
                                <h4>Payment Method</h4>
                                <div class="aa-payment-method">
                                    <label for="online">
                                        <input checked type="radio" id="online" name="payment"> Online/Credit
                                        Card/Netbanking
                                    </label><br>
                                    <img height="40" src="https://shoplineimg.com/assets/footer/card_visa.png" />
                                    <img height="40"
                                        src="https://shoplineimg.com/assets/footer/card_master.png" /><br><br>
                                    <a href="{{ url('/') }}/checkout" type="submit" class="btn btn-success">Place
                                        Order</a>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection