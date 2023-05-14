<?php
include_once __DIR__ . '/../config/jdf.php';
//ENTER THE RELEVANT INFO BELOW
$mysqlUserName = "helli_helli-info";
$mysqlPassword = "jVT0Huc3F";
$mysqlHostName = "localhost";
$DbName = "helli_helli-info";
$backup_name = "mybackup.sql";
ini_set('memory_limit', '-1');
ini_set('max_execution_time', '3500');
ini_set('max_input_vars', '2500');
ini_set('post_max_size', '128M');

//$tables             = "Your tables";

//or add 5th parameter(array) of specific tables:    array("mytable1","mytable2","mytable3") for multiple tables

Export_Database($mysqlHostName, $mysqlUserName, $mysqlPassword, $DbName, $tables = false, $backup_name = false);

function Export_Database($host, $user, $pass, $name, $tables = false, $backup_name = false)
{
    $mysqli = new mysqli($host, $user, $pass, $name);
    $mysqli->select_db($name);
    $mysqli->query("SET NAMES 'utf8'");

    $queryTables = $mysqli->query('SHOW TABLES');
    while ($row = $queryTables->fetch_row()) {
        $target_tables[] = $row[0];
    }
    if ($tables !== false) {
        $target_tables = array_intersect($target_tables, $tables);
    }
    foreach ($target_tables as $table) {
        $result = $mysqli->query('SELECT * FROM ' . $table);
        $fields_amount = $result->field_count;
        $rows_num = $mysqli->affected_rows;
        $res = $mysqli->query('SHOW CREATE TABLE ' . $table);
        $TableMLine = $res->fetch_row();
        $content = (!isset($content) ? '' : $content) . "\n\n" . $TableMLine[1] . ";\n\n";

        for ($i = 0, $st_counter = 0; $i < $fields_amount; $i++, $st_counter = 0) {
            while ($row = $result->fetch_row()) { //when started (and every after 100 command cycle):
                if ($st_counter % 100 == 0 || $st_counter == 0) {
                    $content .= "\nINSERT INTO " . $table . " VALUES";
                }
                $content .= "\n(";
                for ($j = 0; $j < $fields_amount; $j++) {
                    $row[$j] = str_replace("\n", "\\n", addslashes($row[$j]));
                    if (isset($row[$j]) and ($row[$j] != null or $row[$j] != '')) {
                        $content .= '"' . $row[$j] . '"';
                    } else {
                        $content .= 'NULL';
                    }
                    if ($j < ($fields_amount - 1)) {
                        $content .= ',';
                    }
                }
                $content .= ")";
                //every after 100 command cycle [or at last line] ....p.s. but should be inserted 1 cycle eariler
                if ((($st_counter + 1) % 100 == 0 && $st_counter != 0) || $st_counter + 1 == $rows_num) {
                    $content .= ";";
                } else {
                    $content .= ",";
                }
                $st_counter = $st_counter + 1;
            }
        }
        $content .= "\n\n\n";


    }
    $year = jdate('Y');
    $month = jdate('n');
    $day = jdate('j');
    $hour = jdate('H');
    $min = jdate('i');
    $sec = jdate('s');
    $datewithtime = $year . "." . $month . "." . $day . ' ' . $hour . "." . $min . '.' . $sec;
    if (!is_dir(__DIR__ . '/../../../../build/sql/' . $datewithtime)) {
        mkdir(__DIR__ . '/../../../../build/sql/' . $datewithtime, 0777, true);
    }
    $backup_folder=__DIR__ . '/../../../../build/sql/' . $datewithtime;
    $backup_file_name = "helli_helli-info- " . $datewithtime . ".sql";

    $fp = fopen($backup_folder . '/' . $backup_file_name, 'w+');
    fwrite($fp, $content);
//    if (($result = )) {
//        echo "Backup file created '--$backup_file_name' ($result) <br>";
//    }
    fclose($fp);
    exit;
}


