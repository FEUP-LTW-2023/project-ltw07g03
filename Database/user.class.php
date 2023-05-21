<?php
    class User {
        public int $id_user;
        public string $name;
        public string $username;
        public string $email;
        public string $category;
    

    public function __construct(int $id_user, string $name, string $username, string $email, string $category){
        $this->id_user = $id_user;
        $this->name = $name;
        $this->username = $username;
        $this->email = $email;
        $this->category = $category;
    }


    static function addUser($name, $username, $pwd, $email, $db){

        $stmt = $db->prepare('INSERT INTO Users(name, username, pwd, email, category) VALUES (?, ?, ?, ?, ?);');
        $stmt->execute(array($name, $username, password_hash($pwd, PASSWORD_DEFAULT), $email, 'client'));
    }

    static function checkUserWithPassword($username, $pwd, $db) : ?User {
    
        $query =  'SELECT * FROM 
                   Users WHERE 
                   username = ?';

        $stmt = $db->prepare($query);
        $stmt->execute(array($username));
        $user = $stmt->fetch();
        
        if (password_verify( $pwd, $user["pwd"])) {
            
             return new User(
                $user['id_user'],
                $user['name'],
                $user['username'],
                $user['email'],
                $user['category']
            );
        }

        else {return NULL;}
            
    }

    static function checkUser(PDO $db, $id) : User {
        $stmt = $db->prepare('
          SELECT id_user, name, username, email, category 
          FROM Users 
          WHERE id_user = ?
        ');

        $stmt->execute(array($id));
        $user = $stmt->fetch();

        return new User(
            (int)$user['id_user'],
            $user['name'],
            $user['username'],
            $user['email'],
            $user['category']
        );
    }

    static function checkUsername($username, $db) {

        $query =  'SELECT * FROM 
                   Users WHERE 
                   Username = ?';

        $stmt = $db->prepare($query);
        $stmt->execute(array($username));
        $user = $stmt->fetch();

        if ($user) 
            return TRUE;
            
        else 
            return FALSE;
    }

    static function checkName($id_user, $db) {
        $query =  'SELECT name FROM Users WHERE id_user = ?';
        $stmt = $db->prepare($query);
        $stmt->execute(array($id_user));
        $user = $stmt->fetch(PDO::FETCH_ASSOC);
    
        if ($user !== false) {
            // Obter o valor do campo name
            $name = $user['name'];
    
            return $name;
        }
    
        // Caso não seja encontrado
        return "Nome de usuário não encontrado para o ID fornecido";
    }

    function changeUsername($db){
        $stmt = $db->prepare('
        UPDATE Users SET username = ?
        WHERE id_user = ?
      ');

      $stmt->execute(array($this->username, $this->id_user));
    }

    function changeName($db){
        $stmt = $db->prepare('
        UPDATE Users SET name = ?
        WHERE id_user = ?
      ');

      $stmt->execute(array($this->name, $this->id_user));
    }

    function changeEmail($db){
        $stmt = $db->prepare('
        UPDATE Users SET email = ?
        WHERE id_user = ?
      ');

      $stmt->execute(array($this->email, $this->id_user));
    }
    

    function changePwd($db){
        $stmt = $db->prepare('
        UPDATE Users SET pwd = ?
        WHERE id_user = ?
      ');

      $stmt->execute(array($this->pwd, $this->id_user));
    }

    static function getAllUsers($db) {
        $query = "SELECT * FROM users";
        $stmt = $db->prepare($query);
        $stmt->execute();
        $users = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
        return $users;
    }

    static function changeCategory($db, $id_user, $newCategory) {
        $stmt = $db->prepare('UPDATE Users SET category = ? WHERE id_user = ?');
        $stmt->execute([$newCategory, $id_user]);
    }
}
?> 