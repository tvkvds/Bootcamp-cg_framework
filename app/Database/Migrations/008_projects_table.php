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
                'user_id' => 1,
                'name' =>  'tic-tac-toe',
                'source' =>  'https://playtictactoe.org/',
                'live' =>  0,
                'created' =>  date('Y-m-d H:i:s'),
                'created_by' =>  1,
                'role' => 'Tic-tac-toe, noughts and crosses, or Xs and Os, is a paper-and-pencil game for two players, X and O, who take turns marking the spaces in a 3×3 grid.'
            ], 

            [
                'user_id' => 1,
                'name' =>  'nu.nl',
                'source' =>  'https://www.nu.nl',
                'live' =>  0,
                'created' =>  date('Y-m-d H:i:s'),
                'created_by' =>  1,
                'role' => 'U.nl is een Nederlandse nieuwswebsite die eigendom is van het mediabedrijf DPG Media uit Vlaanderen. Naast eigen redactionele artikelen plaatst de website ook nieuwsberichten van regionale en lokale partners zoals AT5, NH Nieuws, De Bode en BredaVandaag.'
            ], 

            [
                'user_id' => 1,
                'name' =>  'Github',
                'source' =>  'https://github.com/tvkvds',
                'live' =>  1,
                'created' =>  date('Y-m-d H:i:s'),
                'created_by' =>  1,
                'role' => 'GitHub, Inc. is a provider of Internet hosting for software development and version control using Git. It offers the distributed version control and source code management functionality of Git, plus its own features.'
            ], 
            [
                'user_id' => 1,
                'name' =>  'Find the cow :)',
                'source' =>  'https://findtheinvisiblecow.com/?wpisrc=nl_wonk',
                'live' =>  1,
                'created' =>  date('Y-m-d H:i:s'),
                'created_by' =>  1,
                'role' => 'Drag your mouse (or finger) around to find the cow. Make sure you turn your audio on before playing. If you do not hear anything, it\'s possible that your browser does not support the Web Audio API.'
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