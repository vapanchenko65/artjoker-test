<?php

class Model_Register extends Model
{
    function __construct()
    {
        $this->pdo = self::get_DB();
    }

	public function get_regions()
	{
        $sql = 'SELECT ter_id, ter_address FROM t_koatuu_tree WHERE ter_pid IS NULL';
        $stmt = $this->pdo->query($sql);
        $regions = $stmt->fetchAll();
		return $regions;
	}

    public function get_subregions($region_id)
    {
        $stmt = $this->pdo->prepare('SELECT ter_id, ter_address FROM t_koatuu_tree WHERE ter_pid = :ter_pid');
        $stmt->execute(array('ter_pid' => $region_id));
        $regions = $stmt->fetchAll();
        return $regions;
    }

    public function get_subsubregion($subregion_id)
    {
        $stmt = $this->pdo->prepare('SELECT ter_address FROM t_koatuu_tree WHERE ter_id = :ter_pid');
        $stmt->execute(array('ter_pid' => $subregion_id));
        $subsubregio_address = $stmt->fetch();
        return $subsubregio_address ["ter_address"];
    }

    public function get_user_by_email($email)
    {
        $stmt = $this->pdo->prepare('SELECT * FROM users WHERE email = :email');
        $stmt->execute(array('email' => $email));
        $user = $stmt->fetch();
        return $user;
    }

    public function add_user($data)
    {
        $sql = "INSERT INTO users (email, name, territory) VALUES (:email, :name, :territory)";
        $stmt= $this->pdo->prepare($sql);
        $stmt->execute($data);
    }

}