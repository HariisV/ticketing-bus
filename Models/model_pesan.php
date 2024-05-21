<?php 
	class Pesan {
		# Defenisi variabel untuk koneksi mysql 👋👋
		protected $server 	= "localhost";
		protected $user   	= "root";
		protected $pass   	= "root2";
		protected $database = "pemesanan_tiket";
		public $connection  = "";
		
		# 👇 construct dipanggil pertama kali dalam sebuah class 
		public function __construct()
		{
			# ✅ INISIALISASI KONEKSI DENGAN MYSQL - #
			$this->connection = new mysqli($this->server,$this->user,$this->pass,$this->database);
		}
		public function getWaktuBerangkat($req){
			$sql = "SELECT * FROM tbl_bus WHERE id_bus = '$req'";
			$query = $this->connection->query($sql);
			return array("sukses" => "ok", "type" => "get", "data" => $query->fetch_object());
		}

		public function select($id = null){
			$sql = "SELECT * FROM tbl_transaksi";
			if($id != null){
				$sql .= " WHERE id_transaksi = '$id'";
			}
			$query = $this->connection->query($sql);
			return $query;
		}

		public function insert($req){		
			session_start();
			$email   =  $_SESSION['email'];
			$mainSql = "INSERT INTO tbl_transaksi VALUES (NULL, '$req[0]','$req[1]', '$req[2]', '$req[3]', '$req[4]', '$req[5]', '$email')";
			$insert = $this->connection->query($mainSql);
			return array("sukses" => "ok", "type" => "insert", "raw" => $mainSql);
		}

		public function delete($req){
			$id = (int)$req[0];
			$sql = "DELETE FROM tbl_transaksi WHERE id_transaksi = '$id'";
			$this->connection->query($sql);
			return array("sukses" => "ok");
		}





	}
?>