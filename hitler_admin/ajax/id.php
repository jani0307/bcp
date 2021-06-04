<?php
include "../db.php";

$q = $_GET['q'];


mysqli_select_db($conn,"u931565432_bcp_capital");
$sql="SELECT * FROM bcp_client WHERE client_id = '".$q."'";
$result = mysqli_query($conn,$sql);

while($row = mysqli_fetch_array($result)) {
  echo '  <div class="form-group">
                     <label for="client_id">Client ID</label>
                        <input  type="text" class="form-control" id="client_id" name="client_id" value="' . $row['client_id'] . '" disabled>
                   </div>';
}
mysqli_close($conn);
?>