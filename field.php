<?php

    include("php/conf.php");
    include("php/DB.class.php");
    include("php/Division.class.php");
    include("php/DField.class.php");
    include("php/Member.class.php");
    include("php/Template.class.php");

    $division = new Division($db_host, $db_user, $db_pass, $db_name);
    $division->open(); $division->getDivision();

    $dataDivision = null;
    while(list($id, $name) = $division->getResult())
    {
        $dataDivision .= "<option value = {$id}>" . "{$name}" . "</option>";
    }

    $division->close();

    $field = new DField($db_host, $db_user, $db_pass, $db_name);
    $field->open();
    
    if(isset($_POST['addField']))
    {
        $field->addDField(); $field->close();
        header("location:field.php");
    }
    if(isset($_GET['id_delete']))
    {
        $field->deleteDField(); $field->close();
        header("location:field.php");
    }

    $field->getTableDField();
    $dataDField = null; $no = 1;
    while(list($id, $division, $position, $total_member) = $field->getResult())
    {
        $dataDField .= "<tr>" .
                         "<th scope = 'row'>" . "{$no}" . "</th>" .
                         "<td>" . "{$division}" . "</td>" .
                         "<td>" . "{$position}" . "</td>" .
                         "<td>" . "{$total_member}" . "</td>" .
                         "<td>" . "<a href = 'field.php?id_delete=" . "{$id}" . "'>" .
                         "<button class = 'btn btn-outline-danger' onclick = 'deleteSuccess()'>Delete</button>" .
                         "</a>" . "</td>" .
                         "</tr>";
        $no++;
    }

    $field->close();

    $view = new Template("html/field.html");
    $view->replace("DATA_DIVISI", $dataDivision);
    $view->replace("DATA_BIDANG", $dataDField);
    $view->write();

?>