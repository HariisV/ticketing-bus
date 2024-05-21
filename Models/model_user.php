<?php 
	class User {
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
		public function auth($req){
			$email 	 = str_replace("%40","@",substr($req[0],6));
			$pswd 	 = substr($req[1],9);
			$sqlAuth = "SELECT * FROM tbl_user where email = '$email' AND password = '$pswd'";
			$auth    = $this->connection->query($sqlAuth);
			if($auth->num_rows >= 1){
				session_start();
				$_SESSION["email"] = $auth->fetch_assoc()['email'];
				header('Location: ../../Views/Master/index.php');
			}
			return array("status" => "not ok");
		}
		
		public function logout(){
			session_start();
			session_destroy();
			header('Location: ../../Views/Auth/signin.php');
		}

		public function select($id = null){
			$sql = "SELECT * FROM tbl_user";
			if($id != null){
				$sql .= " WHERE id_user = '$id'";
			}
			$query = $this->connection->query($sql);
			return $query;
		}

		public function insert($req){
			$req 	 = explode("&" , $req);
			$nama 	 = substr($req[0],5);
			$email 	 = str_replace("%40","@",substr($req[1],6));
			$pswd 	 = substr($req[2],9);
			$id  	 = (int)$req[0];
			$mainSql = "INSERT INTO tbl_user VALUES (NULL, '$nama','$email', '$pswd', 'Member')";
			$insert = $this->connection->query($mainSql);
			header('Location: ../../Views/Auth/signin.php');
		}

		public function delete($req){
			$id = (int)$req[0];
			$sql = "DELETE FROM tbl_user WHERE id_user = '$id'";
			$this->connection->query($sql);
			return array("sukses" => "ok");
		}





	}
?>