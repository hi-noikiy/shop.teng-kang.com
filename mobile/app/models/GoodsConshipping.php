<?php
//zend by 旺旺ecshop2011所有  禁止倒卖 一经发现停止任何服务
namespace App\Models;

class GoodsConshipping extends \Illuminate\Database\Eloquent\Model
{
	protected $table = 'goods_conshipping';
	public $timestamps = false;
	protected $fillable = array('goods_id', 'sfull', 'sreduce');
	protected $guarded = array();
}

?>
