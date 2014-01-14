use test_app;

SELECT `comments`.`message_id`, `comments`.`comment`, `comments`.`created_at`, `users`.`first_name`, `users`.`last_name`
FROM (`comments`)
JOIN `messages` ON `comments`.`message_id` = `messages`.`id`
JOIN `users` ON `comments`.`user_id` = `users`.`id`
WHERE `messages`.`user_id` =  '22'
ORDER BY `comments`.`message_id` desc, `comments`.`created_at` desc