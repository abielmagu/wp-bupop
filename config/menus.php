<?php

return array(
    'plugin' => array(
        'page_title' => 'Popub Home',
        'menu_title' => 'Popub',
        'capability' => 'manage_options',
        'menu_slug' => 'popub-home',
        'function' => [Inc\Controllers\HomeController::class, 'index'],
        'icon_url' => 'dashicons-images-alt2',
        'position' => 8,
        'submenu' => array(
            [
                'parent_slug' => 'popub-home',
                'page_title' => 'Nueva publicidad',
                'menu_title' => 'Nueva publicidad',
                'capability' => 'manage_options',
                'menu_slug' => 'popub-add',
                'function' => [Inc\Controllers\PublicityController::class, 'add'],
            ],
            [
                'parent_slug' => 'popub-home',
                'page_title' => 'Configuración',
                'menu_title' => 'Configuración',
                'capability' => 'manage_options',
                'menu_slug' => 'popub-settings',
                'function' => [Inc\Controllers\SettingsController::class, 'index'],
            ]
        ),
    ),
);
