<?php
function formatRoom($unformattedRoom) {
    return [
        '_id' => $unformattedRoom['_id'],
        'description' => $unformattedRoom['description'],
        'type' => $unformattedRoom['room_type'],
        'name' => $unformattedRoom['room_number'],
        'offer' => $unformattedRoom['offer'],
        'rate' => $unformattedRoom['rate'],
        'price' => calculateRate($unformattedRoom['rate'], $unformattedRoom['discount']),
        'amenities' => json_decode($unformattedRoom['amenities']),
        'photos' => json_decode($unformattedRoom['photos'])[0]

    ];
}

function populateArray($data, $arrayToPopulate) {
    if ($data->num_rows > 0) {
    while($row = $data->fetch_assoc()) {
        $arrayToPopulate[] = formatRoom($row);
    }
} else {
    echo "0 results";
}
return $arrayToPopulate;
}
?>