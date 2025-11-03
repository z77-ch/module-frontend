<?php

class SetupManager {

    private $dbHost;
    private $dbUser;
    private $dbPass;
    private $dbName;
    private $dbCharset;

    public function __construct($params) {
        $this->dbHost = $params['db_host'] ?? '';
        $this->dbUser = $params['db_user'] ?? '';
        $this->dbPass = $params['db_pass'] ?? '';
        $this->dbName = $params['db_name'] ?? '';
        $this->dbCharset = $params['db_charset'] ?? 'utf8mb4';
    }

    public function createConfigFiles() {
        $messages = [];

        // Doctrine-Konfiguration
        $doctrineContent = "<?php
return [
    'driver'   => 'pdo_mysql',
    'host'     => '{$this->dbHost}',
    'dbname'   => '{$this->dbName}',
    'user'     => '{$this->dbUser}',
    'password' => '{$this->dbPass}',
    'charset'  => '{$this->dbCharset}',
];";
        $success = true; //file_put_contents('doctrineDefaultconfig.php', $doctrineContent);
        if ($success) {
            $messages[] = ['type' => 'success', 'message' => "✅ 'doctrineDefaultconfig.php' erfolgreich erstellt."];
        } else {
            $messages[] = ['type' => 'error', 'message' => "❌ Fehler beim Erstellen von 'doctrineDefaultconfig.php'."];
        }

        // Anwendungs-Konfiguration
        $appConfigContent = "<?php
define('DATABASE_HOST', '{$this->dbHost}');
define('DATABASE_USER', '{$this->dbUser}');
define('DATABASE_PASS', '{$this->dbPass}');
define('DATABASE_NAME', '{$this->dbName}');
define('DATABASE_CHARSET', '{$this->dbCharset}');";

        $success = true; //file_put_contents('webdreamsApplicationConfig.php', $appConfigContent);
        if ($success) {
            $messages[] = ['type' => 'success', 'message' => "✅ 'webdreamsApplicationConfig.php' erfolgreich erstellt."];
        } else {
            $messages[] = ['type' => 'error', 'message' => "❌ Fehler beim Erstellen von 'webdreamsApplicationConfig.php'."];
        }

        return $messages;
    }

    public function createCacheDirectory() {
        $messages = [];
        $cacheDir = 'cache';
        if (!is_dir($cacheDir)) {
            if (mkdir($cacheDir, 0755, true)) {
                $messages[] = ['type' => 'success', 'message' => "✅ Verzeichnis '{$cacheDir}' erfolgreich angelegt."];
            } else {
                $messages[] = ['type' => 'error', 'message' => "❌ Fehler beim Anlegen des Verzeichnisses '{$cacheDir}'. Berechtigungen prüfen."];
            }
        } else {
            $messages[] = ['type' => 'info', 'message' => "✅ Verzeichnis '{$cacheDir}' existiert bereits."];
        }
        return $messages;
    }

    // TODO: Diese Methode an deine Doctrine-Bootstrap-Datei anpassen
    public function updateDoctrineSchema() {
        $messages = [];

        // Annahme: Hier wird deine Doctrine-Umgebung geladen und die Variable $em steht zur Verfügung
        // Beispiel: require_once '../path/to/doctrine/bootstrap.php';
        $em = null; // <- Ersetze dies durch deine tatsächliche Instanz

        // ... (Dein Doctrine-Code von vorher) ...
        $errorMessages = [/* ... */];

        try {
            $schemaTool = new \Doctrine\ORM\Tools\SchemaTool($em);
        } catch (Exception $e) {
            $messages[] = ['type' => 'error', 'message' => 'Fehler beim Erstellen von SchemaTool. ' . $e->getMessage()];
            return $messages;
        }

        // Restlicher Code für Schema-Update
        // ...
        $messages[] = ['type' => 'success', 'message' => "🥳 Datenbank-Schema erfolgreich aktualisiert!"];
        return $messages;
    }
}
