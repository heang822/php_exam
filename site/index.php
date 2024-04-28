<?php
 
// The program converts the argument to English phrases
class programconverts {
    public function toText($amt) {
        if (is_numeric($amt)) {
            echo  $amt. " = ";
            $sign = $amt > 0 ? '' : 'Negative ';
            return $sign . $this->toQuadrillions(abs ($amt));
        } else {
            throw new Exception('Invalid condition');
        }
    }
 
    private function toOnes($amt) {// handles 0 - 10
        $words = array(
            0 => 'Zero',
            1 => 'One',
            2 => 'Two',
            3 => 'Three',
            4 => 'Four',
            5 => 'Five',
            6 => 'Six',
            7 => 'Seven',
            8 => 'Eight',
            9 => 'Nine'
        );
 
        if ($amt >= 0 && $amt < 10)
            return $words[$amt];
        else
            throw new ArrayIndexOutOfBoundsException('Array Index not defined');
    }
 
    private function toTens($amt) { // handles 10 - 99
        $firstDigit = intval($amt / 10);
        $remainder = $amt % 10;
 
        if ($firstDigit == 1) {
            $words = array(
                0 => 'Ten',
                1 => 'Eleven',
                2 => 'Twelve',
                3 => 'Thirteen',
                4 => 'Fourteen',
                5 => 'Fifteen',
                6 => 'Sixteen',
                7 => 'Seventeen',
                8 => 'Eighteen',
                9 => 'Nineteen'
            );
 
            return $words[$remainder];
        } else if ($firstDigit >= 2 && $firstDigit <= 9) {
            $words = array(
                2 => 'Twenty',
                3 => 'Thirty',
                4 => 'Fourty',
                5 => 'Fifty',
                6 => 'Sixty',
                7 => 'Seventy',
                8 => 'Eighty',
                9 => 'Ninety'
            );
 
            $rest = $remainder == 0 ? '' : $this->toOnes($remainder);
            return $words[$firstDigit] . ' ' . $rest;
        }
        else
            return $this->toOnes($amt);
    }
 
    private function toHundreds($amt) { // Convert Hundred
        $ones = intval($amt / 100);
        $remainder = $amt % 100;
 
        if ($ones >= 1 && $ones < 10) {
            $rest = $remainder == 0 ? '' : $this->toTens($remainder);
            return $this->toOnes($ones) . ' Hundred ' . $rest;
        }
        else
            return $this->toTens($amt);
    }
 
    private function toThousands($amt) { // Convert Thousand
        $hundreds = intval($amt / 1000);
        $remainder = $amt % 1000;
 
        if ($hundreds >= 1 && $hundreds < 1000) {
            $rest = $remainder == 0 ? '' : $this->toHundreds($remainder);
            return $this->toHundreds($hundreds) . ' Thousand ' . $rest;
        }
        else
            return $this->toHundreds($amt);
    }
 
    private function toMillions($amt) { // Convert Million
        $hundreds = intval($amt / pow(1000, 2));
        $remainder = $amt % pow(1000, 2);
 
        if ($hundreds >= 1 && $hundreds < 1000) {
            $rest = $remainder == 0 ? '' : $this->toThousands($remainder);
            return $this->toHundreds($hundreds) . ' Million ' . $rest;
        }
        else
            return $this->toThousands($amt);
    }
 
    private function toBillions($amt) {  // Convert Billion
        $hundreds = intval($amt / pow(1000, 3));
       
        $remainder = $amt - $hundreds * pow(1000, 3);
 
        if ($hundreds >= 1 && $hundreds < 1000) {
            $rest = $remainder == 0 ? '' : $this->toMillions($remainder);
            return $this->toHundreds($hundreds) . ' Billion ' . $rest;
        }
        else
            return $this->toMillions($amt);
    }
 
    private function toTrillions($amt) { // Convert Trillion
        $hundreds = intval($amt / pow(1000, 4));
        $remainder = $amt - $hundreds * pow(1000, 4);
 
        if ($hundreds >= 1 && $hundreds < 1000) {
            $rest = $remainder == 0 ? '' : $this->toBillions($remainder);
            return $this->toHundreds($hundreds) . ' Trillion ' . $rest;
        }
        else
            return $this->toBillions($amt);
    }
 
    private function toQuadrillions($amt) {  // Convert Quadrillion
        $hundreds = intval($amt / pow(1000, 5));
        $remainder = $amt - $hundreds * pow(1000, 5);
 
        if ($hundreds >= 1 && $hundreds < 1000) {
            $rest = $remainder == 0 ? '' : $this->toTrillions($remainder);
            return $this->toHundreds($hundreds) . ' Quadrillion ' . $rest;
        }
        else
            return $this->toTrillions($amt);
    }
 
}
  $obj = new programconverts();
  echo $obj->toText(1234). "\n"."<br>"; 


//Put a hyphen ‘-’ between the last digit and the last 2 digits
class hyphen_num {

    public function hyphen_number()
    {   
        $number = "12345"; 
        echo $hyphenated_number = substr($number, 0, -2) . "-" .substr($number, -2);
       
    }
}
$obj = new hyphen_num();
echo $obj->hyphen_number(). "\n"."<br>"; // Output: 123-45


//Put ‘and’ between the ‘hundred’ and the last 2 digits.
function betweenthehundred($number) {
    $words = array(
        'Zero', 'One', 'Two', 'Three', 'Four', 'Five', 'Six', 'Seven', 'Eight', 'Nine',
        'Ten', 'Eleven', 'Twelve', 'Thirteen', 'Fourteen', 'Fifteen', 'Sixteen', 'seventeen', 'eighteen', 'nineteen',
        'twenty', 'thirty', 'forty', 'fifty', 'sixty', 'seventy', 'eighty', 'ninety'
    );

    if ($number < 21) {
        return $words[$number];
    } elseif ($number < 100) {
        return $words[floor($number / 10) + 18] . (($number % 10 !== 0) ? '-' . $words[$number % 10] : '');
    } elseif ($number < 1000) {
        return $words[floor($number / 100)] . ' hundred' . (($number % 100 !== 0) ? ' and ' . betweenthehundred($number % 100) : '');
    } else {
        return 'Number out of range';
    }
}

$number = 123; // For change condition number test 
echo betweenthehundred($number). "\n"."<br>"; 


//Put a comma ‘,’ after ‘thousand’.
class putcomma {
    public function comma()
    {
        $num = 100000;
        $frm_num = number_format($num);
        echo $frm_num;
    }
}

$obj = new putcomma();
echo $obj->comma() . "\n"."<br>"; // Output: 100,000

//Put ‘s’ after thousand if it’s plural.
function format_number($number) {
    $formatted_number = number_format($number); 
    if ($number >= 1000 && $number % 1000 == 0) {
       return $formatted_number .= 's';
    }
    else
    {
        echo "Invalid condition";
    }
   
}

$number2 = 1000; // For change condition number test 
echo format_number($number2) . "\n"."<br>"; // Output: 1000s

//Put 's' after hundred if it’s plural
function format_num($num) {
    $formatted_number = number_format($num); 
    if ($num >= 100 && $num % 100 == 0) {
       return $formatted_number .= 's';
    }
    else
    {
        echo "Invalid condition";
    }
}
$num1 = 100; // For change condition number test 
echo format_num($num1) . "\n"."<br>"; // Output: 1000s

//The argument should be equal or greater than 0, and less than 10,000. (0-9999)
function greater($argument) {
    if ($argument >= 0 && $argument < 10000) {
        return true; 
    } else {
        return false; 
    }

}
$argument = 0.1000; // For change condition number test 
if (greater($argument)) {
    echo "The argument of (0-9999)";
} else {
    echo "Invalid condition";
}
?>