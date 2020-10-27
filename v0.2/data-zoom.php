<?php

  $zoom = '[
    [{
    "meetingid" : "1234653212",
    "password" : "asddwas",
    "name" : "Keynote by Wakil Menteri Desa, Pembangunan Daerah Tertinggal & Transmigrasi",
    "day" : "Wednesday",
    "date" : "28-10-2020",
    "time" : "10.00",
    "endTime" : "10.15"
  },{
    "meetingid" : "1234653212",
    "password" : "asddwas",
    "name" : "Keynote by Wakil Menteri Desa, Pembangunan Daerah Tertinggal & Transmigrasi",
    "day" : "Wednesday",
    "date" : "28-10-2020",
    "time" : "10.15",
    "endTime" : "11.30"
  },{
    "meetingid" : "1234653212",
    "password" : "asddwas",
    "name" : "Keynote by Wakil Menteri Desa, Pembangunan Daerah Tertinggal & Transmigrasi",
    "day" : "Wednesday",
    "date" : "28-10-2020",
    "time" : "11.30",
    "endTime" : "12.30"
  },{
    "meetingid" : "1234653212",
    "password" : "asddwas",
    "name" : "Keynote by Wakil Menteri Desa, Pembangunan Daerah Tertinggal & Transmigrasi",
    "day" : "Wednesday",
    "date" : "28-10-2020",
    "time" : "12.30",
    "endTime" : "16.30"
  },{
    "meetingid" : "1234653212",
    "password" : "asddwas",
    "name" : "Keynote by Wakil Menteri Desa, Pembangunan Daerah Tertinggal & Transmigrasi",
    "day" : "Wednesday",
    "date" : "28-10-2020",
    "time" : "13.30",
    "endTime" : "14.30"
  }],

  [{
    "meetingid" : "1234653212",
    "password" : "asddwas",
    "name" : "Keynote by Wakil Menteri Desa, Pembangunan Daerah Tertinggal & Transmigrasi",
    "day" : "Wednesday",
    "date" : "29-10-2020",
    "time" : "10.00",
    "endTime" : "10.15"
  },{
    "meetingid" : "1234653212",
    "password" : "asddwas",
    "name" : "Keynote by Wakil Menteri Desa, Pembangunan Daerah Tertinggal & Transmigrasi",
    "day" : "Wednesday",
    "date" : "29-10-2020",
    "time" : "10.15",
    "endTime" : "11.30"
  },{
    "meetingid" : "1234653212",
    "password" : "asddwas",
    "name" : "Keynote by Wakil Menteri Desa, Pembangunan Daerah Tertinggal & Transmigrasi",
    "day" : "Wednesday",
    "date" : "29-10-2020",
    "time" : "11.30",
    "endTime" : "12.30"
  },{
    "meetingid" : "1234653212",
    "password" : "asddwas",
    "name" : "Keynote by Wakil Menteri Desa, Pembangunan Daerah Tertinggal & Transmigrasi",
    "day" : "Wednesday",
    "date" : "29-10-2020",
    "time" : "12.30",
    "endTime" : "13.30"
  },{
    "meetingid" : "1234653212",
    "password" : "asddwas",
    "name" : "Keynote by Wakil Menteri Desa, Pembangunan Daerah Tertinggal & Transmigrasi",
    "day" : "Wednesday",
    "date" : "29-10-2020",
    "time" : "13.30",
    "endTime" : "14.30"
  }]
  ]';

  date_default_timezone_set("Asia/Jakarta");
  $hours=date("Hi");

  $response["error"]=false;
  $response["message"]="";
  $response["data"]=[];

  $g = $_POST["group"];

  $day = json_decode($zoom, true)[$g];
  for ($i=count($day)-1; $i > 0; $i--)
  {
    $endTime = explode(".", $day[$i]["endTime"]);
    $time = $endTime[0] . $endTime[1];
    $response["time"]=$hours . '<' . $time;
    if($hours < $time)
    {

        $response["data"] = $day[$i];
        break;
    }
  }

  $endTime = explode(".", $response["data"]["endTime"]);
  $time = $endTime[0] . $endTime[1];
  $response["time"]=$hours . '<' . $time;
  $response["data"]["isStarted"] = $hours < $time;

  if($response["data"]==[])
      $response["error"]=true;

  echo json_encode($response, JSON_PRETTY_PRINT);
?>
