<?php
session_start();
ob_start();
require_once "../db_config.php";
?>

  <?php
    $text = 0;
    $celesi1 = 0;
    $celesi2 = 0;
    $y = 0;
    $d_modd = 0;
    $combined_arr[] = 0;
    $shkronjat[] = 0;
    $numrat[] = 0;
    $shkronjat = ["A", "B", "C", "D", "E", "F", "G", "H", "I", "J", "K", "L", "M", "N", "O", "P", "Q", "R", "S", "T", "U", "V", "W", "X", "Y", "Z"];
    $numrat = [0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24, 25];
    //invers array
    $m =  [1, 3, 5, 7, 9, 11, 15, 17, 19, 21, 23, 25];
    $m_invers = [1, 9, 21, 15, 3, 19, 7, 23, 11, 5, 17, 25];


    if (isset($_POST['submit'])) {
        // start loading time
        $time = microtime();
        $time = explode(' ', $time);
        $time = $time[1] + $time[0];
        $start = $time;
        $d_text = $_POST['d_text'];
        $textarray = str_split($d_text); // variabla $text nga inputi, e konvertuar ne index arrray
        // print_r($combined_arr);
        $combined_arr = array_combine($numrat, $shkronjat); //konvertim ne array
        //invers variable
        $inverse = array_combine($m, $m_invers);
        $d_celesi1 = $_POST['d_celesi1'];
        $d_celesi2 = $_POST['d_celesi2'];
        // echo strtoupper("Hello WORLD!");
        $d_text = strtoupper($d_text);
        $d_count_letters = count($textarray);
        $d_modd = count($combined_arr);


        // if key is eqaul with invers number mod 26
        foreach ($inverse as $keyinv => $valueinv) {
            if ($d_celesi1 != $keyinv) {
                // echo "not inverse number";
                // echo '<script>alert("not invers")</script>';
            }
        }


        try {
            // Start transaction
            $link->begin_transaction();


            $sql = "INSERT INTO decryptim (d_id, `d_text`, d_celesi1, d_celesi2, d_modd, d_count_letters, d_curently_script_memory_usage, d_after_script_memory_usage, d_total_time) VALUES
 ('', '$d_text', '$d_celesi1', '$d_celesi2', '$d_modd', '$d_count_letters', '{$_SESSION['curently_script_memory_usage']}', '{$_SESSION['after_script_memory_usage']}', '{$_SESSION['total_time']}')";


            if (!mysqli_query($link, $sql)) {
                $_SESSION['message'] = "No record created";
                echo "Error:" . $sql . "<br>" . mysqli_connect_error($link);
                exit(0);
            }

            $counter = 0;
            $sql2 = "SELECT * FROM decryptim";
            $result = mysqli_query($link, $sql2);

            while ($row = mysqli_fetch_array($result)) {

                $d_id = $row['d_id'];
                $d_celesli1 = $row['d_celesi1'];
                $d_celesli2 =  $row['d_celesi2'];
                $teksti_per = $row['d_text'];
                $teksti_per_array = str_split($teksti_per); //convertimi i fjalise ne shkornja array
                $combined_arr = array_combine($numrat, $shkronjat);
            }
            foreach ($teksti_per_array as $key => $value) {

                foreach ($combined_arr as $ckey => $cvalue) {
                    if ($cvalue == $value) {
                        $d_modd = count($combined_ar);

                        foreach ($inverse as $keyinv => $valueinv) {

                            if ($d_celesi1 == $keyinv) {

                                $y =  ($ckey - $d_celesi2) * $valueinv; //llogaritja pa modd (abs, vlera nga negativ ne pozitiv)(VERSIONI FINAL)
                            }
                        }

                        // NUMRAT ZBRITEN ME MINUS 26 DERISA TE PLOTESOHET KUSHTI QE MOD TE JETE NDER VLEREN 26 (SA KA ALFABETI ANGLEZ TE ARRAY I DEFINUAR)
                        for ($i = 1; $i <= $y; $i++) {
                            if ($y >= count($combined_arr)) {
                                $y -= count($combined_arr);
                            }
                        }

                        foreach ($combined_arr as $kkey => $kvalue) {
                            if ($kkey == $y) {
                                $counter++;
                                $d_nr_rendor = $counter;
                                $sql = "INSERT INTO decrypt_details (decryptim_ID, d_nr_rendor, d_shkronjat_pa_encryptim, d_numrat_pa_encryptim_array, d_shkronjat_me_encryptim, d_numrat_me_encryptim_array) VALUES
                            ('$d_id', '$d_nr_rendor', '$value', '$ckey', '$kvalue', '$y')";
                                if (mysqli_query($link, $sql)) {
                                    // header('Refresh: 1; URL=index.php');
                                    // $_SESSION['message'] = "Me sukses u enkriptua";
                                    // exit(0);
                                } else {
                                    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
                                }
                            }
                        }
                    }
                }
            }


            header('Location: ../index.php?page=decrypt/index');
            // echo "<script type='text/javascript'>alert('Lead added successfully');location='../index.php?page=encrypt/index';</script>";

            $_SESSION['message'] = "Me sukses u dekriptua";
            //             $script = "<script>
            // window.location = '../index.php';</script>";
            //             echo $script;
            // $_SESSION['message'] = "Me sukses u enkriptua";
            // Commit changes
            $link->commit();
        } catch (Exception $e) {

            // Something went wrong. Rollback
            $link->rollback();
            $_SESSION['message'] = "ERROR: Could not able to execute $sql. " . mysqli_error($link);
            // header('Refresh: 1; URL=index.php');
            //             "<script>
            // window.location = 'index.php';</script>";

        }

        //loading time
        $time = microtime();
        $time = explode(' ', $time);
        $time = $time[1] + $time[0];
        $finish = $time;
        $total_time = round(($finish - $start), 4);
        // echo '<br><br>Page generated in ' . $total_time . ' seconds.<br><br>';
        $_SESSION['total_time'] = $total_time;
        $_SESSION['time'] = 'Page generated in ' . $_SESSION['total_time'] . ' seconds.';


        // $big_array = array();
        // for ($i = 0; $i < 1000000; $i++) {
        //     $big_array[] = $i;
        // }
        // echo 'After building the array.<br>';
        // print_mem();
        // unset($big_array);
        // echo 'After unsetting the array.<br>';
        print_mem();
    }


    function print_mem()
    {
        global $start;
        /* Currently used memory */
        $mem_usage = memory_get_usage();
        $curently_script_memory_usage = round($mem_usage / 1024);

        /* Peak memory usage */
        $mem_peak = memory_get_peak_usage();
        $after_script_memory_usage = round($mem_peak / 1024);
        $msg1 = 'The script is now using: <strong>' . $_SESSION['curently_script_memory_usage'] . 'KB</strong> of memory';
        $msg2 = 'Peak usage: <strong>' . $_SESSION['after_script_memory_usage'] . 'KB</strong> of memory.';
        $_SESSION['memory'] =  $msg1 . '<br />' . $msg2;
        $_SESSION['curently_script_memory_usage'] = $curently_script_memory_usage;
        $_SESSION['after_script_memory_usage'] = $after_script_memory_usage;
    }
