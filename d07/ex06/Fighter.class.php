<?PHP 
abstract class Fighter {
	abstract public function fight($target);
	private static $soldiers;

	public function __construct($name) {
		$type = get_called_class();
		self::$soldiers[$type] = $name;
	}

	public function getSoldierName($type){
		return (self::$soldiers[$type]);
	}
}
?>