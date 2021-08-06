<?php

return [
    'table_name' => 'educations',

    'drop_scheme' => "SET FOREIGN_KEY_CHECKS = 0; DROP TABLE IF EXISTS `educations`; SET FOREIGN_KEY_CHECKS = 1",

    'scheme' => "CREATE TABLE IF NOT EXISTS `educations` (
        `id` int(11) NOT NULL AUTO_INCREMENT,
        `user_id` int NOT NULL,
        `start_year` year NOT NULL,
        `end_year` year DEFAULT NULL,
        `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
        `info` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
        `institution` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
        `created` timestamp NOT NULL,
        `updated` timestamp DEFAULT CURRENT_TIMESTAMP,
        `deleted` timestamp DEFAULT NULL,
        `created_by` int(11) NOT NULL,
        `updated_by` int(11),
        `deleted_by` int(11),
        PRIMARY KEY (`id`)
      ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;",

    'relations' => [
        'ALTER TABLE `educations` ADD FOREIGN KEY (`user_id`) REFERENCES `users`(`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;',
        'ALTER TABLE `educations` ADD FOREIGN KEY (`created_by`) REFERENCES `users`(`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;',
        'ALTER TABLE `educations` ADD FOREIGN KEY (`updated_by`) REFERENCES `users`(`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;',
        'ALTER TABLE `educations` ADD FOREIGN KEY (`deleted_by`) REFERENCES `users`(`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;',
    ],

    'seeder' => [
        'type' => 'array',
        'data' => [[
            'user_id' => 1,
            'start_year' => 2012,
            'name' => 'PHP',
            'info' => 'PHP Backend Developer',
            'institution' => 'Codegorillas',
            'created' => date('Y-m-d H:i:s'),
            'created_by' => 1,
        ],

        [
            'user_id' => 1,
            'start_year' => 2001,
            'name' => 'Stucadoor',
            'info' => 'Aan een stuk door',
            'institution' => 'Deur de deur deur',
            'created' => date('Y-m-d H:i:s'),
            'created_by' => 1,
        ],

        [
            'user_id' => 2,
            'start_year' => 2001,
            'name' => 'Stucadoor',
            'info' => 'Aan een stuk door',
            'institution' => 'Deur de deur deur',
            'created' => date('Y-m-d H:i:s'),
            'created_by' => 1,
        ],

        [
            'user_id' => 2,
            'start_year' => 1978,
            'name' => 'Kwakmeister',
            'info' => 'professionel kwakkeren',
            'institution' => '*kwak*',
            'created' => date('Y-m-d H:i:s'),
            'created_by' => 1,
        ],

        [
            'user_id' => 3,
            'start_year' => 2012,
            'name' => 'PHP',
            'info' => 'PHP Backend Developer',
            'institution' => 'Codegorillas',
            'created' => date('Y-m-d H:i:s'),
            'created_by' => 1,
        ],

        [
            'user_id' => 3,
            'start_year' => 1978,
            'name' => 'Kwakmeister',
            'info' => 'professionel kwakkeren',
            'institution' => '*kwak*',
            'created' => date('Y-m-d H:i:s'),
            'created_by' => 1,
        ]]
    ],
];

/*
Minimum data to make new row

'user_id' => 1,
'start_year' => 2000,
'name' => ' ',
'info' => ' ',
'institution' => ' ',
'created' => date('Y-m-d H:i:s'),
'created_by' => 1,

*/