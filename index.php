<?php
include 'Hajo.php';

function beolvas(){
    $tomb=array();
    try {
        $file= file_get_contents("kekszalag.csv");
        $sorok= explode("\n", $file);
        array_shift($sorok);
        for ($i = 0; $i < count($sorok); $i++) {
            $split= explode(";", $sorok[$i]);
            $o=new Hajo($split[0],$split[1], $split[2], $split[3], $split[4], $split[5], $split[6], $split[7]);
            $tomb[]=$o;
        }
        
    } catch (Exception $exc) {
        die("hiba a beolvasáskor. ".$exc);
    }

 
    return $tomb;
}

$a=beolvas();
//print_r($a);
$behuzas="&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp";
echo '1. feladat<br>'.$behuzas.'A beolvasás és a tárolás kész!<br>';
echo'2. feladat<br>'.$behuzas.'Összesen'.count($a)." adatot tartalmaz az állomány<br>";
echo'3. feladat<br>'.$behuzas.'Az első 10 hajó adatai: <br>';
for ($i = 0; $i < 10; $i++) {
    echo 
        $behuzas.
        $a[$i]->getHelyezes().'. '.
        $a[$i]->getHajo()." - ".
        $a[$i]->getKlub()." - ".
        (
            (//Ha nincs típuskényszerítés, akkor hibát ad: A non well formed numeric value encountered....
                ((int)$a[$i]->getNap()*(24*60))+ 
                ((int)$a[$i]->getOra()*60)+
                 (int)$a[$i]->getPerc()
            )." perc<br>"
        );
//        print_r($a[$i]);        echo '<br><br>';
}

//4. feladat
echo'4. feladat: A verseny kategóriái:<br>';

$kat=array();
foreach ($a as $item){
    if(!in_array($item->getKategoria(), $kat)){
        $kat[]=$item->getKategoria();
    }
}
foreach ($kat as $item) {
    echo $behuzas.$item.'<br>';
}
echo $behuzas.'Összesen '. count($kat).' kategória szerepel az adatok között! <br>';
//5. feladat
echo '5. feladat <br>'.$behuzas.'Az első három hajó átlagsebessége:<br>';
for ($i = 0; $i < 3; $i++) {
    $ido=((int)$a[$i]->getNap()*(24*60))+ 
    ((int)$a[$i]->getOra()*60)+
     (int)$a[$i]->getPerc();
    echo $behuzas.(int)($i+1).'. '. number_format((double)(160/($ido/60)),1,",","").' km/h<br>';
}
//6. feladat

$aktLegjobb=(int)$a[0]->getNap()*24*60+(int)$a[0]->getOra()*60+(int)$a[0]->getPerc();
$abszLegjobb=7*60+13;
$elmaradt=$aktLegjobb-$abszLegjobb;
echo '6. feladat<br>'
. ''.$behuzas."A leggyorsabb hajó ".$elmaradt." perccel martadt el az abszlút rekordtól.<br>";

//7. feladat
$fajlba="";

foreach ($a as $item){
    $fajlba.=$item->getHajo().";".$item->getKlub().";"
            .$item->getNap()
            .":".$item->getOra()
            .":".$item->getPerc();
}

$myFile= fopen("hajonevek.txt", "w");
fwrite($myFile, $fajlba);

echo'7. feladat<br>'.$behuzas.'A fájlba írás sikeresen megtörtént! ';

