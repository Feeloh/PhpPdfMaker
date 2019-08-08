<?

saveInDatabase();

function saveInDatabase()
{
    $servername = "localhost";
    $username = "ram23306_ta";
    $password = "ta.123";
    $dbname = "ram23306_checklists";
    
    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);
    // Check connection
    if ($conn->connect_error) 
    {
        die("Connection failed: " . $conn->connect_error);
    }
    // get contents
    $getChat = file_get_contents('php://input');
    $chat = json_decode($getChat, true);
    
        
    if(is_array($chat) && (count($chat)>0))
    {
        $date = $chat['date'];
        $employee_name = $chat['employee_name'];
        $cupboard_is_clean = $chat['cupboard_is_clean'];
        $floor_is_clean = $chat['floor_is_clean'];
        $food_stored = $chat['food_stored'];
        $fridge_is_clean = $chat['fridge_is_clean'];
        $kettle_is_clean = $chat['kettle_is_clean'];
        $microwave_is_clean = $chat['microwave_is_clean'];
        $pestcontrol_is_clean = $chat['pestcontrol_is_clean'];
        $supervisor_name = $chat['supervisor_name'];
        $table_is_clean = $chat['table_is_clean'];
        $trash_is_clean = $chat['trash_is_clean'];
        $washbasin_is_clean = $chat['washbasin_is_clean'];

        $cupboard_no_clean = $chat['cupboard_no_clean'];
        $cupboard_photo_1 = $chat['cupboard_photo'][0]["mediaUrl"];
        $splittedstring=explode("''",$cupboard_photo_1);
    $cupboard_photo = $splittedstring[0] . "''''" . $splittedstring[1];

        $floor_no_clean = $chat['floor_no_clean'];
        $floor_photo_1 = $chat['floor_photo'][0]["mediaUrl"];
        $splittedstring_1=explode("''",$floor_photo_1);
    $floor_photo = $splittedstring_1[0] . "''''" . $splittedstring_1[1];

        $food_no_stored = $chat['food_no_stored'];
        $food_photo_1 = $chat['food_photo'][0]["mediaUrl"];
        $splittedstring_2=explode("''",$food_photo_1);
    $food_photo = $splittedstring_2[0] . "''''" . $splittedstring_2[1];

        $fridge_no_clean = $chat['fridge_no_clean'];
        $fridge_photo_1 = $chat['fridge_photo'][0]["mediaUrl"];
        $splittedstring_3=explode("''",$fridge_photo_1);
    $fridge_photo = $splittedstring_3[0] . "''''" . $splittedstring_3[1];

        $kettle_no_clean = $chat['kettle_no_clean'];
        $kettle_photo_1 = $chat['kettle_photo'][0]["mediaUrl"];
        $splittedstring_4=explode("''",$kettle_photo_1);
    $kettle_photo = $splittedstring_4[0] . "''''" . $splittedstring_4[1];

        $microwave_no_clean = $chat['microwave_no_clean'];
        $microwave_photo_1 = $chat['microwave_photo'][0]["mediaUrl"];
        $splittedstring_5=explode("''",$microwave_photo_1);
    $microwave_photo = $splittedstring_5[0] . "''''" . $splittedstring_5[1];

        $pestcontrol_no_clean = $chat['pestcontrol_no_clean'];
        $pestcontrol_photo_1 = $chat['pestcontrol_photo'][0]["mediaUrl"];
        $splittedstring_7=explode("''",$pestcontrol_photo_1);
    $pestcontrol_photo = $splittedstring_7[0] . "''''" . $splittedstring_7[1];

        $table_no_clean = $chat['table_no_clean'];
        $table_photo_1 = $chat['table_photo'][0]["mediaUrl"];
        $splittedstring_8=explode("''",$table_photo_1);
    $table_photo = $splittedstring_8[0] . "''''" . $splittedstring_8[1];

        $trash_no_clean = $chat['trash_no_clean'];
        $trash_photo_1 = $chat['trash_photo'][0]["mediaUrl"];
        $splittedstring_9=explode("''",$trash_photo_1);
    $trash_photo = $splittedstring_9[0] . "''''" . $splittedstring_9[1];

        $washbasin_no_clean = $chat['washbasin_no_clean'];
        $washbasin_photo_1 = $chat['washbasin_photo'][0]["mediaUrl"];
        $splittedstring_10=explode("''",$washbasin_photo_1);
    $washbasin_photo = $splittedstring_10[0] . "''''" . $splittedstring_10[1];
        
        $selfie_1 = $chat['selfie'];
        $splittedstring_18=explode("''",$selfie_1);
    $selfie = $splittedstring_18[0] . "''''" . $splittedstring_18[1];
        $location = $chat['location']['n'];
    
    $records = "INSERT INTO staffkitchen(date,employee_name,cupboard_is_clean, floor_is_clean, food_stored, fridge_is_clean, kettle_is_clean, microwave_is_clean, pestcontrol_is_clean, supervisor_name, table_is_clean, trash_is_clean,washbasin_is_clean, cupboard_no_clean,cupboard_photo, floor_no_clean, floor_photo, food_no_stored, food_photo, fridge_no_clean, fridge_photo, kettle_no_clean, kettle_photo, microwave_no_clean, microwave_photo, pestcontrol_no_clean, pestcontrol_photo, table_no_clean, table_photo, trash_no_clean, trash_photo, washbasin_no_clean, washbasin_photo, selfie, location)
        VALUES ('".$date."','".$employee_name."','".$cupboard_is_clean."','".$floor_is_clean."','".$food_stored."','".$fridge_is_clean."','".$kettle_is_clean."','".$microwave_is_clean."','".$pestcontrol_is_clean."','".$supervisor_name."','".$table_is_clean."','".$trash_is_clean."','".$washbasin_is_clean."','".$cupboard_no_clean."','".$cupboard_photo."','".$floor_no_clean."','".$floor_photo."','".$food_no_stored."','".$food_photo."','".$fridge_no_clean."','".$fridge_photo."','".$kettle_no_clean."','".$kettle_photo."','".$microwave_no_clean."','".$microwave_photo."','".$pestcontrol_no_clean."','".$pestcontrol_photo."','".$table_no_clean."','".$table_photo."','".$trash_no_clean."','".$trash_photo."','".$washbasin_no_clean."','".$washbasin_photo."','".$selfie."','".$location."')";

            
        if ($conn->query($records) === TRUE) 
        {
            echo "New record created successfully";
        } 
        else 
        {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }
    else
    {
        echo "Error could not obtain Json";
    }
}
?>