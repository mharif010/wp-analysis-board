<?php
class Analysis_Activator
{
    public static function activate()
    {
        Analysis_Activator::db_init();
    }
    public static function db_init()
    {
        global $wpdb;
        $table_name = $wpdb->prefix . 'wpan_analysis';
        $sql = "CREATE TABLE {$table_name}(
            id INT NOT NULL AUTO_INCREMENT,`name` VARCHAR(250),email VARCHAR(250),age INT,PRIMARY KEY (id)
        );";
        require_once ABSPATH . "wp-admin/includes/upgrade.php";
        dbDelta($sql);
        add_option("wpan_analysis_version", WPAN_VERSION);

        $vv = get_option("wpan_analysis_version");
        var_dump($vv);

        if (get_option("wpan_analysis_version") != WPAN_VERSION) {
            $sql = "CREATE TABLE {$table_name}(
                id INT NOT NULL AUTO_INCREMENT,`name` VARCHAR(250),email VARCHAR(250),roll INT,age INT,PRIMARY KEY (id)
            );";
            dbDelta($sql);
            update_option("wpan_analysis_version", WPAN_VERSION);
        }
    }
}
