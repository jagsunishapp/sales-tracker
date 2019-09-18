<?php
include 'config.php';
// date_default_timezone_set('Asia/Kolkata');
class Sales_tracker {
public function __construct(){}

// #1 login
public function login($formData) {      
      try {
      } catch (Exception $e) {
        $response["type"] = "0";
        $response["message"] = $e->getMessage();
        return $response;
      }
      
      $response = ["status" => "1"];
      $userInfo = [];
      $token = $formData['token'];
      if($token=='SALES_TRACKER')
      {
      $pass = mysqli_real_escape_string($this->dbconnect(),$formData['pass']);
        $sql = mysqli_query($this->dbconnect(),"SELECT * FROM `login_master` WHERE email='".$formData['user']."'");
        if(mysqli_num_rows($sql)>0)
        {
        $sql2 = mysqli_query($this->dbconnect(),"SELECT * FROM `login_master` WHERE email='".$formData['user']."' && password='$pass'");
        if(mysqli_num_rows($sql2)>0)
        {
            date_default_timezone_set('Asia/Kolkata');
            $log_time = date('Y-m-d H:i');
            $sql3 = mysqli_query($this->dbconnect(),"UPDATE login_master SET last_login='$log_time' WHERE email='".$formData['user']."'");
            $row = mysqli_fetch_array($sql2);
            $userInfo["emp_code"] = $row["emp_code"];
            $userInfo["first_name"] = $row["first_name"];
            $userInfo["last_name"] = $row["last_name"];
            $userInfo["role"] = $row["role"];
            $userInfo["email"] = $row["email"];
            $userInfo["mobile_no"] = $row["mobile_no"];
            $userInfo["photo"] = MENU_URL.$row["photo"];
            $response["status"] = "1";      
            $response["message"] = "Login successful";         
            $response["data"] = $userInfo;
            return $response;
        }
        else
        {
            $response["status"] = "0"; 
            $response["message"] = "You have entered a wrong password";
            return $response;
        }
        }
        else
        {
          $response["status"] = "0"; 
          $response["message"] = "User with this username does not exist";
          return $response;
        }
        }
        else
        {
          $response["status"] = "0"; 
          $response["message"] = "Token is incorrect. Please give the correct one!";
          return $response;
        }
    }
// login end
    // #2 user profile 
    public function user_profile($formData)
    {
      try {
      } catch (Exception $e) {
        $response["type"] = "0";
        $response["message"] = $e->getMessage();
        return $response;
      }
      
      $response = ["status" => "1"];
      $userInfo = [];
      $token = $formData['token'];
      if($token=='SALES_TRACKER')
      {
        $sql = mysqli_query($this->dbconnect(),"SELECT * FROM `login_master` WHERE emp_code='".$formData['emp_code']."'");
          if(mysqli_num_rows($sql)>0)
          {
              $row = mysqli_fetch_array($sql);
            
              $userInfo["emp_code"] = $row["emp_code"];
              $userInfo["first_name"] = $row["first_name"];
              $userInfo["last_name"] = $row["last_name"];
              $userInfo["role"] = $row["role"];
              $userInfo["email"] = $row["email"];
              $userInfo["mobile_no"] = $row["mobile_no"];
              $userInfo["designation"] = $row["designation"];
              $userInfo["designation"] = $row["designation"];
              $userInfo["gender"] = $row["gender"];
              $userInfo["photo"] = MENU_URL.$row["photo"];
              $response["status"] = "1";      
              $response["message"] = "Successful";         
              $response["data"] = $userInfo;
              return $response;
          }
          else
          {
            $response["status"] = "0"; 
            $response["message"] = "Incorrect employee code or data does not exist for this user";
            return $response;
          }
        }
        else
        {
          $response["status"] = "0"; 
          $response["message"] = "Token is incorrect. Please give the correct one!";
          return $response;
        }
    }
// #2 user profile end
    // #3 punch in 
    public function punch_in($formData)
    {
      try {
      } catch (Exception $e) {
      $response["type"] = "0";
      $response["message"] = $e->getMessage();
      return $response;
    }

    $response = ["status" => "1"];
    $userInfo = [];
    $token = $formData['token'];
    if($token=='SALES_TRACKER')
    {
      if(!empty($formData['emp_code']) && !empty($formData['punch_in_date']) && !empty($formData['punch_in_time']) && !empty($formData['punch_in_loc']))
        {
          $sql2 = mysqli_query($this->dbconnect(),"INSERT INTO `attendance`(`emp_code`, `punch_in_date`, `punch_in_time`, `punch_in_loc`) VALUES ('".$formData['emp_code']."','".$formData['punch_in_date']."','".$formData['punch_in_time']."','".$formData['punch_in_loc']."')");
          if($sql2)
          {
            $sql3 = mysqli_query($this->dbconnect(),"UPDATE login_master SET last_punch_in='".$formData['punch_in_date']."' WHERE emp_code='".$formData['emp_code']."'");
          $response["status"] = "1";      
          $response["message"] = "Successful";         
          // $response["data"] = $userInfo;
          return $response;
          }
          else
          {
          $response["status"] = "0"; 
          $response["message"] = "Error occurred during inserting data!";
          return $response;
          }
        }
        else
        {
          $response["status"] = "0"; 
          $response["message"] = "Empty data error. Please send the proper data!";
          return $response;
        }
  
    }
    else
    {
    $response["status"] = "0"; 
    $response["message"] = "Token is incorrect. Please give the correct one!";
    return $response;
    }
    }
    // #3 punch in end

     // #4 punch out start 
    public function punch_out($formData)
    {
    try {
    } catch (Exception $e) {
    $response["type"] = "0";
    $response["message"] = $e->getMessage();
    return $response;
    }

    $response = ["status" => "1"];
    $userInfo = [];
    $token = $formData['token'];
    if($token=='SALES_TRACKER')
    {
      $today_date = date('Y-m-d');
      if(!empty($formData['emp_code']) && !empty($formData['punch_out_date']) && !empty($formData['punch_out_time']) && !empty($formData['punch_out_loc']))
        {
          $sql = mysqli_query($this->dbconnect(),"SELECT * FROM attendance WHERE emp_code='".$formData['emp_code']."'");
          $row = mysqli_fetch_array($sql);
          $starttimestamp = strtotime($row['punch_in_time']);
          $endtimestamp = strtotime($formData['punch_out_time']);
          $difference = ($endtimestamp - $starttimestamp);
          $worked_for = date("H:i",$difference);
          $sql2 = mysqli_query($this->dbconnect(),"UPDATE `attendance` SET `punch_out_date`='".$formData['punch_out_date']."',`punch_out_time`='".$formData['punch_out_time']."',`punch_out_loc`='".$formData['punch_out_loc']."',`time_out`='00:00:00',`worked_for`='".$worked_for."' WHERE emp_code='".$formData['emp_code']."' AND `punch_in_date`='".$today_date."'");
          if($sql2)
          {
          $response["status"] = "1";      
          $response["message"] = "Successful";         
          // $response["data"] = $userInfo;
          return $response;
          }
          else
          {
            $response["status"] = "0"; 
            $response["message"] = "Error occurred during inserting data!";
            return $response;
          }
        }
        else
        {
          $response["status"] = "0"; 
          $response["message"] = "Empty data error. Please send the proper data!";
          return $response;
        }
  
    }
    else
    {
    $response["status"] = "0"; 
    $response["message"] = "Token is incorrect. Please give the correct one!";
    return $response;
    }
    }
    // #4 punch out end

    // #5 travel
    public function live_location($formData)
    {
    try {
    } catch (Exception $e) {
    $response["type"] = "0";
    $response["message"] = $e->getMessage();
    return $response;
    }

    $response = ["status" => "1"];
    $userInfo = [];
    $token = $formData['token'];
    if($token=='SALES_TRACKER')
    {
      $emp_code = $formData['emp_code'];
      $sql = mysqli_query($this->dbconnect(),"SELECT * FROM travel WHERE emp_code='$emp_code' AND `t_date`='".$formData['travel_date']."' ORDER BY `time` DESC LIMIT 1");
      $row = mysqli_fetch_array($sql);
      if(mysqli_num_rows($sql)>0)
      {
        $lat1 = $row['lat'];
        $lon1 = $row['lon'];
      }
      else
      {
        $lat1 = $formData['lat'];
        $lon1 = $formData['lon'];
      }
      if (($lat1 == $formData['lat']) && ($lon1 == $formData['lon'])) {
      $distance =  0;
      }
      else 
      {
      $theta = $lon1 - $formData['lon'];
      $dist = sin(deg2rad($lat1)) * sin(deg2rad($formData['lat'])) +  cos(deg2rad($lat1)) * cos(deg2rad($formData['lat'])) * cos(deg2rad($theta));
      $dist = acos($dist);
      $dist = rad2deg($dist);
      $miles = $dist * 60 * 1.1515;
      // $unit = strtoupper($unit);
      $distance = ($miles * 1.609344);
      $distance = number_format($distance,4);
      }

      $sql2 = mysqli_query($this->dbconnect(),"INSERT INTO `travel`(`emp_code`, `t_date`, `time`, `location`, `lat`, `lon`, `distance_kms`, `battery_per`, `gps`, `connectivity`, `app_version`, `mobile_os_version`, `device_name`, `mock_location`) VALUES ('$emp_code','".$formData['travel_date']."','".$formData['travel_time']."','".$formData['location']."','".$formData['lat']."','".$formData['lon']."','$distance','".$formData['battery']."','".$formData['gps']."','".$formData['connectivity']."','".$formData['app_version']."','".$formData['mobile_os_version']."','".$formData['device_name']."','".$formData['mock_location']."')");
      if($sql2)
      {
      $response["status"] = "1";      
      $response["message"] = "Successful";         
      // $response["data"] = $userInfo;
      return $response;
      }
      else
      {
      $response["status"] = "0"; 
      $response["message"] = "Error occurred during inserting data!";
      return $response;
      }
    }
    else
    {
      $response["status"] = "0"; 
      $response["message"] = "Token is incorrect. Please give the correct one!";
      return $response;
    }
}
    // travel end

// #6 My team 
    public function myteam($formData)
    {
      try {
      } catch (Exception $e) {
        $response["type"] = "0";
        $response["message"] = $e->getMessage();
        return $response;
      }
      
      $response = ["status" => "1"];
      $userInfo = [];
      $token = $formData['token'];
      if($token=='SALES_TRACKER')
      {
        $sql = mysqli_query($this->dbconnect(),"SELECT * FROM `login_master` WHERE report_to='".$formData['emp_code']."'");
          if(mysqli_num_rows($sql)>0)
          {
            $myteam = array();
              while($row = mysqli_fetch_array($sql))
              {
                $userInfo["emp_code"] = $row["emp_code"];
                $userInfo["first_name"] = $row["first_name"];
                $userInfo["last_name"] = $row["last_name"];
                $userInfo["role"] = $row["role"];
                $userInfo["email"] = $row["email"];
                $userInfo["mobile_no"] = $row["mobile_no"];
                $userInfo["designation"] = $row["designation"];
                $userInfo["designation"] = $row["designation"];
                $userInfo["gender"] = $row["gender"];
                $userInfo["photo"] = MENU_URL.$row["photo"];
                $sql2 = mysqli_query($this->dbconnect(),"SELECT MAX(punch_in_date),punch_in_time,punch_in_loc FROM `attendance` WHERE emp_code='".$row["emp_code"]."' AND punch_in_date = (SELECT MAX(punch_in_date) FROM attendance WHERE emp_code='".$row["emp_code"]."')");
                $row2 = mysqli_fetch_array($sql2);
                $userInfo["punch_in_time"] = $row2['punch_in_time'];
                $userInfo["location"] = $row2['punch_in_loc'];
                $sql3 = mysqli_query($this->dbconnect(),"SELECT COUNT(*) as visits FROM `visit` WHERE emp_id='".$row["emp_code"]."'");
                $row3 = mysqli_fetch_array($sql3);
                $userInfo["visits"] = $row3['visits'];
                array_push($myteam,$userInfo);
              }
                $response["status"] = "1";      
                $response["message"] = "Successful";         
                $response["data"] = $myteam;
                return $response;
          }
          else
          {
            $response["status"] = "0"; 
            $response["message"] = "Incorrect employee code or data does not exist for this user";
            return $response;
          }
        }
        else
        {
          $response["status"] = "0"; 
          $response["message"] = "Token is incorrect. Please give the correct one!";
          return $response;
        }
    }
//  My team end

    // #7 member details
    public function member_details($formData)
    {
      try {
      } catch (Exception $e) {
        $response["type"] = "0";
        $response["message"] = $e->getMessage();
        return $response;
      }
      
      $response = ["status" => "1"];
      $userInfo = [];
      $token = $formData['token'];
      if($token=='SALES_TRACKER')
      {
        $today_date = date('Y-m-d');
        $sql = mysqli_query($this->dbconnect(),"SELECT lgn.first_name,lgn.last_name,lgn.emp_code,lgn.designation,lgn.report_to,lgn.mobile_no,lgn.photo,lgn.gender, tra.location,tra.t_date,tra.time as time,SUM(exp.expense_amount) as expenses,exp.id FROM login_master lgn RIGHT JOIN travel tra ON tra.emp_code=lgn.emp_code JOIN expense exp ON exp.emp_id=lgn.emp_code WHERE lgn.emp_code='".$formData['emp_code']."' AND tra.t_date='$today_date' AND exp.date='$today_date' group by tra.location order by time desc limit 1");
          if(mysqli_num_rows($sql)>0)
          {
              $row = mysqli_fetch_array($sql);

              $sql2 = mysqli_query($this->dbconnect(),"SELECT `first_name`, `last_name` FROM login_master WHERE emp_code='".$row['report_to']."'");
              $row2 = mysqli_fetch_array($sql2);

              $userInfo["emp_code"] = $row["emp_code"];
              $userInfo["name"] = $row["first_name"]." ".$row["last_name"];
              $userInfo["profile_pic"] = MENU_URL.$row["photo"];
              $userInfo["designation"] = $row["designation"];
              $userInfo["reporting_head"] = $row2["first_name"]." ".$row2["last_name"];
              $userInfo["mobile_no"] = $row["mobile_no"];
              $userInfo["expenses"] = $row["expenses"];
              $userInfo["current_location"] = $row["location"];

              $response["status"] = "1";      
              $response["message"] = "Successful";         
              $response["data"] = $userInfo;
              return $response;
          }
          else
          {
            $response["status"] = "0"; 
            $response["message"] = "Incorrect employee code or data does not exist for this user";
            return $response;
          }
        }
        else
        {
          $response["status"] = "0"; 
          $response["message"] = "Token is incorrect. Please give the correct one!";
          return $response;
        }
    }
// #7 member details end

  private function dbconnect() {
       $conn=mysqli_connect(DB_HOST,DB_USER,DB_PASSWORD,DB_NAME)
	    or die ("<br/>Could not connect to MySQL server");
          return $conn;
  }

}
?>