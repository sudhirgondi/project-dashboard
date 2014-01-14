use test_app;

SELECT `messages`.`id`, `messages`.`message`, `messages`.`created_at`, `users`.`first_name`, `users`.`last_name`
FROM (`messages`)
JOIN `users` ON `messages`.`sender_user_id` = `users`.`id`
WHERE `messages`.`user_id` =  '22'