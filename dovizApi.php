<html>
<head>
    <title>
        Döviz Kuru   
    </title>
</head>
<style>
   #green{background-color:green; font-size:20px;}
   #red{background-color:red; font-size:20px;}
   .baslik{background-color:#E3D1E3; font-size:20px;}
   #alis{font-size:20px;}
   #satis{font-size:20px;}
   

</style>
<body>
<?php
    $site = "https://www.tcmb.gov.tr/kurlar/today.xml";
    $baglan = file_get_contents($site);

    preg_match_all("#<Isim>(.*?)</Isim>#",$baglan,$isim);
    preg_match_all("#<CurrencyName>(.*?)</CurrencyName>#",$baglan,$birim);
    preg_match_all("#<ForexBuying>(.*?)</ForexBuying>#",$baglan,$alis);
    preg_match_all("#<ForexSelling>(.*?)</ForexSelling>#",$baglan,$satis);

    $say = count($satis[1]);

    echo "<table border='1px' width='60%'>";
    echo "<tr>";
    echo "<th class='baslik'>Döviz Cinsi</th>";
    echo "<th class='baslik'>Para Birimi</th>";
    echo "<th id='alis' style=background:green>Alış</th>";
    echo "<th id='satis' style=background:red>Satış</th>";
    echo "</tr>";
 
    for ($a=0; $a < $say ; $a++) { 
        echo "<tr>";
        echo "<td style='background-color:#E3D1E3'>".$isim[1][$a]."</td>";
        echo "<td style='background-color:#E3D1E3'>".$birim[1][$a]."</td>";
        echo "<td  id='green'>".$alis[1][$a]."<br></td>";
        echo "<td  id='red'>".$satis[1][$a]."<br></td>";
       echo "</tr>";
    }
    echo "</tr>";
    echo "</table>";
?>
</body>
</html>
