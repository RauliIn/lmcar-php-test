<?php
namespace App\Service;

use think\facade\Log;
use think\LogManager;
/**
 * Think日志类(暂时放在这里)，不熟悉暂时简单整合
 */
class ThinkLogger extends LogManager{
    public function __construct()
    {
        $this->init([
            'default'	=>	'file',
            'channels'	=>	[
                'file'	=>	[
                    'type'	=>	'file',
                    'path'	=>	'./logs/',
                ],
            ],
        ]);
    }
    
    public function log($level, $message, array $context = []): void
    {

        $this->record(strtoupper($message), $level, $context);
    }


}