<?php


class Mahasiswa_model {
	
	private $table = 'mahasiswa';
	private $db;

	public function __construct()
	{
		$this->db = new Database;
	}

	public function getAllMahasiswa()
	{
		$this->db->query('SELECT * FROM mahasiswa');
		return $this->db->resultSet();
	}

	public function tambahDataMahasiswa($data)
	{
		$query = "INSERT INTO mahasiswa
		VALUES 
		('', :nama, :nrp, :email, :jurusan)";


		$this->db->query($query);
		$this->db->bind('nama' , $data['nama']);
		$this->db->bind('nrp' , $data['nrp']);
		$this->db->bind('email' , $data['email']);
		$this->db->bind('jurusan' , $data['jurusan']);

		$this->db->execute();

		return $this->db->rowCount();

	}

	public function hapusDataMahasiswa($id)
	{
		$query = "DELETE FROM mahasiswa WHERE id = :id";
		$this->db->query($query);
		$this->db->bind('id', $id);

		$this->db->execute();

		return $this->db->rowCount();
	}

	public function getDataUbah($id)
	{
		$sql = "SELECT * FROM mahasiswa WHERE id = '".$id."' ";
		// var_dump($sql);die;
		$this->db->query($sql);
		// $this->db->bind('id', $id);
		return $this->db->single();
	}

	public function ubahDataMahasiswa($data)
	{
		$query = "UPDATE mahasiswa SET
					nama = :nama,
					nrp = :nrp,
					email = :email,
					jurusan = :jurusan
				WHERE id = :id";


		$this->db->query($query);
		$this->db->bind('nama' , $data['nama']);
		$this->db->bind('nrp' , $data['nrp']);
		$this->db->bind('email' , $data['email']);
		$this->db->bind('jurusan' , $data['jurusan']);
		$this->db->bind('id' , $data['id']);

		$this->db->execute();

		return $this->db->rowCount();

	}

}