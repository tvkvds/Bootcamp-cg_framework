<?php

return [
    'table_name' => 'skills',

    'drop_scheme' => "SET FOREIGN_KEY_CHECKS = 0; DROP TABLE IF EXISTS `skills`; SET FOREIGN_KEY_CHECKS = 1",

    'scheme' => "CREATE TABLE IF NOT EXISTS `skills` (
        `id` int(11) NOT NULL AUTO_INCREMENT,
        `user_id` int NOT NULL,
        `skill` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
        `description` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
        `category` set('coding', 'design', 'soft') CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT 'coding',
        `in_progress` tinyInt(1) NOT NULL DEFAULT 1,
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
        'ALTER TABLE `skills` ADD FOREIGN KEY (`created_by`) REFERENCES `users`(`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;',
        'ALTER TABLE `skills` ADD FOREIGN KEY (`updated_by`) REFERENCES `users`(`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;',
        'ALTER TABLE `skills` ADD FOREIGN KEY (`deleted_by`) REFERENCES `users`(`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;',
    ],

    'seeder' => [
        'type' => 'array',
        'data' => [
            [
                'user_id' => 4, 
                'skill' => 'HTML', 
                'description' => 'The HyperText Markup Language, or HTML is the standard markup language for documents designed to be displayed in a web browser.', 
                'category' => 'coding', 
                'created' => date('Y-m-d H:i:s'),
                'in_progress' => 1,
                'created_by' => 1 
            ],
            [
                'user_id' => 4, 
                'skill' => 'JS', 
                'description' => 'JavaScript is high-level, often just-in-time compiled, and multi-paradigm. It has curly-bracket syntax, dynamic typing, prototype-based object-orientation, and first-class functions.', 
                'category' => 'coding', 
                'created' => date('Y-m-d H:i:s'),
                'in_progress' => 1,
                'created_by' => 1 
            ],
            [
                'user_id' => 4, 
                'skill' => 'Adobe XD', 
                'description' => 'Adobe XD is a vector-based user experience design tool for web apps and mobile apps, developed and published by Adobe Inc.', 
                'category' => 'design', 
                'created' => date('Y-m-d H:i:s'),
                'in_progress' => 1,
                'created_by' => 1 
            ],
            [
                'user_id' => 4, 
                'skill' => 'Expectation management', 
                'description' => 'Overall, expectation management is highly dependent on your communication skills.', 
                'category' => 'soft', 
                'created' => date('Y-m-d H:i:s'),
                'in_progress' => 1,
                'created_by' => 1 
            ],
        ],
    ],
];

/*
Minimum data to make new row

        [
        'user_id' => 1, 
        'skill' => 'skill', 
        'description' => 'description', #
        'category' => 'category' 
        'created' => date('Y-m-d H:i:s') 
        'created_by' => 1 
        ],




*/