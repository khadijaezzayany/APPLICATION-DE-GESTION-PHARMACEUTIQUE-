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
            <h1>Ajouter Fournisseurs</h1>
            <form action="function.php">

                <input type="text" name="fourCode" id="" placeholder="Code fournisseur ">

                <input type="text" name="fourNom" id="" placeholder="Nom ">

                <!-- <input type="text" name="" id=""> -->
                <!-- <select name="cars" id="cars">
                    <option value="volvo">Volvo</option>
                    <option value="saab">Saab</option>
                    <option value="opel">Opel</option>
                    <option value="audi">Audi</option>
                </select> -->

                <input type="text" name="fourAdrs" id="" placeholder="Adresse ">

                <input type="text" name="fourVille" id="" placeholder=" Ville">

                <input type="text" name="fourTél id="" placeholder=" Télèphone">

                <input type="submit" name="fourajout" id="" value="Ajouter">
                <br>
            </form>
            <br>
            <h1>Liste Fournisseur</h1>


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