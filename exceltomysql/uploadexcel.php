<?php
//
//if(isset($_POST['submit'])) {
//    if(isset($_FILES['uploadFile']['name']) && $_FILES['uploadFile']['name'] != "") {
//        $allowedExtensions = array("xls","xlsx");
//        $ext = pathinfo($_FILES['uploadFile']['name'], PATHINFO_EXTENSION);
//
//        if(in_array($ext, $allowedExtensions)) {
//            // Uploaded file
//            $file = $_FILES['uploadFile']['name'];
//            $isUploaded = copy($_FILES['uploadFile']['tmp_name'], $file);
//            // check uploaded file
//            if($isUploaded) {
//                // Include PHPExcel files and database configuration file
//                include("db.php");
////                require_once __DIR__ . '/exceltomysql/vendor/autoload.php';
//                @include_once 'vendor/phpoffice/phpexcel/Classes/PHPExcel.php';
//                try {
//                    // load uploaded file
//                    $objPHPExcel = PHPExcel_IOFactory::load($file);
//                } catch (Exception $e) {
//                    die('Error loading file "' . pathinfo($file, PATHINFO_BASENAME). '": ' . $e->getMessage());
//                }
//
//                // Specify the excel sheet index
//                $sheet = $objPHPExcel->getSheet(0);
//                $total_rows = $sheet->getHighestRow();
//                $highestColumn      = $sheet->getHighestColumn();
//                $highestColumnIndex = PHPExcel_Cell::columnIndexFromString($highestColumn);
//
//                //	loop over the rows
//                for ($row = 1; $row <= $total_rows; ++ $row) {
//                    for ($col = 0; $col < $highestColumnIndex; ++ $col) {
//                        $cell = $sheet->getCellByColumnAndRow($col, $row);
//                        $val = $cell->getValue();
//                        $records[$row][$col] = $val;
//                    }
//                }
//                foreach($records as $row){
//                    $codeasar = isset($row[0]) ? $row[0] : '';
//                    $nameasar = isset($row[1]) ? $row[1] : '';
////                    $gender = isset($row[2]) ? $row[2] : '';
////                    $shartsenni = isset($row[3]) ? $row[3] : '';
////                    $name = isset($row[4]) ? $row[4] : '';
////                    $family = isset($row[5]) ? $row[5] : '';
////                    $state = isset($row[6]) ? $row[6] : '';
////                    $city = isset($row[7]) ? $row[7] : '';
////                    $school = isset($row[8]) ? $row[8] : '';
////                    $paye = isset($row[9]) ? $row[9] : '';
////                    $sath = isset($row[10]) ? $row[10] : '';
////                    $term = isset($row[11]) ? $row[11] : '';
//                    $ghaleb = isset($row[12]) ? $row[12] : '';
//                    $sath = isset($row[13]) ? $row[13] : '';
//                    $group = isset($row[14]) ? $row[14] : '';
////                    $ostad = isset($row[15]) ? $row[15] : '';
////                    $codeostad = isset($row[16]) ? $row[16] : '';
//                    $bakhshvizheh = isset($row[17]) ? $row[17] : '';
////                    $tahsilghhozavi = isset($row[18]) ? $row[18] : '';
////                    $reshtedaneshgahi = isset($row[19]) ? $row[19] : '';
////                    $personcode = isset($row[20]) ? $row[20] : '';
////                    $nationalcode = isset($row[21]) ? $row[21] : '';
////                    $shenasname = isset($row[22]) ? $row[22] : '';
////                    $tarikhtavallod = isset($row[23]) ? $row[23] : '';
////                    $mobile = isset($row[24]) ? $row[24] : '';
////                    $markaztahsili = isset($row[25]) ? $row[25] : '';
//                    $noepazhouhesh='تحقیق و تألیف';
//                    $noefaaliat='فردی';
//                    $vaziatnashr='منتشر نشده';
//
//                    // Insert into database
//                    $jashnvareh='14-چهاردهم';
//
//                    $query = "INSERT INTO etelaat_a (jashnvareh,karbar,codeasar,nameasar,ghalebpazhouhesh,satharzyabi,groupelmi,bakhshvizheh,noepazhouhesh,vaziatnashr)
//								values('$jashnvareh','ashouri','$codeasar','$nameasar','$ghaleb','$sath','$group','$bakhshvizheh', '$noepazhouhesh','$vaziatnashr')";
////                    $query="insert into etelaat_p (jashnvareh,codeasar,codemelli,fname,family,tarikhtavallod,gender,shartsenni,mobile,ostantahsili,shahrtahsili,
////                                madrese,paye,sath,term,tahsilatghhozavi,reshtedaneshgahi,shparvandetahsili,sh_shenasnameh,namemarkaztahsili,master,mastercode)
////                                values ('$jashnvareh','$codeasar','$nationalcode','$name','$family','$tarikhtavallod','$gender','$shartsenni','$mobile','$state',
////                                '$city','$school','$paye','$sath','$term','$tahsilghhozavi','$reshtedaneshgahi','$personcode','$shenasname','$markaztahsili','$ostad','$codeostad')";
//                    if ($mysqli->query($query)){
//                        echo "<br/>Data inserted in Database -> code= ".$codeasar;
//                    }
//
//                }
//
//                unlink($file);
//            } else {
//                echo '<span class="msg">File not uploaded!</span>';
//            }
//        } else {
//            echo '<span class="msg">Please upload excel sheet.</span>';
//        }
//    } else {
//        echo '<span class="msg">Please upload excel file.</span>';
//    }
//}
//?>