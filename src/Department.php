<?php
namespace Department;

require_once './User.php';

use User\User;

class Department extends User {
	private User $user;

	public function __construct() {
		$this->user = new User(); // @todo fixme
	}

    public function getLargestDepartmentForEachUser() {
        $query = "SELECT u.username, d.name AS largest_department
        FROM user u
        JOIN user_department ud ON u.id = ud.user
        JOIN department d ON ud.department = d.id
        WHERE (d.employees, d.id) IN (
            SELECT MAX(employees), department
            FROM department
            GROUP BY department
        );
    ";

        $result = $this->db->q($query);

        $departments = [];

        while ($row = $result->fetch_assoc()) {
            $departments[$row['username']] = $row['largest_department'];
        }

        return $departments;
    }
}

$d = new Department();
?>