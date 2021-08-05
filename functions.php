<?php 

function formatPrice(float $vlprice){

	return number_format($vlprice, 2, ",", ".");

}

function post($key)
{
	return str_replace("'", "", $_POST[$key]);
}
function get($key)
{
	return str_replace("'", "", $_GET[$key]);
}

 ?>