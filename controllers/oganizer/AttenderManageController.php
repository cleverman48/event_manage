<?php
require_once 'models/EventModel.php';

class AttenderManageController
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
    public function get_attenderlist()
    {
        // if($_POST['event_id']=="all") return;
        $data = array();
        for($i=0;$i<50;$i++)
        {
            $item = array(
                'event_date' => "2023.10.28",
                'event_time' => "24:30",
                'event_name' => "Physics".$i,
                'attender_id' => 'abcd'.$i,
                'attender_name' => "Mitsubishi",
                'company' => "oyatech",
                'inviter_id' => "mmm".$i,
                'status' => "Processing"
            );
            array_push($data, $item);
        }
        $response = array(
            'state' => 'success',
            'data' => $data
        );
        echo json_encode($response);
    }
     
}
?>