<?php
    
    $db = mysqli_connect('localhost', '', '', 'rudhweb');
    $username = $_POST["in_1"];
    

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
          
        function get_data() {
            $datae = array();
            $datae[] = array(
                'd1' => $_POST['in_1'],
                'd2' => $_POST['in_2'],
                'd3' => $_POST['in_3'],
                'd4' => $_POST['in_4'],
                'd5' => $_POST['in_5'],
                'd6' => $_POST['in_6'],
                'd7' => $_POST['in_7'],
                'd8' => $_POST['in_8'],
                'd9' => $_POST['in_9'],
                'd10' => $_POST['in_10'],
                'd11' => $_POST['in_11'],
                'd12' => $_POST['in_12'],
                'd13' => $_POST['in_13'],
                'd14' => $_POST['in_14'],
                'd15' => $_POST['in_15'],
                'd16' => $_POST['in_16'],
                'd17' => $_POST['in_17'],
                'd18' => $_POST['in_18'],
                'd19' => $_POST['in_19'],
                'd20' => $_POST['in_20'],
                'd21' => $_POST['in_21'],
                'd22' => $_POST['in_22'],
                'd23' => $_POST['in_23'],
                'd24' => $_POST['in_24'],
                'd25' => $_POST['in_25'],
                'd26' => $_POST['in_26'],
                'd27' => $_POST['in_27'],
                'd26' => $_POST['in_28'],
                'd29' => $_POST['in_29'],
                'd30' => $_POST['in_30'],
                'd31' => $_POST['in_31'],
                'd32' => $_POST['in_32'],
                'd33' => $_POST['in_33'],
                'd34' => $_POST['in_34'],
                'd35' => $_POST['in_35'],
                'd36' => $_POST['in_36'],
                'd37' => $_POST['in_37'],
                'd38' => $_POST['in_38'],
                'd39' => $_POST['in_39'],
                'd40' => $_POST['in_40'],
                'd41' => $_POST['in_41'],
                'd42' => $_POST['in_42'],
                'd43' => $_POST['in_43'],
                'd44' => $_POST['in_44'],
                'd45' => $_POST['in_45'],
                'd46' => $_POST['in_46'],
                'd47' => $_POST['in_47'],
                'd48' => $_POST['in_48'],
                'd49' => $_POST['in_49'],
                'd50' => $_POST['in_50'],
            );
            return json_encode($datae);
        }
        
        $data=get_data();
        $_SESSION["data"]=get_data();
       /* $name = "gfg";
        $file_name = $name . '.json';
       
        if(file_put_contents(
            "$file_name", get_data())) {
                //echo $file_name .' file created';
                echo 'Data Recorded';
            }
        else {
            echo 'There is some error';
        } */

        $query = "INSERT INTO ans50(name,data) VALUES('$username','$data')";
        mysqli_query($db, $query);
        header('location: status.php');
    }
?>
