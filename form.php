<?php

    include("php/conf.php");
    include("php/DB.class.php");
    include("php/Division.class.php");
    include("php/DField.class.php");
    include("php/Member.class.php");
    include("php/Template.class.php");

    if(isset($_POST['add']))
    {
        $member = new Member($db_host, $db_user, $db_pass, $db_name);
        $member->open(); $member->addData(); $member->close();

        header("location:index.php");
    }

    $field = new DField($db_host, $db_user, $db_pass, $db_name);
    $field->open();
    $field->getDField();

    $dataDField = null;
    while(list($id, $nama, $id_divisi) = $field->getResult())
    {
        $dataDField .= "<option value = {$id}>" . "{$nama}" . "</option>";
    }

    $field->close();

    $view = new Template("html/form.html");
    $view->replace("DATA_BIDANG", $dataDField);
    $view->write();
?>