<?php
$allBookingsQuery = "SELECT 
    room._id,
    room.room_type,
    room.room_number,
    room.description,
    room.offer,
    room.rate,
    room.discount,
    room.status,
    COALESCE(amenities.amenities, '[]') AS amenities,
    COALESCE(photos.photos, '[]') AS photos
FROM room
LEFT JOIN (
    SELECT
        room,
        COUNT(*) AS bookings_count
    FROM booking
    WHERE (check_in >= ? OR check_out <= ?)
    GROUP BY room
) AS booked_rooms ON room._id = booked_rooms.room
LEFT JOIN (
    SELECT
        room_amenity.room_id,
        JSON_ARRAYAGG(amenity.name) AS amenities
    FROM room_amenity
    LEFT JOIN amenity ON amenity._id = room_amenity.amenity_id
    GROUP BY room_amenity.room_id
) AS amenities ON amenities.room_id = room._id
LEFT JOIN (
    SELECT
        photo.room_id,
        JSON_ARRAYAGG(photo.url) AS photos
    FROM photo
    GROUP BY photo.room_id
) AS photos ON photos.room_id = room._id
WHERE booked_rooms.room IS NULL
OR room._id NOT IN (SELECT DISTINCT room FROM booking)
AND room.status = 'Available';"
?>