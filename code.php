  <?php
    require_once "db_config.php";
    session_start();
    ob_start();
    ?>


  </head>

  <?php

    $text = 0;
    $celesi1 = 0;
    $celesi2 = 0;
    $dec = 0;
    $split1 = 0;
    $split2 = 0;
    $split22 = 0;
    $y = 0;
    $modd = 0;
    $combined_arr[] = 0;
    $shkronjat[] = 0;
    $numrat[] = 0;
    $shkronjat = ["A", "B", "C", "D", "E", "F", "G", "H", "I", "J", "K", "L", "M", "N", "O", "P", "Q", "R", "S", "T", "U", "V", "W", "X", "Y", "Z"];
    $numrat = [0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24, 25];

    if (isset($_GET['submit'])) :
        $text = $_GET['text'];
        $textarray = str_split($text); // variabla $text nga inputi, e konvertuar ne index arrray
        // print_r($combined_arr);
        $combined_arr = array_combine($numrat, $shkronjat); //konvertim ne array

        $celesi1 = $_GET['celesi1'];
        $celesi2 = $_GET['celesi2'];

        $sql = "INSERT INTO encryptim (text, celesi1, celesi2) VALUES
    ('$text', '$celesi1', '$celesi2')";


        if (mysqli_query($link, $sql)) {
            $counter = 0;
            $sql2 = "SELECT * FROM encryptim";
            if ($result = mysqli_query($link, $sql2)) {
                if (mysqli_num_rows($result) > 0) {

                    while ($row = mysqli_fetch_array($result)) {

                        $id = $row['id'];
                        $celesli1 = $row['celesi1'];
                        $celesli2 =  $row['celesi2'];
                        $teksti_per = $row['text'];
                        $teksti_per_array = str_split($teksti_per); //convertimi i fjalise ne shkornja array
                        $combined_arr = array_combine($numrat, $shkronjat);


                        // $split2 = ltrim($str, '0');
                        // $result = array_diff($textarray, $combined_arr);
                    }
                    foreach ($teksti_per_array as $key => $value) {
                        // echo "-'<b>'$value'</b>' - eshte numer qe i pershtatet shkronjes:'<b>'$key'</b>' ";
                        // echo "</br>";
                        $key;
                        $value;
                        foreach ($combined_arr as $ckey => $cvalue) {
                            $ckey;
                            $cvalue;

                            if ($cvalue == $value) {


                                $modd = ($celesi1 * $ckey) + $celesi2;
                                $decimal = $modd / count($combined_arr); // mod pjestim, numri total i shkonjave te alfabetiti anglez qe eshte 26


                                $split1 =  (int)$decimal;         //  pjesa e pare e pjeses dhjetore
                                $split2  = ($decimal - (int) $decimal) * 100;  // pjesa e dyte e pjese dhjetore
                                $split22 = (int) $split2; //largimi i zeros para pikes dhjetore


                                // $y = abs(($split1 * $split22) - $modd); //llogaritja  (abs, vlera nga negativ ne pozitiv) (VERSIONI 1)

                                $y = abs(($celesi1 * $ckey) + $celesi2); //llogaritja pa modd (abs, vlera nga negativ ne pozitiv)(VERSIONI FINAL)


                                // NUMRAT ZBRITEN ME MINUS 26 DERISA TE PLOTESOHET KUSHTI QE MOD TE JETE NDER VLEREN 26 (SA KA ALFABETI ANGLEZ TE ARRAY I DEFINUAR)
                                for ($i = 1; $i <= $y; $i++) {
                                    if ($y >= count($combined_arr)) {
                                        $y -= count($combined_arr);
                                    }
                                }

                                // $modd = $key + ($celesi1 * $celesi2);
                                // echo 'eshte :' . $combined_arr;
                                // echo "-'<b>'$value'</b>' - eshte numer qe i pershtatet shkronjes:'<b>'$ckey'</b>' ";

                                // echo "-'<b>'$ckey'</b>' - eshte numer qe i pershtatet shkronjes:'<b>'$value'</b>' ";
                                // echo "</br>";
                                // echo  "celesi pare :" . $celesi1 . "</br>";
                                // echo  "celesi dyte :" . $celesi2 . "</br>";
                                // echo  "----mod----:" . $modd . "</br>";
                                // echo  "Decimal-- :" . $decimal . "</br>";
                                // echo  "split1----- :" . $split1 . "</br>";
                                // echo  "split2------:" . $split22 . "</br>";
                                // echo  "Y eshte :" . $y . "</br>";

                                foreach ($combined_arr as $kkey => $kvalue) {
                                    if ($kkey == $y) {
                                        // echo "-'<b>'$y'</b>' - Enkriptimi behet:'<b>'$kvalue'</b>' ";
                                        // echo "</br>";
                                        $counter++;
                                        $nr_rendor = $counter;
                                        $sql = "INSERT INTO encrypt_details (encryptim_ID, nr_rendor, modd, decc, split1, split2, shkronjat_pa_encryptim, numrat_pa_encryptim_array, shkronjat_me_encryptim, numrat_me_encryptim_array) VALUES
                        ('$id', '$nr_rendor', '$modd', ' $decimal', '$split1', '$split2', '$value', '$ckey', '$kvalue', '$y')";
                                        if (mysqli_query($link, $sql)) {
                                            // header('Refresh: 1; URL=index.php');
                                            // $_SESSION['message'] = "Me sukses u enkriptua";
                                            // exit(0);
                                        } else {
                                            echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
                                        }
                                        // echo "<hr>";
                                    }
                                }
                            }
                        }
                    }

                    // Free result set
                    mysqli_free_result($result);
                } else {
                    echo "No records matching your query were found.";
                }
            } else {
                echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
            }


            // print_r($modd);
            // die;

            header('Refresh: 1; URL=index.php');
            $_SESSION['message'] = "Me sukses u enkriptua";
            exit(0);
        } else {
            $_SESSION['message'] = "No record created";
            exit(0);
            echo "Error:" . $sql . "<br>" . mysqli_connect_error($link);
        }
    endif;
    ?>
  </body>

  </html>