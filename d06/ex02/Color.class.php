<?PHP

class Color{
	public $red;
	public $green;
	public $blue;
	public static $verbose = FALSE;

	public static function doc(){
		$myfile = fopen("Color.doc.txt", "r") or die("Unable to open file!");
		$docstring = fread($myfile,filesize("Color.doc.txt"));
		fclose($myfile);
		return $docstring;
	}

	public function __construct(array $kwargs){
		if (array_key_exists('rgb', $kwargs)){
			$this->red = (intval($kwargs['rgb'])>>16)&255;
			$this->green = (intval($kwargs['rgb'])>>8)&255;
			$this->blue = (intval($kwargs['rgb']))&255;
		}
		else {
			$this->red = intval($kwargs['red']);
			$this->green = intval($kwargs['green']);
			$this->blue = intval($kwargs['blue']);
		}
		if (self::$verbose) {
			echo $this->__toString();
			echo " constructed.\n";
		}
	}

	public function add( Color $color) {
		$new_red = $this->red + $color->red;
		$new_green = $this->green + $color->green;
		$new_blue = $this->blue + $color->blue;
		$instance = new Color(array('red' => $new_red, 'green' => $new_green, 'blue' => $new_blue));
		return ($instance);
	}

	public function sub( Color $color) {
		$new_red = $this->red - $color->red;
		$new_green = $this->green - $color->green;
		$new_blue = $this->blue - $color->blue;
		$instance = new Color(array('red' => $new_red, 'green' => $new_green, 'blue' => $new_blue));
		return ($instance);
	}

	public function mult( $nbr ) {
		$new_red = $this->red * $nbr;
		$new_green = $this->green * $nbr;
		$new_blue = $this->blue * $nbr;
		$instance = new Color(array('red' => $new_red, 'green' => $new_green, 'blue' => $new_blue));
		return ($instance);
	}

	public function __toString() {
		$redstr = str_pad($this->red, 3, ' ', STR_PAD_LEFT);
		$greenstr = str_pad($this->green, 3, ' ', STR_PAD_LEFT);
		$bluestr = str_pad($this->blue, 3, ' ', STR_PAD_LEFT);
		$str = "Color( red: "  . $redstr . ", green: " . $greenstr . ", blue: "  . $bluestr . " )";
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