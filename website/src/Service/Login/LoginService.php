<?php
namespace livio\Service\Login;

Interface LoginService
{
	public function authenticate($username, $password);
	public function getUserIdByEmail($email);
}