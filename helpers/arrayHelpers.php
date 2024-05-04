<?php
function populateArray($data, $arrayToPopulate) {
    if ($data->num_rows > 0) {
    while($row = $data->fetch_assoc()) {
        $arrayToPopulate[] = $row;
    }
} else {
    echo "0 results";
}
print_r($arrayToPopulate);
return $arrayToPopulate;
}
?>