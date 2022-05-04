<?php
// Initializam sesiunea
session_start();

if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}
?>
<!DOCTYPE html>
    <html>
        <head>
            <link rel="stylesheet" href="body.css">
        </head>
        <body>
        <div class="formular">
            <a href="formular.php">Formular</a>
        </div>
            <div class="start">
                <h1>Ce a fost Roma Antica?</h1>
                <p>
                Roma Antică a fost un oraș-stat a cărui istorie se întinde în perioada de timp cuprinsă între 753 î.Hr. și 476 d.Hr. 
                Pe parcursul existenței sale de douăsprezece secole, civilizația romană a trecut de la monarhie la republică oligarhică și, apoi, la imperiu extins. 
                Ea a dominat Europa de Vest și întreaga arie în jurul Mării Mediterane, prin cuceriri și asimilare, însă, în final, a cedat în fața invaziilor barbarilor din secolul cinci, marcând, astfel, declinul Imperiului Roman și începutul Evului Mediu. 
                Civilizația romană e, deseori, clasificată ca o parte din Antichitatea Clasică, împreună cu Grecia Antică, o civilizație care a inspirat mult cultura Romei Antice. 
                Roma Antică a adus contribuții importante în organizarea politică și administrativă, juridică, artă militară, artă, literatură, arhitectură, limbile Europei (limbile romanice), iar istoria sa continuă să aibă o influență puternică asupra lumii moderne.
                </p>
            </div>
            <div class="monarhia">
                <h1>Perioada Monarhiei</h1>
                <p>
                Regatul Roman a fost guvernul monarhic al orașului Roma și al teritoriilor sale de la Fondarea Romei, fondarea sa în 753 î.Hr. de către Romulus și Remus, până la expulzarea lui Lucius Tarquinius Superbus în 510 î.Hr. și formarea Republicii Romane. 
                După legendă, orașul Roma a fost întemeiat în anul 753 î.Hr. de către Romulus și Remus, care au fost crescuți de către o lupoaică. 
                În legenda romană, când grecii au dus Războiul troian împotriva orașului Troia, prințul troian Aeneas a navigat peste Marea Mediterană către Italia și a fondat Lavinium. 
                Fiul său, Iulus, a mers mai departe, fondând orașul Alba Longa. Din familia regală a Albei Longa au venit cei doi gemeni, Romulus și Remus, care au purces la fondarea Romei în 753 î.Hr.
                </p>
            </div>
            <div class="republica">
                <h1>Perioada republicii</h1>
                <p>
                    Republica Romană a fost guvernarea republicană a Romei și a teritoriilor sale din 510 î.Hr. până la instaurarea Imperiului Roman, care este plasată, uneori, în anul 44 î.Hr., anul numirii lui Caesar ca dictator perpetuu sau, mai comun, 27 î.Hr., anul în care Senatul roman i-a acordat lui Octavianus titlul de August. 
                    Orașul Roma este situat pe malurile fluviului Tibru, foarte aproape de coasta de vest a Italiei. 
                    El marca frontiera de nord a zonei în care era vorbită limba latină și granița de sud a Etruriei, unde trăiau etruscii, care erau de origine necunoscută.
                </p>
            </div>
            <div class="imperiu">
                <h1>Perioada imperiului</h1>
                <p>
                Imperiul Roman este termenul utilizat, în mod convențional, pentru a descrie statul roman în secolele după reorganizarea sa din ultimele trei decade î.Hr., sub Gaius Iulius Caesar Octavianus. 
                Deși Roma deținea un imperiu cu mult înainte de autocrația lui Augustus, statul pre-augustian este descris, în mod convențional, ca Republica Romană. 
                Imperiul Roman controla toate statele elenizate de la Marea Mediterană, precum și regiunile celtice din nordul Europei. 
                Ultimul împărat de la Roma a fost detronat în 476, dar, pe atunci, regiunile din estul imperiului erau administrate de un al doilea împărat, ce se afla la Constantinopol. 
                Imperiul Bizantin a continuat să existe, deși își micșora încet-încet teritoriul, până în 1453, când Constantinopolul a fost cucerit de Imperiul Otoman. 
                Statele succesoare din vest (Regatul Franc și de Națiune Germană) și din est (țaratele ruse) foloseau titluri preluate din practicile romane chiar și în perioada modernă. 
                Imperiul Roman a constituit un model peren, preluat, cu mici diferențe, de toate statele europene post-romane în activitatea de guvernare, drept și organizarea justiției, tipul de arhitectură și în multe alte aspecte ale vieții.
                </p>
            </div>
        </body>
    </html>