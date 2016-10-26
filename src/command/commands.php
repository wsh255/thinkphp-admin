<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK IT ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006-2016 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: liu21st <liu21st@gmail.com>
// +----------------------------------------------------------------------
namespace think\admin\command;

use think\console\Command;
use think\console\Input;
use think\console\Output;

class commands extends Command
{

    /** @var  Output */
    protected $output;

    protected function configure()
    {
        $this->setName('think/admin:commands')
            ->setDescription('Build route cache.');
    }

    protected function execute(Input $input, Output $output)
    {
        $output->writeln('<info>optimize:commands Succeed!</info>');
    }

}
