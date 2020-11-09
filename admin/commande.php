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
            <h1>Ajouter Commande</h1>
            <form action="" method="post">

                <input type="hidden" name='commCode' value='<?= $commCode; ?>'>



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

                    <input type="text" name="commQuan" id="" placeholder="Qauntité " required>



                    <select name="fourCode" required>
                        <option value="">--Fournisseur <?= $fourCode; ?></option>
                        <!--------php --------------------->
                        <?php

                    // get category from db
                    $sth=$db->query('SELECT *  FROM fournisseur ');
                    while ($row = $sth->fetch())
                {
                    ?>
                        <option value="<?= $row['fourCode']; ?>"><?= $row['fourNom']; ?></option>
                        <?php
                }

                    ?>
                        <!--------php --------------------->



                        <input type="submit" name="ajout-commande" id="" value="Ajouter">
                        <br>
            </form>
            <br>
            <h1>Liste des commandes</h1>


            <table>
                <thead>
                    <tr>
                        <th>Numéro de commande </th>
                        <th>La date</th>
                        <th> Médicament</th>
                        <th>Quantité </th>
                        <th>Fournisseur </th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                $stmt=$db->query('SELECT * FROM commande INNER JOIN medicament ON commande.medCode = medicament.medCode  INNER JOIN fournisseur ON commande.fourCode = fournisseur.fourCode ');
                while ($row = $stmt->fetch())
                    {
                ?>
                    <tr>
                        <td><?= $row['commCode']; ?></td>
                        <td><?= $row['commDate']; ?></td>
                        <td><?= $row['medNom']; ?></td>
                        <td><?= $row['commQuan']; ?></td>
                        <td><?= $row['fourNom']; ?></td>


                    </tr>
                    <?php }?>
                </tbody>
            </table>



        </div>

    </body>

    </html>