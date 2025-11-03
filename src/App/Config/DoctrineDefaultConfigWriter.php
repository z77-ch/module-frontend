<?php

namespace Z77\Setup\Core\Config;

use \Webdreams\Extensions\Doctrine\ORM\Util\StringConverter;

class DoctrineDefaultConfigWriter {

    private array $configData;

    public function __construct(array $rawData = []) {
        $allowedProperties = [
            'db_host',
            'db_name',
            'db_user',
            'db_password',
            'debug_mode'
        ];

        // Nur erlaubte Schlüssel übernehmen (dein Vorschlag!)
        $filteredData = array_intersect_key($rawData, array_flip($allowedProperties));

        // Standardwerte für fehlende, aber wichtige Schlüssel setzen
        $this->configData = array_merge([
            'db_host' => 'localhost',
            'db_name' => '',
            'db_user' => '',
            'db_password' => '',
            'debug_mode' => 'true'
        ], $filteredData);
    }
    public function getConfigDataAsObject()
    {
        $objectArray = [];
        foreach ($this->configData as $key => $value) {
            $objectArray[StringConverter::camelizeLcFirst($key)] = $value;
        }

        return (object)$objectArray;
    }
    /**
     * Schreibt die finale Konfigurationsdatei in den angegebenen Pfad.
     *
     * @param string $filePath Der vollständige Pfad zur Zieldatei.
     * @return bool True bei Erfolg, false bei einem Fehler.
     */
    public function writeDoctrineDefaultConfig(string $filePath): bool
    {
        $fileContent = $this->buildConfigFileContent();

        // file_put_contents gibt die Anzahl der geschriebenen Bytes oder false bei Fehler zurück.
        return file_put_contents($filePath, $fileContent) !== false;
    }

    /**
     * Baut den PHP-Code für die Konfigurationsdatei als String zusammen.
     *
     * @return string Der Inhalt der Konfigurationsdatei.
     */
    private function buildConfigFileContent(): string
    {
        // Sicherstellen, dass die Werte korrekt formatiert sind
        $db_host = $this->configData['db_host'];
        $db_name = $this->configData['db_name'];
        $db_user = $this->configData['db_user'];
        $db_password = $this->configData['db_password'];
        $debug_mode = ($this->configData['debug_mode'] === 'true') ? 'true' : 'false';
        $date = date('Y-m-d H:i:s');

        return <<<PHP
<?php
/*
 * Setup-Configuration vom $date
 * Diese Konfigurationsdatei wurde automatisch generiert.
 */
\$connectionOptions = [
    'driver' => 'pdo_mysql',
    'host' => '$db_host',
    'user' => '$db_user',
    'password' => '$db_password',
    'dbname' => '$db_name',
    'charset' => 'utf8mb4',
];

const DEBUG = $debug_mode;

/*
 * NameSpaceces Definition example
 *   Key-Wrod       ........NameSpace.......             basedir    .string to custom class.  baseDir    ...... string to Application classes.........
 * ['nameSpace' => 'Webdreams\Cloud\Entities', 'dir' => [\$baseDir . '/ce/cloud/src/Entities', \$baseDir . '/' . APPLICATION_DIR . '/cloud/src/Entities']]
 */
\$applicationDoctrineOptions = [
    'proxyDir' => __DIR__ . '/../ce/lib/Proxies',
    'cacheDir' => __DIR__ . '/../ce/lib/Caches',
    'emClass' => '\\Webdreams\\Extensions\\Doctrine\\ORM\\EntityManager',
    'entityDir' => [
        ['nameSpace' => 'Webdreams\\Service\\Entities', 'dir' => [\$baseDir . '/' . APPLICATION_DIR . '/service/src/Entities']],
        ['nameSpace' => 'Webdreams\\Creditor\\Entities', 'dir' => [\$baseDir . '/' . APPLICATION_DIR . '/creditor/src/Entities']],
        ['nameSpace' => 'Webdreams\\Financial\\Entities', 'dir' => [\$baseDir . '/' . APPLICATION_DIR . '/financial/src/Entities']],
        ['nameSpace' => 'Webdreams\\Order\\Entities', 'dir' => [\$baseDir . '/' . APPLICATION_DIR . '/order/src/Entities']],
        ['nameSpace' => 'Webdreams\\Purchase\\Entities', 'dir' => [\$baseDir . '/' . APPLICATION_DIR . '/purchase/src/Entities']],
        ['nameSpace' => 'Webdreams\\Member\\Entities', 'dir' => [\$baseDir . '/' . APPLICATION_DIR . '/member/src/Entities']],
        ['nameSpace' => 'Webdreams\\Backend\\Entities', 'dir' => [\$baseDir . '/' . APPLICATION_DIR . '/backend/src/Entities']],
        ['nameSpace' => 'Webdreams\\User\\Entities', 'dir' => [\$baseDir . '/' . APPLICATION_DIR . '/user/src/Entities']],
        ['nameSpace' => 'Webdreams\\Mail\\Entities', 'dir' => [\$baseDir . '/' . APPLICATION_DIR . '/mail/src/Entities']],
        ['nameSpace' => 'Webdreams\\Frontend\\Entities', 'dir' => [\$baseDir . '/' . APPLICATION_DIR . '/frontend/src/Entities']],
        ['nameSpace' => 'Webdreams\\Cron\\Entities', 'dir' => [\$baseDir . '/' . APPLICATION_DIR . '/cron/src/Entities']],
        ['nameSpace' => 'Webdreams\\Cloud\\Entities', 'dir' => [\$baseDir . '/' . APPLICATION_DIR . '/cloud/src/Entities']],
        ['nameSpace' => 'Webdreams\\Configurator\\Entities', 'dir' => [\$baseDir . '/' . APPLICATION_DIR . '/configurator/src/Entities']],
    ],
];
PHP;
    }
}
