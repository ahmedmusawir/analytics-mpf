<?php 

/**
* PLUGIN ACTIVATION CLASS
*/
class Analytics_MPF_Activate
{
	function __construct()
	{
		# code...
	}

	public static function activate() {

		flush_rewrite_rules();
	}
}
