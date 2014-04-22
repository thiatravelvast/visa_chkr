<?php
	class CountryMap {
		
		public function get_map($c) {
			$m = $c;
			if (is_schengen($c)) {
				$m = 'Schengen';
			}
			return $c;
		}

		public function is_schengen($c) {
			return in_array($c, $this->Schengen);
		}
		public function is_EU() {

		}
		public function is_EEA() {

		}

		public function is_schengen_plus($c) {
			return in_array($c, $this->Schengen_plus) || is_schengen($c);
		}

		private $Schengen = array(
				'Austria',
				'Belgium',
				'Czech Republic',
				'Denmark',
				'Estonia',	
				'Finland',	
				'France',
				'Germany',
				'Greece',
				'Hungary',
				'Iceland',
				'Italy',
				'Latvia',
				'Liechtenstein',
				'Lithuania',
				'Luxembourg',
				'Malta',
				'Netherlands',
				'Norway',
				'Poland',
				'Portugal',
				'Slovakia',
				'Slovenia',
				'Spain',
				'Sweden',
				'Switzerland'
			);

		private $Schengen_plus = array (
				'Andorra',
				'Monaco',
				'San Marino',
				'Holy See'
			);

	}

?>