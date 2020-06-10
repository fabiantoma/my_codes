<!DOCTYPE html>
<html lang="en">

<head>

    <title>Document</title>

    <style>
        table,
        td,
        th {
            border: 1px solid black;
        }

        table {
            border-collapse: collapse;
        }
    </style>
</head>

<body>
    <h2>Grocery shop</h2>

    <table>
        <tr>
            <th>Name</th>
            <th>Code</th>
            <th>Price</th>
            <th>Quantity</th>
            <th>OnSale</th>
        </tr>

        <?php
        $fin = fopen("groceries.txt", "rb");
        while (!feof($fin)) { //a bináris karaktereket is olvas//
            $line = fgets($fin); //lekér egy sort a fájlból//
            $fields = explode(",", $line); //egy sort széttör a vesszők mentén és az elemek bele kerülnek egy tömbbe//

            echo "<tr>";
            foreach ($fields as $field) {
                echo "<td>{$field}</td>";
            }
            echo "</tr>";
        }
        ?>


    </table>











</body>

</html>