<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<?php //echo $_SERVER['PHP_SELF'];?>

<form method="post" action="index.php" >
  Combien de places voulez-vous acheter ?: <input type="text" name="nbplaces" required><br>
  A quelle rangée voulez-vous aller ? : <input type="text" name="rangee" required>
  <input type="submit">
</form>


<?php 

for ($a=1; $a <= 8; $a++) {
  if (!(isset(${'r'.$a})) || ${'r'.$a}==9) {
    ${'r'.$a} = 9;
  }
}



  if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $dem = $_POST['nbplaces'];
    $rangee = $_POST['rangee'];

    
    if($rangee<1||$rangee>8){
      echo 'Veuillez entrer en nombre valide pour la rangée(entre 1 et 8)';
    }else{
      if($dem<1){
        echo 'Veuillez entrer en nombre valide pour le nombre de places(entre 1 et 9)';
      }else{
        if ($dem <= ${'r'.$rangee}) {
          ${'r'.$rangee} -= $dem;
  
  
          echo '<table>';
  
          for ($j=1; $j <= 8 ; $j++) {
            echo '<tr>';
            for ($i = 0; $i <=9 ; $i++) {
              
                if ($i==0) {
                  echo '<td>'. $j . '</td>';
                } else {
                    if (($j == $rangee && $i<=(9-${'r'.$rangee})) || $i<=(9-${'r'.$j})) {
                      echo '<td>'. '[ X ]' . '</td>';
                    } else {
                      echo '<td>'. '[ _ ]' . '</td>';
                    }
                }
            }
            echo '</tr>';
          } 
      
          echo '</table>';

            //echo ${'r'.$rangee};
  
        } else {
          echo 'Il n\'y a pas assez de places dans cette rangée.';
        }
      }
    }
  }
    
    
?>  

</body>
</html>