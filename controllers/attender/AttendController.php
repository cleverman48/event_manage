<?php
require_once 'models/AttenderModel.php';
class AttendController
{
    private $db;
    public function __construct(){
        global $event_db;
        $this->db = $event_db;
    }
    public function attend_event()
    {
        require 'views/attender/header.php';
        require 'views/attender/attend_event.php';
        require 'views/footer.php';
    }
    public function attender_list()
    {
        require 'views/attender/header.php';
        require 'views/attender/attender_list.php';
        require 'views/footer.php';
    }
    public function my_page()
    {  
        if( !isset($_POST['data']) ){
            $user = $this->get($_SESSION['login_userID']);
            $username = $user['lastname'] . ' ' . $user['firstname'];
            $returnPage = 'false';
        }else{
            $user = json_decode($_POST['data'], true);
            $username = $user['user_name'];
            $avatar = $_POST['avatar'];
            $returnPage = 'true';
        }
        $files = (isset($_POST['files'])) ? $_POST['files'] :'';
        
        $info_set = array();
        $info_set['gender'] = array('非回答', '男性', '女性');
        $info_set['years'] = array('非回答', '20代', '30代', '40代', '50代', '60以上', '10代');
        $info_set['area'] = array('非回答', '北海道', '青森県', '岩手県', '宮城県', '秋田県', '山形県', '福島県', '茨城県', '栃木県', '群馬県', '埼玉県', '千葉県', '東京都', '神奈川県', '新潟県', '富山県', '石川県', '福井県', '山梨県', '長野県', '岐阜県', '静岡県', '愛知県', '三重県', '滋賀県', '京都府', '大阪府', '兵庫県', '奈良県', '和歌山県', '鳥取県', '島根県', '岡山県', '広島県', '山口県', '徳島県', '香川県', '愛媛県', '高知県', '福岡県', '佐賀県', '長崎県', '熊本県', '大分県', '宮崎県', '鹿児島県', '沖縄県');
        $info_set['sector'] = array('非回答', 'アウトソーシング', 'コンサルティング', '営業販売', 'デザイン', 'ITサービス', 'Web制作', 'システム開発', '美容サロン', 'クリニック', 'ファッション', 'フィットネス', 'エネルギー', 'EC通販', '不動産', '情報通信', '士業', '医療', '福祉', '人材', '教育', '広告', '旅行', '宿泊', '飲食', '食品', '建築', '投資', '製造', '小売', '卸売', 'レジャー', '施設管理', '農業', '運輸', '金融', 'NPO');
        $info_set['employee_size'] = array('非回答', '2～10人', '11～30人', '31～50人', '51～100人', '101～300人', '301～500人', '501人以上', '1人');
        $info_set['depart'] = array('非回答', '営業・販売', 'マーケティング', '情報システム', '経営企画', '広報・PR', '人事', '総務・法務', '経理・財務');
        $info_set['position'] = array('非回答', '経営者', '役員（取締役）', '事業部長・工場長', '部長・課長', '係長・主任', '一般社員・職員', '契約・派遣・委託');
        $default_avatar = 'public/image/upload/user.png';
        
        require 'views/attender/header.php';
        require 'views/attender/my_page.php';
        require 'views/footer.php';
    }
    public function previewProfile()
    {
        if (!isset($_POST['gender'])) {
            $user = $this->get($_SESSION['login_userID']);
            $username = $user['lastname'] . ' ' . $user['firstname'];
            $avatar = $user['avatar'];
            $returnPage = false;
        } else {
            $user = $_POST;
            $username = $user['user_name'];
            if( $_FILES['avatar']['name'] != '') {
                $avatar = uploadImage($_FILES['avatar']);
            }else{
                $avatar = $_POST['avatar'];
            }
            $returnPage = true;
        }
        require 'views/attender/header.php';
        require 'views/attender/preview.php';
        require 'views/footer.php';
    }
    public function get($userID)
    {
        $attenderModel = new AttenderModel();
        return $attenderModel->get($userID);
    }
    public function attender_update()
    {
        $attenderModel = new AttenderModel();
        $attenderModel->updateAttender();
    }
}
?>
