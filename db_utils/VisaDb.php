<?php
	class VisaDb {
		private $db = NULL;
		private $custom_db = NULL;
		private $host = NULL;
		private $user = NULL;
		private $passwd = NULL;
		
		public function set_custom_db($h, $u, $p, $db)
		{
			$this->custom_db = $db;
			$this->host = $h;
			$this->user = $u;
			$this->passwd = $p;
		}
		
		public function init_db() {
			if (is_null($this->custom_db)) {
				global $wpdb;
				$this->db = $wpdb;
			} else {
				// Connect to Custom DB
				$this->db = mysqli_connect("$this->host","$this->user","$this->passwd","$this->custom_db");
			}
		}
		
		public function get_db() {
			if (is_null($this->db)) {
				echo "Error: Database not initialized";
			}
			return $this->db;
		}
	}

?>