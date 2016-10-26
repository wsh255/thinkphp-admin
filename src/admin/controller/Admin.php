<?php

namespace think\admin\admin\controller;

use think\admin\admin\Lists;
use think\Config;
use think\Controller;
use think\Exception;
use think\Loader;
use think\Model;
use think\Request;
use think\View;

class Admin extends Controller
{
    //字段信息 [字段=>字段类型]
    private $fields = [];

    private $listsFields = [];

    /**
     * @var $model Model
     */
    private $query = null;

    /**
     * @var $model Model
     */
    protected $model = null;


    public function _initialize()
    {
        //获取字段信息
        $this->getFields();
        //获取配置信息
        $config = require dirname(__DIR__) . '/config.php';
        foreach ($config as $key => $value) {
            if (Config::get($key)) {
                continue;
            }
            Config::set($key, $value);
        }
    }

    /**
     * 重写模板渲染方法
     * @param string $template
     * @param array $vars
     * @param array $replace
     * @param array $config
     * @return mixed
     */
    protected function fetch($template = '', $vars = [], $replace = [], $config = [])
    {
        $dir = dirname(__DIR__) . '/view/';
        $template = $dir . $template;

        $defaultParams = [
            //映射到后台视图目录
            'view_path' => APP_PATH . Config::get('dir_name') . '/view/',
            //后台布局文件
            'layout_path' => dirname(__DIR__) . '/view/layout.html'
        ];

        return parent::fetch($template, array_merge($defaultParams, $vars), $replace, $config);
    }

    /**
     * 获取模型，和模型的字段信息
     * @throws Exception
     */
    protected function getFields()
    {
        $pathArray = explode('\\', get_called_class());
        if (empty($pathArray)) throw new Exception('获取控制器失败');
        $modelName = ucfirst(array_pop($pathArray));
        $this->model = Loader::model($modelName);
        $this->fields = $this->model->getTableInfo('', 'type');
    }

    /**
     * @param Model $model
     * @return Model
     */
    protected function setQuery($model)
    {
        return $model;
    }

    protected function configureList(Lists $lists)
    {
        foreach ($this->fields as $field => $type) {
            $lists->add($field, $type);
        }
        return $lists;
    }


    public function _empty($name)
    {
        if (isset($_SERVER['HTTP_REFERER'])) {
            $historyUrl = $_SERVER['HTTP_REFERER'];
        } else {
            $historyUrl = 'javascript:window.history.back();';
        }

        $view = new View();
        return $view->fetch( dirname(__DIR__) . '/view/404.html', [
            'history_url' => $historyUrl,
            'layout_path' => dirname(__DIR__) . '/view/layout.html'
        ]);
    }

    /**
     * 显示资源列表
     * @throws Exception
     * @return \think\Response
     */
    public function index()
    {
        //读取查询
        if (empty($this->query)) {
            $this->query = $this->setQuery($this->model);
        }
        $lists = new Lists($this->fields);
        $this->configureList($lists);

        $list = $this->query->paginate(Config::get('list_rows'));

        return $this->fetch('lists/base_lists.html', [
            'lists' => $list,
            'fields' => $lists->getFields()
        ]);
    }

    /**
     * 显示创建资源表单页.
     *
     * @return \think\Response
     */
    public function create()
    {
        return $this->fetch('form/base_create.html');
    }

    /**
     * 保存新建的资源
     *
     * @param  \think\Request $request
     * @return \think\Response
     */
    public function save(Request $request)
    {
        //
    }

    /**
     * 显示指定的资源
     *
     * @param  int $id
     * @return \think\Response
     */
    public function read($id)
    {
        //
    }

    /**
     * 显示编辑资源表单页.
     *
     * @param  int $id
     * @return \think\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * 保存更新的资源
     *
     * @param  \think\Request $request
     * @param  int $id
     * @return \think\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * 删除指定资源
     *
     * @param  int $id
     * @return \think\Response
     */
    public function delete($id)
    {
        //

    }


}
