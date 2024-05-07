<?php
$age = isset($_GET['age']) ? $_GET['age'] : null;
$name = isset($_GET['name']) ? $_GET['name'] : null;

echo "Список пассажиров";
if ($age != null) {
    echo " с возрастом " . $age . " лет";
}
if ($name != null) {
    echo " с именем " . $name;
}
echo "<br>";

$file = 'titanic.csv';
$row = 1;
$num = 8;

if (($handle = fopen("titanic.csv", "r")) !== FALSE) {
    echo "<br>";
    fgetcsv($handle);
    echo "Survived?,Pclass,Name,Sex,Age,Siblings/Spouses Aboard,Parents/Children Aboard,Fare<br><br>";

    while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
        $dataName = $data[2];
        $dataAge = $data[4];

        switch (true) {
            case ($name != null && $age != null && stripos($dataName, $name) !== false && $dataAge == $age):
                echoPassengerInfo($data);
                break;
            case ($name != null && $age == null && stripos($dataName, $name) !== false):
                echoPassengerInfo($data);
                break;
            case ($name == null && $age != null && $dataAge == $age):
                echoPassengerInfo($data);
                break;
            case ($name == null && $age == null):
                echoPassengerInfo($data);
                break;
        }
    }
    fclose($handle);
}

function echoPassengerInfo($data)
{
    if ($data[0] == 1) {
        echo "Survived \t";
    } else {
        echo "Didnt Survive \t";
    }

    global $num;
    for ($c = 1; $c < $num; $c++) {
        echo "\t|" . $data[$c] . "\t";
    }

    echo "<br>" . "_____________________________________________________" . "<br>";
}
?>
