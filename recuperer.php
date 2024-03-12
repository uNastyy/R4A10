<?php
      require("BD.php");
      $BD = new BD();
      function getLast10($table, $id)
      {
          global $BD;
          $req = $BD->getBD()->prepare("SELECT * FROM chatjs where idMessage>(select count(idMessage)-10 from chatjs)");
          $req->execute();
          return $req->fetch();
      }
      ?>