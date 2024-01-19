<?php

namespace Gz\Utools\Instance\factory;


/**
 *  editor: gz,
 *  motto: 大自然的搬运工
 *  time: 2024-01-12
 */
trait FactoryInstance
{
    private static $instance;

    private static $options;
    /**
     * 类实例化（单例模式）
     */
    public static function instance($options = [])
    {
        $classFullName = self::getClassName();
        if(!empty($options)){
            self::$options = $options;
        }
        if (!isset(self::$instance[$classFullName])) {
            if (!class_exists($classFullName, false)) {
                throw new \Exception('"' . $classFullName . '" was not found !');
            }
            $instance = self::$instance[$classFullName] = new static();
            return $instance;
        }
        return self::$instance[$classFullName];
    }

    /**
     * 获取参数
     * @return void
     */
    final public function getOptions(){
        return self::$options;
    }



    /**
     * 移除instance
     * @return void
     */
    public static function removeInstance()
    {
        $classFullName = get_called_class();
        if (array_key_exists($classFullName, self::$instances)) {
            unset(self::$instances[$classFullName]);
        }
    }

    final protected static function getClassName()
    {
        return get_called_class();
    }

    protected function __construct()
    {
    }

    final protected function __clone()
    {

    }

}