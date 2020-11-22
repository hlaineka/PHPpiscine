<?PHP 
class Jaime extends Lannister {
	public function partner($person) {
		if (get_class($person) === 'Sansa')
			return "Let's do this.";
		if (get_class($person) === 'Cersei')
			return "With pleasure, but only in a tower in Winterfell, then.";
		else
			return "Not even if I'm drunk !";
	}
}
?>