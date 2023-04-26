<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Invoice</title>
    <style>
        /* Add your styles here */
        body {
            font-family: Arial, Helvetica, sans-serif;
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        td, th {
            border: 1px solid #ddd;
            padding: 8px;
        }
        th {
            text-align: left;
            background-color: #f2f2f2;
        }
        .text-right {
            text-align: right;
        }
        .text-bold {
            font-weight: bold;
        }
    </style>
</head>
<body>
    <h1 style="text-align: center">Noborupa Telecom and Service Point</h1>
    <h1>Invoice</h1>
    <p>Order Date : {{$user->created_at}}</p>
    <hr>
    <table>
        <tr>
            <th>Order Id</th>
            <th>Customer Name</th>
            <th>Problem</th>
            <th>Phone</th>
            <th>Service Charge</th>
        </tr>
        <tr>
            <td>#{{ $user->id }}</td>
            <td>{{ $user->customer_name }}</td>
            <td>{{ $user->problem }}</td>
            <td>{{ $user->phone }}</td>
            <td>{{ $user->service_charge }} Tk</td>
        </tr>
        <tr>
            <td colspan="4" class="text-right text-bold">Subtotal</td>
            <td>{{ $user->service_charge }} Tk</td>
        </tr>
        <tr>
            <td colspan="4" class="text-right text-bold">Tax</td>
            <td>00 Tk</td>
        </tr>
        <tr>
            <td colspan="4" class="text-right text-bold">Total</td>
            <td>{{ $user->service_charge }} Tk</td>
        </tr>
    </table>
</body>
</html>
