<?php 
	class Tiket {
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

		public function select($id = null){
			session_start();
			$email = $_SESSION['email'];
			$sql = "SELECT * FROM tbl_transaksi INNER JOIN tbl_bus ON tbl_transaksi.id_bus = tbl_bus.id_bus WHERE email = '$email'";
			$query = $this->connection->query($sql);
			return $query;
		}
	
		public function delete($req){
			$id = substr($req,1);
			$sql = "DELETE FROM tbl_transaksi WHERE id_transaksi = '$id'";
			$this->connection->query($sql);
			return array("status" => "ok");
		}
	}
?>