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
            <form action="function.php">

                <input type="text" name="médCode" id="" placeholder="Code médicament ">

                <input type="text" name="médLib" id="" placeholder="Libellé médicament ">

                <!-- <input type="text" name="" id=""> -->
                <!-- <select name="cars" id="cars">
                    <option value="volvo">Volvo</option>
                    <option value="saab">Saab</option>
                    <option value="opel">Opel</option>
                    <option value="audi">Audi</option>
                </select> -->

                <input type="text" name="fourCode" id="" placeholder="Code fournisseur ">

                <input type="text" name="stockNum" id="" placeholder=" Numéro de stock">

                <input type="text" name="quantité" id="" placeholder=" Quantité ">

                <input type="text" name="commPrix" id="" placeholder=" Prix ">

                <input type="submit" name="commandajout" id="" value="Ajouter">
                <br>
            </form>
            <br>
            <h1>Liste des commandes</h1>


            <table>
                <thead>
                    <tr>
                        <th>Numéro de stock </th>
                        <th>Quantité</th>
                        <th>Code médicament</th>
                        <th>Quantité médicament</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>123</td>
                        <td>1</td>
                        <td>123</td>
                        <td>33</td>
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