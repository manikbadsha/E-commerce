<h2>Order Information</h2>
<h3>Order Id:{{$order[0]->sale_id}}</h3>
<table style="padding: 10px; border:1px solid black">
    <thead>
        <tr style="padding: 5px; border:1px solid black">
            <th style="padding: 5px; border:1px solid black"><b>Name</b></th>
            <th style="padding: 5px; border:1px solid black"><b>Quantity</b></th>
            <th style="padding: 5px; border:1px solid black"><b>Price</b></th>
        </tr>
    </thead>
    <tbody>
        <?php
            $subtotal=0;
            $delivery=60;
        ?>
        @foreach($order as $item)
        <tr tyle="padding: 5px; border:1px solid black" >
            <td style="padding: 5px; border:1px solid black;text-align:center">{{$item->product_name}}</td>
            <td style="padding: 5px; border:1px solid black;text-align:center">{{$item->qty}}</td>
            <td style="padding: 5px; border:1px solid black;text-align:center">{{$item->price}}</td>
        </tr>
        <?php $subtotal=$subtotal+($item->price*$item->qty) ?>
        @endforeach
        <br>
        <h4>Delivery Charge:{{$delivery}}</h4>
        <h4>Total amount: {{$subtotal+$delivery}}</h4>
        <br><br>
        <h4>Thank You</h4>
    </tbody>
</table>