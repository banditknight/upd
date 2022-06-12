<?php

namespace App\Traits;

use Monolog\Handler\StreamHandler;
use Monolog\Logger;
use Symfony\Component\HttpFoundation\Request;

trait Log
{
    protected $logName = 'usage';

    protected $fileName = 'usage.log';

    protected $filePath;

    private $logLevel;

    /**
     * @throws \JsonException
     */
    public function info($message = null)
    {
        if (!is_array($message)) {
            $this->instance()->info($message);

            return null;
        }

        $userId = $message['userId'];
        $vendorId = $message['vendorId'];
        $method = $message['httpMethod'];
        $oldValue = $message['oldValue'];
        $newValue = $message['newValue'];
        $ipAddress = $message['ipAddress'];
        $status = $message['status'];
        $table = $message['table'];
        $rid = $message['recordID'];
        $token = $message['token'];
        $action = $message['action'];

        unset($message['userId'], $message['vendorId']);

        if ($method === Request::METHOD_OPTIONS || $method === Request::METHOD_GET || $status !== 200) {
            return null;
        }

        if ($method === Request::METHOD_PUT) {
            foreach($oldValue as $e => $val){
                if($val === $newValue[$e]){
                    unset($oldValue[$e],$newValue[$e]);
                }
            }
        }

        $oldValue = empty($oldValue) ? null : json_encode($oldValue, JSON_THROW_ON_ERROR);
        $newValue = empty($newValue) ? null : json_encode($newValue, JSON_THROW_ON_ERROR);

        $encodedMessage = json_encode($message, JSON_THROW_ON_ERROR);

        \App\Models\v1\Log::create([
            'userId' => $userId,
            'vendorId' => $vendorId,
            'content' => $encodedMessage,
            'method' => $method,
            'oldValue' => $oldValue,
            'table' => $table,
            'recordID' => $rid,
            'token' => sha1($token),
            'newValue' => $newValue,
            'ipAddress' => $ipAddress,
            'action' => $action
        ]);

        $this->instance()->info($encodedMessage);
    }

    /**
     * @return string
     */
    public function getLogName(): string
    {
        return $this->logName;
    }

    /**
     * @param string $logName
     */
    public function setLogName(string $logName): void
    {
        $this->logName = $logName;
    }


    /**
     * @return string
     */
    public function getFileName(): string
    {
        return $this->fileName;
    }

    /**
     * @param string $fileName
     */
    public function setFileName(string $fileName): void
    {
        $this->fileName = $fileName;
    }

    /**
     * @return string
     */
    public function getFilePath()
    {
        return $this->filePath ?: storage_path('logs');
    }

    /**
     * @param string $filePath
     */
    public function setFilePath(string $filePath): void
    {
        $this->filePath = $filePath;
    }

    /**
     * @return mixed
     */
    public function getInstanceLog()
    {
        if ($this->instanceLog === null) {
            $this->instance();
        }
        return $this->instanceLog;
    }

    /**
     * @param mixed $instanceLog
     */
    public function setInstanceLog($instanceLog): void
    {
        $this->instanceLog = $instanceLog;
    }

    /**
     * @return int
     */
    public function getLogLevel()
    {
        return $this->logLevel ?: Logger::INFO;
    }

    /**
     * @param int $logLevel
     */
    public function setLogLevel(int $logLevel): void
    {
        $this->logLevel = $logLevel;
    }

    public function instance()
    {
        $log = new Logger($this->logName);
        $log->pushHandler(
            new StreamHandler(
                sprintf('%s/%s', $this->getFilePath(), $this->fileName),
                $this->getLogLevel()
            )
        );

        $this->setInstanceLog($log);

        return $log;
    }
}
