<form method="POST" action=""  >
    <input name="_token" type="hidden" value="{!! csrf_token() !!}">
    <table class="table" id="rl">

        <tr>
            <th>Product</th>
            <th>Qty</th>
            <th>Price</th>
            <th>Subtotal</th>
            <th>Action</th>
        </tr>




        <?php foreach(Cart::content() as $row) :?>

        <tr >
            <td>
                <p><strong><?php echo $row->name; ?></strong></p>
                <p><?php echo ($row->options->has('size') ? $row->options->size : ''); ?></p>
            </td>
            <td><input class="qty" id="qty" type="text" value="<?php echo $row->qty; ?>"></td>
            <td>$<?php echo $row->price; ?></td>
            <td>$<?php echo $row->total; ?></td>
            <td> <a href="" class="updatecart" id="{!! $row->rowId !!}"> UPDATE</a> <br>
                {{--<a href="{!! url('xoa-san-pham',['id'=>$row->rowId]) !!}">DELETE</a>--}}
                <a href="" class="Delete" id="{!! $row->rowId !!}">DELETE</a>
            </td>
        </tr>

        <?php endforeach;?>
        <tr>
            <td colspan="2">&nbsp;</td>
            <td>Subtotal</td>
            <td><?php echo Cart::subtotal(); ?></td>
        </tr>
        <tr>
            <td colspan="2">&nbsp;</td>
            <td>Tax</td>
            <td><?php echo Cart::tax(); ?></td>
        </tr>
        <tr>
            <td colspan="2">&nbsp;</td>
            <td>Total</td>
            <td><?php echo Cart::total(); ?></td>
        </tr>
        <tr>
            <td colspan="2">&nbsp;</td>
            @if(Auth::guard('khachhangs')->check())
                <?php
                $kh = DB::table('khachhangs')->find(Auth::guard('khachhangs')->id());
                Session::put('demo', $kh->id);
                ?>

            @endif
            <td> <a href="{!! asset('pay') !!}" id="{{ (Auth::guard('khachhangs')->id())? '1':'0' }}" class="Pay">GetPay</a></td>
        </tr>

    </table>
</form>
