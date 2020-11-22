<?PHP 
	class NightsWatch {
		private $_fighters = array();

		public function recruit($person){
			if ($person instanceof IFighter) {
				array_push($this->_fighters, $person);
			}
		}
		public function fight() {
			foreach ($this->_fighters as $fighter) {
				$fighter->fight();
			}
		}
	}
?>