SELECT UPPER(last_name) AS 'NAME', price
FROM user_card
INNER JOIN member ON user_card.id_user = member.id_user_card
INNER JOIN subscription ON member.id_sub = subscription.id_sub
WHERE subscription.price > 42
OEDER BY user_card.last_name, user_card.first_name;
