<?php

use Illuminate\Database\Seeder;

class LinksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.运行数据库数据填充
     *
     * @return void
     */
    public function run()
    {
        $data = [
            [
                'link_name'=>'找好活网',
                'link_title'=>'国内最好的私活网',
                'link_url'=>'http://www.zhaohaohuo.com',
                'link_order'=>1
            ],
            [
                'link_name'=>'找好活网2',
                'link_title'=>'国内最好的私活网2',
                'link_url'=>'http://www.zhaohaohuo2.com',
                'link_order'=>2
            ]
        ];
        DB::table('links')->insert($data);
    }
}
