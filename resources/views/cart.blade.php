@extends('layouts.navbarAndHeader')

@section('nav')
<div class="container w-75 my-5">
    <table id="cart" class="table table-hover table-condensed">
        <thead>
            <tr>
                <th style="width:50%">Course</th>
                <th style="width:40%">Course Price</th>
                <th style="width:10%"></th>
            </tr>
        </thead>
        <tbody>
            @php $total = 0 @endphp
            @foreach($cartItems as $details)
            @php $total += $details->cart_TotalPrice @endphp
            <td>
                <p>{{ $details->course->title }}</p>
            </td>
            <td>${{ $details->cart_TotalPrice }}</td>
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
            <tr>
                <td colspan="5" class="text-right">
                    <a href="{{url('/')}}/course" class="btn btn-warning"><i class="fa fa-angle-left"></i> Continue
                        Shopping</a>
                    @if(Auth::id())
                    <a href="{{url('/')}}/payment" class="btn btn-success">Checkout</a>
                    @else
                    <a href="{{ route('login') }}" class="btn btn-success">Login</a>
                    @endif
                </td>
            </tr>
        </tfoot>
    </table>
</div>
@endsection

@section('scripts')
<script type="text/javascript">
    $(".remove-from-cart").click(function (e) {
        e.preventDefault();

        var ele = $(this);

        if (confirm("Are you sure want to remove?")) {
            $.ajax({
                url: '{{ url(' / ') }}/remove-from-cart',
                method: "DELETE",
                data: {
                    _token: '{{ csrf_token() }}',
                    id: ele.parents("tr").attr("data-id")
                },
                success: function (response) {
                    window.location.reload();
                }
            });
        }
    });

</script>
@endsection