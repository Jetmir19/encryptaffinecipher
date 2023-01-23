<?php
require_once "db_config.php";
?>
<table class="table table-striped mt-5" style=" width: 900px;">
    <thead>
        <tr>
            <th scope="col">Action</th>
            <th scope="col">Number</th>
            <th scope="col">Key1</th>
            <th scope="col">Key2</th>
            <th scope="col">Mod</th>
            <th scope="col">Text encrypted</th>
            <th scope="col">Without encryptet number</th>
            <th scope="col">Text decrypted</th>
            <th scope="col">Encrypted number</th>
            <th scope="col">Count text</th>
            <th scope="col">Currently memory usage.</th>
            <th scope="col">After memory usage.</th>
            <th scope="col">Total time</th>
        </tr>
    </thead>
    <tbody>

        <?php
        // $counter = 0;
        // $sqli = "SELECT * FROM encryptim
        // INNER JOIN encrypt_details ON encryptim.id=encrypt_details.decryptim_ID
        // WHERE encrypt_details.decryptim_ID=encryptim.id
        // ORDER BY encryptim.id DESC
        // ";


        $counter = 0;
        // from encrypt_details group by decryptim_ID";
        $sqli = "select decryptim_ID, d_text, d_celesi1, d_celesi2, d_modd, d_count_letters, d_curently_script_memory_usage, d_after_script_memory_usage, d_total_time, 
        group_concat(d_nr_rendor ORDER BY `d_nr_rendor` SEPARATOR '.') as d_nr_rendor,
        group_concat(d_shkronjat_pa_encryptim ORDER BY `d_nr_rendor` SEPARATOR '') as d_shkronjat_pa_encryptim, 
        group_concat(d_numrat_pa_encryptim_array ORDER BY `d_nr_rendor` SEPARATOR '.') as d_numrat_pa_encryptim_array, 
        group_concat(d_shkronjat_me_encryptim ORDER BY `d_nr_rendor` SEPARATOR '') as d_shkronjat_me_encryptim, 
        group_concat(d_numrat_me_encryptim_array ORDER BY `d_nr_rendor` SEPARATOR '.') as d_numrat_me_encryptim_array 
        from decrypt_details INNER JOIN decryptim ON decryptim.d_id = decrypt_details.decryptim_ID group by decrypt_details.decryptim_ID  ORDER BY decryptim.d_id DESC";





        $resulti = mysqli_query($link, $sqli);
        if (!mysqli_num_rows($resulti) > 0) {

            echo '<tr>';
            echo '<td  colspan="17">';
            echo ' nuk ka tekst per enkryptim';
            echo '</td>';
            echo '</tr>';
        }

        while ($res = mysqli_fetch_array($resulti)) {
            // foreach ($resulti as $res) {

            $counter++;
            $id = $res['decryptim_ID'];
            $nr_rendor = $res['d_nr_rendor'];
            $celesli1 = $res['d_celesi1'];
            $celesli2 =  $res['d_celesi2'];
            $d_modd =  $res['d_modd'];
            // $teksti_per = $res['d_text'];
            $shkronjat_pa_encryptim = $res['d_shkronjat_pa_encryptim'];
            $numrat_pa_encryptim = $res['d_numrat_pa_encryptim_array'];
            $shkronjat_me_encryptim = $res['d_shkronjat_me_encryptim'];
            $numrat_me_encryptim = $res['d_numrat_me_encryptim_array'];
            $count_letters = $res['d_count_letters'];
            $curently_script_memory_usage = $res['d_curently_script_memory_usage'];
            $after_script_memory_usage = $res['d_after_script_memory_usage'];
            $total_time = $res['d_total_time'];

        ?>

            <tr>
                <form action="" method="GET">
                    <td><a href="index.php?page=decrypt/index&delete=<?php echo $res['decryptim_ID']; ?>"><button type="button" class="btn btn-sm btn-danger" name="delete">Delete</button> </td>
                </form>


                <th scope="row"><?php echo $counter; ?></th>
                <td><?php echo $res['d_celesi1']; ?></td>
                <td><?php echo $res['d_celesi2']; ?></td>
                <td><?php echo $res['d_modd']; ?></td>
                <td><?php echo $res['d_shkronjat_pa_encryptim']; ?> </td>
                <td><?php echo $res['d_numrat_pa_encryptim_array']; ?> </td>
                <td><?php echo $res['d_shkronjat_me_encryptim']; ?> </td>
                <td><?php echo $res['d_numrat_me_encryptim_array']; ?> </td>
                <td><?php echo $res['d_count_letters']; ?> </td>
                <td><?php echo $res['d_curently_script_memory_usage']; ?> </td>
                <td><?php echo $res['d_after_script_memory_usage']; ?> </td>
                <td><?php echo $res['d_total_time']; ?> </td>

                <!-- <td><a href="edit.php?id=<?php echo $res['d_id']; ?>"><input type="button" name="edit" value="edit" class="btn btn-sm btn-primary"></input></td>
                    <td><a href="delete.php?id=<?php echo $res['id']; ?>"><button type="button" class="btn btn-sm btn-danger">Delete</button> </td> -->

            <?php
        }

            ?>

    </tbody>
</table>
<?php

// Attempt delete query execution
if (isset($_GET['delete'])) {
    # code...
    $delete = $_GET['delete'];

    $sqli = "DELETE `decryptim`, `decrypt_details` FROM decryptim INNER JOIN decrypt_details ON decryptim.d_id=decrypt_details.decryptim_ID WHERE decryptim.d_id=$delete
";

    if (mysqli_query($link, $sqli)) {

        header('Location: index.php?page=decrypt/index');

        $_SESSION['message'] = " U fshi me sukses ";
    } else {
        echo "ERROR: Could not able to execute $sqli. " . mysqli_error($link);
    }
}
// Close connection
mysqli_close($link);

?>