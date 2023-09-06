<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/xhtml" xmlns:o="urn:schemas-microsoft-com:office:office">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <meta name="x-apple-disable-message-reformatting">
    <title></title>
    <style>
        table,
        td,
        div,
        h1,
        p {
            font-weight: 500;
            font-family: Arial, sans-serif;
        }
        .btn {margin: 10px 0px;
            border-radius: 4px;
            text-decoration: none;
            color: #fff !important;
            height: 46px;
            padding: 10px 20px;
            font-size: 16px;
            font-weight: 600;
            background-image: linear-gradient(to right top, #021d68, #052579, #072d8b, #09369d, #093fb0) !important;
        }
        .btn:hover {
            text-decoration: none;
            opacity: .8;
        }
    </style>
</head>
<body style="margin:0;padding:0;">
    <table role="presentation"
        style="width:100%;border-collapse:collapse;border:0;border-spacing:0;background:#ffffff;">
        <tr>
            <td align="center" style="padding:0;">
                <table role="presentation"
                    style="width:600px;border-collapse:collapse;border:1px solid #cccccc;border-spacing:0;text-align:left;">
                    <tr style="border-collapse:collapse;border:1px solid #cccccc;border-spacing:0;">
                    <th>Product</th>
                    <th>Quantity</th>
                    <th>Price</th>
                    <th>Subtotal</th>
                    </tr>
                    <tbody>
                    @foreach ($order->items as $item)
                    <tr>
                        <td>
                            <img src="{{ asset('product/' . $item->product->image) }}" alt="{{ $item->product->name }}" width="50">
                            {{ $item->product->name }}
                        </td>
                        <td>{{ $item->quantity }}</td>
                        <td>{{ $item->price }}</td>
                        <td>{{ $item->quantity * $item->price }}</td>
                    </tr>
                    @endforeach
                    </tbody>

                </table>
            </td>
        </tr>
    </table>

    <p>Total: {{ $order->total_amount }}</p>
<p>Subtotal: {{ $order->total_amount - $order->shipping_fee }}</p>

<p>Thank you for your order!</p>
</body>
</html>
