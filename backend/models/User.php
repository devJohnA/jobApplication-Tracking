<?php 

include_once __DIR__ . '/../config/database.php';

class User {

    private $pdo;

    public function __construct($pdo) {
        $this->pdo = $pdo;
    }


    public function login($email, $password) {
        $sql = "SELECT * FROM users WHERE email = :email";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([':email' => $email]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($user && password_verify($password, $user['password'])) {
            $_SESSION['user_name'] = $user['email'];
            return $user;

        }
        return false;
    }

    public function update($data) {
    
        $sql = "UPDATE users SET 
                email = :email,
                password = :password
                WHERE id = :id";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([
            ':email' => $data['email'],
            ':password' => password_hash($data['password'], PASSWORD_BCRYPT),
            ':id' => $data['id']
        ]);

    return $stmt->rowCount();
    }
    
    public function getUserByEmail($email) {

        $sql = "SELECT * FROM users WHERE email = :email";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([':email' => $email]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}
