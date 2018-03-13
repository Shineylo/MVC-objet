  <?php

    class Modele {
  //Logique
        public function getBillets(){

         $bdd = $this->connectBdd();

          $billets = $bdd->query('select BIL_ID as id, BIL_DATE as date,'
        . ' BIL_TITRE as titre, BIL_CONTENU as contenu from T_BILLET'
        . ' order by BIL_ID desc');

          return $billets;
      }


      public function getBillet($idBillet){

         $bdd = $this->connectBdd();

          $billetId = $bdd->prepare('select BIL_ID as id, BIL_DATE as date,'
          . ' BIL_TITRE as titre, BIL_CONTENU as contenu from T_BILLET'
          . ' where BIL_ID=?');
         $billetId->execute(array($idBillet));

          return $billetId;
      }



      private function connectBdd(){

             return new PDO('mysql:host=localhost;dbname=monblog;charset=utf8', 
            'Ludus', 'Ludus',array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));


      }
    }
?>