<?php 

$var1 = 10;
$var2 = 10;

echo "pre_increment: " . ++$var1; //--$var1;
echo "<br>";
echo "pre_increment: " . ++$var1; //--$var1;
echo "<br>";
echo "before_post_increment: " . $var2++;
echo "<br>";
echo "after_post_increment: " . $var2++;//$var1--;
echo "<br>";
echo "after_post_increment: " . $var2;

?>