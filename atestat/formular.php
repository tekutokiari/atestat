<!DOCTYPE html>
<html>
    <head>
        <meta charset='utf-8'>
        <meta http-equiv='X-UA-Compatible' content='IE=edge'>
        <title>Formular</title>
        <meta name='viewport' content='width=device-width, initial-scale=1'>
        <link rel="stylesheet" href="body.css">
        <link rel="stylesheet" href="qs.css">
    </head>
    <body>
        <form action="formular.php" method="post">
            <div class="questions">
                <div class="q1">
                    <p>In ce perioada de timp s-a intins istoria Romei Antice? :<br>
                    <input type="radio" name="Buton1" value="Raspuns2"/>756 î.Hr. și 465 d.Hr<br>
                    <input type="radio" name="Buton1" value="Raspuns3"/>903 î.Hr. și 352 d.Hr<br>
                    <input type="radio" name="Buton1" value="Raspuns4"/>688 î.Hr. și 234 d.Hr<br>
                    <input type="radio" name="Buton1" value="Raspuns1"/>753 î.Hr. și 476 d.Hr<br></p>
                </div>
                <div class="q2">
                    <p>Ce parte a Europei a dominat Roma Antica? :<br>
                    <input type="radio" name="Buton2" value="Raspuns2"/>Europa de Est<br>
                    <input type="radio" name="Buton2" value="Raspuns4"/>Europa de Sud<br>
                    <input type="radio" name="Buton2" value="Raspuns3"/>Europa de Nord<br>
                    <input type="radio" name="Buton2" value="Raspuns1"/>Europa de Vest<br></p>
                </div>
                <div class="q3">
                    <p>In ce an a fost fondata Roma Antica? :<br>
                    <input type="radio" name="Buton3" value="Raspuns2"/>983 î.Hr<br>
                    <input type="radio" name="Buton3" value="Raspuns1"/>753 î.Hr<br>
                    <input type="radio" name="Buton3" value="Raspuns2"/>756 î.Hr<br>
                    <input type="radio" name="Buton3" value="Raspuns4"/>688 î.Hr<br></p>
                </div>
                <div class="q4">
                    <p>Orasul Roma este situat pe:<br>
                    <input type="radio" name="Buton4" value="Raspuns2"/>Fluviul Tibru<br>
                    <input type="radio" name="Buton4" value="Raspuns1"/>Malurile fluviului Tibru<br>
                    <input type="radio" name="Buton4" value="Raspuns3"/>Busento<br>
                    <input type="radio" name="Buton4" value="Raspuns4"/>Garigliano<br></p>
                </div>
                <div class="q5">
                    <p>Statul pre-augustian este descris, în mod convențional ca:<br>
                    <input type="radio" name="Buton5" value="Raspuns1"/>Republica Romană<br>
                    <input type="radio" name="Buton5" value="Raspuns3"/>Roma Republicană<br>
                    <input type="radio" name="Buton5" value="Raspuns4"/>Roma Antică<br>
                    <input type="radio" name="Buton5" value="Raspuns2"/>Roma Imperială<br></p>
                </div>
                <div class="q6">
                    <p>Ce oras a fondat printul troian Aeneas:<br>
                    <input type="radio" name="Buton6" value="Raspuns2"/>Troia<br>
                    <input type="radio" name="Buton6" value="Raspuns4"/>Venetia<br>
                    <input type="radio" name="Buton6" value="Raspuns1"/>Lavinium<br>
                    <input type="radio" name="Buton6" value="Raspuns3"/>Roma<br></p>
                </div>
                <div class="q7">
                    <p>Civilizația romană este clasificată ca o parte din :<br>
                    <input type="radio" name="Buton7" value="Raspuns3"/>Epoca clasicǎ<br>
                    <input type="radio" name="Buton7" value="Raspuns4"/>Primele imperii<br>
                    <input type="radio" name="Buton7" value="Raspuns1"/>Antichitatea Clasică<br>
                    <input type="radio" name="Buton7" value="Raspuns2"/>Imperiul Soarelui<br></p>
                </div>
                <div class="q8">
                    <p>In ce secol a inceput declinul Romei Antice? :<br>
                    <input type="radio" name="Buton8" value="Raspuns3"/>Secolul XII<br>
                    <input type="radio" name="Buton8" value="Raspuns4"/>Secolul III<br>
                    <input type="radio" name="Buton8" value="Raspuns2"/>Secolul IX<br>
                    <input type="radio" name="Buton8" value="Raspuns1"/>Secolul V<br></p>
                </div>
                <div class="q9">
                    <p>In ce an a fost numit Caesar ca dictator perpetuu? :<br>
                    <input type="radio" name="Buton9" value="Raspuns4"/>77 î.Hr.<br>
                    <input type="radio" name="Buton9" value="Raspuns2"/>49 î.Hr..<br>
                    <input type="radio" name="Buton9" value="Raspuns3"/>63 î.Hr.<br>
                    <input type="radio" name="Buton9" value="Raspuns1"/>44 î.Hr.<br></p>
                </div>
                <div class="q10">
                    <p>Senatul roman i-a acordat lui Octavianus titlul de August in anul:<br>
                    <input type="radio" name="Buton10" value="Raspuns4"/>13 î.Hr.<br>
                    <input type="radio" name="Buton10" value="Raspuns3"/>69 î.Hr.<br>
                    <input type="radio" name="Buton10" value="Raspuns1"/>27 î.Hr.<br>
                    <input type="radio" name="Buton10" value="Raspuns2"/>38 î.Hr.<br></p>
                </div>
            </div>
            <br>
            <input type="submit" value="Submit"/>
            <input type="hidden" id="chestionar" name="chestionar" value="1">
        </form>
        <?php
            $a = $_POST["Buton1"] ?? null;
            $b = $_POST["Buton2"] ?? null;
            $c = $_POST["Buton3"] ?? null;
            $d = $_POST["Buton4"] ?? null;
            $e = $_POST["Buton5"] ?? null;
            $f = $_POST["Buton6"] ?? null;
            $g = $_POST["Buton7"] ?? null;
            $h = $_POST["Buton8"] ?? null;
            $i = $_POST["Buton9"] ?? null;
            $j = $_POST["Buton10"] ?? null;
            $s = 0;
            if($a=="Raspuns1"){
                            $s += 1;
            }
            if($b=="Raspuns1"){
                            $s += 1;
            }
            if($c=="Raspuns1"){
                            $s += 1;
            }
            if($d=="Raspuns1"){
                            $s += 1;
            }
            if($e=="Raspuns1"){
                            $s += 1;
            }
            if($f=="Raspuns1"){
                            $s += 1;
            }
            if($g=="Raspuns1"){
                            $s += 1;
            }
            if($h=="Raspuns1"){
                            $s += 1;
            }
            if($i=="Raspuns1"){
                            $s += 1;
            }
            if($j=="Raspuns1"){
                            $s += 1;
            }
            if(isset($_POST['chestionar']))
                echo "<br><p style='color:white;'>REZULTATUL ESTE $s puncte</p>";
        ?>
    </body>
</html>
