<?php

if (!defined('ABSPATH')) {
    exit;
}

function aaarent_asset(string $path): string
{
    return esc_url(get_template_directory_uri() . '/' . ltrim($path, '/'));
}

function aaarent_style_files(): array
{
    return [
        'base.css',
        'layout.css',
        'components/header.css',
        'components/hero.css',
        'components/search-form.css',
        'components/features.css',
        'components/vehicle-grid.css',
        'components/airport-block.css',
        'components/tips.css',
        'components/offers.css',
        'components/promo.css',
        'components/footer.css',
        'components/modal-menu.css',
        'responsive.css',
    ];
}

function aaarent_enqueue_theme_styles(string $prefix): void
{
    foreach (aaarent_style_files() as $file) {
        $relative = 'css/' . $file;
        $path = get_template_directory() . '/' . $relative;

        if (!file_exists($path)) {
            continue;
        }

        $handle = $prefix . sanitize_title(str_replace(['/', '.css'], ['-', ''], $file));

        wp_enqueue_style(
            $handle,
            get_template_directory_uri() . '/' . $relative,
            [],
            (string) filemtime($path)
        );
    }
}

function aaarent_setup(): void
{
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    add_theme_support('html5', ['search-form', 'comment-form', 'comment-list', 'gallery', 'caption', 'style', 'script']);
}
add_action('after_setup_theme', 'aaarent_setup');

function aaarent_enqueue_assets(): void
{
    aaarent_enqueue_theme_styles('aaarent-');

    $script_files = [
        'header-lang.js',
        'menu-overlay.js',
        'search-form.js',
        'tips-faq.js',
    ];

    foreach ($script_files as $file) {
        $relative = 'js/' . $file;
        $path = get_template_directory() . '/' . $relative;

        if (!file_exists($path)) {
            continue;
        }

        $handle = 'aaarent-' . sanitize_title(str_replace('.js', '', $file));

        wp_enqueue_script(
            $handle,
            get_template_directory_uri() . '/' . $relative,
            [],
            (string) filemtime($path),
            true
        );
    }
}
add_action('wp_enqueue_scripts', 'aaarent_enqueue_assets');

function aaarent_enqueue_editor_assets(): void
{
    aaarent_enqueue_theme_styles('aaarent-editor-');
}
add_action('enqueue_block_editor_assets', 'aaarent_enqueue_editor_assets');

function aaarent_render_section_markup(string $slug): string
{
    $path = get_template_directory() . '/template-parts/sections/' . $slug . '.php';

    if (!file_exists($path)) {
        return '';
    }

    ob_start();
    include $path;

    return trim((string) ob_get_clean());
}

class AAARent_Acf_Blocks
{
    public function __construct()
    {
        add_action('acf/init', [$this, 'register_blocks']);
        add_action('acf/init', [$this, 'register_options_page']);
        add_filter('block_categories_all', [$this, 'register_block_category'], 10, 2);
        add_filter('block_categories', [$this, 'register_block_category_legacy'], 10, 2);
    }

    private function block_definitions(): array
    {
        return [
            'hero' => 'Hero',
            'features-top' => 'Features Top',
            'vehicles' => 'Vehicle Grid',
            'vehicle-benefits' => 'Vehicle Benefits',
            'airport' => 'Airport Block',
            'tips' => 'Tips FAQ',
            'offers' => 'Offers',
            'features-bottom' => 'Features Bottom',
            'promo' => 'Promo',
        ];
    }

    public function register_block_category(array $categories, $post = null): array
    {
        foreach ($categories as $category) {
            if (!empty($category['slug']) && $category['slug'] === 'aaarent-blocks') {
                return $categories;
            }
        }

        array_unshift(
            $categories,
            [
                'slug' => 'aaarent-blocks',
                'title' => __('AAARent Blocks', 'aaarent'),
                'icon' => null,
            ]
        );

        return $categories;
    }

    public function register_block_category_legacy(array $categories, $post = null): array
    {
        return $this->register_block_category($categories);
    }

    public function register_blocks(): void
    {
        if (function_exists('acf_register_block_type')) {
            foreach ($this->block_definitions() as $slug => $label) {
                acf_register_block_type([
                    'name' => 'aaarent-' . $slug,
                    'title' => sprintf(__('AAARent: %s', 'aaarent'), $label),
                    'description' => sprintf(__('AAARent section: %s', 'aaarent'), $label),
                    'render_callback' => [$this, 'render_block'],
                    'category' => 'aaarent-blocks',
                    'icon' => 'layout',
                    'keywords' => [$slug, 'aaarent'],
                    'mode' => 'auto',
                    'supports' => [
                        'align' => false,
                        'jsx' => true,
                    ],
                ]);
            }

            return;
        }

        if (!function_exists('register_block_type')) {
            return;
        }

        foreach ($this->block_definitions() as $slug => $label) {
            register_block_type(
                'aaarent/' . $slug,
                [
                    'api_version' => 2,
                    'title' => sprintf(__('AAARent: %s', 'aaarent'), $label),
                    'description' => sprintf(__('AAARent section: %s', 'aaarent'), $label),
                    'category' => 'aaarent-blocks',
                    'icon' => 'layout',
                    'keywords' => [$slug, 'aaarent'],
                    'attributes' => [
                        'slug' => [
                            'type' => 'string',
                            'default' => $slug,
                        ],
                    ],
                    'supports' => [
                        'html' => false,
                        'reusable' => false,
                    ],
                    'render_callback' => [$this, 'render_core_block'],
                ]
            );
        }
    }

    public function render_block(array $block): void
    {
        $name = isset($block['name']) ? (string) $block['name'] : '';
        $slug = str_replace('acf/aaarent-', '', $name);

        if ($slug === '') {
            return;
        }

        echo aaarent_render_section_markup($slug);
    }

    public function render_core_block(array $attributes = []): string
    {
        $slug = isset($attributes['slug']) ? sanitize_key((string) $attributes['slug']) : '';

        if ($slug === '') {
            return '';
        }

        return aaarent_render_section_markup($slug);
    }

    public function register_options_page(): void
    {
        if (!function_exists('acf_add_options_page')) {
            return;
        }

        acf_add_options_page([
            'page_title' => __('Theme Settings', 'aaarent'),
            'menu_title' => __('Theme Settings', 'aaarent'),
            'menu_slug' => 'theme-settings',
            'capability' => 'edit_posts',
            'redirect' => false,
        ]);
    }
}
new AAARent_Acf_Blocks();

function aaarent_favicon(): void
{
    echo '<link rel="icon" href="' . aaarent_asset('assets/aaa-favicon.ico') . '" type="image/x-icon">';
}
add_action('wp_head', 'aaarent_favicon');
