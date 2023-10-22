<?php
namespace Company;

require_once './User.php';

use User\User;

class Company extends User {
	private int $id;

    function __construct(int $id)
    {
        $this->id = $id;
    }
    public function getId(): int
    {
        return $this->id;
    }


    public function greetings() {
		return "Greetings. Your ID is $this->id";
	}
}

?>