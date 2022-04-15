<?php

class Pilihan_model
{
    private $table = 'pilihan';
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function getAllPilihan()
    {
        $this->db->query('SELECT nama, nrp, count(*) as jumlah FROM pilihan GROUP BY nrp');
        return $this->db->resultSet();
    }

    public function getPilihanById($id)
    {
        $this->db->query('SELECT * FROM ' . $this->table . ' WHERE nrp=:nrp');
        $this->db->bind('nrp', $id);
        return $this->db->resultSet();
    }

    public function tambahDataPilihan($data)
    {
        $query = "INSERT INTO pilihan
                    VALUES
                  (null, :nrp, :nama, :matakuliah)";

        $this->db->query($query);
        $this->db->bind('nrp', $data['nrp']);
        $this->db->bind('nama', $data['nama']);
        $this->db->bind('matakuliah', $data['matakuliah']);

        $this->db->execute();

        return $this->db->rowCount();
    }

    public function cariDataPilihan()
    {
        $keyword = $_POST['keyword'];
        $query = "SELECT * FROM pilihan WHERE nama LIKE :keyword";
        $this->db->query($query);
        $this->db->bind('keyword', "%$keyword%");
        return $this->db->resultSet();
    }
}
