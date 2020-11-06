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
                    <option value="">--choisir une famille-- <?= $man; ?></option>
                    <!--------php --------------------->
                    <?php

                    // get category from db
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

                    <!-- <input type="text" name="stockCode" id="" placeholder="stock médicament"> -->

                    <input type="submit" name="ajout-medicament" id="" value="Ajouter">
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
                        <!-- <th> stock</th> -->
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                $stmt=$db->query('SELECT * FROM medicament INNER JOIN famille ON medicament.famiCode = famille.famiCode');
                while ($row = $stmt->fetch())
                    {
                ?>
                    <tr>
                        <td><?= $row['medNom']; ?></td>
                        <td><?= $row['famiNom']; ?></td>
                        <td><?= $row['medPrix']; ?></td>
                        <!-- <td>90</td> -->
                        <td><?= $row['medQuan']; ?></td>
                        <td>

                            <a href="dashboard.php?editt=<?= $row['medCode'];?>" id="edit">Modifier</a> |
                            <a id="delete" href="dashboard.php?deletee=<?= $row['medCode'] ;?>"
                                onclick="return confirm ('Do you want delete this médicament?');">Supprimer</a>
                        </td>

                    </tr>
                    <?php }?>
                </tbody>
            </table>



        </div>

    </body>

    </html>