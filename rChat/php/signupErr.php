<?php
    session_start();
    include_once "config.php";
    $fname = mysqli_real_escape_string($conn, $_POST['fname']);
    $lname = mysqli_real_escape_string($conn, $_POST['lname']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);

    if(!empty($fname) && !empty($lname) && !empty($email) && !empty($password)){
        //email validator
        if(filter_var($email, FILTER_VALIDATE_EMAIL)){
            //chech email already exits in db
            $sql = mysqli_query($conn,"SELECT email FROM users WHERE email = '{$email}'");
            if(mysqli_num_rows($sql)>0){ //if exists already
                echo "$email -- This email already exists!!";
            }else{
                //check user upload img or not
                if(isset($_FILES['image'])){ //if uploaded
                    $img_name = $_FILES['image']['name']; //getting name
                    //$img_type = $_FILES['image']['type']; //getting type
                    $tmp_name = $_FILES['image']['tmp_name']; //assing temporary name

                    //explode img to get extension
                    $img_explode = explode('.', $img_name);
                    $img_ext = end($img_explode); //here we get extension

                    $extensions = ['png', 'jpeg', 'jpg']; //valid extensions
                    if(in_array($img_ext, $extensions) === true){ //true
                        $time = time(); //to name the img file with time
                        //moving img to particular folder
                        $new_img_name = $time.$img_name;

                        if(move_uploaded_file($tmp_name, "images/".$new_img_name)){
                            $status = "Active now"; //omce user signed up thrn thos status will be active now
                            $random_id = rand(time(), 10000000);

                            //insert all data to DB
                            $sql2 = mysqli_query($conn, "INSERT INTO users (unique_id, fname, lname, email, password, img, status)
                                                  VALUES ({$random_id}, '{$fname}', '{$lname}', '{$email}', '{$password}', '{$$new_img_name}', '{$status}')");
                            
                            if($sql2){ //if inserted TRUE
                                $sql3 = mysqli_query($conn, "SELECT * FROM users WHERE email = '{$email}'");
                                if(mysqli_num_rows($sql3) > 0){
                                    $row = mysqli_fetch_assoc($sql3);
                                    $_SESSION['unique_id'] = $row['unique_id'];
                                    echo "Success";
                                }
                            }
                            
                        }

                    }else
                    {
                        echo "Please select an Image file - jpeg, jpg, png!";
                    }

                }else{
                    echo "Please upload an image!";
                }
            }
        }else{
            echo "$email -- This email not valid";    
        }
    }else{
        echo "All input fields are required";
    }
?>