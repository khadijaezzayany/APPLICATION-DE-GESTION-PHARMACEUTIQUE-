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


            <h1>Ajouter médicament</h1>
            <form action="" method="post">

                <input type="hidden" name='medCode' value="<?= $medCode; ?>">


                <input type="text" name="medNom" id="" value="<?= $medNom; ?>" placeholder="Nom médicament">


                <select name="famiCode" required>
                    <option value="">-- Famille <?= $famiCode; ?></option>
                    <!--------php --------------------->
                    <?php

                    // get famille from db
                    $sth=$db->query('SELECT *  FROM famille ');
                    while ($row = $sth->fetch())
                {
                    ?>
                    <option value="<?= $row['famiCode']; ?>"><?= $row['famiNom']; ?></option>
                    <?php
                }

                    ?>
                    <!--------php --------------------->

                    <input type="text" name="medPrix" id="" value="<?= $medPrix; ?>" placeholder=" Prix DH">

                    <input type="text" name="medQuan" id="" value="<?= $medQuan; ?>" placeholder="Quantité médicament">

                    <select name="stockCode" required>
                        <option value="">-- Stock <?= $stockCode; ?></option>
                        <!--------php --------------------->
                        <?php

                    // get stock from db
                    $sth=$db->query('SELECT *  FROM stock ');
                    while ($row = $sth->fetch())
                {
                    ?>
                        <option value="<?= $row['stockCode']; ?>"><?= $row['stockNom']; ?></option>
                        <?php
                }

                    ?>
                        <!-- ------php ------------------- -->

                        <?php if($changemedicament==true) {?>
                        <input type="submit" name="changemedicament" value="Modifier">
                        <?php } else{?>
                        <input type="submit" name="ajout-medicament" value="Ajouter">
                        <?php } ?>
                        <br>
            </form>
            <br>
            <h1>Liste médicaments</h1>


            <table>
                <thead>
                    <tr>
                        <th>Nom </th>
                        <th>Famille </th>
                        <th>Prix DH</th>
                        <th> Quantité</th>
                        <th> stock</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- <?php
                $stmt=$db->query('SELECT * FROM medicament INNER JOIN famille ON medicament.famiCode = famille.famiCode INNER JOIN stock ON medicament.stockCode = stock.stockCode');
                while ($row = $stmt->fetch())
                    {
                ?> -->
                    <tr>
                        <td><?= $row['medNom']; ?></td>
                        <td><?= $row['famiNom']; ?></td>
                        <td><?= $row['medPrix']; ?></td>
                        <td><?= $row['medQuan']; ?></td>
                        <td><?= $row['stockNom']; ?></td>
                        <td>
                            <a href="medicament.php?editmedicament=<?= $row['medCode'];?>" id="edit">Modifier</a>|
                            <a id="delete" href="medicament.php?deletemedicament=<?= $row['medCode'] ;?>"
                                onclick="return confirm ('Do you want delete this fournisseur?');">Supprimer</a>
                        </td>

                    </tr>
                    <!-- <?php }?> -->

                </tbody>
            </table>



        </div>

    </body>

    </html>