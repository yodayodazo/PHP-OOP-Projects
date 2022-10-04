<?php

require_once 'HtmlElement.php';
require_once 'BaseInput.php';
require_once 'Form.php';
require_once 'Button.php';
require_once 'TextInput.php';
require_once 'PasswordInput.php';

$form = new Form();
$form->addElement(new TextInput('firstname', 'First name'));
$form->addElement(new TextInput('email', 'Email'));
$form->addElement(new PasswordInput('password', 'Password'));
$form->addElement(new Button("Submit"));
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>Form Widget</title>
</head>

<body>
    <?php echo $form->render() ?>
</body>

</html>