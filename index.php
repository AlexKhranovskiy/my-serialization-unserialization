<?php

class Accessor
{
    private $arr = [];

    public function __get($key)
    {
        if(array_key_exists($key, $this->arr)) {
            return $this->arr[$key];
        } else {
            return null;
        }
    }

    public function __set($key, $value)
    {
        $this->arr[$key] = $value;
    }

    // public function __unset($key)
    // {
    //     unset($this->arr[$key]);
    // }

    public function __sleep()
    {
        return $this->arr;
    }

    public function __wakeup()
    {
        $this->__set('name', 'Hello world! <br />');
    }
}

$obj = new Accessor();
// $obj->name = 'Hello world!<br />';
// echo $obj->name;

file_put_contents(__DIR__ . '\data.txt', serialize($obj));
$obj1 = unserialize(file_get_contents(__DIR__ . '\data.txt'));
echo $obj1->name;

//unset($obj->name);

// echo '<pre>';
// var_dump($obj);
// echo '</pre>';
?>


