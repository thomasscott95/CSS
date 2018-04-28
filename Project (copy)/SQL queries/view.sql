SELECT advert.advertId, advert.advertTitle , advert.advertDescription , users.userId,users.username, users.email
FROM advert
INNER JOIN users ON users.userId=advert.fk_userId
WHERE userId = 15;