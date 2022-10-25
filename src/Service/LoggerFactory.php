<?php

namespace App\Service;
/**
 * 日志工厂(暂时放在这里)
 */
class LoggerFactory{
    const TYPE_LOG4PHP = 'log4php';
    const TYPE_THINK_LOG = 'think-log';
    private static $loggers=[];

    public static function getLogger($type=self::TYPE_LOG4PHP){
        if(!isset(self::$loggers[$type])){
            switch($type){
                case self::TYPE_THINK_LOG:
                    self::$loggers[$type] = new ThinkLogger();
                    break;
                default :
                    self::$loggers[$type] = \Logger::getLogger("Log");
                    break;
               
            }
        }
        
        return self::$loggers[$type];
    }
}