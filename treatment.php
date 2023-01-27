<?php
$host = 'localhost';
$port = '3306';
$dbname = 'entreform';
$user = 'root';
$pwd = '';




try {
      
      $newBD=new PDO("mysql:host=$host;port=$port;dbname=$dbname", $user, $pwd);
      echo "connexion etablie";

 
} catch(PDOException $e) {
     die('Erreur:' .$e->getMessage());
}

if(isset($_POST['nom_comm'])&&
   isset($_POST['nom_rep'])&&
   isset($_POST['email'])&&
   isset($_POST['tel'])&&
   isset($_POST['adresse'])&&
   isset($_POST['messag'])){
                $insertion=$newBD->prepare('INSERT INTO mairies VALUES(NULL, :nom_comm, :nom_rep, :email, :tel, :adresse, :messag);');
        $insertion->bindValue(':nom_comm',$_POST['nom_comm']);
        $insertion->bindValue(':nom_rep',$_POST['nom_rep']);
        $insertion->bindValue(':email',$_POST['email']);
        $insertion->bindValue(':tel',$_POST['tel']);
        $insertion->bindValue(':adresse',$_POST['adresse']);
        $insertion->bindValue(':messag',$_POST['messag']);
        $verification=$insertion->execute();
        if($verification){
            echo "<br> Insertion reussie";
        }else{
            echo "echec d'insertion";
        }
   }
    else{
        echo "une variable n'est pas declaree et ou est nulle";
    }    


/*        
$nom_entrp = $_POST['nom_entrp'];
$nom_resp = $_POST['nom_resp'];
$email = $_POST['email'];
$tel = $_POST['tel'];
$adresse = $_POST['adresse'];
$messag = $_POST['messag'];*/

//Database connection
/*$conn = new mysqli('localhost','root','','entreform');
if(conn->connect_error){
    die('connection failed :'.$conn->connect_error);
}else{
    $stmt = "INSERT INTO `entreprises`(`id_entrp`, `nom_entrp`, `nom_resp`, `email`, `tel`, `adresse`, `messag`) VALUES ($nom_entrp, $nom_resp, $email, $tel, $adresse, $messag)"
    $insert = mysqli_query($conn, $stmt);
    if(!insert){
        echo "There are some problems inserting the data";
    }
    else{
        echo "Data inserted";
    }*/




?>