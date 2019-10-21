<?php
return	array(	

	'shop'=>array('name'=>'商城','child'=>array(
				array('name' => '商品','child' => array(
				    array('name' => '商品列表', 'act'=>'goodsList', 'op'=>'Goods'),
                                    
				)),
				array('name' => '订单','child'=>array(
					array('name' => '订单列表', 'act'=>'index', 'op'=>'Order'),
				)),
	)),
	'finance'=>array('name'=>'业绩管理','child'=>array(
			array('name' => '业绩','child'=>array(
					array('name' => '业绩列表', 'act'=>'index', 'op'=>'Finance'),

			)),
	)),
	
);