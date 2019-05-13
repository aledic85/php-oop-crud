<?php

  include "databaseInfo.php";

  class Pagante{

    private $name;
    private $lastname;
    private $address;

    function __construct($name, $lastname, $address) {

      $this->setName($name);
      $this->setlastname($lastname);
      $this->setAddress($address);
    }

    function getName() {

      return $this->$name;
    }

    function setName($name) {

      $this->name = $name;
    }

    function getlastname() {

      return $this->$lastname;
    }

    function setlastname($lastname) {

      $this->lastname = $lastname;
    }

    function getAddress() {

      return $this->$address;
    }

    function setAddress($address) {

      $this->address = $address;
    }

    static function getAllpaganti($conn) {

      $sql = "SELECT *
              FROM paganti";

      $result = $conn->query($sql);

      $paganti = [];

      if ($result->num_rows > 0) {

        while($row = $result->fetch_assoc()) {

          $paganti[] = new Pagante(
                                $row["name"],
                                $row["lastname"],
                                $row["address"]);
        }
      } else {

        echo "0 results";
      }

      return $paganti;
  }
    static function getAPaganti($conn) {

      $sql = "SELECT *
              FROM paganti";

      $result = $conn->query($sql);

      $Apaganti = [];

      if ($result->num_rows > 0) {

        while($row = $result->fetch_assoc()) {

          // $strName = $row["name"];
          // $findme = "A";
          // $pos = strpos($strName, $findme);
          //
          // if ($pos !== false) {
          //
          //   $Apaganti[] = new Pagante(
          //     $row["name"],
          //     $row["lastname"],
          //     $row["address"]);
          // }

          if ($row["name"][0] == "A") {

            $Apaganti[] = new Pagante(

              $row["name"],
              $row["lastname"],
              $row["address"]);
          }
        }
      } else {

        echo "0 results";
      }

      return $Apaganti;

    }
}
  $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_errno) {

      echo ("Connection failed: " . $conn->connect_error);
      return;
    }

  $paganti = Pagante::getAllPaganti($conn);

  $Apaganti = Pagante::getApaganti($conn);

  $conn->close();

  var_dump($paganti);
  echo "<br>";
  echo "<br";
  var_dump($Apaganti);
 ?>
