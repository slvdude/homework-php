<?php
 function line($a, $b){
     if ((is_numeric($a)) &&(is_numeric($b))){
         return[-$b / $a];
     }
     return[];
 }

function square($a, $b, $c){
    if ((is_numeric($a)) && (is_numeric($b)) && (is_numeric($c))){
        if ($a == 0){
            return line($b, $c);
        }
        $d = $b*$b - 4*$a*$c;
        if($d >=0){
            return[(-$b + sqrt($d))/(2*$a), (-$b - sqrt($d))/(2*$a)];
        }   
    }
    return[];
}

function Sgn($U){
    return $U >= 0 ? True : False;
}

function cube($a,$b,$c,$d){
    if (is_numeric($a) && is_numeric($b) && is_numeric($c) && is_numeric($d)){
        if (($a == 0) && ($b == 0)){
            return line($c, $d);
        }
        if ($a == 0){
            return square($b, $c, $d);
        }
    $Q =( $a * $a - 3 * $b ) / 9;
    $R = (2 * pow($a, 3) - 9 * $a * $b + 27 * $c) / 54;
    $S = pow($Q, 3) - pow($R, 2);
    $i = sqrt(-1);
    if($S > 0){
        $p = 1/3 * acos($R / sqrt(pow($Q, 3)));
        $x1 = -2 * sqrt($Q) * cos($p) - ($a / 3);
        $x2 = -2 * sqrt($Q) * cos($p + 2 * pi() / 3 ) - ($a / 3);
        $x2 = -2 * sqrt($Q) * cos($p - 2 * pi() / 3 ) - ($a / 3);
        return[$x1, $x2, $x3];
    }
    if ($S < 0){
        if($Q > 0){
            $p =1 / 3 * acosh(abs($R / sqrt(pow($Q, 3))));
            $x1 = -2 * Sgn($R) * sqrt($Q) * cosh($p) - ($a / 3);
            $x2 =  Sgn($R) * sqrt($Q) * cosh($p) - ($a / 3) + $i * sqrt(3) * sqrt($Q) * sinh($p);
            $x3 =  Sgn($R) * sqrt($Q) * cosh($p) - ($a / 3) - $i * sqrt(3) * sqrt($Q) * sinh($p);
            return[$x1, $x2, $x3];
        }
        if($Q < 0){
            $p = 1/3 * asinh(abs($R) / pow(abs($Q), 3/2));
            $x1 = -2 * Sgn($R) * sqrt(abs($Q)) * sinh($p) - ($a / 3);
            $x2 = Sgn($R) * sqrt(abs($Q)) * sinh($p) - ($a / 3) + $i * sqrt(3) * sqrt($Q) * cosh($p);
            $x3 = Sgn($R) * sqrt(abs($Q)) * sinh($p) - ($a / 3) - $i * sqrt(3) * sqrt($Q) * cosh($p);
            return[$x1, $x2, $x3];
        }
        if($Q == 0){
            $X1 = -1 * pow($c - pow($a, 3) / 27, 1/3) - $a /3;
            $X2 = -1 * ($a + $x1) / 2 + ($i / 2) * sqrt(abs(($a - 3 * $x1) * ($a + $x1) - 4 * $b));
            $X3 = -1 * ($a + $x1) / 2 - ($i / 2) * sqrt(abs(($a - 3 * $x1) * ($a + $x1) - 4 * $b));
            return[$x1, $x2, $x3];
        }
    }
    if($S == 0){
        $x1 = -2 * Sgn($R) * sqrt($Q) - $a / 3;
        $x2 = Sgn($R) * sqrt($Q) - $a / 3;
        return[$x1, $x2];
    }
  }
  return[];
}
