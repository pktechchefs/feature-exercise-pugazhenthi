<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <table class="table">
                    <tr>
                        <th>Item</th>
                        <th>Qty</th>
                        <th>Price</th>
                        <th>Special Price</th>
                    </tr>
                    @foreach($cartItems as $item)
                    <tr>
                        <td>{{ $item->quantity }}</td>
                        <td>{{ $item->price }}</td>
                    </tr>
                    @endforeach
                </table>
            </div>
        </div>
    </div>
</body>

</html>