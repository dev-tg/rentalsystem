<?php
function printCustomMsg($type, $msg = null,$value=-1) {
    $array = array();
    if ($msg == null) {
        switch ($type) {
            case "TRUE":
                $array['message'] = "Data Load Successfully";
                $array['result'] = "TRUE";
                break;
            case "TRUESAVE":
                $array['message'] = "Data Save Successfully";
                $array['result'] = "TRUE";
                break;
            case "TRUEUPDATE":
                $array['message'] = "Data Updated Successfully";
                $array['result'] = "TRUE";
                break;
            case "ERRLOAD":
                $array['message'] = "Data Load Successfully";
                $array['result'] = "ERR";
                break;
            case "ERRINPUT":
                $array['message'] = "Problem in Input please contact to admin";
                $array['result'] = "ERR";
                break;
              case "TRUESAVEERR":
                $array['message'] = "Data Not Save Successfully";
                $array['result'] = "ERR";
                break;

            default:
                break;
        }
    } else {
        $array['type'] = $type;
          $array['message'] = $msg;
                $array['result'] = $type;
    }
    $array['value'] = $value;
    return json_encode($array);
}
function changedateformate($date) {
    if ($date == "" || $date == "0000-00-00") {
        return $date;
    } else {
        $date_arr = explode("-", $date);
        $date_time = $date_arr[2] . "-" . $date_arr[1] . "-" . $date_arr[0];
        // $date_time = date("Y-m-d", mktime(0, 0, 0, $date_arr[1], $date_arr[0], $date_arr[2]));
        //$date_time=mktime(0, 0, 0, $date_arr[0], $date_arr[1], $date_arr[2]);
        return $date_time;
    }
}
function GetLoggedInUser() {
 $ci = &get_instance();

    return $ci->session->username;
}
function GetLoggedInUserId() {
 $ci = &get_instance();

    return $ci->session->id;
}
