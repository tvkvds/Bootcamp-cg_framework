<?php

return [
    'table_name' => 'projects',

    'drop_scheme' => "SET FOREIGN_KEY_CHECKS = 0; DROP TABLE IF EXISTS `projects`; SET FOREIGN_KEY_CHECKS = 1",

    'scheme' => "CREATE TABLE IF NOT EXISTS `projects` (
        `id` int(11) NOT NULL AUTO_INCREMENT,
        `user_id` int NOT NULL,
        `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
        `source` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
        `role` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
        `live` tinyint(1) NOT NULL,
        `created` timestamp NOT NULL,
        `updated` timestamp DEFAULT CURRENT_TIMESTAMP,
        `deleted` timestamp DEFAULT NULL,
        `created_by` int(11) NOT NULL,
        `updated_by` int(11),
        `deleted_by` int(11),
        PRIMARY KEY (`id`)
      ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;",

    'relations' => [
        'ALTER TABLE `projects` ADD FOREIGN KEY (`user_id`) REFERENCES `users`(`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;',
        'ALTER TABLE `projects` ADD FOREIGN KEY (`created_by`) REFERENCES `users`(`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;',
        'ALTER TABLE `projects` ADD FOREIGN KEY (`updated_by`) REFERENCES `users`(`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;',
        'ALTER TABLE `projects` ADD FOREIGN KEY (`deleted_by`) REFERENCES `users`(`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;',
    ],

    'seeder' => [
        'type' => 'array',
        'data' => [
            [
                'user_id' => 4,
                'name' =>  'tic-tac-toe',
                'source' =>  'https://playtictactoe.org/',
                'live' =>  0,
                'created' =>  date('Y-m-d H:i:s'),
                'created_by' =>  1,
            ], 

            [
                'user_id' => 4,
                'name' =>  'nu.nl',
                'source' =>  'https://www.nu.nl',
                'live' =>  0,
                'created' =>  date('Y-m-d H:i:s'),
                'created_by' =>  1,
            ], 

            [
                'user_id' => 4,
                'name' =>  'Github',
                'source' =>  'https://github.com/tvkvds',
                'live' =>  1,
                'created' =>  date('Y-m-d H:i:s'),
                'created_by' =>  1,
            ], 
            [
                'user_id' => 4,
                'name' =>  'Find the cow :)',
                'source' =>  'https://findtheinvisiblecow.com/?wpisrc=nl_wonk',
                'live' =>  1,
                'created' =>  date('Y-m-d H:i:s'),
                'created_by' =>  1,
            ], 
        ],
    ],
];

/*
Minimum data to make new row

    [
        'user_id' => 0,
        'name' =>  ' ',
        'source' =>  ' ',
        'live' =>  0/1,
        'created' =>  date('Y-m-d H:i:s'),
        'created_by' =>  1,
    ], 

*/