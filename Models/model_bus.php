<?php 
	class Bus {
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
			$sql = "SELECT * FROM tbl_bus";
			if($id != null){
				$sql .= " WHERE id_bus = '$id'";
			}
			$query = $this->connection->query($sql);
			return $query;
		}

		public function insert($req){
			$id  	 = (int)$req[0];
			$mainSql = "INSERT INTO tbl_bus VALUES (null, '$req[1]','$req[2]', '$req[3]', '$req[4]', '$req[5]', '$req[6]')";
			
			$sqlCount = "SELECT * FROM tbl_bus where id_bus = '$req[0]'";
			$count = $this->connection->query($sqlCount);
			if($count->num_rows >= 1){
				$sqlUpdate = "UPDATE tbl_bus SET nama_bus = '$req[1]', waktu_brngkt = '$req[2]', status = '$req[3]', dari = '$req[4]', ke = '$req[5]', ongkos = '$req[6]' where id_bus = '$id'";
				$this->connection->query($sqlUpdate);
				return array("sukses" => "ok", "type" => "update");
			}
			$insert = $this->connection->query($mainSql);
			$lastId = $this->connection->query("SELECT id_bus FROM tbl_bus ORDER BY id_bus DESC LIMIT 1");
			return array("sukses" => "ok", "type" => "insert", "id" => $lastId->fetch_object()->id_bus);
		}

		public function delete($req){
			$id = (int)$req[0];
			$sql = "DELETE FROM tbl_bus WHERE id_bus = '$id'";
			$this->connection->query($sql);
			return array("sukses" => "ok");
		}





	}
?>