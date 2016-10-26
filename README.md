# thinkphp-admin
基于ThinkPhp 5.0 快速构建后台

##安装方法：
   
    composer require wsh255/thinkphp-admin dev-master




##配置选项：
    配置文件在：thinkphp-admin/src/admin/config.php
    全部配置都可以在项目配置文件中重写


##列表
    
#####使用方法
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
                ->add('username',null,['label'=>'账号','template'=>'user/username'])
                ->add('email')
                ->add('_actions','action',[
                    'edit' => ['label' => '编辑','template'=>'user/edit'],
                    'read' => ['label' => '查看'],
                    'delete' => ['label' => '删除'],
                ])
                ;
       }
    
    }

#####说明    
    1.type: mysql字段类型
        
    2.字段使用自定义模板后，不支持think模板语法，即使用PHP 原生语法输出变量, 例如: <?php echo $item['username']; ?> 输出用户的账号
        
    3. 自定义操作
         ->add('_actions','action',[
            'edit' => ['label' => '编辑'],
            'read' => ['label' => '查看'],
            'delete' => ['label' => '删除'],
        ])
