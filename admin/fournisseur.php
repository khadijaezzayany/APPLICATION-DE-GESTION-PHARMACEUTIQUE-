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
            <h1>Ajouter Fournisseur</h1>
            <form action="" method="post">

                <input type="text" name="fourNom">
                <input type="text" name="fourAdrs">
                <input type=" text" name="fourVille">
                <input type="text" name="fourTélé">


                <input type="submit" name="ajout-fournisseur">





            </form>

            <br>
            <h1>Liste Fournisseurs</h1>


            <table>
                <thead>
                    <tr>
                        <th>Code Fournisseur </th>
                        <th>Nom</th>
                        <th>Adresse</th>
                        <th>Ville</th>
                        <th>Télèphone</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>123</td>
                        <td>ali</td>
                        <td>N 123</td>
                        <td>agadir</td>
                        <td>9092787298</td>
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