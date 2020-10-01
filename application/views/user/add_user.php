<!DOCTYPE html>
<html lang="en">
<head>
    <title>Add user</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->
    <link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
<!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="<?=base_url()?>assets/css/extra/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="<?=base_url()?>assets/css/extra/animate/animate.css">
<!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="<?=base_url()?>assets/css/extra/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="<?=base_url()?>assets/css/extra/animsition/css/animsition.min.css">
<!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="<?=base_url()?>assets/css/extra/select2/select2.min.css">
<!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="<?=base_url()?>assets/css/extra/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="<?=base_url()?>assets/css/util.css">
    <link rel="stylesheet" type="text/css" href="<?=base_url()?>assets/css/main.css">
<!--===============================================================================================-->
</head>
<body>


    <div class="container-contact100">
        <div class="wrap-contact100">
            <form class="contact100-form validate-form" method="post" action="<?=base_url()?>users/add_user">
                <?php if( ! empty($form_message['addUserForm'])) echo $form_message['addUserForm']; ?>
               
                <?=display_form_message('addUserForm')?>

                <div class="wrap-input100 validate-input">
                    <span class="label-input100">Your Name</span>
                    <input class="input100" type="text" name="userFirstName" placeholder="Enter your name" value="<?=set_value('userFirstName')?>">
                    <span class="focus-input100"></span>
                </div>

                <div class="wrap-input100 validate-input">
                    <span class="label-input100">Email</span>
                    <div class="row">
                        
                        <div class="col-md-11">
                        <input class="input100" type="email" name="userEmail" placeholder="Enter your email" value="<?=set_value('userEmail')?>">
                        </div>
                    </div>
                    <span class="focus-input100"></span>
                </div>

                <div class="wrap-input100 validate-input" >
                    <span class="label-input100"></span>
                    <input class="input100" type="password" name="userPassword" placeholder="Enter your password" value="">
                    <span class="focus-input100"></span>
                </div>
                <div class="wrap-input100 validate-input" >
                    <span class="label-input100"></span>
                    <input class="input100" type="password" name="confirmPassword" placeholder="Confirm password" value="">
                    <span class="focus-input100"></span>
                </div>
                <div class="wrap-input100 validate-input" >
                    <span class="label-input100"></span>
                    
                    <textarea class="input100" name="userAddress" placeholder="Enter your address" value="<?=set_value('userAddress')?>"></textarea>
                    <span class="focus-input100"></span>
                </div>
                <div class="container-contact100-form-btn">
                    <div class="wrap-contact100-form-btn">
                        <div class="contact100-form-bgbtn"></div>
                        <button class="contact100-form-btn" type="submit">
                            <span>
                                Submit
                            </span>
                        </button>
                    </div>
                </div>
            </form>
        </div>
        
    </div>



</body>
</html>
