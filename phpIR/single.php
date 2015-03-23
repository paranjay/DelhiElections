<?php
require 'Opinion.php';
$op = new Opinion();
$op->addToIndex('rt-polarity.neg', 'neg');
$op->addToIndex('rt-polarity.pos', 'pos');
$string = "Avatar had a surprisingly decent plot, and genuinely incredible special effects";
echo "Classifying '$string' - " . $op->classify($string) . "\n";
$string = "Twilight was an atrocious movie, filled with stumbling, awful dialogue, and ridiculous story telling.";
echo "Classifying '$string' - " . $op->classify($string) . "<br />";
$string = "AAP is ok";
echo "Classifying '$string' - " . $op->classify($string) . "<br />";

?>