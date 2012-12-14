<?php
namespace config;

class Config
{
	protected static $_data = array();

	public static function hello(){ print 'hello'; }

	/**
	**Bind a key with value
	**@params: mixed
	**/
	public static function setValue($key, $value, $extra = false)
	{
		if($extra == false)
		{
			static::$_data[$key] = $value;
		}else{
			static::$_data['key']['extra'] = $value;
		}
	}
	/**
	**Get Value for specific key
	**@params: mixed
	**/
	public static function getValue($key, $extra = false){
		if ($extra == false) {
			return static::$_data[$key];
		}else{
			return static::$_data[$key][$extra];
		}
	}
}