<?php
declare(strict_types=1);


// Below are several code blocks, read them, understand them and try to find whats wrong.
// Once this exercise is finished, we'll go over the code all together and we can share how we debugged the following problems.
// Try to fix the code every time and good luck ! (write down how you found out the answer and how you debugged the problem)
// =============================================================================================================================

// === Exercise 1 ===
// Below we're defining a function, but it doesn't work when we run it.
// Look at the error you get, read it and it should tell you the issue...,
// sometimes, even your IDE can tell you what's wrong
echo "Exercise 1 starts here:";

function new_exercise($x) {

            $block = "<br/><hr/><br/><br/>Exercise $x starts here:<br/>";
            echo $block;
            //How i fix it..
            //Add the x parameter, issue was : the variable $x doesn't exist
            //Used: simple inspection
        
    }



 new_exercise(2);
// === Exercise 2 ===
// Below we create a week array with all days of the week.
// We then try to print the first day which is monday, execute the code and see what happens.

$week = ["monday", "tuesday", "wednesday", "thursday", "friday", "saturday", "sunday"];
$monday = $week[0];
echo $monday;

//How i fix it..
//Change the index, because the exercise ask about print the monday
//Using: simple inspection.
 


new_exercise(3);
// === Exercise 3 ===
// This should echo ` "Debugged !" `, fix it so that that is the literal text echo'ed

$str = "Debugged !Also very fun";
echo substr($str, 0, 10);
//How i fix it..
//Change the quotes around
//Using: simple inspection.


 new_exercise(4);
// === Exercise 4 ===
// Sometimes debugging code is just like looking up code and syntax...
// The print_r($week) should give:  Array ( [0] => mon [1] => tues [2] => wednes [3] => thurs [4] => fri [5] => satur [6] => sun )
// Look up whats going wrong with this code, and then fix it, with ONE CHARACTER!

foreach($week as &$day) {
    $day = substr($day,0,-3);
}

print_r($week);

//How i fix it..
//Change: add the & (pointer indicator)
//Using: simple inspection, check the documentation.



new_exercise(5);
// === Exercise 5 ===
// The array should be printing every letter of the alphabet (a-z) but instead it does that + aa-yz
// Fix the code so the for loop only pushes a-z in the array

$arr = [];
$letter='a';
for ($i = 1; $i <= 26; $i++) {
    array_push($arr, $letter);
    $letter++;
}

print_r($arr); // Array ([0] => a, [1] => b, [2] => c, ...) a-z alphabetical array

//How i fix it..
//Change: put out of the loop the $letter variable, i changed the loop controler ($i),
//Using: XDebug, some docs



new_exercise(6);
// === Final exercise ===
// The fixed code should echo the following at the bottom:
// Here is the name: $name - $name2
// $name variables are randomly combined as seen in the code, fix all the bugs whilst keeping the functionality!
// Examples: captain strange, ant widow, iron man, ...
$arr = [];



function combineNames($str1 = "", $str2 = "") {
    $params = [$str1, $str2];
    foreach($params as $i => &$param) {
        if ($param == "") {            
            $param= randomHeroName($i);
        }
    }    
    return implode( " - ",$params);
}

function randomHeroName($i)
{
    $hero_firstnames = ["captain", "doctor", "iron", "Hank", "ant", "Wasp", "the", "Hawk", "Spider", "Black", "Carol"];
    $hero_lastnames = ["America", "Strange", "man", "Pym", "girl", "hulk", "eye", "widow", "panther", "daredevil", "marvel"];
    $heroes = [$hero_firstnames, $hero_lastnames];
    $randname = $heroes[$i][rand(0, 10)];

    return $randname;
}

echo "Here is the name: " . combineNames();

//How i fix it..
//Change: correct semicolon, return instead echo in fucntion randomHeroe and combineNames
//Using: XDebug, some docs


new_exercise(7);

function copyright(int $year) {
    return "&copy; $year BeCode";
}
//print the copyright
echo copyright((int) date('Y'));


//How i fix it..
//Change: put the cast int in copyright function, add echo
//Using: XDebug, some phpDocumentation

new_exercise(8);
function login(string $email, string $password) {
    if($email == 'john@example.be' && $password == 'pocahontas') {
        return 'Welcome John Smith';        
    }
    return 'No access';
}
/* do not change any code below */
//should greet the user with his full name (John Smith)
echo login('john@example.be', 'pocahontas')."<br>";
//Should say: no access
echo login('john@example.be', 'dfgidfgdfg')."<br>";
//Should say: no access
echo login('wrong@example', 'wrong')."<br>";
/* You can change code again */

//How i fix it..
//Change: change the operator|| by &&, delete one of the return , addin <br>
//Using: XDebug, some docs

new_exercise(9);
function isLinkValid(string $link) {
    $unacceptables = array('https:','.doc','.pdf', '.jpg', '.jpeg', '.gif', '.bmp', '.png');

    foreach ($unacceptables as $unacceptable) {
        if (strpos($link, $unacceptable) !== false) {
            return 'Unacceptable Found<br />';
        }
    }
    return 'Acceptable<br />';
}
//invalid link
echo isLinkValid('http://www.google.com/hack.pdf');
//invalid link
echo isLinkValid('https://google.com');
//VALID link
echo isLinkValid('http://google.com');
//VALID link
echo isLinkValid('http://google.com/test.txt');

//How i fix it..
//Change: changing condition 
//Using: XDebug, some docs



new_exercise(10);

//Filter the array $areTheseFruits to only contain valid fruits
//do not change the arrays itself
$areTheseFruits = ['apple', 'bear', 'beef', 'banana', 'cherry', 'tomato', 'car'];
$validFruits = ['apple', 'pear', 'banana', 'cherry', 'tomato'];
//from here on you can change the code
$len=count($areTheseFruits);
for($i=0; $i <=$len ; $i++) {
    if(!in_array($areTheseFruits[$i], $validFruits)) {
        unset($areTheseFruits[$i]);
    }
}
var_dump($areTheseFruits);//do not change this
//How i fix it..
//Change: add$len Variable with the size of array $areTheseFruits befor the for starts, because unset change the array counts, and this was evaluated in each iteration of loop
//Using: XDebug, some docs


// // Bonus round
// // Below are 5 characters (the space included)
// // Find out why the substring with limit 10 still shortens the string, and what might be a solution (not easy)
$str = "안녕 세상";
echo mb_substr($str, 0, 10);