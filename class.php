<?php 
echo "<br>******* PUBLIC & STATIC ************<br>";

class demo
{
	public $a = 10;
	static $b = 20;
	function get()
	{
		echo $this->a;
		echo demo::$b;
	}
}
	
$o = new demo;
$o->get();

echo "<br>******* CONSTRACTOR **************<br>";
class cons
{
	function __construct() {
    	echo "const ";
  	}
  	function __destruct() {
  		echo "<br>dest";
  	}
}

$o = new cons;

echo "<br>******* INHERITENS **************<br>";
class first 
{
	public $c;
	function A()
	{
	 	echo "C =".$this->c=10;
	}
}
class second extends first
{
	public $d,$ans;
	
		function B()
		{
			echo "D = ".$this->b=20;
		}
		function sum()
		{
			echo "sum = ".$this->c+$this->d;
		}	
}
$obj = new second;
$obj->A();
$obj->B();
$obj->sum();

?>