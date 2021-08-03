<?php

/**
 * Use this table to add permissions to a role
 */

return [
    'table_name' => 'role_has_permission',

    'drop_scheme' => "SET FOREIGN_KEY_CHECKS = 0; DROP TABLE IF EXISTS `role_has_permission`;SET FOREIGN_KEY_CHECKS = 1;",

    'scheme' => "CREATE TABLE IF NOT EXISTS `role_has_permission` (
        `id` int(11) NOT NULL AUTO_INCREMENT,
        `role_id` int(11) NOT NULL,
        `permission_id` int(11) NOT NULL,
        `created` timestamp NOT NULL,
        `updated` timestamp DEFAULT CURRENT_TIMESTAMP,
        `deleted` timestamp DEFAULT NULL,
        `created_by` int(11) NOT NULL,
        `updated_by` int(11),
        `deleted_by` int(11),
        PRIMARY KEY (`id`)
    ) ENGINE=InnoDB  DEFAULT CHARSET=latin1;",

    'relations' => [
        'ALTER TABLE `role_has_permission` ADD FOREIGN KEY (`role_id`) REFERENCES `roles`(`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;',
        'ALTER TABLE `users` ADD FOREIGN KEY (`created_by`) REFERENCES `users`(`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;',
        'ALTER TABLE `users` ADD FOREIGN KEY (`updated_by`) REFERENCES `users`(`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;',
        'ALTER TABLE `users` ADD FOREIGN KEY (`deleted_by`) REFERENCES `users`(`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;',
    ],

    'seeder' => [
        'type' => 'array',
        'data' => array(
        [
            'role_id'       => 2,
            'permission_id' => 1,
            'created'       => date('Y-m-d H:i:s'),
            'created_by'    => 1
        ],

        [
            'role_id'       => 2,
            'permission_id' => 2,
            'created'       => date('Y-m-d H:i:s'),
            'created_by'    => 1
        ],
        
        [
            'role_id'       => 2,
            'permission_id' => 3,
            'created'       => date('Y-m-d H:i:s'),
            'created_by'    => 1
        ],

        [
            'role_id'       => 2,
            'permission_id' => 4,
            'created'       => date('Y-m-d H:i:s'),
            'created_by'    => 1
        ]),
    ],
];