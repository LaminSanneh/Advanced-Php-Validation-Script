<?php
    
    require_once("libs/validator.php");   

    $validator = new Validator();

    if($_POST)
    {
        $validator->add_field('firstName');
        $validator->add_rule_to_field('firstName', array('min_length', 2));
        $validator->add_rule_to_field('firstName', array('empty'));

        $validator->add_field('lastName');
        $validator->add_rule_to_field('lastName', array('min_length', 2));
        $validator->add_rule_to_field('lastName', array('empty'));

        $validator->add_field('email');
        $validator->add_rule_to_field('email', array('min_length', 6));
        $validator->add_rule_to_field('email', array('empty'));

        $validator->add_field('password');
        $validator->add_rule_to_field('password', array('min_length', 8));
        $validator->add_rule_to_field('password', array('empty'));

        //check errors
        if($validator->form_valid())
        {
            //redirect to success pages
            header("Location: success.php");
            exit();
        }
    }

?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <title></title>
        <style>
            .error
            {
                color: red;
                font-size:  12px;
            }
        </style>
    </head>
    <body>
        <?php $validator->output_all_field_errors(); ?>
        <form method="post" target="">
            <p>
            <label for="firstName">FirstName</label>
            <input type="text" name="firstName" id="firstName" value="<?php if(isset($_POST['firstName'])) echo $_POST['firstName']; ?>" />
            </p>

            <p>
            <label for="lastName">Last Name</label>
            <input type="text" name="lastName" id="lastName" value="<?php if(isset($_POST['lastName'])) echo $_POST['lastName']; ?>" />
            </p>

            <p>
            <label for="email">Email</label>
            <input type="text" name="email" id="email" value="<?php if(isset($_POST['email'])) echo $_POST['email']; ?>" />
            </p>

            <p>
            <label for="password">Password</label>
            <input type="password" name="password" id="password" />
            </p>

            <input type="submit" value="Submit" />
        </form>
    </body>
</html>
