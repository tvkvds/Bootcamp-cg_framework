<?php


return [
    'table_name' => 'jobs',

    'drop_scheme' => "SET FOREIGN_KEY_CHECKS = 0; DROP TABLE IF EXISTS `jobs`; SET FOREIGN_KEY_CHECKS = 1",

    'scheme' => "CREATE TABLE IF NOT EXISTS `jobs` (
        `id` int(11) NOT NULL AUTO_INCREMENT,
        `user_id` int NOT NULL,
        `role` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
        `company` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
        `responsibilities` text(500) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
        `start_year` year NOT NULL,
        `end_year` year DEFAULT NULL,
        `created` timestamp NOT NULL,
        `updated` timestamp DEFAULT CURRENT_TIMESTAMP,
        `deleted` timestamp DEFAULT NULL,
        `created_by` int(11) NOT NULL,
        `updated_by` int(11),
        `deleted_by` int(11),
        PRIMARY KEY (`id`)
      ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;",

    'relations' => [
        'ALTER TABLE `jobs` ADD FOREIGN KEY (`user_id`) REFERENCES `users`(`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;',
        'ALTER TABLE `jobs` ADD FOREIGN KEY (`created_by`) REFERENCES `users`(`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;',
        'ALTER TABLE `jobs` ADD FOREIGN KEY (`updated_by`) REFERENCES `users`(`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;',
        'ALTER TABLE `jobs` ADD FOREIGN KEY (`deleted_by`) REFERENCES `users`(`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;',
    ],

    'seeder' => [
        'type' => 'array',
        'data' => [  
            [
                'user_id' => 1,
                'start_year' => 2012,
                'role' =>  'function',
                'company' =>  'company fuga fuga atque occaecati omnis voluptatem rem quisquam sapiente aliquam ea et impedit accusamus saepe harum qui dolores quos est',
                'created' =>  date('Y-m-d H:i:s'),
                'created_by' =>  1,
            ],
            [
                'user_id' => 1,
                'start_year' => 2019,
                'role' =>  'Professioneel koekenbakker',
                'company' =>  'Rue savaron',
                'created' =>  date('Y-m-d H:i:s'),
                'created_by' =>  1,
            ],
            [
                'user_id' => 1,
                'start_year' => 2021,
                'role' =>  'Sous-chef',
                'company' =>  'Flanagans',
                'created' =>  date('Y-m-d H:i:s'),
                'created_by' =>  1,
            ],
            
        ]
    ],
];

/*
Minimum data to make new row

        [
            'user_id' => 1,
            'start_year' => 2012,
            'function' =>  'function',
            'company' =>  'company',
            'created' =>  date('Y-m-d H:i:s'),
            'created_by' =>  1,
        ],

*/