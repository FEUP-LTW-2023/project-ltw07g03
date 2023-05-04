<?php
    class User {
        public int $id_user;
        public string $name;
        public string $username;
        public string $pwd;
        public string $email;
        public string $category;
    }

    public function __construct(int $id_user, string $name, string $username, string $pwd, string $email, string $category){
        $this->id_user = $id_user;
        $this->name = $name;
        $this->username = $username;
        $this->pwd = $pwd;
        $this->email = $email;
        $this->category = $category;
    }

    function getUser($username) {
        global $db;

        $query = 'SELECT * FROM
                  Users WHERE  
                  username = ?';

        $stmt = $db->prepare($query);
        $stmt->execute(array($username));
        $user = $stmt->fetch();

        return $user;
    }

    function getUserId($username) {
        global $db;

        $query = 'SELECT id_user FROM
                  Users WHERE
                  username = ?';

        $stmt = $db->prepare($query);
        $stmt->execute(array($username));
        $idUser = $stmt->fetch()["id_user"];

        return $idUser;
    }

    function addUser($name, $username, $pwd, $email){
        global $db;

        $stmt = $db->prepare('INSERT INTO Users VALUES (?, ?, ?, ?, ?, ?)');
        $stmt->execute(array($name, $username, password_hash($pwd, PASSWORD_DEFAULT), $email));
    }

    function changeUsername($oldusername, $newUsername){
        global $db;

        $query = 'SELECT * FROM Users WHERE username = ?';
        $stmt = $db->prepare($query);
        $stmt->execute(array($newUsername));
        $probs = $stmt->fetchAll();

        if($oldusername != $newUsername){
            if(count($probs) == 0){
                $stmt->prepare('UPDATE Users SET username = ? WHERE username = ?');
                $stmt->execute(array($oldusername, $newUsername));
                return 0;
            }
            return 1;  
        }
        return 2;
    }

    function changeName($oldName, $newName){
        global $db;

        $query = 'SELECT * FROM Users WHERE name = ?';
        $stmt = $db->prepare($query);
        $stmt->execute(array($newName));
        $probs = $stmt->fetchAll();

        if($oldName != $newName){
            if(count($probs) == 0){
                $stmt->prepare('UPDATE Users SET name = ? WHERE name = ?');
                $stmt->execute(array($oldName, $newName));
                return 0;
            }
            return 1;  
        }
        return 2;
    }

    function changeName($oldEmail, $newEmail){
        global $db;

        $query = 'SELECT * FROM Users WHERE email = ?';
        $stmt = $db->prepare($query);
        $stmt->execute(array($newEmail));
        $probs = $stmt->fetchAll();

        if($oldEmail != $newEmail){
            if(count($probs) == 0){
                $stmt->prepare('UPDATE Users SET email = ? WHERE email = ?');
                $stmt->execute(array($oldEmail, $newEmail));
                return 0;
            }
            return 1;  
        }
        return 2;
    }
       

    function changePwd($username, $oldPwd, $newPwd){
        global $db; 

        $query = 'SELECT * FROM Users WHERE username = ?';
        $stmt = $db->prepare($query);
        $stmt->execute(array($username));
        $currPwd = ($stmt->fetch())['password'];

        if(password_verify($oldPwd, $currPwd)){
            if(!password_verify($newPwd, $currPwd)){
               $stmt->prepare('UPDATE Users SET pwd = ? WHERE username = ?');
            $stmt->execute(array(password_hash($newPwd, PASSWORD_DEFAULT), $username));
            $currPwd = $stmt->fetchAll();
            return 0; 
            }
            return 1;
        }
        return 2;
    }

?> 