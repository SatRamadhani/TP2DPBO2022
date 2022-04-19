<?php

    /* Saya [Muhammad Satria Ramadhani - 2005128] mengerjakan evaluasi [Tugas
    Praktikum 02] dalam mata kuliah [Desain dan Pemrograman Berorientasi Objek]
    untuk keberkahan-Nya, maka saya tidak melakukan kecurangan seperti yang
    telah dispesifikasikan. Aamiin. */

    include("php/conf.php");
    include("php/DB.class.php");
    include("php/DField.class.php");
    include("php/Division.class.php");
    include("php/Member.class.php");
    include("php/Template.class.php");

    $member = new Member($db_host, $db_user, $db_pass, $db_name);
    $member->open();
    $member->getMember();

    $dataMember = null;
    $dataMember .= "<h2 class = 'text-center my-4'>Daftar Pengurus</h2>";

    $counter = 0;
    while(list($nim, $nama, $semester, $id_divisi, $divisi, $jabatan) = $member->getResult())
    {
        if(($counter == 0) || ($counter % 3 == 0))
        {
            $dataMember .= "<section class = 'container my-4 p-3 d-flex flex-column flex-lg-row justify-content-around'>";
        }

        if($id_divisi == 1)
        {
            $dataMember .=  "<a href = 'detail.php?id=" . "{$nim}" . "' class = 'text-decoration-none'>" . 
                            "<div class = 'card bg-dark-custom p-3' style = 'width: 18rem;'>" .
                            "<div class = 'd-flex flex-column justify-content-center align-items-center'>" .
                            "<img src = 'assets/img/default.png' class = 'img img-fluid' width = '200' />" .
                            "<div class = 'card-body'>" .
                            "<h4 class = 'card-title text-center'>" . "{$nama}" . "</h5>" .
                            "<p class = 'card-text text-center text-white'>" . "{$jabatan}" . "</p>" .
                            "</div>" . "</div>" . "</div>" . "</a>";
        }
        else
        {
            $dataMember .=  "<a href = 'detail.php?id=" . "{$nim}" . "' class = 'text-decoration-none'>" . 
                            "<div class = 'card bg-dark-custom p-3' style = 'width: 18rem;'>" .
                            "<div class = 'd-flex flex-column justify-content-center align-items-center'>" .
                            "<img src = 'assets/img/default.png' class = 'img img-fluid' width = '200' />" .
                            "<div class = 'card-body'>" .
                            "<h4 class = 'card-title text-center'>" . "{$nama}" . "</h5>" .
                            "<p class = 'card-text text-center text-white'>Staf " . "{$jabatan}" . "</p>" .
                            "</div>" . "</div>" . "</div>" . "</a>";
        }

        $counter++;
        if($counter % 3 == 0)
        {
            $dataMember .= "</section>";
        }
    }

    $emptyCol = false;
    if(($counter % 3 != 0))
    {
        $emptyCol = true;
        $dataMember .= "</section>";
    }

    $member->close();


    $view = new Template("html/member.html");
    $view->replace("DATA_PENGURUS", $dataMember);
    $view->write();
?>