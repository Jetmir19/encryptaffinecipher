<?php
require_once "db_config.php";
?>
<table class="table table-striped mt-5" style=" width: 900px;">
    <thead>
        <tr>
            <th scope="col">nr rendor</th>
            <!-- <th scope="col">teksti per enkryptim</th> -->
            <th scope="col">celesi1</th>
            <th scope="col">celesi2</th>
            <th scope="col">decimal</th>
            <th scope="col">split1</th>
            <th scope="col">split2</th>
            <th scope="col">mod</th>

            <!-- <th scope="col">dec</th> -->
            <th scope="col">shkronjat pa enryptim</th>
            <th scope="col">numrat pa enryptim</th>
            <th scope="col">shkronjat me enryptim</th>
            <th scope="col">numrat me enryptim</th>
        </tr>
    </thead>
    <tbody>

        <?php
        // $counter = 0;
        // $sqli = "SELECT * FROM encryptim
        // INNER JOIN encrypt_details ON encryptim.id=encrypt_details.encryptim_ID
        // WHERE encrypt_details.encryptim_ID=encryptim.id
        // ORDER BY encryptim.id DESC
        // ";


        $counter = 0;
        // from encrypt_details group by encryptim_ID";
        $sqli = "select encryptim_ID, text,celesi1, celesi2, group_concat(nr_rendor ORDER BY `nr_rendor` SEPARATOR '.') as nr_rendor, group_concat(split1 ORDER BY `nr_rendor` SEPARATOR '.') as split1, group_concat(split2 ORDER BY `nr_rendor` SEPARATOR '.') as split2, group_concat(decc ORDER BY `nr_rendor` SEPARATOR '|') as decc,group_concat(modd ORDER BY `nr_rendor` SEPARATOR '.') as modd, group_concat(shkronjat_pa_encryptim ORDER BY `nr_rendor` SEPARATOR '') as shkronjat_pa_encryptim, group_concat(numrat_pa_encryptim_array ORDER BY `nr_rendor` SEPARATOR '.') as numrat_pa_encryptim_array, group_concat(shkronjat_me_encryptim ORDER BY `nr_rendor` SEPARATOR '') as shkronjat_me_encryptim, group_concat(numrat_me_encryptim_array ORDER BY `nr_rendor` SEPARATOR '.') as numrat_me_encryptim_array from encrypt_details INNER JOIN encryptim ON encryptim.id = encrypt_details.encryptim_ID group by encryptim_ID";


        $resulti = mysqli_query($link, $sqli);
        if (mysqli_num_rows($resulti) > 0) {
            while ($res = mysqli_fetch_array($resulti)) {
                // foreach ($resulti as $res) {

                $counter++;
                // $id = $res['id'];
                $nr_rendor = $res['nr_rendor'];
                // $celesli1 = $res['text'];
                $celesli1 = $res['celesi1'];
                $celesli2 =  $res['celesi2'];
                $teksti_per = $res['text'];
                $split1 = $res['split1'];
                $split2 = $res['split2'];
                $split1 = $res['modd'];
                $decimal = $res['decc'];
                // $split2 = $res['dec'];
                $shkronjat_pa_encryptim = $res['shkronjat_pa_encryptim'];
                $numrat_pa_encryptim = $res['numrat_pa_encryptim_array'];
                $shkronjat_me_encryptim = $res['shkronjat_me_encryptim'];
                $numrat_me_encryptim = $res['numrat_me_encryptim_array'];

        ?>
                <tr>
                    <th scope="row"><?php echo $counter; ?></th>
                    <!-- <td><?php echo $res['text']; ?></td> -->
                    <td><?php echo $res['celesi1']; ?></td>
                    <td><?php echo $res['celesi2']; ?></td>
                    <td> <?php echo $res['decc']; ?></td>
                    <td> <?php echo $res['split1']; ?></td>
                    <td><?php echo $res['split2']; ?> </td>
                    <td> <?php echo $res['modd']; ?></td>

                    <!-- <td><?php echo $res['dec']; ?> </td> -->
                    <td><?php echo $res['shkronjat_pa_encryptim']; ?> </td>
                    <td><?php echo $res['numrat_pa_encryptim_array']; ?> </td>
                    <td><?php echo $res['shkronjat_me_encryptim']; ?> </td>
                    <td><?php echo $res['numrat_me_encryptim_array']; ?> </td>

                    <!-- <td><a href="edit.php?id=<?php echo $res['id']; ?>"><input type="button" name="edit" value="edit" class="btn btn-sm btn-primary"></input></td>
                    <td><a href="delete.php?id=<?php echo $res['id']; ?>"><button type="button" class="btn btn-sm btn-danger">Delete</button> </td> -->



            <?php
            }
        } else {
            echo '<tr>';
            echo '<td  colspan="11">';
            echo ' nuk ka tekst per enkryptim';
            echo '</td>';
            echo '</tr>';
        }
            ?>

    </tbody>
    <tfoot>
        <!-- <tr class="mt-3">
            <th colspan="2"></th>
            <th scope="row">Totals</th>
            <td><?php echo  $sum; ?></td>
            <td> <input type="submit" name="paguaj" value="paguaj" class="btn btn-sm btn-secondary"></td>
        </tr> -->
    </tfoot>
</table>