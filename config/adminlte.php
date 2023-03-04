<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Title
    |--------------------------------------------------------------------------
    |
    | Here you can change the default title of your admin panel.
    |
    | For detailed instructions you can look the title section here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Basic-Configuration
    |
    */

    'title' => 'Mansion de Cristo',
    'title_prefix' => '',
    'title_postfix' => '',

    /*
    |--------------------------------------------------------------------------
    | Favicon
    |--------------------------------------------------------------------------
    |
    | Here you can activate the favicon.
    |
    | For detailed instructions you can look the favicon section here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Basic-Configuration
    |
    */

    'use_ico_only' => false,
    'use_full_favicon' => false,

    /*
    |--------------------------------------------------------------------------
    | Logo
    |--------------------------------------------------------------------------
    |
    | Here you can change the logo of your admin panel.
    |
    | For detailed instructions you can look the logo section here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Basic-Configuration
    |
    */

    'logo' => '<b>Mansion</b> de Cristo',
    'logo_img' => 'vendor/adminlte/dist/img/AdminLTELogo.png',
    'logo_img_class' => 'brand-image img-circle elevation-3',
    'logo_img_xl' => null,
    'logo_img_xl_class' => 'brand-image-xs',
    'logo_img_alt' => 'AdminLTE',

    /*
    |--------------------------------------------------------------------------
    | User Menu
    |--------------------------------------------------------------------------
    |
    | Here you can activate and change the user menu.
    |
    | For detailed instructions you can look the user menu section here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Basic-Configuration
    |
    */

    'usermenu_enabled' => true,
    'usermenu_header' => true,
    'usermenu_header_class' => 'bg-primary',
    'usermenu_image' => false,
    'usermenu_desc' => false,
    'usermenu_profile_url' => true,

    /*
    |--------------------------------------------------------------------------
    | Layout
    |--------------------------------------------------------------------------
    |
    | Here we change the layout of your admin panel.
    |
    | For detailed instructions you can look the layout section here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Layout-and-Styling-Configuration
    |
    */

    'layout_topnav' => null,
    'layout_boxed' => null,
    'layout_fixed_sidebar' => true,
    'layout_fixed_navbar' => true,
    'layout_fixed_footer' => null,
    'layout_dark_mode' => null,

    /*
    |--------------------------------------------------------------------------
    | Authentication Views Classes
    |--------------------------------------------------------------------------
    |
    | Here you can change the look and behavior of the authentication views.
    |
    | For detailed instructions you can look the auth classes section here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Layout-and-Styling-Configuration
    |
    */

    'classes_auth_card' => 'card-outline card-primary',
    'classes_auth_header' => '',
    'classes_auth_body' => '',
    'classes_auth_footer' => '',
    'classes_auth_icon' => '',
    'classes_auth_btn' => 'btn-flat btn-primary',

    /*
    |--------------------------------------------------------------------------
    | Admin Panel Classes
    |--------------------------------------------------------------------------
    |
    | Here you can change the look and behavior of the admin panel.
    |
    | For detailed instructions you can look the admin panel classes here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Layout-and-Styling-Configuration
    |
    */

    'classes_body' => '',
    'classes_brand' => '',
    'classes_brand_text' => '',
    'classes_content_wrapper' => '',
    'classes_content_header' => '',
    'classes_content' => '',
    'classes_sidebar' => 'sidebar-dark-primary elevation-4',
    'classes_sidebar_nav' => '',
    'classes_topnav' => 'navbar-white navbar-light',
    'classes_topnav_nav' => 'navbar-expand',
    'classes_topnav_container' => 'container',

    /*
    |--------------------------------------------------------------------------
    | Sidebar
    |--------------------------------------------------------------------------
    |
    | Here we can modify the sidebar of the admin panel.
    |
    | For detailed instructions you can look the sidebar section here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Layout-and-Styling-Configuration
    |
    */

    'sidebar_mini' => 'lg',
    'sidebar_collapse' => false,
    'sidebar_collapse_auto_size' => false,
    'sidebar_collapse_remember' => false,
    'sidebar_collapse_remember_no_transition' => true,
    'sidebar_scrollbar_theme' => 'os-theme-light',
    'sidebar_scrollbar_auto_hide' => 'l',
    'sidebar_nav_accordion' => true,
    'sidebar_nav_animation_speed' => 100,
    /*
    |--------------------------------------------------------------------------
    | Control Sidebar (Right Sidebar)
    |--------------------------------------------------------------------------
    |
    | Here we can modify the right sidebar aka control sidebar of the admin panel.
    |
    | For detailed instructions you can look the right sidebar section here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Layout-and-Styling-Configuration
    |
    */

    'right_sidebar' => false,
    'right_sidebar_icon' => 'fas fa-cogs',
    'right_sidebar_theme' => 'dark',
    'right_sidebar_slide' => true,
    'right_sidebar_push' => true,
    'right_sidebar_scrollbar_theme' => 'os-theme-light',
    'right_sidebar_scrollbar_auto_hide' => 'l',

    /*
    |--------------------------------------------------------------------------
    | URLs
    |--------------------------------------------------------------------------
    |
    | Here we can modify the url settings of the admin panel.
    |
    | For detailed instructions you can look the urls section here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Basic-Configuration
    |
    */

    'use_route_url' => false,
    'dashboard_url' => '/',
    'logout_url' => 'logout',
    'login_url' => 'login',
    'register_url' => 'register',
    'password_reset_url' => 'forgot-password',
    'password_email_url' => 'password/email',
    'profile_url' => false,

    /*
    |--------------------------------------------------------------------------
    | Laravel Mix
    |--------------------------------------------------------------------------
    |
    | Here we can enable the Laravel Mix option for the admin panel.
    |
    | For detailed instructions you can look the laravel mix section here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Other-Configuration
    |
    */

    'enabled_laravel_mix' => false,
    'laravel_mix_css_path' => 'css/app.css',
    'laravel_mix_js_path' => 'js/app.js',

    /*
    |--------------------------------------------------------------------------
    | Menu Items
    |--------------------------------------------------------------------------
    |
    | Here we can modify the sidebar/top navigation of the admin panel.
    |
    | For detailed instructions you can look here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Menu-Configuration
    |
    */


    'menu' => [
        // // Sidebar items:
        [
            'type' => 'sidebar-menu-search',
            'text' => 'Buscar',
        ],
        // Sidebar items:
        // Sidebar items:
        [
            'text' => 'blog',
            'url'  => 'admin/blog',
            'can'  => 'manage-blog',
        ],
        [
            'text'        => 'Panel Secretaria',
            'icon'        => 'fas fa-tachometer-alt fa-fw',
            'submenu' => [
                [
                    'text' => 'Panel Principal',
                    'route'  => 'secretary.index',
                    'icon' => 'fas fa-columns fa-fw',
                ],
                [
                    'header' => 'ADMINISTRADOR',
                    'can' => 'admin.secretary.admin',
                ],
                [
                    'text' => 'Jerarquia',
                    'icon' => 'fas fa-sitemap',
                    'route'  => 'admin.secretary.jerarquia.index',
                    'can' => 'admin.secretary.admin',

                ],
                [
                    'text' => 'Redes',
                    'icon' => 'far fa-registered',
                    'route'  => 'admin.secretary.red.index',
                    'can' => 'admin.secretary.admin',

                ],
                // [
                // 'text' => 'Finanzas',
                // 'icon' => 'fas fa-hand-holding-usd',
                // 'route'  => 'administrar.finanzas',
                // 'can' => 'administrar.roles.finanzas'],
                [
                    'text' => 'Crecimiento',
                    'icon' => 'fab fa-fw fa-buffer',
                    'route'  => 'crecimiento.index',
                    'can' =>'crecimiento',
                ],
                // [
                //     'text' => 'Otras Iglesias',
                //     'icon' => 'fas fa-synagogue',
                //     'route'  => 'admin.secretary.temple.index',
                //     'can'=>'admin.secretary.temple',

                // ],
                ['header' => 'OPCIONES DE PANEL'],
                [
                    'text' => 'Equipo',
                    'route'  => 'admin.secretary.equipo.index',
                    'icon' => 'fas fa-users fa-fw',
                ],
                [
                    'text' => 'Mi Crecimiento',
                    'icon' => 'fab fa-fw fa-buffer',
                    'route'  => 'mi_crecimiento',
                ],
                [
                    'text' => 'Celulas',
                    'icon' => 'far fa-fw fa-plus-square',
                    'submenu' => [
                        [
                            'text' => 'Mis Celulas',
                            'icon' => 'fab fa-fw fa-buffer',
                            'route'  => 'celulas.index',
                        ],
                        [
                            'text' => 'Mi Equipo',
                            'icon' => 'fab fa-fw fa-buffer',
                            'route'  => 'celulas_equipo',
                        ],
                        [
                            'header' => 'Celulas Evangelisticas',
                        ],
                        [
                            'text' => 'Mis CE',
                            'icon' => 'fab fa-fw fa-buffer',
                            'route'  => 'celulas_evangelisticas.index',
                        ],
                        [
                            'text' => 'Visitas Pendientes',
                            'icon' => 'fab fa-fw fa-buffer',
                            'route'  => 'visitas_pendientes.index',
                        ],
                    ],


                ],
                // [
                //     'text' => 'Finanzas',
                //     'icon' => 'fas fa-hand-holding-usd',
                //     'submenu' => [
                //         [
                //             'text' => 'Personales',
                //             'icon' => 'fab fa-fw fa-buffer',
                //             'route' => 'admin.secretary.finance.user.index',
                //         ],
                //         [
                //             'text' => 'Por Celulas',
                //             'icon' => 'fab fa-fw fa-buffer',
                //             'route'  => 'por_celula',
                //         ],
                //     ],
                // ],
                // [
                //     'text' => 'Repositorio',
                //     'icon' => 'fab fa-fw fa-buffer',
                //     'url'  => 'admin.blog.category.index',
                // ],
            ],

        ],


        [
            'text'    => 'Panel Blog',
            'icon'    => 'fas fa-tachometer-alt fa-fw',
            'can' => 'admin.blog.home',
            'submenu' => [
                [
                    'header' => 'ADMINISTRADaOR',
                    'can' => 'admin.blog.user.index'
                ],
                [
                    'text' => 'Usuarios',
                    'route'  => 'admin.blog.user.index',
                    'icon' => 'fas fa-users fa-fw',
                    'can' => 'admin.blog.user.index',
                ],
                [
                    'text' => 'Categorias de Enseñanzas',
                    'icon' => 'fab fa-fw fa-buffer',
                    'route'  => 'admin.blog.category.index',
                    'can' => 'admin.blog.category.index',
                ],
                [
                    'text' => 'Estadisticas',
                    'icon' => 'fa fa-chart-area',
                    'route'  => 'admin.blog.estadisticas',
                    'can' => 'admin.blog.user.index',
                ],

                ['header' => 'OPCIONES DE BLOG'],
                [
                    'text' => 'Noticias',
                    'url'  => '',
                    'icon' => 'fas fa-bullhorn fa-fw',
                    'submenu' => [
                        [
                            'text' => 'Publicar Noticia',
                            'route'  => 'admin.blog.announce.create',
                            'icon' => 'fas fa-plus-circle fa-fw',
                        ],
                        [
                            'text' => 'Lista de Noticias',
                            'icon' => 'fas fa-list fa-fw',
                            'route'  => 'admin.blog.announce.index',
                        ],

                    ],
                    'can' => 'admin.blog.announce.index',
                ],
                [
                    'text' => 'Enseñanzas',
                    'url'  => '',
                    'icon' => 'fas fa-bible fa-fw',
                    'submenu' => [
                        [
                            'text' => 'Publicar Enseñanza',
                            'route'  => 'admin.blog.teaching.create',
                            'icon' => 'fas fa-plus-circle fa-fw',
                        ],
                        [
                            'text' => 'Lista de Enseñanzas',
                            'icon' => 'fas fa-list fa-fw',
                            'route'  => 'admin.blog.teaching.index',
                        ],
                    ],
                    'can' => 'admin.blog.teaching',
                ],
                [
                    'text' => 'Ministerios',
                    'url'  => '',
                    'icon' => 'fas fa-users fa-fw',
                    'submenu' => [
                        [
                            'text' => 'Publicar Ministerio',
                            'route'  => 'admin.blog.ministry.create',
                            'icon' => 'fas fa-plus-circle fa-fw',
                        ],
                        [
                            'text' => 'Lista de Ministerios',
                            'icon' => 'fas fa-list fa-fw',
                            'route'  => 'admin.blog.ministry.index',
                        ],
                    ],
                    'can' => 'admin.blog.ministry',
                ],
                [
                    'text' => 'Testimonios',
                    'url'  => '',
                    'icon' => 'far fa-laugh-beam fa-fw',
                    'submenu' => [
                        [
                            'text' => 'Publicar Testimonio',
                            'route'  => 'admin.blog.testimony.create',
                            'icon' => 'fas fa-plus-circle fa-fw',
                        ],
                        [
                            'text' => 'Lista de Testimonios',
                            'icon' => 'fas fa-list fa-fw',
                            'route'  => 'admin.blog.testimony.index',
                        ],

                    ],
                    'can' => 'admin.blog.testimony',
                ],
                [
                    'text' => 'Acerca de',
                    'url'  => '',
                    'icon' => 'fas fa-question-circle fa-fw',
                    'can' => 'admin.blog.contacts'

                ],
                [
                    'text' => 'Mensajes',
                    'route'  => 'admin.blog.contact.index',
                    'icon' => 'fas fa-envelope-square fa-fw',
                    'can' => 'admin.blog.contact'
                ],
                [
                    'text' => 'Acerca de',
                    'route'  => 'admin.blog.acercade.index',
                    'icon' => 'fas fa-envelope-square fa-fw',
                    'can' => 'admin.blog.acercade'
                ],

            ],
        ],
        [
            'header' => 'Mantenimiento ',
            'can' => 'mantenimiento'
        ],
        [
            'text' => 'Configuracion',
            'route'  => 'programador.mantenimiento',
            'icon' => 'fas fa-users fa-fw',
            'can' => 'mantenimiento',
        ],
        [
            'text' => 'Envio de Correos',
            'route'  => 'admin.blog.email.index',
            'icon' => 'fa  fa-fw fa-envelope',
            'can' => 'mantenimiento',
        ],

    ],

    /*
    |--------------------------------------------------------------------------
    | Menu Filters
    |--------------------------------------------------------------------------
    |
    | Here we can modify the menu filters of the admin panel.
    |
    | For detailed instructions you can look the menu filters section here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Menu-Configuration
    |
    */

    'filters' => [
        JeroenNoten\LaravelAdminLte\Menu\Filters\GateFilter::class,
        JeroenNoten\LaravelAdminLte\Menu\Filters\HrefFilter::class,
        JeroenNoten\LaravelAdminLte\Menu\Filters\SearchFilter::class,
        JeroenNoten\LaravelAdminLte\Menu\Filters\ActiveFilter::class,
        JeroenNoten\LaravelAdminLte\Menu\Filters\ClassesFilter::class,
        JeroenNoten\LaravelAdminLte\Menu\Filters\LangFilter::class,
        JeroenNoten\LaravelAdminLte\Menu\Filters\DataFilter::class,
    ],

    /*
    |--------------------------------------------------------------------------
    | Plugins Initialization
    |--------------------------------------------------------------------------
    |
    | Here we can modify the plugins used inside the admin panel.
    |
    | For detailed instructions you can look the plugins section here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Plugins-Configuration
    |
    */

    'plugins' => [
        'Datatables' => [
            'active' => true,
            'files' => [
                [
                    'type' => 'js',
                    'asset' => false,
                    'location' => '//cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js',
                ],
                [
                    'type' => 'js',
                    'asset' => false,
                    'location' => '//cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js',
                ],
                [
                    'type' => 'css',
                    'asset' => false,
                    'location' => '//cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css',
                ],

            ],
        ],
        'Select2' => [
            'active' => true,
            'files' => [
                [
                    'type' => 'js',
                    'asset' => false,
                    'location' => '//cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js',
                ],
                [
                    'type' => 'css',
                    'asset' => false,
                    'location' => '//cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css',
                ],
            ],
        ],
        'Chartjs' => [
            'active' => false,
            'files' => [
                [
                    'type' => 'js',
                    'asset' => false,
                    'location' => '//cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.0/Chart.bundle.min.js',
                ],
            ],
        ],
        'Sweetalert2' => [
            'active' => true,
            'files' => [
                [
                    'type' => 'js',
                    'asset' => true,
                    'location' => 'vendor/sweetalert2/sweetalert2@11.js',
                ],
            ],
        ],
        'Pace' => [
            'active' => false,
            'files' => [
                [
                    'type' => 'css',
                    'asset' => false,
                    'location' => '//cdnjs.cloudflare.com/ajax/libs/pace/1.0.2/themes/blue/pace-theme-center-radar.min.css',
                ],
                [
                    'type' => 'js',
                    'asset' => false,
                    'location' => '//cdnjs.cloudflare.com/ajax/libs/pace/1.0.2/pace.min.js',
                ],
            ],
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | IFrame
    |--------------------------------------------------------------------------
    |
    | Here we change the IFrame mode configuration. Note these changes will
    | only apply to the view that extends and enable the IFrame mode.
    |
    | For detailed instructions you can look the iframe mode section here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/IFrame-Mode-Configuration
    |
    */

    'iframe' => [
        'default_tab' => [
            'url' => null,
            'title' => null,
        ],
        'buttons' => [
            'close' => true,
            'close_all' => true,
            'close_all_other' => true,
            'scroll_left' => true,
            'scroll_right' => true,
            'fullscreen' => true,
        ],
        'options' => [
            'loading_screen' => 1000,
            'auto_show_new_tab' => true,
            'use_navbar_items' => true,
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Livewire
    |--------------------------------------------------------------------------
    |
    | Here we can enable the Livewire support.
    |
    | For detailed instructions you can look the livewire here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Other-Configuration
    |
    */

    'livewire' => true,
];
