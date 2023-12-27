<?php
class User
{
    private $id;
    private $name;
    private $username;
    private $email;
    private $birthday;
    private $balance;
    private $rating;
    private $role;
    private $role_name;


    public function __construct($id, $name, $username, $email, $birthday, $balance, $role,)
    {
        $this->id = $id;
        $this->name = $name;
        $this->username = $username;
        $this->email = $email;
        $this->birthday = $birthday;
        $this->balance = $balance;
        $this->role = $role;


        if ($this->role == 1) {
            $this->role_name = "User";
        } else if ($this->role == 2) {
            $this->role_name = "Admin";
        } else if ($this->role == 3) {
            $this->role_name = "Journalist";
        }
    }


    public function displayUsers()
    {
 

        echo "<tr>";
        echo "<td>{$this->id}</td>";
        echo "<td>{$this->name}</td>";
        echo "<td>{$this->username}</td>";
        echo "<td>{$this->email}</td>";
        echo "<td>{$this->birthday}</td>";
        echo "<td>{$this->balance}</td>";
        echo "<td>{$this->role_name}</td>";
        echo "<td><div class=\"action-container\"><a href=\"/Online-game-shop/src/controller/delete-user.php?id={$this->id}\" class=\"delete-btn\">Delete</a>
        <a href=\"/Online-game-shop/public/view/admin/edit-user.php?id={$this->id}\" class=\"edit-btn\">Edit</a><div></td>";


        echo "</tr>";

    }
}
