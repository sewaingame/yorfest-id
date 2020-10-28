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
      "date" : "28-10-2020"
    }]';

  $rd = '[
    [{
      "name" : "Keynote by Wakil Menteri Desa, Pembangunan Daerah Tertinggal & Transmigrasi",
      "time" : "09.57",
      "endTime" : "10.15"
    },{
      "name" : "Sambutan dari Presiden Republik Indonesia",
      "time" : "10.15",
      "endTime" : "10.20"
    },{
      "name" : "Sambutan Dari Ketua Umum HKTI (Himpunan Kerukunan Tani Indonesia) ",
      "time" : "10.20",
      "endTime" : "10.30"
    },{
      "name" : "Bupati Banyuwangi",
      "time" : "10.30",
      "endTime" : "10.45"
    },{
      "name" : "Boja Farm",
      "time" : "10.45",
      "endTime" : "11.00"
    },{
      "name" : "Tari Dana",
      "time" : "11.00",
      "endTime" : "11.15"
    },{
      "name" : "Agra Daya",
      "time" : "11.15",
      "endTime" : "12.15"
    },{
      "name" : "The Learning farm",
      "time" : "13.15",
      "endTime" : "13.30"
    },{
      "name" : "Ladang Lima",
      "time" : "13.30",
      "endTime" : "13.45"
    },{
      "name" : "Bulk Source",
      "time" : "13.45",
      "endTime" : "14.00"
    },{
      "name" : "Cocona",
      "time" : "14.00",
      "endTime" : "14.45"
    },{
      "name" : "Dirjen Pengembangan Ekspor Nasional, Kementrian Perdagangan",
      "time" : "14.45",
      "endTime" : "15.00"
    },{
      "name" : "Indonesia Trade Promotion Center di Osaka",
      "time" : "15.00",
      "endTime" : "15.15"
    },{
      "name" : "JAGAPATI.COM",
      "time" : "15.15",
      "endTime" : "15.30"
    },{
      "name" : "IndoCon GmbH",
      "time" : "15.30",
      "endTime" : "16.30"
    },{
      "name" : "GENPI Nasional",
      "time" : "16.30",
      "endTime" : "17.00"
    }],

    [{
      "name" : "Opening Keynote Green Slank",
      "time" : "10.00",
      "endTime" : "10.15"
    },{
      "name" : "Bio Cert",
      "time" : "10.15",
      "endTime" : "11.00"
    },{
      "name" : "Certifier",
      "time" : "11.00",
      "endTime" : "11.30"
    },{
      "name" : "Q & A",
      "time" : "11.30",
      "endTime" : "12.00"
    },{
      "name" : "Lunch",
      "time" : "12.00",
      "endTime" : "13.15"
    },{
      "name" : "Keynote",
      "time" : "13.15",
      "endTime" : "13.30"
    },{
      "name" : "Triasindo Royal Agro",
      "time" : "13.30",
      "endTime" : "14.15"
    },{
      "name" : "Pupuk Organik Gunung Salak",
      "time" : "14.15",
      "endTime" : "15.00"
    },{
      "name" : "Q & A",
      "time" : "15.00",
      "endTime" : "15.45"
    },{
      "name" : "Komunitas Organik Indonesia",
      "time" : "15.45",
      "endTime" : "16.00"
    },{
      "name" : "Crowde Funds",
      "time" : "16.00",
      "endTime" : "16.15"
    },{
      "name" : "SPIND.id",
      "time" : "16.15",
      "endTime" : "16.30"
    },{
      "name" : "LOJIN.CO.ID",
      "time" : "16.30",
      "endTime" : "16.45"
    },{
      "name" : "Q & A",
      "time" : "16.45",
      "endTime" : "17.30"
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
