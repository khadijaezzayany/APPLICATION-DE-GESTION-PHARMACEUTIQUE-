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

                <input type="text" name="médCode" id="" placeholder="Code médicament">

                <input type="text" name="médLib" id="" placeholder="Libellé médicament">



                <select class="form_item form_item--cat" name="cat" required>
                    <option value="">--choisir une famille--</option>
                    <!--------php --------------------->
                    <?php

                    // get category from db
                    $sth=$db->query('SELECT famiDési FROM famille ');
                    while ($row = $sth->fetch())
                {
                    ?>
                    <option value=""><?= $row['famiDési']; ?></option>
                    <?php
                }

                    ?>
                    <!--------php --------------------->




                    <input type="text" name="stockNun" id="" placeholder="Numéro de stock">

                    <input type="text" name="médPrix" id="" placeholder=" Prix DH">



                    <input type="submit" name="médajout" id="" value="Ajouter">
                    <br>
            </form>
            <br>
            <h1>Liste médicaments</h1>


            <table>
                <thead>
                    <tr>
                        <th>Code médicament </th>
                        <th>Libellé médicament</th>
                        <th>Famille</th>
                        <th>Numéro de stock</th>
                        <th>Prix DH</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>123</td>
                        <td>Crème</td>
                        <td>Diabetique</td>
                        <td>123</td>
                        <td>90</td>
                        <td>

                            <a href="#" id="edit">Edit</a> |
                            <a href="#" id="delete">Delete</a>
                        </td>

                    </tr>
                </tbody>
            </table>



        </div>

    </body>

    </html>