<?php
$jumlah = 5;

for ($a = 1; $a <= $jumlah + 4; $a += 2) {
     for ($b = $jumlah; $b >= $a; $b--) {
          print('&nbsp');
     }
     for ($c = 1; $c <= $a; $c++) {
          echo '*';
     }
     echo "<br/>";
}
