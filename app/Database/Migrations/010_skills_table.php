<?php

return [
    'table_name' => 'skills',

    'drop_scheme' => "SET FOREIGN_KEY_CHECKS = 0; DROP TABLE IF EXISTS `skills`; SET FOREIGN_KEY_CHECKS = 1",

    'scheme' => "CREATE TABLE IF NOT EXISTS `skills` (
        `id` int(11) NOT NULL AUTO_INCREMENT,
        `user_id` int NOT NULL,
        `skill` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
        `description` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
        `category` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
        `in_progress` tinyInt(1) DEFAULT NULL,
        `created` timestamp NOT NULL,
        `updated` timestamp DEFAULT CURRENT_TIMESTAMP,
        `deleted` timestamp DEFAULT NULL,
        `created_by` int(11) NOT NULL,
        `updated_by` int(11),
        `deleted_by` int(11),
        PRIMARY KEY (`id`)
      ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;",

    'relations' => [
        'ALTER TABLE `skills` ADD FOREIGN KEY (`user_id`) REFERENCES `users`(`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;',
        'ALTER TABLE `users` ADD FOREIGN KEY (`created_by`) REFERENCES `users`(`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;',
        'ALTER TABLE `users` ADD FOREIGN KEY (`updated_by`) REFERENCES `users`(`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;',
        'ALTER TABLE `users` ADD FOREIGN KEY (`deleted_by`) REFERENCES `users`(`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;',
    ],

    'seeder' => [
        'type' => 'array',
        'data' => [
            [
                'user_id' => 1, #int NOT NULL,
                'skill' => 'skill', # varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
                'description' => 'description', #varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
                'category' => 'category', #varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
                'created' => date('Y-m-d H:i:s'), #timestamp NOT NULL,
                'created_by' => 1 #int(11) NOT NULL,
            ],
            [
                'user_id' => 2, #int NOT NULL,
                'skill' => 'skill', # varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
                'description' => 'description', #varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
                'category' => 'category', #varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
                'created' => date('Y-m-d H:i:s'), #timestamp NOT NULL,
                'created_by' => 1 #int(11) NOT NULL,
            ],
            [
                'user_id' => 3, #int NOT NULL,
                'skill' => 'skill', # varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
                'description' => 'description', #varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
                'category' => 'category', #varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
                'created' => date('Y-m-d H:i:s'), #timestamp NOT NULL,
                'created_by' => 1 #int(11) NOT NULL,
            ],
        ],
    ],
];

/*
Minimum data to make new row

        [
        'user_id' => 1, #int NOT NULL,
        'skill' => 'skill', # varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
        'description' => 'description', #varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
        'category' => 'category' #varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
        'created' => date('Y-m-d H:i:s') #timestamp NOT NULL,
        'created_by' => 1 #int(11) NOT NULL,
        ],




*/