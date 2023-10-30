<?php
require_once 'models/EventModel.php';

class OganizerController
{
    private $event_model;
    public function __construct()
    {
        $this->event_model = new EventModel();
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

        $event_id = $this->generateUniqueID();
        $imagePath = "public/image/event/"; // Specify the path to store the images
        $imageName = $event_id.$_FILES["image"]["name"];
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
            'event_oganizer' =>  $_SESSION['login_userID'],
            'event_id' => $event_id,
            'event_state'=>"Waiting"
        ];
        // for($i=0; $i<50; $i++)
        // {
        //     $row['event_id'] = $this->generateUniqueID();
        //     $row['event_name'] = $eventName."-".$i;
        //     $this->event_model->createEvent($row);
        // }
        $last_id = $this->event_model->createEvent($row);
        if($last_id)
        {
            echo "success";
        }

    }
    public function event_update()
    {
        $event_id = $_POST["event_id"];
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
       
        if($_POST["img_flg"]=="true")
        {
            $imagePath = "public/image/event/"; // Specify the path to store the images
            $imageName = $event_id.$_FILES["image"]["name"];
            $imageTemp = $_FILES["image"]["tmp_name"];
            if(move_uploaded_file($imageTemp, $imagePath.$imageName))
            {
                $image =  $imagePath.$imageName;
            }
        }
        // Example code to create an array with named elements   
        $row = [
            'event_id' => $event_id,
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
            'event_oganizer' =>  $_SESSION['login_userID'],
        ];        
        $result = $this->event_model->updateEvent($row);
        if($result)
        {
            echo $result;
        }

    }
    public function get_eventlist()
    {
        $data = $this->event_model->getAllEvents();
        $response = array(
            'state' => 'success',
            'data' => $data
        );
        echo json_encode($response);
    }
    public function generateUniqueID() {
        $length = 5; // Desired length of the ID
        $characters = 'abcdefghijklmnopqrstuvwxyz0123456789';
        $charactersLength = strlen($characters);
        $uniqueId = '';
    
        for ($i = 0; $i < $length; $i++) {
            $randomIndex = mt_rand(0, $charactersLength - 1);
            $uniqueId .= $characters[$randomIndex];
        }
    
        return $uniqueId;
    }      
}
?>