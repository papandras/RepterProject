<?php
error_reporting(0);

function TimeDifference($timeFrom, $timeTo)
{
    $timeFrom = new DateTime($timeFrom);
    $timeTo = new DateTime($timeTo);
    if ($timeFrom < $timeTo) {
        $interval = $timeFrom->diff($timeTo);
        return $interval;
    } elseif ($timeFrom > $timeTo) {
        $from = $timeFrom->format('H') + $timeFrom->format('i') / 60;
        $to = $timeTo->format('H') + $timeFrom->format('i') / 60;
        $interval = 24 - $from + $to;
        return $interval;
    } else {
        return "Egyenlő";
    }
}

class Datas
{
    private $airportsData = array();
    private $airports = array();
    private $airlines = array();
    private static $intervalHour;

    public function __construct($inputArray, $intervalHour)
    {
        if (isset($inputArray)) {
            $this->intervalHour = (int)$intervalHour;

            for ($i = 0; $i < count($inputArray); ++$i) {
                $helper = [];
                $helper["flight_date"] = $inputArray[$i]["flight_date"];
                $helper["airline"] = $inputArray[$i]["airline"]["name"];
                $helper["departure_airport"] = $inputArray[$i]["departure"]["airport"];
                $helper["departure_scheduled"] = date(substr(substr($inputArray[$i]["departure"]["scheduled"], 11, 8), 0, 5));
                $helper["departure_delay"] = $inputArray[$i]["departure"]["delay"];
                $helper["departure_terminal"] = $inputArray[$i]["departure"]["terminal"];
                $helper["arrival_airport"] = $inputArray[$i]["arrival"]["airport"];
                $helper["arrival_scheduled"] = date(substr(substr($inputArray[$i]["arrival"]["scheduled"], 11, 8), 0, 5));
                $helper["arrival_delay"] = $inputArray[$i]["arrival"]["delay"];
                $helper["arrival_terminal"] = $inputArray[$i]["arrival"]["terminal"];
                switch ($inputArray[$i]["flight_status"]) {
                    case "scheduled":
                        $helper["status"] = "Ütemezett";
                        break;
                    case "active":
                        $helper["status"] = "Aktív";
                        break;
                    case "landed":
                        $helper["status"] = "Leszállt";
                        break;
                    case "scheduled":
                        $helper["status"] = "Törölve";
                        break;
                    case "incident":
                        $helper["status"] = "Incidens";
                        break;
                    case "data":
                        $helper["status"] = "Elterelt";
                        break;
                    default:
                        $helper["status"] = "-";
                }
                $helper["number"] = $inputArray[$i]["flight"]["iata"];

                array_push($this->airportsData, $helper);

                if (TimeDifference(date('H:i'), $helper["departure_scheduled"]) < $this->intervalHour) {
                    array_push($this->airports, $helper["departure_airport"]);
                }
                if (TimeDifference(date('H:i'), $helper["arrival_scheduled"]) < $this->intervalHour) {
                    array_push($this->airports, $helper["arrival_airport"]);
                }

                array_push($this->airlines, $helper["airline"]);
            }
        } else {
            return "Hibás bemeneti karakterlánc!";
        }
    }

    public function GetDatas()
    {
        return $this->airportsData;
    }

    public function GetAirports()
    {
        return array_merge(array_unique($this->airports));
    }

    public function GetAirlines()
    {
        return array_merge(array_unique($this->airlines));
    }

    public function GetIntervalHours()
    {
        return $this->intervalHour;
    }

    public function SetIntervalHours($intervalHour)
    {
        $this->intervalHour = $intervalHour;
    }
}
