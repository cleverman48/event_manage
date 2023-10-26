<?php
require_once 'models/EventModel.php';

class OganizerController
{
    private $event_db;

    public function __construct($event_db)
    {
        $this->event_db = $event_db;
    }
    public function index()
    {
        echo "success";
    }

    public function event_insert()
    {  
        $eventName = $_POST["eventName"];
        $eventDateTime = new DateTime($_POST["eventDateTime"]);
        $venue = $_POST["venue"];
        $address = $_POST["address"];
        $url = $_POST["url"];
        $participation_fee = $_POST["participationFee"];
        $num_participants = $_POST["numParticipants"];
        $matching_restrictions = $_POST["matchingRestrictions"];
        $tags = $_POST["tags"];
        $image = "";
        $content = $_POST["content"];

        $imagePath = "public/image/event/"; // Specify the path to store the images
        $imageName = $_FILES["image"]["name"];
        $imageTemp = $_FILES["image"]["tmp_name"];
        if(move_uploaded_file($imageTemp, $imagePath.$imageName))
        {
            $image =  $imagePath.$imageName;
        }
        // Example code to create an array with named elements   
        $row = [
            'event_name' => $eventName,
            'event_date' => $eventDateTime->format('Y-m-d'),
            'event_time' => $eventDateTime->format('H:i:s'),
            'event_venue' => $venue,
            'event_address' => $address,
            'event_url' => $url,
            'participation_fee' => $participation_fee,
            'num_participants' => $num_participants,
            'matching_restrictions' => $matching_restrictions,
            'tags' => $tags,
            'image_path' => $image,
            'content' => $content,
            'event_oganizer' => "1111"
        ];
        // $dbHost = 'localhost';
        // $dbName = 'event_manage';
        // $dbUser = 'root';
        // $dbPass = '';

        // // Establish database connection
        //$db = new PDO("mysql:host=$dbHost;dbname=$dbName;charset=utf8", $dbUser, $dbPass);
        $event = new EventModel($this->event_db);
        $last_id = $event->createEvent($row);
        if($last_id)
        {
            echo "success";
        }

    }
}
?>