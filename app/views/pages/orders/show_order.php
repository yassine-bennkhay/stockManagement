
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Example 1</title>
    <style>
        body {
            position: relative;
            width: 21cm;
            margin: 0 auto;
            color: #001028;
            background: #FFFFFF;
            font-family: Arial, sans-serif;
            font-size: 12px;
            font-family: monospace;
        }

        header {
            padding: 10px 0;
            margin-bottom: 30px;
        }



        h1 {
            border-top: 1px solid #5D6975;
            border-bottom: 1px solid #5D6975;
            color: #5D6975;
            font-size: 50px;
            line-height: 1.4em;
            font-weight: normal;
            text-align: center;
            margin: 0 0 20px 0;

        }

        table {
            width: 100%;
            border-collapse: collapse;
            border-spacing: 0;
            margin-bottom: 20px;
        }

        table tr:nth-child(2n-1) td {
            background: #F5F5F5;
        }

        table th,
        table td {
            text-align: center;
        }

        table th {
            padding: 5px 20px;
            color: #5D6975;
            border-bottom: 1px solid #C1CED9;
            white-space: nowrap;
            font-weight: normal;
        }

        table .service {
            text-align: left;
        }

        table td {
            padding: 20px;
            text-align: right;
            font-size: 25px;
        }

        table td.service {
            vertical-align: top;
        }



        table td.grand {
            border-top: 1px solid #5D6975;
        }
    </style>
</head>

<body>
    <header>
        <h1><b>Stock Management</b></h1>
    </header>
    <main>
        <table>

            <tbody>
            <tr>
                    <td class="service">Order ID:</td>
                    <td style="text-align: right;"><?=$data['orders']['order_id']?></td>

                </tr>
                <tr>
                    <td class="service">Client ID:</td>
                    <td style="text-align: right;"><?=$data['orders']['client_id']?></td>

                </tr>

                <tr>
                    <td class="service">Client Name:</td>
                    <td style="text-align:right"><?=$data['orders']['name']?></td>

                </tr>
                <tr>
                    <td class="service">Product Name</td>
                    <td style="text-align:right"><?=$data['orders']['product_name']?></td>

                </tr>
                <tr>
                    <td class="service">Price per unit:</td>
                    <td style="text-align:right"><?=$data['orders']['selling_price'].'$'?></td>

                </tr>
                <tr>
                    <td class="service">Quantity:</td>
                    <td style="text-align:right"><?=$data['orders']['quantity']?></td>

                </tr>
                <tr>
                    <td class="grand total">GRAND TOTAL</td>
                    <td class="grand total"><?=($data['orders']['quantity']*$data['orders']['selling_price']).'$'?></td>
                </tr>
            </tbody>
        </table>
    </main>
        <script>
            window.print();
        </script>
</body>
</html>