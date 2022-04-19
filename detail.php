<?php

    include("php/conf.php");
    include("php/DB.class.php");
    include("php/Member.class.php");
    include("php/Template.class.php");

    if(isset($_GET['id']))
    {
        $member = new Member($db_host, $db_user, $db_pass, $db_name);
        $member->open(); $member->getData($_GET['id']);

        $result = $member->getResult();
        $nim = $result['nim'];
        $name = $result['nama'];
        $semester = $result['semester'];
        $division = $result['nama_divisi'];
        $position = $result['jabatan'];
        $member->close();

        $dataMember = null;
        $dataMember .=  "<h4 class = 'card-title text-center'>" . "{$name}" . "</h4>" .
                        "<p class = 'card-text text-center'>" . "{$division}" . "</p>" .
                        "<h5 class = 'card-text text-center'>" . "{$position}" . "</h4>" . "</div>";        
        
        $dataButton = null;
        $dataButton .=  "<button class = 'btn btn-outline-primary me-3'>Edit</button>" .
                        "<a href = 'detail.php?id_delete=" . "{$_GET['id']}" . "'>" .
                        "<button class = 'btn btn-outline-danger' onclick = 'deleteSuccess()'>Delete</button>" . "</a>";

        $view = new Template("html/detail.html");
        $view->replace("DATA_PENGURUS", $dataMember);
        $view->replace("DATA_TOMBOL", $dataButton);
        $view->write();
        
    }
    if(isset($_GET['id_delete']))
    {
        $member = new Member($db_host, $db_user, $db_pass, $db_name);
        $member->open(); $member->deleteData(); $member->close();
        
        header("location:index.php");
    }

?>