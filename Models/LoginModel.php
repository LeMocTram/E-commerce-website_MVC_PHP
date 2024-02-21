<?php
class LoginModel extends BaseModel{
    
    const TABLE = 'users';

    public function login($username){
        return $this->getPassWord(self::TABLE, $username);
    }
}

?>