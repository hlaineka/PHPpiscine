<?PHP 
class Tyrion extends Lannister {
	public function partner($person) {
		if (get_class($person) === 'Sansa')
			return "Let's do this.";
		else
			return  "Not even if I'm drunk !";
	}
}
?>