<?php

    include("php/conf.php");
    include("php/DB.class.php");
    include("php/Division.class.php");
    include("php/DField.class.php");
    include("php/Member.class.php");
    include("php/Template.class.php");

    $division = new Division($db_host, $db_user, $db_pass, $db_name);
    $division->open();
    
    if(isset($_POST['addDiv']))
    {
        $division->addDivision(); $division->close();
        header("location:division.php");
    }
    if(isset($_GET['id_delete']))
    {
        $division->deleteDivision(); $division->close();
        header("location:division.php");
    }

    $division->getTableDivision();
    $dataDivision = null; $no = 1;
    while(list($id, $name, $total_field) = $division->getResult())
    {
        $dataDivision .= "<tr>" .
                         "<th scope = 'row'>" . "{$no}" . "</th>" .
                         "<td>" . "{$name}" . "</td>" .
                         "<td>" . "{$total_field}" . "</td>" .
                         "<td>" . "<a href = 'division.php?id_delete=" . "{$id}" . "'>" .
                         "<button class = 'btn btn-outline-danger' onclick = 'deleteSuccess()'>Delete</button>" .
                         "</a>" . "</td>" .
                         "</tr>";
        $no++;
    }

    $division->close();

    $view = new Template("html/division.html");
    $view->replace("DATA_DIVISI", $dataDivision);
    $view->write();

?>