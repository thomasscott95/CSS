SELECT advert.advertId, users.userId
FROM advert
INNER JOIN users ON users.userId=advert.fk_userId
-- WHERE userId = 15; 