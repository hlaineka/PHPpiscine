<?PHP 
class UnholyFactory {
	private static $_fighters = array(); 

	public function __construct() {
		return;
	}
	public function absorb($fighter){
		if (get_parent_class($fighter) !== 'Fighter') {
			print("(Factory can't absorb this, it's not a fighter)" . PHP_EOL);
			return;
		}
		if (array_key_exists(Fighter::getSoldierName(get_class($fighter)), self::$_fighters)) {
			print("(Factory already absorbed a fighter of type " . Fighter::getSoldierName(get_class($fighter)) . ')' . PHP_EOL);
			return;
		}
		self::$_fighters[Fighter::getSoldierName(get_class($fighter))] = $fighter;
		print("(Factory absorbed a fighter of type " . Fighter::getSoldierName(get_class($fighter)) . ')' . PHP_EOL);
	}

	public function fabricate($rf) {
		if (!(array_key_exists($rf, self::$_fighters))) {
			print ("(Factory hasn't absorbed any fighter of type " . $rf . ")" . PHP_EOL);
			return FALSE;
		}
		print ("(Factory fabricates a fighter of type " . $rf . ")" . PHP_EOL);
		return (clone(self::$_fighters[$rf]));
	}
}
?>