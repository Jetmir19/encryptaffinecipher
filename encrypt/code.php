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
    $modd = 0;
    $combined_arr[] = 0;
    $shkronjat[] = 0;
    $numrat[] = 0;
    $shkronjat = ["A", "B", "C", "D", "E", "F", "G", "H", "I", "J", "K", "L", "M", "N", "O", "P", "Q", "R", "S", "T", "U", "V", "W", "X", "Y", "Z"];
    $numrat = [0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24, 25];

    if (isset($_POST['submit'])) {
        // start loading time
        $time = microtime();
        $time = explode(' ', $time);
        $time = $time[1] + $time[0];
        $start = $time;

        $text = $_POST['text'];
        $textarray = str_split($text); // variabla $text nga inputi, e konvertuar ne index arrray
        // print_r($combined_arr);
        $combined_arr = array_combine($numrat, $shkronjat); //konvertim ne array

        $celesi1 = $_POST['celesi1'];
        $celesi2 = $_POST['celesi2'];
        // echo strtoupper("Hello WORLD!");
        $text = strtoupper($text);
        $count_letters = count($textarray);
        $modd = count($combined_arr);
        try {
            // Start transaction
            $link->begin_transaction();


            $sql = "INSERT INTO encryptim (id, `text`, celesi1, celesi2, modd, count_letters, curently_script_memory_usage, after_script_memory_usage, total_time) VALUES
 ('', '$text', '$celesi1', '$celesi2', '$modd', '$count_letters', '{$_SESSION['curently_script_memory_usage']}', '{$_SESSION['after_script_memory_usage']}', '{$_SESSION['total_time']}')";


            if (!mysqli_query($link, $sql)) {
                $_SESSION['message'] = "No record created";
                echo "Error:" . $sql . "<br>" . mysqli_connect_error($link);
                exit(0);
            }


            $counter = 0;
            $sql2 = "SELECT * FROM encryptim";
            $result = mysqli_query($link, $sql2);

            while ($row = mysqli_fetch_array($result)) {

                $id = $row['id'];
                $celesli1 = $row['celesi1'];
                $celesli2 =  $row['celesi2'];
                $teksti_per = $row['text'];
                $teksti_per_array = str_split($teksti_per); //convertimi i fjalise ne shkornja array
                $combined_arr = array_combine($numrat, $shkronjat);
            }
            foreach ($teksti_per_array as $key => $value) {

                foreach ($combined_arr as $ckey => $cvalue) {
                    if ($cvalue == $value) {

                        $y = abs(($celesi1 * $ckey) + $celesi2); //llogaritja pa modd (abs, vlera nga negativ ne pozitiv)(VERSIONI FINAL)


                        // NUMRAT ZBRITEN ME MINUS 26 DERISA TE PLOTESOHET KUSHTI QE MOD TE JETE NDER VLEREN 26 (SA KA ALFABETI ANGLEZ TE ARRAY I DEFINUAR)
                        for ($i = 1; $i <= $y; $i++) {
                            if ($y >= count($combined_arr)) {
                                $y -= count($combined_arr);
                            }
                        }


                        foreach ($combined_arr as $kkey => $kvalue) {
                            if ($kkey == $y) {

                                $counter++;
                                $nr_rendor = $counter;
                                $sql = "INSERT INTO encrypt_details (encryptim_ID, nr_rendor, shkronjat_pa_encryptim, numrat_pa_encryptim_array, shkronjat_me_encryptim, numrat_me_encryptim_array) VALUES
                            ('$id', '$nr_rendor', '$value', '$ckey', '$kvalue', '$y')";
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


            header('Location: ../index.php?page=encrypt/index');
            // echo "<script type='text/javascript'>alert('Lead added successfully');location='../index.php?page=encrypt/index';</script>";

            $_SESSION['message'] = "Me sukses u enkriptua";
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
