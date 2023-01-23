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
            <th scope="col">Text without encrypted</th>
            <th scope="col">Without encryptet number</th>
            <th scope="col">Text encrypted</th>
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
        // INNER JOIN encrypt_details ON encryptim.id=encrypt_details.encryptim_ID
        // WHERE encrypt_details.encryptim_ID=encryptim.id
        // ORDER BY encryptim.id DESC
        // ";


        $counter = 0;
        // from encrypt_details group by encryptim_ID";
        $sqli = "select encryptim_ID, text,celesi1, celesi2, modd, count_letters, curently_script_memory_usage, after_script_memory_usage, total_time, 
         group_concat(nr_rendor ORDER BY `nr_rendor` SEPARATOR '.') as nr_rendor,  
         group_concat(shkronjat_pa_encryptim ORDER BY `nr_rendor` SEPARATOR '') as shkronjat_pa_encryptim, 
         group_concat(numrat_pa_encryptim_array ORDER BY `nr_rendor` SEPARATOR '.') as numrat_pa_encryptim_array, 
         group_concat(shkronjat_me_encryptim ORDER BY `nr_rendor` SEPARATOR '') as shkronjat_me_encryptim, 
         group_concat(numrat_me_encryptim_array ORDER BY `nr_rendor` SEPARATOR '.') as numrat_me_encryptim_array 
         from encrypt_details INNER JOIN encryptim ON encryptim.id = encrypt_details.encryptim_ID group by encrypt_details.encryptim_ID  ORDER BY encryptim.id DESC";





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
            $id = $res['encryptim_ID'];
            $nr_rendor = $res['nr_rendor'];
            $celesli1 = $res['celesi1'];
            $celesli2 =  $res['celesi2'];
            $teksti_per = $res['text'];
            $shkronjat_pa_encryptim = $res['shkronjat_pa_encryptim'];
            $numrat_pa_encryptim = $res['numrat_pa_encryptim_array'];
            $shkronjat_me_encryptim = $res['shkronjat_me_encryptim'];
            $numrat_me_encryptim = $res['numrat_me_encryptim_array'];
            $count_letters = $res['count_letters'];
            $curently_script_memory_usage = $res['curently_script_memory_usage'];
            $after_script_memory_usage = $res['after_script_memory_usage'];
            $total_time = $res['total_time'];

        ?>

            <tr>
                <form action="" method="GET">
                    <td><a href="index.php?page=encrypt/index&delete=<?php echo $res['encryptim_ID']; ?>"><button type="button" class="btn btn-sm btn-danger" name="delete">Delete</button> </td>
                </form>


                <th scope="row"><?php echo $counter; ?></th>

                <!-- <td><?php echo $res['text']; ?></td> -->
                <td><?php echo $res['celesi1']; ?></td>
                <td><?php echo $res['celesi2']; ?></td>
                <td> <?php echo $res['modd']; ?></td>
                <td><?php echo $res['shkronjat_pa_encryptim']; ?> </td>
                <td><?php echo $res['numrat_pa_encryptim_array']; ?> </td>
                <td><?php echo $res['shkronjat_me_encryptim']; ?> </td>
                <td><?php echo $res['numrat_me_encryptim_array']; ?> </td>
                <td><?php echo $res['count_letters']; ?> </td>
                <td><?php echo $res['curently_script_memory_usage']; ?> </td>
                <td><?php echo $res['after_script_memory_usage']; ?> </td>
                <td><?php echo $res['total_time']; ?> </td>

                <!-- <td><a href="edit.php?id=<?php echo $res['id']; ?>"><input type="button" name="edit" value="edit" class="btn btn-sm btn-primary"></input></td>
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
    $sqli = "
    DELETE `encryptim`, `encrypt_details` FROM encryptim INNER JOIN encrypt_details ON encryptim.id=encrypt_details.encryptim_ID WHERE encryptim.id=$delete
";

    if (mysqli_query($link, $sqli)) {

        header('Location: index.php?page=encrypt/index');

        $_SESSION['message'] = " U fshi me sukses ";
    } else {
        echo "ERROR: Could not able to execute $sqli. " . mysqli_error($link);
    }
}
// Close connection
mysqli_close($link);
?>