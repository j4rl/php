<?php require_once('util.php'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="yo.css">
    <script src="app.js"></script>
</head>
<body>
    <h1>Variabler JS</h1>
    <script>
        document.write('Hello World!')
        varNum=42   //Är heltal
        document.write('<br>'+varNum)
        varNum="42"    //Är sträng
        document.write('<br>'+varNum)
        varNum=42.0   //Är flyttal
        document.write('<br>'+varNum)
        varNum+=1  //Lägger till ett på varabeln (som nu är ett flyttal)
        document.write('<br>'+varNum)
        varNum=Number(varNum)  //Gör om flyttalet till ett tal
        document.write('<br>'+varNum)
        varNum=String(varNum)  //Gör om heltalet till en sträng
        document.write('<br>'+varNum)
        varNum-=1   //Ta bort heltalet 1 från strängen '43' (Ehh, wait what?!)
        document.write('<br>'+varNum)
        varNum-="2"   //Ta bort strängen '2' från strängen '42' (should be '4' right? No!?)
        document.write('<br>'+varNum)
    </script>
    
    <h1>Variabler PHP</h1>
    <?php 
        echo "Hello World!";
        $varNum=42;  //Är heltal
        echo "<br>".$varNum;  
        $varNum="42";  //Är sträng
        echo "<br>".$varNum;
        $varNum=42.0;  //Är flyttal
        echo "<br>".$varNum;
        $varNum+=1;  //Lägger till ett på varabeln (som nu är ett flyttal)
        echo "<br>".$varNum;
        $varNum=(int)$varNum;  //Gör om flyttalet till ett heltal
        echo "<br>".$varNum;
        $varNum=(string)$varNum; //Gör om heltalet till en sträng
        echo "<br>".$varNum;
        $varNum-=1; //Ta bort heltalet 1 från strängen '43' (Ehh, wait what?!)
        echo "<br>".$varNum;
        $varNum-="2"; //Ta bort strängen '2' från strängen '42' (should be '4' right? No!?)
        echo "<br>".$varNum; 
    ?>
    <h1>Iterationer</h1>
<h2>For-loop</h2>
<?php
for($vdo=1;$vdo<10;$vdo++){
        echo $vdo." Gör stuff<br/>";
};
?>

<h2>While-loop</h2>
<?php
$vdo=1;
while($vdo<10){
    echo $vdo." Rader<br/>";
    $vdo++;
};
?>
<h2>Do-While-loop</h2>
<?php
$villkor=10;
$var=1;
do{
    echo $var." Stuff<br/>";
    $var++;
}while($var<$villkor);
?>
<h1>Kontrollstrukturer</h1>
<h2>if</h2>
<?php
//enradare

if($var==$villkor) echo "Oneliner!<br>";

//fler-raders

if($var==$villkor){
   echo "Kan vara<br/>";
   echo "fler rader.";
}
?>
<h2>if-else</h2>
<?php
//om-sant-annars
$understandBinary=1;
if($understandBinary==true){

   echo "Du är en av 10 människor!";

}else{

   echo "Du fattade inte den va?";

}
?>
<h2>if-elseif-else</h2>
<?php
//om-sant-annars om sant-annars om sant-annars

$var=date("H");

if($var<10){

   echo "God morgon!";

}elseif($var<20){

   echo "God dag!";

}else{

   echo "God kväll!";

}
?>
<h2>switch</h2>
<?php
//switch-sats för att ta hand om många alternativ

$var=date("H");

switch($var){
   case "00":
      echo "Mitt i natten!";
      break;
   case "06":
      echo "Klockan sex på morgonen!";
      break;
   case "12":
      echo "High noon!";
      break;
   case "15":
      echo "Eftermiddag";
      break;
   default:
      echo "Meh!";
}
?>
</body>
</html>