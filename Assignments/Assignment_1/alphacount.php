<?php
/**
 *  This is a PHP CLI Web-APP. With this app you can count the alphbets from a given string.
 *  Run: php ./alphacount.php
 *  Enter the value & measure counting!
*/

// this loop is to run the app continuously. When the condition matches, the procces will be broken.
while(true){
    (string) $user_string = readline('Enter the String: ');
    if($user_string == 0){ // break the operation with enter the '0'
        break;
    }
    // make and instance of the class.
    $count_string = new ManupulateString(str:$user_string);
    echo "==== ==== ===="."\n";
    printf('Your string is : %s'."\n", $user_string);
    printf('Total Alphabet Count : %d'."\n", $count_string->CountTotalAlphabet());
    echo "Break the operation: press '0'"."\n";
    echo "==== ==== ===="."\n";
}
// This class is to manupulate the given string. This Class has arequired parameter. this parameter accepts only string
class ManupulateString{
    private $string = '';
    // required parameter $str: users given input.
    function __construct(string $str)
    {   
        $this->string = $str;
    }
    // parse and remove white space and special characters from the string.
    public function ParseCleanAlphabet()
    {
        $string = $this->string;
        $clean_alphabets = str_replace(' ', '', $string);
        $clean_alphabets = preg_replace('/[^A-Za-z]/', '', $string);
        return $clean_alphabets;
    }
    // count the parsed clean string's alphabet
    public function CountTotalAlphabet(){
        $total_count_of_alphabets = $this->ParseCleanAlphabet();
        return strlen($total_count_of_alphabets);
    }
}
