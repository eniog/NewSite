<?php

/**
 * Plugin Name:          Cytaty
 * Plugin URI:           https://otomojdom.pl
 * Description:          Fajne cytaty
 * Version:              0.2.0
 * Requires at least:    5.0
 * Requires PHP:         7.0
 * Author:               HG
 * Licence:              GPL v2 or later
 * 
 * https://codex.wordpress.org/Plugin_API/Filter_Reference
 * https://codex.wordpress.org/Plugin_API/Action_Reference
 */

//====HELPERS START====//

function dd($value)
{
    print_r($value);
    exit;
}

//====HELPERS END====//

//====DATABASES START====//
function wpjcpl_get_table_name()
{
    global $wpdb;
    return $wpdb->prefix . 'wpjcpl_quotes';;
}

function wpjcpl_db_table_create()
{
    require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
    global $wpdb;

    $tableName = wpjcpl_get_table_name();
    $charset = $wpdb->get_charset_collate();
    $sql = "CREATE TABLE $tableName(
        id mediumint(9) NOT NULL AUTO_INCREMENT,
        text text NOT NULL,
        author varchar(50) NOT NULL,
        PRIMARY KEY  (id) 
    )$charset;";

    dbDelta($sql);
}

function wpjcpl_db_import()
{
    global $wpdb;

    $quotes = [
        [
            'text' => 'Biznes jest cenny tylko w takim stopniu, w jakim spełnia ludzkie potrzeby.',
            'author' => 'Bill Gates'
        ],
        [
            'text' => 'Sukces jest kiepskim nauczycielem. Zwodzi inteligentnych ludzi do myślenia, że nie mogą przegrać.',
            'author' => 'Bill Gates'
        ],
        [
            'text' => 'Bądź miły dla kujonów. Są duże szanse, że będziesz dla któregoś pracować.',
            'author' => 'Bill Gates'
        ],
        [
            'text' => 'Jeśli nie możesz czegoś zrobić dobrze, przynajmniej spraw, żeby wyglądało dobrze.',
            'author' => 'Bill Gates'
        ],
        [
            'text' => 'Życie jest niesprawiedliwe; przyzwyczaj się do tego.',
            'author' => 'Bill Gates'
        ],
        [
            'text' => 'Własność intelektualna ma trwałość banana leżącego na półce sklepowej.',
            'author' => 'Bill Gates'
        ],
        [
            'text' => 'Dokonując wyborów lub ustalając zasady dotyczące gospodarki, edukacji lub medycyny, społeczeństwu najlepiej służy wybór ludzie szczególnie pracowitych, inteligentnych i zainteresowany długoterminowymi rozwiązaniami.',
            'author' => 'Bill Gates'
        ],
        [
            'text' => 'Najbardziej niezadowoleni klienci są Twoim największym źródłem wiedzy.',
            'author' => 'Bill Gates'
        ],
        [
            'text' => 'Czytanie cyfrowe z czasem całkowicie przejmie rynek. Jest lekkie i fantastyczne do udostępniania.',
            'author' => 'Bill Gates'
        ],
        [
            'text' => 'Wierzę w innowacje, i w to, że finansowanie badań podstawowych, jest sposobem na ich uzyskanie.',
            'author' => 'Bill Gates'
        ],
        [
            'text' => 'Tym gorzej, że błaznom nie wolno mówić mądrze
            o tym, co mądrzy po błazeńsku robią.',
            'author' => 'William Shakespeare,'
        ],
        [
            'text' => 'Mały wybór w zgniłych jabłkach.',
            'author' => 'William Shakespeare,'
        ],        [
            'text' => 'To życie szpilki złamanej niewarte.',
            'author' => 'William Shakespeare,'
        ],
    ];
    $tableName = wpjcpl_get_table_name();
    foreach ($quotes as $quote) {
        $wpdb->insert($tableName, $quote);
    }
}

//====DATABASES STRRT====//



function wpjcpl_activation()
{
    add_option('wpjcpl_last_quote_id', null);
}

function wpjcpl_deactivation()
{
    global $wpdb;
    $tableName = wpjcpl_get_table_name();
    $wpdb->query("TRUNCATE TABLE $tableName");
    
    //$wpdb->delete($tableName,['id'=>105]);

    update_option('wpjcpl_last_quote_id', null);
}

register_activation_hook(__FILE__, 'wpjcpl_db_table_create');
register_activation_hook(__FILE__, 'wpjcpl_db_import');
register_activation_hook(__FILE__, 'wpjcpl_activation');
register_deactivation_hook(__FILE__, 'wpjcpl_deactivation');

function wpjcpl_get_quote()
{
    global $wpdb;
    $tableName = wpjcpl_get_table_name();
    $quote_count = $wpdb->get_var("SELECT COUNT(*) FROM  $tableName");

    $last_quote_id = get_option('wpjcpl_last_quote_id');
    while (true) {
        $id = rand(1,$quote_count);
        // $id = rand(0,1);
        if ($id != $last_quote_id) {
            break;
        }
    }


    $quote = $wpdb->get_row("SELECT * FROM $tableName WHERE id = $id");
    update_option('wpjcpl_last_quote_id', $id);
    return [
        'text' => wptexturize($quote->text),
        'author' => wptexturize($quote->author)
    ];
}

function wpjcpl_content_add_quote($content)
{
    $quote = wpjcpl_get_quote();
    return $content
        . "<div class='wpjcpl'><blockquote>
        <p> \"{$quote['text']}\"</p>
        <cite>{$quote['author']}</cite>
        </blockquote></div>";
}
add_filter('the_content', 'wpjcpl_content_add_quote');

function wpjcpl_wp_css()
{
    echo '
        <style type="text/css">
            .wpjcpl blockquote{
                margin:0 auto;
                padding:0;
                width:60%;
                background:#fff;
                color:#333;
                font-family: Tahoma, sans-serif;
                font-size: 16px;
            }
            .wpjcpl blockquote p{
                font-style:italic;
                margin-bottom:0;
            }
            .wpjcpl blockquote cite{
                font-size:0.8rem;
                margin-top:10px;
            }

        </style>
    ';
}
add_action('wp_head', 'wpjcpl_wp_css');
