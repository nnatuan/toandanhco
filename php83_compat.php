<?php
/*
|---------------------------------------------------------------
| PHP 8.3 COMPATIBILITY LAYER
|---------------------------------------------------------------
| Re-implements functions removed in PHP 7/8 that legacy
| CodeIgniter / third-party libraries still call. Loaded from index.php.
*/

// Thiết lập múi giờ mặc định để tránh PHP Warning timezone trên PHP 8.x
if ( ! ini_get('date.timezone'))
{
	date_default_timezone_set('Asia/Ho_Chi_Minh');
	ini_set('date.timezone', 'Asia/Ho_Chi_Minh');
}

if (function_exists('mysqli_report'))
{
	mysqli_report(MYSQLI_REPORT_OFF);
}

if ( ! function_exists('each'))
{
	function each(&$array)
	{
		if ( ! is_array($array)) return FALSE;
		$key = key($array);
		if ($key === NULL) return FALSE;
		$value = current($array);
		next($array);
		return array(1 => $value, 'value' => $value, 0 => $key, 'key' => $key);
	}
}

if ( ! function_exists('_php83_posix_to_pcre'))
{
	function _php83_posix_to_pcre($pattern, $flags = '')
	{
		return '/'.str_replace('/', '\/', (string) $pattern).'/'.$flags;
	}
}

if ( ! function_exists('ereg'))
{
	function ereg($pattern, $string, &$regs = NULL)
	{
		$r = preg_match(_php83_posix_to_pcre($pattern), (string) $string, $regs);
		return $r ? (isset($regs[0]) && strlen($regs[0]) ? strlen($regs[0]) : 1) : FALSE;
	}
}

if ( ! function_exists('eregi'))
{
	function eregi($pattern, $string, &$regs = NULL)
	{
		$r = preg_match(_php83_posix_to_pcre($pattern, 'i'), (string) $string, $regs);
		return $r ? (isset($regs[0]) && strlen($regs[0]) ? strlen($regs[0]) : 1) : FALSE;
	}
}

if ( ! function_exists('ereg_replace'))
{
	function ereg_replace($pattern, $replacement, $string)
	{
		$replacement = preg_replace('/\\\\(\d)/', '\$$1', (string) $replacement);
		return preg_replace(_php83_posix_to_pcre($pattern), $replacement, (string) $string);
	}
}

if ( ! function_exists('eregi_replace'))
{
	function eregi_replace($pattern, $replacement, $string)
	{
		$replacement = preg_replace('/\\\\(\d)/', '\$$1', (string) $replacement);
		return preg_replace(_php83_posix_to_pcre($pattern, 'i'), $replacement, (string) $string);
	}
}

if ( ! function_exists('split'))
{
	function split($pattern, $string, $limit = -1)
	{
		return preg_split(_php83_posix_to_pcre($pattern), (string) $string, $limit);
	}
}

if ( ! function_exists('spliti'))
{
	function spliti($pattern, $string, $limit = -1)
	{
		return preg_split(_php83_posix_to_pcre($pattern, 'i'), (string) $string, $limit);
	}
}

if ( ! function_exists('get_magic_quotes_gpc'))
{
	function get_magic_quotes_gpc() { return FALSE; }
}

if ( ! function_exists('get_magic_quotes_runtime'))
{
	function get_magic_quotes_runtime() { return FALSE; }
}

if ( ! function_exists('set_magic_quotes_runtime'))
{
	function set_magic_quotes_runtime($new_setting) { return FALSE; }
}

if ( ! function_exists('mysql_escape_string'))
{
	function mysql_escape_string($str)
	{
		return addcslashes((string) $str, "\\\0\n\r'\"\x1a");
	}
}

if ( ! function_exists('mysql_real_escape_string'))
{
	function mysql_real_escape_string($str, $link = NULL)
	{
		return addcslashes((string) $str, "\\\0\n\r'\"\x1a");
	}
}

if ( ! function_exists('utf8_encode'))
{
	function utf8_encode($string)
	{
		return mb_convert_encoding((string) $string, 'UTF-8', 'ISO-8859-1');
	}
}

if ( ! function_exists('utf8_decode'))
{
	function utf8_decode($string)
	{
		return mb_convert_encoding((string) $string, 'ISO-8859-1', 'UTF-8');
	}
}

// Ensure Model alias exists if CI_Model is defined
if ( ! class_exists('Model', FALSE) && class_exists('CI_Model', FALSE))
{
	#[\AllowDynamicProperties]
	class Model extends CI_Model
	{
		public function __construct() { parent::__construct(); }
		public function Model() { $this->__construct(); }
	}
}

// Autoload CI_Model alias if Model is defined
spl_autoload_register(function ($class) {
	if ($class === 'CI_Model' && class_exists('Model', FALSE) && ! class_exists('CI_Model', FALSE))
	{
		#[\AllowDynamicProperties]
		class CI_Model extends Model {}
	}
});

