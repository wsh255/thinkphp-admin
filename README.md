# thinkphp-admin
基于ThinkPhp 5.0 快速构建后台




配置：
    配置文件在：thinkphp-admin/src/admin/config.php
    全部配置都可以在项目配置文件中重写


列表
    选项说明:
    
        1.type: mysql字段类型
        
        2.字段使用自定义模板后，不支持think模板语法，即使用PHP 原生语法输出变量, 例如: <?php echo $item['username']; ?> 输出用户的账号
        
        3. 自定义操作
             ->add('_actions','action',[
                'edit' => ['label' => '编辑'],
                'read' => ['label' => '查看'],
                'delete' => ['label' => '删除'],
            ])
