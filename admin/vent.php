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


            <h1>Ajouter Vente</h1>
            <form action="" method="post">

                <input type="hidden" name='venteCode' value='<?= $venteCode; ?>'>



                <select name="medCode" required>
                    <option value="">--Médicament <?= $medCode; ?></option>
                    <!--------php --------------------->
                    <?php

                    // get category from db
                    $sth=$db->query('SELECT *  FROM medicament ');
                    while ($row = $sth->fetch())
                {
                    ?>
                    <option value="<?= $row['medCode']; ?>"><?= $row['medNom']; ?></option>
                    <?php
                }

                    ?>
                    <!--------php --------------------->

                    <input type="text" name="venteQuan" id="" placeholder="Qauntité " required>

                    <input type="text" name="venteMontant" id="" placeholder="Montant " required>

                    <input type="submit" name="ajout-vente" id="" value="Ajouter">
                    <br>
            </form>
            <br>
            <h1>Liste des ventes</h1>


            <table>
                <thead>
                    <tr>
                        <th>Numéro de vente </th>
                        <th>La date</th>
                        <th> Médicament</th>
                        <th>Quantité </th>
                        <th>Montant </th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                $stmt=$db->query('SELECT * FROM vente INNER JOIN medicament ON vente.medCode = medicament.medCode ');
                while ($row = $stmt->fetch())
                    {
                ?>
                    <tr>
                        <td><?= $row['venteCode']; ?></td>
                        <td><?= $row['venteDate']; ?></td>
                        <td><?= $row['medNom']; ?></td>
                        <td><?= $row['venteQuan']; ?></td>
                        <td><?= $row['venteMontant']; ?></td>


                    </tr>
                    <?php }?>
                </tbody>
            </table>



        </div>

    </body>

    </html>