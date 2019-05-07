<html>
<body>


<?php


$schedules = array
  (
  array("CS111",3,"Tuesday"),
  array("CS211",3 ,"Wednesday"),
  array("CS212",3,"Thursday"),
  array("CS313",3,"Friday")
  );
  echo '<script type="text/javascript">'
  		 	.'function changeToRed(a){
                a.style.color = "Red";}'
  		 	.'function changeToBlue(a){
                a.style.color = "Blue";}'
  		 	.'function changeToBlack(a){
                a.style.color = "Black";}'
  		 	.'</script>';

echo "<table style='width:20%;border: 9px dotted green;'>";
  for ($row = 0; $row < count($schedules); $row++) {
    if ($row % 2 == 0) {
      echo '<tr onmouseover="changeToRed(this)" onmouseout="changeToBlack(this)">';
    } else {
      echo '<tr onmouseover="changeToBlue(this)" onmouseout="changeToBlack(this)">';
    }

    for ($col = 0; $col < count($schedules[$row]); $col++) {
      echo "<td style='text-align:center;border: 5px solid black;'>".$schedules[$row][$col]."</td>";
    }
    echo "</tr>";
  }
  echo "</table>";
?>    
    
    
    
    
    
    
    
    
    
    
    



    
</body>
</html>