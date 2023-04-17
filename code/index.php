<?php
/* Imagine a lot of code here */
$very_bad_unclear_name = "15 chicken wings";
// Write your code here:
$order = & $very_bad_unclear_name;
$order .=' and two number nines';
// Don't change the line below
echo "\nYour order is: $very_bad_unclear_name.";

$num1 = 10;
echo "\n$num1";
$num2 = 14.1;
echo "\n$num2";
echo "\n12";
$last_month = 1187.23;
$this_month = 1089.98;
echo "\n";
echo $last_month-$this_month;

$num_languages=4;
$months=11;
$days=16*$months;
$days_per_language=$days/4;
echo "\n$days_per_language";

echo "\n";
echo 8**2;

$my_num=1337;
$answer=$my_num;
$answer+=2;
$answer*=2;
$answer-=2;
$answer/=2;
$answer-=$my_num;
echo "\n";
echo $answer;

$a=10;
$b=3;
echo "\n";
echo $a % $b;
if ($a % $b == 0) {
    echo "\nДелится ";
    echo $a / $b;
}
else{
    echo "\nНе делится ";
    echo $a % $b;
}

$st=pow(2, 10);
echo "\n$st";
echo "\n";
echo sqrt(245);
$arr=array(4, 2, 5, 19, 13, 0, 10);
$sum=0;
foreach ($arr as &$value) {
    $sum += $value**2;
}
echo "\n";
echo sqrt($sum);

$s1=sqrt(379);
echo "\n";
echo round($s1, 0);
echo "\n";
echo round($s1, 1);
echo "\n";
echo round($s1, 2);
$s2=sqrt(587);
$arr2['ceil']=ceil($s2);
$arr2['floor']=floor($s2);
echo "\n";
echo $arr2['ceil'];
echo "\n";
echo $arr2['floor'];

$arr3=[4, -2, 5, 19, -130, 0, 10];
echo "\n";
echo max($arr3);
echo "\n";
echo min($arr3);

echo "\n";
echo rand(1, 100);
$count = 0;
while ($count<10){
    $arr4[$count]=rand();
    $count+=1;
}
$count = 0;
while ($count<10){
    echo "\n$arr4[$count]";
    $count+=1;
}

$a=1000;
$b=1337;
echo "\n";
echo abs($a-$b);
$a=1000.5;
$b=1337.333;
echo "\n";
echo abs($a-$b);
$arr5=[1, 2, -1, -2, 3, -3];
foreach ($arr5 as &$value){
    $value=abs($value);
}
foreach ($arr5 as &$value){
    echo "\n$value";
}

$num=30;
$i=1;
$count=0;
while ($i<$num){
    if ($num%$i==0){
        $count+=1;
        $arr6[$count]=$i;
    }
    $i+=1;
}
foreach ($arr6 as &$value){
    echo "\n$value";
}

$arr7=[1, 2, 3, 4, 5, 6, 7, 8, 9, 10];
$sum=0;
$count=0;
while ($sum<=10){
    $sum+=$arr7[$count];
    $count+=1;
}
echo "\n$count";

function  printStringReturnNumber(){
    echo "\nstring";
    return rand();
}
$my_num=printStringReturnNumber();
echo "\n$my_num";

function increaseEnthusiasm(&$string){
    $string .= '!';
    return $string;
}
$str="\nwow";
echo increaseEnthusiasm($str);
function repeatThreeTimes(&$string){
    $str=$string;
    $str.=$string;
    $str.=$string;
    return $str;
}
echo "\n";
$str="пау!";
echo repeatThreeTimes($str);
$str=repeatThreeTimes($str);
echo "\n";
echo increaseEnthusiasm($str);

function cut(&$string, $num = 10){
    $string=mb_substr($string,0, $num);
}
$str="1234567890";
cut($str,3);
echo "\n$str";

$arr8=[10,9,8,7,6,5,4,3,2,1];
function print_arr(&$arr,$i){
    if ($i==0){
        echo "\n";
        echo $arr[$i];
        return;
    }
    else{
        echo "\n";
        echo $arr[$i];
        return print_arr($arr,($i-1));
    }
}
print_arr($arr8,count($arr8)-1);

$num=1234567890;
function nums_sum($n){
    $sum=0;
    while ($n > 0) {
        $r = (int)$n % 10;
        $sum += $r;
        $n = (int)$n/10;
    }
    if($sum>9)
        return nums_sum($sum);
    else
        return $sum;
}
echo "\n";
echo nums_sum($num);

$x='x';
for ($i=0;$i<10;$i++){
    $arr8[$i]=$x;
    $x.='x';
}
foreach ($arr8 as $item) {
    echo "\n$item";
}

function arrayFill($val, $n){
    for ($i=0;$i<$n;$i++){
        $arr[$i]=$val;
    }
    return $arr;
}
$arr9=arrayFill("x",10);
foreach ($arr9 as $item) {
    echo "\n$item";
}

$arr10=[[1, 2, 3], [4, 5], [6]];
$sum = 0;
for ($i=0;$i<count($arr10);$i++){
    for ($j=0;$j<count($arr10[$i]);$j++){
        $sum+=$arr10[$i][$j];
    }
}
echo "\n$sum";

$count=1;
for ($i=0;$i<3;$i++){
    for ($j=0;$j<3;$j++){
        $arr11[$i][$j]=$count;
        $count++;
    }
}
for ($i=0;$i<3;$i++){
    for ($j=0;$j<3;$j++){
        echo "\n";
        echo $arr11[$i][$j];
    }
}

$arr12=[2,5,3,9];
$result=($arr12[0]*$arr12[1])+($arr12[2]*$arr12[3]);
echo "\n$result";

$user['surname']='Казакова';
$user['name']='Анастасия';
$user['patronymic']='Алексеевна';
foreach ($user as $item){
    echo "\n$item";
}
$date['year']=2023;
$date['month']=4;
$date['day']=17;
foreach ($date as $item){
    echo "\n$item";
}
$arr = ['a', 'b', 'c', 'd', 'e'];
echo "\n";
echo count($arr);
echo "\n";
echo $arr[count($arr)-1];
echo "\n";
echo $arr[count($arr)-2];

function sum10($n1,$n2){
    if ($n1+$n2>10)
        return true;
    else
        return false;
}
function equal($n1,$n2){
    if ($n1==$n2)
        return true;
    else
        return false;
}
echo "\n";
$test=0;
if ($test == 0)
    echo 'верно';
$age=rand(1,110);
$n=$age;
if ($age<10 or $age>99)
    echo "\n<10 or >99:$age";
else{
    $sum=0;
    while ($n > 0) {
        $r = (int)$n % 10;
        $sum += $r;
        $n = (int)$n/10;
    }
    if($sum<=9)
        echo "\nоднозначна:$age";
    else
        echo "\nдвузначна:$age";
}

$arr=[13,3,7];
if (count($arr)==3){
    $sum=array_sum($arr);
    echo "\n$sum";
}
$x='x';
for ($i=0;$i<20;$i++){
    echo "\n$x";
    $x.='x';
}
$arr=[1,33,7];
$avg=array_sum($arr)/count($arr);
echo "\n$avg";
$sum=array_sum(range(1,100));
echo "\n$sum";
$arr = [1,3,37];
$result = array_map('sqrt', $arr);
foreach ($result as $value)
    echo "\n$value";
$arr = array_combine(range('a', 'z'),range(1, 26));
$s='1234567890';
$arr = str_split($s, 2);
$sum=array_sum($arr);
echo "\n$sum";