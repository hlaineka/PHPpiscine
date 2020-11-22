<?PHP

require_once 'Color.class.php';
require_once 'Vertex.class.php';

class Vector{
	private $_x = 0.0;
	private $_y = 0.0;
	private $_z = 0.0;
	private $_w = 0.0;
	public static $verbose = FALSE;

	public static function doc(){
		$myfile = fopen("Vector.doc.txt", "r") or die("Unable to open file!");
		$docstring = fread($myfile,filesize("Vector.doc.txt"));
		fclose($myfile);
		return $docstring;
	}

	public function __construct(array $kwargs){
		if (!array_key_exists('dest', $kwargs))
			return NULL;
		$this->_x = $kwargs['dest']->get_x();
		$this->_y = $kwargs['dest']->get_y();
		$this->_z = ($kwargs['dest']->get_z);
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

	public function get_y() {
		return($this->_y);
	}

	public function get_z() {
		return($this->_z);
	}

	public function get_w() {
		return($this->_w);
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