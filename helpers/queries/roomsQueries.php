<?php
$allRoomsQuery = "SELECT
            room._id,
            room.room_type,
            room.room_number,
            room.description,
            room.offer,
            room.room_floor,
            room.rate,
            room.discount,
            room.status,
            COALESCE(amenities.amenities, '[]') AS amenities,
            COALESCE(photos.photos, '[]') AS photos
            FROM room
		LEFT JOIN (
        SELECT
            room_amenity.room_id,
            JSON_ARRAYAGG(amenity.name) AS amenities
        FROM room_amenity
        LEFT JOIN amenity ON amenity._id = room_amenity.amenity_id
            GROUP BY room_amenity.room_id
            ) AS amenities ON amenities.room_id = room._id
        LEFT JOIN (
            SELECT photo.room_id,
                JSON_ARRAYAGG(photo.url) AS photos
            FROM photo
            GROUP BY photo.room_id
        ) AS photos ON photos.room_id = room._id;";

$offerRoomsQuery = "SELECT
            room._id,
            room.room_type,
            room.room_number,
            room.description,
            room.offer,
            room.room_floor,
            room.rate,
            room.discount,
            room.status,
            COALESCE(amenities.amenities, '[]') AS amenities,
            COALESCE(photos.photos, '[]') AS photos
            FROM room
		LEFT JOIN (
        SELECT
            room_amenity.room_id,
            JSON_ARRAYAGG(amenity.name) AS amenities
        FROM room_amenity
        LEFT JOIN amenity ON amenity._id = room_amenity.amenity_id
            GROUP BY room_amenity.room_id
            ) AS amenities ON amenities.room_id = room._id
        LEFT JOIN (
            SELECT photo.room_id,
                JSON_ARRAYAGG(photo.url) AS photos
            FROM photo
            GROUP BY photo.room_id
        ) AS photos ON photos.room_id = room._id
        WHERE offer = 'YES';";

$oneRoomQuery = "SELECT
            room._id,
            room.room_type,
            room.room_number,
            room.description,
            room.offer,
            room.room_floor,
            room.rate,
            room.discount,
            room.status,
            COALESCE(amenities.amenities, '[]') AS amenities,
            COALESCE(photos.photos, '[]') AS photos
            FROM room
		LEFT JOIN (
        SELECT
            room_amenity.room_id,
            JSON_ARRAYAGG(amenity.name) AS amenities
        FROM room_amenity
        LEFT JOIN amenity ON amenity._id = room_amenity.amenity_id
            GROUP BY room_amenity.room_id
            ) AS amenities ON amenities.room_id = room._id
        LEFT JOIN (
            SELECT photo.room_id,
                JSON_ARRAYAGG(photo.url) AS photos
            FROM photo
            GROUP BY photo.room_id
        ) AS photos ON photos.room_id = room._id
        WHERE room._id = ?
        ;";
?>