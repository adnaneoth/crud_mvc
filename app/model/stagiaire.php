<?php
include'Connexion.php';

 class CrudEquipe extends Connexion {

 

   //  function getConnection(){
   //      return  $pdo = new PDO('mysql:dbname=caf;host=localhost', 'root', '');

   //  }
    function latest(){
      
        $pdo = $this->getConnection();
        return  $pdo->query('SELECT * FROM user')->fetchAll(PDO::FETCH_OBJ);
          


    }
    function create(){

         extract($_POST); 
         $pdo = $this->getConnection();
         $sqlState = $pdo->prepare("INSERT INTO user VALUES (null,?,?,?,?)"); 
        return $sqlState->execute([$nom,$Federation,$Stade_national, $description ]);
    }
    
     function store(){
        var_dump($_POST);
     }
 
     function edit($nom, $Federation, $Stade_national, $description, $id){
      $pdo = $this->getConnection();
      $sqlState = $pdo->prepare("UPDATE user SET nom=?, Federation=?, Stade_national=?, description=? WHERE id=?"); 
      return $sqlState->execute([$nom, $Federation, $Stade_national, $description, $id]);
  }
  
     function destroy($id){
      $pdo = $this->getConnection();
      $sqlState = $pdo->prepare("DELETE FROM user WHERE id=? ");  
        return $sqlState->execute([$id]);
 
     }
     function view($id){
      $pdo = $this->getConnection();
      $sqlState = $pdo->prepare(" SELECT * FROM user WHERE id=? ");  
          $sqlState->execute([$id]);
          return $sqlState->fetch(PDO::FETCH_OBJ);

     }

   }
