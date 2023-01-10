
<!DOCTYPE html>
<html>

<head>
<style>
            table {
                width: 100%;
                border-collapse: collapse;
                text-align: center;
            }

            table tr th, table tr td {
                padding: 5px;
                border: 1px #eee solid;
            }

            tfoot tr th, tfoot tr td {
                font-size: 20px;
            }

            tfoot tr th {
                text-align: right;
            }
</style>

<body>
    <table>
        <thead>
            <tr>
                <th>Date</th>
                <th>Check</th>
                <th>Description</th>
                <th>Amount</th>
            </tr>
        </thead>
        <tbody>
        <?php if(!empty($transactions)): ?>
            <?php foreach ($transactions as $transaction):?>
                <tr>
                    <td><?=$transaction[0] ?></td>
                    <td><?=$transaction[1] ?></td>
                    <td><?=$transaction[2] ?></td>
                    <td><?=$transaction[3] ?></td>
                </tr>
            <?php endforeach ?>
        <?php endif ?>
        </tbody>
    </table>
</body>
</head>

</html>