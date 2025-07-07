<?php
$names = array("Jack", "Jones", "Martha", "Jony", "Glen");
if (isset($_POST['suggestion'])) {
    $suggestion = ucfirst($_POST['suggestion']);
    echo    "<p>From php : $suggestion</p>";
    if (!empty($suggestion)) {
        foreach ($names as $n) {
            if (strpos($n, $suggestion) !== false) {
                echo $n;
                echo "<br />";
            }
        }
    }
}
