<? 
class Response {
    public $isСorrect = 0;
    public $msg ='';
    public $addition = [];
}

class UserData {
    public $username;
    public $userId;

    public function __construct($id, $name) {
        $this->id = $id; 
        $this->username = $name;
    }
}