<?php

namespace Controller;

class User
{
  protected int $ID;
  public string $name;
  public string $email;
  protected string $password;

  public function setPassword($password): void
  {
    $this->password = $password;
  }
  public function getID(): int
  {
    return $this->ID;
  }
  public function setID($ID): void
  {
    $this->ID = $ID;
  }
}
