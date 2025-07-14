<?php
$names = array("Jack", "Jones", "Martha", "Jony", "Glen","Anna","Brittany","Cinderella","Diana","Eva","Fiona","Gunda","Hege","Inga","Johanna","Kitty",
"Linda","Nina","Ophelia","Petunia","Amanda","Raquel","Cindy","Doris","Eve","Evita","Sunniva"
,"Tove","Unni","Violet","Liza","Elizabeth","Ellen","Wenche","Vicky");
if (isset($_POST['suggestion'])) {
$suggestion = strtoupper($_POST['suggestion']);
if (!empty($suggestion)) {
foreach ($names as $n) {
if (strpos($n, $suggestion) !== false) {
echo $n;
echo "<br />";
}
}
}
}
?>