<?php

    class DField extends DB
    {
        function getDField()
        {
            $query = "SELECT * FROM bidang_divisi";
            return $this->execute($query);
        }

        function getTableDField()
        {
            $query = "SELECT bidang_divisi.id_bidang, divisi.nama_divisi, bidang_divisi.jabatan,
                      (SELECT COUNT(pengurus.nim) FROM pengurus
                      WHERE bidang_divisi.id_bidang = pengurus.id_bidang)
                      AS total_pengurus FROM bidang_divisi INNER JOIN divisi ON
                      divisi.id_divisi = bidang_divisi.id_divisi";
            return $this->execute($query);
        }

        function addDField()
        {
            $name = $_POST['name'];
            $division = $_POST['division'];

            $query = "INSERT INTO bidang_divisi (jabatan, id_divisi) VALUES ('$name', '$division')";
            return $this->execute($query);
        }

        function deleteDField()
        {
            $id = $_GET['id_delete'];
            
            $query = "DELETE FROM bidang_divisi WHERE id_bidang = '$id'";
            return $this->execute($query);
        }
    }

?>