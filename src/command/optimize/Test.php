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
namespace think\admin\command\optimize;

use think\admin\command\commands;
use think\Console;
use think\console\Command;
use think\console\Input;
use think\console\Output;

class Test extends Command
{

    public function __construct($name = null)
    {
        parent::__construct($name);
        $console = new Console();
        $console->add(new commands());
    }

    /** @var  Output */
    protected $output;

    protected function configure()
    {
        $this->setName('think/admin:test')
            ->setDescription('Build route cache.');
    }

    protected function execute(Input $input, Output $output)
    {
        $output->writeln('<info>optimize:test Succeed!</info>');
    }

}
