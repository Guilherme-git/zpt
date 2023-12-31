<?php
namespace User;

class User {
	protected $db;

	public function getUsersByIds($ids) {
		$users = [];
        $ids_string = implode(',', $ids);

        $result = $this->db->q("SELECT username FROM user WHERE id IN ($ids_string)");

        while ($row = $result->fetch_assoc()) {
            $users[] = $row['username'];
        }

		return $users;
	}

	public function setDb($db) {
		if (!$db || $db->isClosed()) {
			return false;
		}

		if ($db->debug) {
			$db->setGeneralLog('on');
			error_log($db);
		}

		if ($db->profiling) {
			$db->setSlowLog('on');
		}

		$this->db = $db;
	}
}

?>