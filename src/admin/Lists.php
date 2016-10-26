<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 2016/9/22
 * Time: 16:30
 */

namespace think\admin\admin;


use think\Exception;

class Lists
{
    //字段信息，[字段=>字段类型]
    protected $fieldsInfo;
    //字段信息,[字段1，字段2]
    protected $fields;

    //显示到列表的字段信息
    private $fds = [];

    public function __construct($fields)
    {
        $this->fieldsInfo = $fields;
        $this->fields = array_keys($fields);
    }

    /**
     * 增加一个字段
     * @param $field
     * @param null $type
     * @param array $options
     * @return $this
     * @throws Exception
     */
    public function add($field, $type = null, $options = [])
    {

        if (strtolower($field) === '_actions') {
            $this->fds[$field] = $options;
        } else {

            if (!in_array($field, $this->fields)) {
                throw new Exception('数据库中不存在' . $field . '字段');
            }
            if (!isset($options['label'])) {
                $options['label'] = $field;
            }
            $fd = [
                'field' => $field,
                'type' => $type,
                'options' => $options
            ];
            if (empty($type)) {
                $fd['type'] = $this->fieldsInfo[$field];
            }
            array_push($this->fds, $fd);
        }

        return $this;
    }

    /**
     * 获取字段信息
     * @return array
     */
    public function getFields()
    {
        if (!isset($this->fds['_actions'])) {
            $this->fds['_actions'] = [
                'edit' => ['label' => '编辑'],
                'read' => ['label' => '查看'],
                'delete' => ['label' => '删除'],
            ];
        }

        return $this->fds;
    }

}