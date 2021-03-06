<?php
/**
 * 服务层基类
 *
 * @author: xieyong <qxieyongp@163.com>
 * @Date: 2017/8/26
 * @Time: 14:53
 */

namespace Oranger\Library\Core;

use Oranger\Library\DI\DI;
use Oranger\Library\Exception\ServiceException;
use Oranger\Library\Logger\Logger;

class Service
{
    /**
     * @var array 服务层配置项（继承类可设置）
     */
    protected $option = [];
    /**
     * @var string 服务层日志名（可选，继承类设置）
     */
    protected $log_name = '';
    /**
     * @var Logger
     */
    protected $logger = null;
    /**
     * @var DI
     */
    protected $id = null;

    /**
     * Service constructor.
     *
     * @param array $option 服务配置项
     *
     * @throws ServiceException
     */
    public function __construct(array $option = [])
    {
        if (! empty($option)) {
            $this->option = array_merge($this->option, $option);
        }
        $this->di = DI::getInstance();
        if (! empty($this->log_name)) {
            $this->logger = $this->di->get($this->log_name . '_log');
        }
    }
}
