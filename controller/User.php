<?php

namespace Controller;

class User
{
  protected int $ID;
  public string $name;
  public string $email;
  protected string $password;

  public function setPassword(string $password): void
  {
    $this->password = $password;
  }
  public function getID(): int
  {
    return $this->ID;
  }
  public function setID(int $ID): void
  {
    $this->ID = $ID;
  }
}
