<?php
namespace MyNamespace;
class MyClass
{
    public function getNamespace(){
        return __NAMESPACE__;
    }
}
echo "Line number " . __LINE__ . "<br>"; // Displays: Line number 2
echo "Line number " . __LINE__ . "<br>"; // Displays: Line number 3
echo "Line number " . __LINE__ . "<br>"; // Displays: Line number 4
echo "The full path of this file is: " . __FILE__;

$obj = new MyClass();
echo $obj->getNamespace(); 
?>
