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
                <form action="{{ url('cart') }}" method="POST">
                    @csrf
                    <div class="form-group row">
                        <div class="col-md-2">
                            <label for="">Items</label>
                            <select name="item_id" class="form-control">
                                <option value="">Select Item</option>
                                @foreach($items as $item)
                                <option value="{{ $item->id }}">{{ $item->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-2">
                            <label for="">Quantity</label>
                            <input type="text" class="form-control" name="quantity">
                        </div>
                        <div class="col-md-2">
                            <label for="">Price</label>
                            <input type="text" name="price" class="form-control">
                        </div>
                        <div class="col-md-2 d-flex align-items-end">
                            <button type="submit" class="btn btn-primary">Add to cart</button>
                        </div>
                    </div>
                </form>
                <h6>Cart</h6>
                <table class="table">
                    <tr>
                        <th>Item</th>
                        <th>Qty</th>
                        <th>Price</th>
                        <th>Special Price</th>
                    </tr>
                    @foreach($cartItems as $cartItem)
                    <tr>
                        <td>{{ $cartItem->item->name }}</td>
                        <td>{{ $cartItem->quantity }}</td>
                        <td>{{ $cartItem->price }}</td>
                        <td> <del>{{ $cartItem->price * $cartItem->quantity }}</del> {{
                            $cartItem->amount }}</td>
                    </tr>
                    @endforeach
                </table>
            </div>
        </div>
    </div>
</body>

</html>