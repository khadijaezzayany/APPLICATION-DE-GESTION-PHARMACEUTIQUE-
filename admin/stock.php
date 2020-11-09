<?php require 'function.php'; ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/dashboard.css">
    <link rel="stylesheet" href="../css/aside.css">
    <title>Document</title>
</head>

<body>
    <html>

    <body>

        <div class="dashboard">
            <?php
        include 'aside.php'
         ?>
            <h1>Ajouter Stock</h1>
            <form action="" method="post">

                <input type="hidden" name='stockCode' value="<?= $stockCode; ?>">

                <input type="text" name="stockNom" id="" placeholder="Nom de stock " required>

                <input type="text" name="stockQuan" id="" placeholder="Quantité " required>



                <input type="submit" name="ajout-stock" id="" value="Ajouter">
                <br>
            </form>
            <br>
            <h1>Liste Stocks</h1>


            <table>
                <thead>
                    <tr>
                        <th>Code de stock </th>
                        <th>Nom de stock</th>
                        <th>Quantité</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $stmt=$db->query('SELECT * FROM stock');
                    while ($row = $stmt->fetch())
                    {
                    ?>
                    <tr>
                        <td><?= $row['stockCode']; ?></td>
                        <td><?= $row['stockNom']; ?></td>
                        <td><?= $row['stockQuan']; ?></td>
                        <td> <a id="delete" href="stock.php?deletestock=<?= $row['stockCode'] ;?>"
                                onclick="return confirm ('Do you want delete this stock?');">Supprimer</a></td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>



        </div>

    </body>

    </html>