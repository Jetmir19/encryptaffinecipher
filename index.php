<?php
session_start();
ob_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
<<<<<<< HEAD

=======
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
>>>>>>> c9e1b68ea6aef47863f11864a1498ce83281dfc8
    <style>
        table,
        th,
        td {
            border: 1px solid black;
        }
    </style>
</head>

<body>

    <?php
<<<<<<< HEAD


    require_once  'message.php';

    $shkronjat = ["A", "B", "C", "D", "E", "F", "G", "H", "I", "J", "K", "L", "M", "N", "O", "P", "Q", "R", "S", "T", "U", "V", "W", "X", "Y", "Z"];
    $numrat = [0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24, 25];
    $combined_arr = array_combine($numrat, $shkronjat); //konvertim ne array
=======
    require_once  'message.php';


    $shkronjat = ["A", "B", "C", "D", "E", "F", "G", "H", "I", "J", "K", "L", "M", "N", "O", "P", "Q", "R", "S", "T", "U", "V", "W", "X", "Y", "Z"];
    $numrat = [0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24, 25];
    $combined_arr = array_combine($numrat, $shkronjat); //konvertim ne array

    print_r($combined_arr);
    ?>
    <h2>Tabela alfa numerike per enkyptim Affine Cipher</h2>
    <table style="width:100%">

        <tr>
            <?php
            foreach ($shkronjat as $shkronja) {
            ?>
                <td align="center"><?php echo $shkronja; ?></td>
            <?php
            }
            ?>
        </tr>


        <tr>
            <?php
            foreach ($numrat as $nr) {
            ?>
                <td align="center"><?php echo $nr ?></td>
            <?php
            }
            ?>

        </tr>
    </table>
    <BR></BR>

    <form action="code.php" method="get">


        <!-- Textarea with class .w-25 -->
        <div class="form-outline w-25 mb-4">
            <label class="form-label" for="textAreaExample4">Entry text for encryption</label>
            <textarea class="form-control" name="text" id="text" rows="3" style="text-transform:uppercase"></textarea>
        </div>
>>>>>>> c9e1b68ea6aef47863f11864a1498ce83281dfc8

    print_r($combined_arr);
    ?>
    <div class="table-responsive">
        <h2>Tabela alfa numerike per enkyptim Affine Cipher</h2>
        <table class="table">

            <tr>
                <?php
                foreach ($shkronjat as $shkronja) {
                ?>
                    <td align="center"><?php echo $shkronja; ?></td>
                <?php
                }
                ?>
            </tr>


<<<<<<< HEAD
            <tr>
                <?php
                foreach ($numrat as $nr) {
                ?>
                    <td align="center"><?php echo $nr ?></td>
                <?php
                }
                ?>

            </tr>
        </table>
    </div>

    <form action="code.php" method="POST">


        <!-- Textarea with class .w-25 -->
        <div class="form-outline w-25 mb-4">
            <label class="form-label" for="textAreaExample4">Entry text for encryption</label>
            <textarea class="form-control" name="text" id="text" rows="3" style="text-transform:uppercase"></textarea>
        </div>



        <div class="input-group mb-3">
            <span class="input-group-text" id="basic-addon1">Key1 x</span>
            <input type="number" number="form-control" name="celesi1" value="" min="1" max="7" placeholder="" aria-label="Username" aria-describedby="basic-addon1">
            .....
            <span class="input-group-text" id="basic-addon1">Key2 +</span>
            <input type="number" number="form-control" name="celesi2" value="" min="1" max="7" placeholder="" aria-label="Username" aria-describedby="basic-addon1">
        </div>




        </div>
        <button type="sumbit" name="submit" value="submit"> submit</button>
    </form>

=======
        <div class="input-group mb-3">
            <span class="input-group-text" id="basic-addon1">Key1 x</span>
            <input type="number" number="form-control" name="celesi1" value="" min="1" max="7" placeholder="" aria-label="Username" aria-describedby="basic-addon1">
            .....
            <span class="input-group-text" id="basic-addon1">Key2 +</span>
            <input type="number" number="form-control" name="celesi2" value="" min="1" max="7" placeholder="" aria-label="Username" aria-describedby="basic-addon1">
        </div>




        </div>
        <button type="sumbit" name="submit" value="submit"> submit</button>
    </form>

>>>>>>> c9e1b68ea6aef47863f11864a1498ce83281dfc8

    <?php
    echo "</br>";
    echo "</br>";
<<<<<<< HEAD



=======
>>>>>>> c9e1b68ea6aef47863f11864a1498ce83281dfc8
    require_once  'tables.php';
    ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>

</body>

</html>