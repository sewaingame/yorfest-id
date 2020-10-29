<?php

  $zoom = '[
    {
      "meetingid" : "84212961118",
      "password" : "YORFest20",
      "pwd": "b1ZDWVBlK1JjZElKbEdZaHRJOE5wdz09",
      "day" : "Wednesday",
      "date" : "28-10-2020"
    },{
      "meetingid" : "84212961118",
      "password" : "YORFest20",
      "pwd": "b1ZDWVBlK1JjZElKbEdZaHRJOE5wdz09",
      "day" : "Wednesday",
      "date" : "29-10-2020"
    }]';

  $rd = '[
    [{
      "name" : "Young Organic Fest Virtual Conference",
      "time" : "09.57",
      "endTime" : "17.00"
    }],
	
	[{
      "name" : "Young Organic Fest Virtual Conference",
      "time" : "09.57",
      "endTime" : "17.00"
    }]
    ]';

  date_default_timezone_set("Asia/Jakarta");
  $hours=date("Hi");
  $date=date("d");

  $response["error"]=false;
  $response["message"]="";
  $response["data"]=[];

  $g = $_POST["group"];

  $zoommeeting = json_decode($zoom, true)[$g];
  $rundown = json_decode($rd, true)[$g];

  for ($i=count($rundown)-1; $i >= 0; $i--)
  {
    $endTimes = explode(".", $rundown[$i]["endTime"]);
    $endtime =(int)( $endTimes[0] . $endTimes[1]);

    $times = explode(".", $rundown[$i]["time"]);
    $time =(int)($times[0] . $times[1]);
    // $response["times"][]=$time . '>=' . $hours;
    // $response["is"][] = $i;
    if((int)$endtime >= (int)$hours && (int)$time <= $hours)
    {
        $response["endtime"]=$endtime . '>=' . $hours;
        $response["time"]=$time . '>=' . $hours;
        $response["i"] = $i;
        $response["data"] = $rundown[$i];
        break;
    }
  }

  if($response["data"]==[])
  {
      $response["error"]=true;
  }
  else
  {
    $response["data"]["meetingid"]=$zoommeeting["meetingid"];
    $response["data"]["password"]=$zoommeeting["password"];
    $response["data"]["pwd"]=$zoommeeting["pwd"];
    $response["data"]["day"]=$zoommeeting["day"];
    $response["data"]["date"]=$zoommeeting["date"];

    $endTime = explode(".", $response["data"]["endTime"]);
    $dates = explode("-", $response["data"]["date"]);
    $time = $endTime[0] . $endTime[1];
    $response["time"]=  $dates[0] . "==" . $date;
    $response["data"]["isStarted"] = ($time >= $hours) && $dates[0] == $date;

  }

  echo json_encode($response, JSON_PRETTY_PRINT);
?>
