<?php
require_once './User.php';

function setDb(User\User $user, Company\Company $company, Department\Department $department, $db) {
	$user->setDb($db);
    $company->setDb($db);
    $department->setDb($db);
}
?>