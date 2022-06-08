<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.88.1">
    <title></title>
    <style>
table, th, td {
  border: 1px solid black;
}
</style>

</head>
<body>
<div>
<h3>Order Info</h3> 
<p><strong>Customer Name:</strong>{{$order->name}}</p>
<p><strong>Phone Number:</strong>{{$order->phone}}</p>
<p><strong>Email:</strong>{{$order->email}}</p>
<p><strong>Address:</strong>{{$order->address}}</p>
<p><strong>Total Price:</strong>{{$order->price}}</p>
</div>

<div>
    <h2>Product Details</h2>
    <table style="width:100%">
    <tr>
         
          <th>Product Name</th>
          <th>Prce</th>
          <th>Quantity</th>
          <th>Total Price</th>
        </tr>
  @foreach($order->detail as $detail)
    
        <tr>
          <td>{{$detail->name}}</td>
           <td>{{$detail->price}}</td>
            <td>{{$detail->quantity}}</td>
             <td>{{$detail->quantity*$detail->price}}</td>
          
        </tr>
        @endforeach
</table>
</div>


</body>
</html>
