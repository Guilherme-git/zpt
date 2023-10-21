<?php
namespace Company;

use User\User;

class Company extends User {
	private int $id;

	public function greetings() {
		return "Greetings. Your ID is $this->id";
	}
}

?>