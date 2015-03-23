<?php
require 'Opinion.php';
$op = new Opinion();
$op->addToIndex('rt-polarity.neg', 'neg', 5000);
$op->addToIndex('rt-polarity.pos', 'pos', 5000);
$i = 0; $t = 0; $f = 0;
$fh = fopen('rt-polarity.neg', 'r');
while($line = fgets($fh)) {
        if($i++ > 5001) {
                if($op->classify($line) == 'neg') {
                        $t++;
                } else {
                        $f++;
                }
        }
}
echo "Accuracy: " . ($t / ($t+$f));
?>