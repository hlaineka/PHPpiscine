<?PHP

require_once 'Color.class.php';

class Vertex{
	private $_x = 0.0;
	private $_y = 0.0;
	private $_z = 0.0;
	private $_w = 1.0;
	private $color;
	public static $verbose = FALSE;

	public static function doc(){
		$myfile = fopen("Vertex.doc.txt", "r") or die("Unable to open file!");
		$docstring = fread($myfile,filesize("Vertex.doc.txt"));
		fclose($myfile);
		return $docstring;
	}

	public function __construct(array $kwargs){
		if (!array_key_exists('x', $kwargs) || !array_key_exists('y', $kwargs) || !array_key_exists('z', $kwargs))
			return NULL;
		$this->set_x($kwargs['x']);
		$this->set_y($kwargs['y']);
		$this->set_z($kwargs['z']);
		if (array_key_exists('w', $kwargs))
			$this->set_w($kwargs['w']);
		else
			$this->set_w(1.0);
		if (array_key_exists('color', $kwargs))
			$this->set_color($kwargs['color']);
		else
			$this->color = new Color(array('red' => 255, 'green' => 255, 'blue' => 255));
		if (self::$verbose) {
			echo $this->__toString();
			echo " constructed.\n";
		}
	}

	public function get_x() {
		return($this->_x);
	}
	public function set_x($new_x) {
		$this->_x = doubleval($new_x);
		return;
	}
	public function get_y() {
		return($this->_y);
	}
	public function set_y($new_y) {
		$this->_y = doubleval($new_y);
		return;
	}
	public function get_z() {
		return($this->_z);
	}
	public function set_z($new_z) {
		$this->_z = doubleval($new_z);
		return;
	}
	public function get_w() {
		return($this->_w);
	}
	public function set_w($new_w) {
		$this->_w = doubleval($new_w);
		return;
	}
	public function get_color() {
		return($this->_color);
	}
	public function set_color($new_color) {
		$this->color = $new_color;
		return;
	}

	public function __toString() {
		if (self::$verbose)
			$color_str = (string)$this->color;
		else
			$color_str = '';
		$str = 'Vertex( x: ' . number_format($this->get_x(), 2) . ", y: " . number_format($this->get_y(), 2). ", z: " . number_format($this->get_z(), 2) . ", w: " . number_format($this->get_w(), 2) . " " . $color_str . ")";
		return ($str);
	}

	public function __destruct () {
		if (self::$verbose) {
			echo $this->__toString();
			echo " destructed.\n";
		}
	}

}
?>