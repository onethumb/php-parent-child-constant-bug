<?php
abstract class Foo {
  const TABLE = "foo";

  public $table = self::TABLE;

  protected static $array = [];

  public function __construct() {
    $props = static::getArray();
  }

  protected static function getArray() {
    $class = get_called_class();
    $props = $class::$array;
    $parent = get_parent_class($class);
    if(false !== $parent) {
        $parentProps = $parent::getArray();
    }
    return [];
  }
  
  public static function add() {
    $obj = new static();
    print_r($obj);
  }
}
