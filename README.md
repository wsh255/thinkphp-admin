# thinkphp-admin
基于ThinkPhp 5.0 快速构建后台

##安装方法：
   
    composer require wsh255/thinkphp-admin dev-master




##配置选项：
    配置文件在：thinkphp-admin/src/admin/config.php
    全部配置都可以在项目配置文件中重写


##列表
    
#####创建控制器
    //{dir}\application\admin\controller\User.php
    <?php
    
    namespace app\admin\controller;
    
    use think\admin\admin\controller\Admin;
    use think\admin\admin\Lists;
    
    class User extends Admin
    {
    
       protected function configureList(Lists $lists)
       {
            $lists
                ->add('id',null,['label'=>'ID'])
                ->add('username',null,['label'=>'账号'])
                ->add('email')
                ->add('_actions','action',[
                    'edit' => ['label' => '编辑'],
                    'read' => ['label' => '查看'],
                    'delete' => ['label' => '删除'],
                ])
                ;
       }
    
    }

#####说明    
1.type: mysql字段类型

    ->add('id',type,['label'=>'ID'])
                
2.字段使用自定义模板

    ->add('username',null,['label'=>'账号','template'=>'user/username'])
    模板自定义后，不支持think模板语法，即使用PHP 原生语法输出变量, 例如: <?php echo $item['username']; ?> 输出用户的账号
            
3.自定义操作

    ->add('_actions','action',[
        'edit' => ['label' => '编辑'],
        'read' => ['label' => '查看'],
        'delete' => ['label' => '删除'],
    ])
    指定模板
    'edit' => ['label' => '编辑','template'=>'user/edit']

#####创建模型
        //{dir}\application\common\model\User.php
        <?php
        
        namespace app\common\model;
        
        use think\Model;
        
        class User extends Model
        {
            //
        }
#####配置数据库
    {dir}\application\config.php
    修改对应的配置文件
    
#####复制静态文件
    
    cp -rf vendor/wsh255/thinkphp-admin/thinkphp-admin/ public/static/thinkphp-admin/ 

创建好数据库打开 
    
    http://localhost:8080/admin/user

您将看到如下
![列表图片](https://github.com/wsh255/thinkphp-admin/raw/master/image/list.png)