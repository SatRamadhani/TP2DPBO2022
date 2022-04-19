<?php

    class Division extends DB
    {
        function getDivision()
        {
            $query = "SELECT * FROM divisi";
            return $this->execute($query);
        }

        function getTableDivision()
        {
            $query = "SELECT divisi.id_divisi, divisi.nama_divisi,
                      (SELECT COUNT(bidang_divisi.id_bidang)
                      FROM bidang_divisi WHERE divisi.id_divisi = bidang_divisi.id_divisi)
                      AS total_divisi FROM divisi";
            return $this->execute($query);
        }

        function addDivision()
        {
            $name = $_POST['name'];
            
            $query = "INSERT INTO divisi (nama_divisi) VALUES ('$name')";
            return $this->execute($query);
        }

        function deleteDivision()
        {
            $id = $_GET['id_delete'];
            
            $query = "DELETE FROM divisi WHERE id_divisi = '$id'";
            return $this->execute($query);
        }
    }

?>