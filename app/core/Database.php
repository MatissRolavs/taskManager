<?php
$config = require "../config.php";
class Database {
    private $host;// Datubāzes servera adrese
    private $user;  // Datubāzes lietotājvārds
    private $pass; // Datubāzes parole
    private $dbname; // Datubāzes nosaukums

    private $dbh; // Datubāzes savienojuma objekts
    private $stmt; // Sagatavotā apgalvojuma objekts
    private $error; // Kļūdas ziņojums

    public function __construct($config){ // Konstruktora funkcija, kas tiek izsaukta, kad tiek izveidots klases objekts
      // Uzstāda DSN
      $this->host = $config["host"];
      $this->user = $config["user"];
      $this->pass = $config["password"];
      $this->dbname = $config["dbname"];
      $dsn = 'mysql:host=' . $this->host . ';dbname=' . $this->dbname;
      $options = array(
        PDO::ATTR_PERSISTENT => true, // Uzstāda pastāvīgu savienojumu
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION // Uzstāda kļūdu režīmu
      );

      // Izveido PDO instanci
      try{
        $this->dbh = new PDO($dsn, $this->user, $this->pass, $options);
      } catch(PDOException $e){
        $this->error = $e->getMessage(); // Saglabā kļūdas ziņojumu
        echo $this->error; // Izdrukā kļūdas ziņojumu
      }
    }

    // Sagatavo apgalvojumu ar vaicājumu
    public function query($sql){
      $this->stmt = $this->dbh->prepare($sql);
    }

    // Saista vērtības
    public function bind($param, $value, $type = null){
      if(is_null($type)){
        switch(true){
          case is_int($value):
            $type = PDO::PARAM_INT; // Ja vērtība ir vesels skaitlis
            break;
          case is_bool($value):
            $type = PDO::PARAM_BOOL; // Ja vērtība ir bool tipa
            break;
          case is_null($value):
            $type = PDO::PARAM_NULL; // Ja vērtība ir null
            break;
          default:
            $type = PDO::PARAM_STR; // Ja vērtība ir string tipa
        }
      }

      $this->stmt->bindValue($param, $value, $type); // Saista parametru ar vērtību
    }

    // Izpilda sagatavoto apgalvojumu
    public function execute(){
      return $this->stmt->execute();
    }

    // Iegūst rezultātu kopu kā objektu masīvu
    public function resultSet(){
      $this->execute();
      return $this->stmt->fetchAll(PDO::FETCH_OBJ);
    }

    // Iegūst vienu ierakstu kā objektu
    public function single(){
      $this->execute();
      return $this->stmt->fetch(PDO::FETCH_OBJ);
    }

    // Iegūst rindu skaitu
    public function rowCount(){
      return $this->stmt->rowCount();
    }

    // Iegūst pēdējā ievietotā ieraksta ID
    public function lastId(){
      return $this->dbh->lastInsertId();
    }
  }