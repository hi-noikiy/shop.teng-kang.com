<?php
//源码由旺旺:ecshop2012所有 未经允许禁止倒卖 一经发现停止任何服务
namespace app\http\team\controllers;

class Admin extends \app\http\base\controllers\Backend
{
	public function __construct()
	{
		parent::__construct();
		include_once BASE_PATH . 'http/' . MODULE_NAME . '/helpers/function_helper.php';
		L(require LANG_PATH . C('shop.lang') . '/team.php');
		$this->assign('lang', array_change_key_case(L()));
		$files = array('order', 'clips', 'payment', 'transaction', 'scecmoban');
		$this->load_helper($files);
		$this->page_num = 10;
		$this->assign('page_num', $this->page_num);
	}

	public function actionIndex()
	{
		$this->admin_priv('team_goods_list');
		$where .= ' g.is_on_sale = 1 AND g.is_alone_sale = 1 AND g.is_delete = 0 AND g.review_status>2 and tg.is_team = 1 ';

		if (IS_POST) {
			$goods_name = I('post.keyword');
			$audit = I('is_audit', '', 'intval');

			if (!empty($goods_name)) {
				$where .= ' AND (g.goods_name LIKE \'%' . $goods_name . '%\' OR g.goods_sn LIKE \'%' . $goods_name . '%\' OR g.keywords LIKE \'%' . $goods_name . '%\')';
			}

			if (!empty($audit)) {
				if ($audit == 3) {
					$where .= ' ';
				}
				else {
					$where .= ' AND tg.is_audit = ' . $audit;
				}
			}
			else {
				$where .= ' AND tg.is_audit = 0';
			}
		}

		$filter['page'] = '{page}';
		$offset = $this->pageLimit(url('index', $filter), $this->page_num);
		$sql_count = 'SELECT count(*) as count FROM {pre}team_goods as tg LEFT JOIN {pre}goods as g ON tg.goods_id = g.goods_id WHERE  ' . $where . ' ORDER BY tg.id DESC';
		$total = $this->model->query($sql_count);
		$this->assign('page', $this->pageShow($total[0]['count']));
		$sql = 'SELECT tg.*,g.user_id,g.goods_sn,g.goods_name,g.shop_price,g.market_price,g.goods_number,g.goods_img,g.goods_thumb,g.is_best,g.is_new,g.is_hot FROM {pre}team_goods as tg LEFT JOIN {pre}goods as g ON tg.goods_id = g.goods_id WHERE ' . $where . ' ORDER BY tg.id DESC LIMIT ' . $offset;
		$list = $this->model->query($sql);

		foreach ($list as $key => $val) {
			$list[$key]['goods_name'] = $val['goods_name'];
			$list[$key]['user_name'] = get_shop_name($val['user_id'], 1);
			$list[$key]['shop_price'] = price_format($val['shop_price']);
			$list[$key]['market_price'] = price_format($val['market_price']);
			$list[$key]['goods_number'] = $val['goods_number'];
			$list[$key]['sales_volume'] = $val['sales_volume'];
			$list[$key]['goods_img'] = get_image_path($val['goods_img']);
			$list[$key]['goods_thumb'] = get_image_path($val['goods_thumb']);
			$list[$key]['team_price'] = price_format($val['team_price']);
			$list[$key]['team_num'] = $val['team_num'];

			if ($val['is_audit'] == 1) {
				$is_audit = '审核未通过';
			}
			else if ($val['is_audit'] == 2) {
				$is_audit = '审核已通过';
			}
			else {
				$is_audit = '未审核';
			}

			$list[$key]['is_audit'] = $is_audit;
			$list[$key]['limit_num'] = $val['limit_num'];
		}

		$this->assign('list', $list);
		$this->display();
	}

	public function actionAddgoods()
	{
		$this->admin_priv('team_add_goods');

		if (IS_POST) {
			$data = I('post.data');

			if ($data['tc_id'] <= 0) {
				exit(json_encode(array('status' => 'n', 'info' => '请选择频道')));
			}

			$data['goods_id'] = I('goods_id', '', 'intval');

			if (empty($data['id'])) {
				$count = $this->model->table('team_goods')->where(array('goods_id' => $data['goods_id']))->count();

				if (1 <= $count) {
					exit(json_encode(array('status' => 'n', 'info' => '此商品已存在拼团商品列表中')));
				}

				if ($this->model->table('team_goods')->data($data)->add()) {
					exit(json_encode(array('status' => 'y', 'info' => '添加成功', 'url' => url('index'))));
				}
				else {
					exit(json_encode(array('status' => 'n', 'info' => '添加失败')));
				}
			}
			else if ($this->model->table('team_goods')->data($data)->where(array('id' => $data['id']))->save()) {
				exit(json_encode(array('status' => 'y', 'info' => '修改成功', 'url' => url('index'))));
			}
			else {
				exit(json_encode(array('status' => 'n', 'info' => '修改失败')));
			}
		}

		if (I('id')) {
			$id = I('id', '', 'intval');
			$info = $this->model->table('team_goods')->where(array('id' => $id))->find();
			$goods = $this->model->table('goods')->field('goods_name')->where(array('goods_id' => $info['goods_id']))->find();
			$info['goods_name'] = $goods['goods_name'];
			$this->assign('info', $info);
		}

		set_default_filter();
		$shop_config = $this->model->table('shop_config')->where(array('code' => 'virtual_limit_nim'))->find();
		$this->assign('virtual_limit_nim', $shop_config['value']);
		$this->assign('team_list', team_cat_list(0, $info['tc_id']));
		$this->display();
	}

	public function actionSearchgoods()
	{
		$this->cat_id = I('cat_id', 0, 'intval');
		$this->brand_id = I('brand_id', 0, 'intval');
		$this->keywords = I('request.keyword');
		$where = '  g.is_on_sale = 1 AND g.is_alone_sale = 1 AND g.is_delete = 0 AND g.review_status>2 and g.user_id =0 ';
		$where .= (isset($this->cat_id) && (0 < $this->cat_id) ? ' AND ' . get_children($this->cat_id) : '');
		$where .= (isset($this->brand_id) && (0 < $this->brand_id) ? ' AND brand_id = \'' . $this->brand_id . '\'' : '');
		$where .= (isset($this->keywords) && (trim($this->keywords) != '') ? ' AND (g.goods_name LIKE \'%' . $this->keywords . '%\' OR g.goods_sn LIKE \'%' . $this->keywords . '%\' OR g.keywords LIKE \'%' . $this->keywords . '%\')' : '');
		$sql = 'SELECT goods_id, goods_name, shop_price FROM {pre}goods as g  where ' . $where . ' ';
		$row = $GLOBALS['db']->getAll($sql);
		exit(json_encode(array('content' => array_values($row))));
	}

	public function actionFiltercategory()
	{
		$cat_id = (empty($_REQUEST['cat_id']) ? 0 : intval($_REQUEST['cat_id']));
		$result = array('error' => 0, 'message' => '', 'content' => '');
		$parent_cat_list = get_select_category($cat_id, 1, true);
		$filter_category_navigation = get_array_category_info($parent_cat_list);
		$cat_nav = '';

		if ($filter_category_navigation) {
			foreach ($filter_category_navigation as $key => $val) {
				if ($key == 0) {
					$cat_nav .= $val['cat_name'];
				}
				else if (0 < $key) {
					$cat_nav .= ' > ' . $val['cat_name'];
				}
			}
		}
		else {
			$cat_nav = '请选择分类';
		}

		$result['cat_nav'] = $cat_nav;
		$cat_level = count($parent_cat_list);

		if ($cat_level <= 3) {
			$filter_category_list = get_category_list($cat_id, 2);
		}
		else {
			$filter_category_list = get_category_list($cat_id, 0);
			$cat_level -= 1;
		}

		$this->assign('filter_category_level', $cat_level);
		$this->assign('filter_category_navigation', $filter_category_navigation);
		$this->assign('filter_category_list', $filter_category_list);
		$result['content'] = $this->fetch('filter_team_category');
		exit(json_encode($result));
	}

	public function actionSearchbrand()
	{
		$goods_id = (empty($_REQUEST['goods_id']) ? 0 : intval($_REQUEST['goods_id']));
		$result = array('error' => 0, 'message' => '', 'content' => '');
		$this->assign('filter_brand_list', search_brand_list($goods_id));
		$result['content'] = $this->fetch('team_brand_list');
		exit(json_encode($result));
	}

	public function actionEditgoods()
	{
		$goods_id = (empty($_REQUEST['goods_id']) ? 0 : intval($_REQUEST['goods_id']));
		$type = (empty($_REQUEST['type']) ? '' : $_REQUEST['type']);
		$result = array('error' => 0, 'message' => '', 'content' => '修改失败');
		$sql = 'SELECT ' . $type . ' FROM {pre}goods WHERE  goods_id = ' . $goods_id;
		$res = $GLOBALS['db']->getOne($sql);

		if ($res == 1) {
			$sql = 'UPDATE {pre}goods SET ' . $type . ' = 0 WHERE goods_id = ' . $goods_id . ' ';
		}
		else {
			$sql = 'UPDATE {pre}goods SET ' . $type . ' = 1 WHERE goods_id = ' . $goods_id . ' ';
		}

		if ($this->model->query($sql)) {
			$result = array('error' => 2, 'message' => '', 'content' => '修改成功');
		}

		exit(json_encode($result));
	}

	public function actionRemovegoods()
	{
		$this->admin_priv('team_goods_list');

		if (IS_POST) {
			$arr = array('url' => url('index'));
			$group_id = I('group', null, 'intval');
			$id = I('id', null, 'intval');
			$id = implode(',', $id);
		}
		else {
			$id = I('id', null, 'intval');
		}

		if (empty($id)) {
			$this->message(L('select_shop'), null, 2);
		}

		if (IS_POST) {
			if ($group_id == 1) {
				$sql = 'UPDATE {pre}team_goods' . ' SET is_team = 0 ' . ' WHERE id in (' . $id . ') ';
				$this->model->query($sql);
			}
			else {
				$sql = 'select goods_id from {pre}team_goods  where id in (' . $id . ') ';
				$list = $this->model->query($sql);

				if ($list) {
					foreach ($list as $key) {
						$one_id[] = $key['goods_id'];
					}

					$goods_id = implode(',', $one_id);
				}

				if ($group_id == 2) {
					$sql = 'UPDATE {pre}goods' . ' SET is_best = 0 ' . ' WHERE goods_id in (' . $goods_id . ') ';
					$this->model->query($sql);
				}
				else if ($group_id == 3) {
					$sql = 'UPDATE {pre}goods' . ' SET is_new = 0 ' . ' WHERE goods_id in (' . $goods_id . ') ';
					$this->model->query($sql);
				}
				else {
					$sql = 'UPDATE {pre}goods' . ' SET is_best = 0 ' . ' WHERE goods_id in (' . $goods_id . ') ';
					$this->model->query($sql);
				}
			}
		}
		else {
			$sql = 'UPDATE {pre}team_goods' . ' SET is_team = 0 ' . ' WHERE id in (' . $id . ') ';
			$this->model->query($sql);
		}

		if (IS_POST) {
			exit(json_encode($arr));
		}
		else {
			$this->redirect('index');
		}
	}

	public function actionCategory()
	{
		$this->admin_priv('team_category');
		$tc_id = I('tc_id', null, 'intval');

		if (0 < $tc_id) {
			$where = 'parent_id = ' . $tc_id . ' order by sort_order asc ';
		}
		else {
			$where = 'parent_id = 0 order by id asc';
		}

		$sql = 'select * from {pre}team_category  where  ' . $where;
		$list = $this->model->query($sql);

		foreach ($list as $key => $val) {
			$list[$key]['goods_number'] = categroy_number($val['id']);
		}

		$this->assign('list', $list);
		$this->display();
	}

	public function actionAddcategory()
	{
		$this->admin_priv('team_category');

		if (IS_POST) {
			$data = I('post.data');
			$parent_id1 = I('post.parent_id1');

			if ($data['parent_id'] == $data['id']) {
				$this->message('所选择的上级频道不能是当前频道或者当前频道的下级频道!', url('addcategory', array('tc_id' => $data['id'])));
			}

			if (!empty($data['parent_id']) && ($parent_id1 == 0)) {
				$this->message('当前频道是顶级频道,不能修改为下级频道', url('addcategory', array('tc_id' => $data['id'])));
			}

			if (empty($data['name'])) {
				$this->message('频道名称不能为空');
			}

			if (!empty($_FILES['tc_img']['name'])) {
				$result = $this->upload('data/team_img', true);

				if (0 < $result['error']) {
					show_message($result['message']);
				}

				$data['tc_img'] = $result['url'];
			}

			if (empty($data['id'])) {
				if (0 < $data['parent_id']) {
					$count = $this->model->table('team_category')->where(array('parent_id' => $data['parent_id']))->count();

					if (4 <= $count) {
						$this->message('子频道不能超过4个', url('category'));
					}
				}

				$this->model->table('team_category')->data($data)->add();
			}
			else {
				if (empty($_FILES['tc_img']['name'])) {
					$cat_info = $this->model->table('team_category')->where(array('id' => $data[id]))->find();
					$data['tc_img'] = $cat_info['tc_img'];
				}

				$this->model->table('team_category')->data($data)->where(array('id' => $data['id']))->save();
			}

			$this->redirect('category');
		}

		if (I('tc_id')) {
			$id = I('tc_id', '', 'intval');
			$team_category = $this->model->table('team_category')->where(array('id' => $id))->find();
			$this->assign('cat_info', $team_category);
			$this->assign('page_title', '拼团 - 修改频道');
		}
		else {
			$this->assign('page_title', '拼团 - 添加频道');
		}

		if (I('parent_id')) {
			$parent_id = I('parent_id', '', 'intval');
			$cat_info['parent_id'] = $parent_id;
			$this->assign('cat_info', $cat_info);
		}

		$cat_list = dao('team_category')->where(array('parent_id' => 0))->select();
		$this->assign('cat_select', $cat_list);
		$this->display();
	}

	public function actionRemovecategory()
	{
		$this->admin_priv('team_category');
		$tc_id = I('tc_id', null, 'intval');

		if (empty($tc_id)) {
			$this->message(L('select_shop'), null, 2);
		}

		$tc_id = categroy_id($tc_id);
		$sql = 'DELETE FROM {pre}team_category WHERE id in (' . $tc_id . ') ';
		$this->model->query($sql);
		$this->redirect('category');
	}

	public function actionEditstatus()
	{
		$cat_id = (empty($_REQUEST['cat_id']) ? 0 : intval($_REQUEST['cat_id']));
		$result = array('error' => 0, 'message' => '', 'content' => '修改失败');
		$sql = 'SELECT status FROM {pre}team_category WHERE  id = ' . $cat_id;
		$res = $GLOBALS['db']->getOne($sql);

		if ($res == 1) {
			$sql = 'UPDATE {pre}team_category SET `status` = 0 WHERE id = ' . $cat_id . ' ';
		}
		else {
			$sql = 'UPDATE {pre}team_category SET `status` = 1 WHERE id = ' . $cat_id . ' ';
		}

		if ($this->model->query($sql)) {
			$result = array('error' => 2, 'message' => '', 'content' => '修改成功');
		}

		exit(json_encode($result));
	}

	public function actionTeaminfo()
	{
		$this->admin_priv('team_info');
		$status = I('status', 1, 'intval');

		switch ($status) {
		case '1':
			$where .= '';
			break;

		case '2':
			$where .= ' and tl.status < 1 and \'' . gmtime() . '\'< (tl.start_time+(tg.validity_time*3600)) ';
			break;

		case '3':
			$where .= ' and tl.status = 1 ';
			break;

		case '4':
			$where .= ' and tl.status != 1 and \'' . gmtime() . '\'> (tl.start_time+(tg.validity_time*3600)) ';
			break;

		default:
			$where .= '';
		}

		if (IS_POST) {
			$goods_name = I('post.keyword');

			if (!empty($goods_name)) {
				$where .= ' AND g.goods_name LIKE \'%' . $goods_name . '%\'';
			}
		}

		$filter['page'] = '{page}';
		$offset = $this->pageLimit(url('teaminfo', $filter), $this->page_num);
		$sql_count = 'select count(*) as count from {pre}team_log as tl LEFT JOIN {pre}team_goods as tg ON tl.goods_id = tg.goods_id LEFT JOIN {pre}goods as g ON tl.goods_id = g.goods_id where is_show = 1 ' . $where . ' order by tl.start_time desc ';
		$total = $this->model->query($sql_count);
		$this->assign('page', $this->pageShow($total[0]['count']));
		$sql = 'select tl.team_id, tl.start_time,tl.goods_id,tl.status,tg.team_num,tg.validity_time,g.user_id,g.goods_name,g.goods_thumb,g.shop_price from {pre}team_log as tl LEFT JOIN {pre}team_goods as tg ON tl.goods_id = tg.goods_id LEFT JOIN {pre}goods as g ON tl.goods_id = g.goods_id where tl.is_show = 1 ' . $where . ' order by tl.start_time desc LIMIT ' . $offset;
		$list = $this->model->query($sql);
		$time = gmtime();

		foreach ($list as $key => $val) {
			$list[$key]['start_time'] = local_date($GLOBALS['_CFG']['time_format'], $val['start_time']);
			$list[$key]['shop_price'] = price_format($val['shop_price']);
			$list[$key]['goods_thumb'] = get_image_path($val['goods_thumb']);
			$list[$key]['user_name'] = get_shop_name($val['user_id'], 1);
			$list[$key]['surplus'] = $val['team_num'] - surplus_num($val['team_id']);
			if (($val['status'] != 1) && ($time < ($val['start_time'] + ($val['validity_time'] * 3600)))) {
				$list[$key]['status'] = '进行中';
			}
			else {
				if (($val['status'] != 1) && (($val['start_time'] + ($val['validity_time'] * 3600)) < $time)) {
					$list[$key]['status'] = '失败团';
				}
				else if ($val['status'] == 1) {
					$list[$key]['status'] = '成功团';
				}
			}

			$endtime = $val['start_time'] + ($val['validity_time'] * 3600);
			$cle = $endtime - $time;
			$d = floor($cle / 3600 / 24);
			$h = floor(($cle % (3600 * 24)) / 3600);
			$m = floor(($cle % (3600 * 24)) / 600 / 60);
			$list[$key]['time'] = $d . '天' . $h . '小时' . $m . '分钟';
			$list[$key]['cle'] = $cle;
		}

		$this->assign('list', $list);
		$this->assign('status', $status);
		$this->display();
	}

	public function actionTeamorder()
	{
		$this->admin_priv('team_info');
		$os = L('os');
		$ps = L('ps');
		$ss = L('ss');
		$team_id = I('team_id', 0, 'intval');

		if (empty($team_id)) {
			$this->message(L('select_shop'), null, 2);
		}

		$filter['page'] = '{page}';
		$offset = $this->pageLimit(url('teamorder', $filter), $this->page_num);
		$sql_count = 'select count(*) as count from {pre}order_info as o LEFT JOIN {pre}order_goods as og on o.order_id = og.order_id where o.team_id = ' . $team_id . '  and o.extension_code =\'team_buy\' order by o.order_id desc ';
		$total = $this->model->query($sql_count);
		$this->assign('page', $this->pageShow($total[0]['count']));
		$sql = 'select o.*,og.goods_name,og.ru_id from {pre}order_info as o LEFT JOIN {pre}order_goods as og on o.order_id = og.order_id where o.team_id = ' . $team_id . '  and o.extension_code =\'team_buy\' order by o.order_id desc LIMIT ' . $offset;
		$list = $this->model->query($sql);

		foreach ($list as $key => $val) {
			$list[$key]['region'] = get_user_region_address($val['order_id']);
			$list[$key]['add_time'] = local_date($GLOBALS['_CFG']['time_format'], $val['add_time']);
			$list[$key]['formated_order_amount'] = price_format($val['order_amount']);
			$list[$key]['formated_total_fee'] = price_format($val['goods_amount']);
			$list[$key]['user_name'] = get_shop_name($val['ru_id'], 1);
			$list[$key]['status'] = $os[$val[order_status]] . ',' . $ps[$val[pay_status]] . ',' . $ss[$val[shipping_status]];
		}

		$this->assign('list', $list);
		$this->display();
	}

	public function actionRemoveteam()
	{
		$this->admin_priv('team_info');

		if (IS_POST) {
			$arr = array('url' => url('teaminfo'));
			$team_id = I('team_id', null, 'intval');
			$team_id = implode(',', $team_id);
		}
		else {
			$team_id = I('team_id', null, 'intval');
		}

		if (empty($team_id)) {
			$this->message(L('select_shop'), null, 2);
		}

		if (!empty($team_id)) {
			$sql = 'UPDATE {pre}team_log' . ' SET is_show = 0 ' . ' WHERE team_id in (' . $team_id . ') ';
			$this->model->query($sql);
		}

		if (IS_POST) {
			exit(json_encode($arr));
		}
		else {
			$this->redirect('teaminfo');
		}
	}

	public function actionTeamrecycle()
	{
		$this->admin_priv('team_recycle');
		$where .= ' g.is_on_sale = 1 AND g.is_alone_sale = 1 AND g.is_delete = 0 AND g.review_status>2 and tg.is_team = 0 ';

		if (IS_POST) {
			$goods_name = I('post.keyword');

			if (!empty($goods_name)) {
				$where .= ' AND (g.goods_name LIKE \'%' . $goods_name . '%\' OR g.goods_sn LIKE \'%' . $goods_name . '%\' OR g.keywords LIKE \'%' . $goods_name . '%\')';
			}
		}

		$filter['page'] = '{page}';
		$offset = $this->pageLimit(url('index', $filter), $this->page_num);
		$sql_count = 'SELECT count(*) as count FROM {pre}team_goods as tg LEFT JOIN {pre}goods as g ON tg.goods_id = g.goods_id WHERE  ' . $where . ' ORDER BY tg.id DESC';
		$total = $this->model->query($sql_count);
		$this->assign('page', $this->pageShow($total[0]['count']));
		$sql = 'SELECT tg.*,g.user_id,g.goods_sn,g.goods_name,g.shop_price,g.market_price,g.goods_number,g.goods_img,g.goods_thumb,g.is_best,g.is_new,g.is_hot FROM {pre}team_goods as tg LEFT JOIN {pre}goods as g ON tg.goods_id = g.goods_id WHERE ' . $where . ' ORDER BY tg.id DESC LIMIT ' . $offset;
		$list = $this->model->query($sql);

		foreach ($list as $key => $val) {
			$list[$key]['goods_name'] = $val['goods_name'];
			$list[$key]['user_name'] = get_shop_name($val['user_id'], 1);
			$list[$key]['shop_price'] = price_format($val['shop_price']);
			$list[$key]['market_price'] = price_format($val['market_price']);
			$list[$key]['goods_number'] = $val['goods_number'];
			$list[$key]['sales_volume'] = $val['sales_volume'];
			$list[$key]['goods_img'] = get_image_path($val['goods_img']);
			$list[$key]['goods_thumb'] = get_image_path($val['goods_thumb']);
			$list[$key]['team_price'] = price_format($val['team_price']);
			$list[$key]['team_num'] = $val['team_num'];
			$list[$key]['limit_num'] = $val['limit_num'];
		}

		$this->assign('list', $list);
		$this->display();
	}

	public function actionRecycleegoods()
	{
		$this->admin_priv('team_goods_list');

		if (IS_POST) {
			$arr = array('url' => url('teamrecycle'));
			$id = I('id', null, 'intval');
			$id = implode(',', $id);
		}
		else {
			$id = I('id', null, 'intval');
		}

		if (empty($id)) {
			$this->message(L('select_shop'), null, 2);
		}

		if (!empty($id)) {
			$sql = 'UPDATE {pre}team_goods' . ' SET is_team = 1 ' . ' WHERE id in (' . $id . ') ';
			$this->model->query($sql);
		}

		if (IS_POST) {
			exit(json_encode($arr));
		}
		else {
			$this->redirect('teamrecycle');
		}
	}

	public function actionExportShop()
	{
		if (IS_POST) {
			$starttime = I('post.starttime', '', 'strtotime');
			$endtime = I('post.endtime', '', 'strtotime');
			if (empty($starttime) || empty($endtime)) {
				$this->message(L('select_start_end_time'), null, 2);
			}

			if ($endtime < $starttime) {
				$this->message(L('start_lt_end_time'), null, 2);
			}

			$sql = 'SELECT * FROM {pre}drp_shop WHERE create_time >=\'' . $starttime . '\' AND create_time <= \'' . $endtime . '\' ORDER BY create_time DESC';
			$list = $this->model->query($sql);

			if ($list) {
				$excel = new \PHPExcel();
				$excel->getActiveSheet()->getDefaultColumnDimension()->setAutoSize(true);
				$excel->getActiveSheet()->getColumnDimension('D')->setWidth(20);
				$excel->getActiveSheet()->getColumnDimension('G')->setWidth(20);
				$excel->getActiveSheet()->getColumnDimension('H')->setWidth(25);
				$excel->getActiveSheet()->getColumnDimension('I')->setWidth(15);
				$excel->getActiveSheet()->getColumnDimension('J')->setWidth(20);
				$rowVal = array(L('shop_number'), L('shop_name'), L('rely_name'), L('mobile'), L('open_time'), L('shop_audit'), L('shop_state'), L('qq_number'));

				foreach ($rowVal as $k => $r) {
					$excel->getActiveSheet()->getStyleByColumnAndRow($k, 1)->getFont()->setBold(true);
					$excel->getActiveSheet()->getStyleByColumnAndRow($k, 1)->getAlignment();
					$excel->getActiveSheet()->setCellValueByColumnAndRow($k, 1, $r);
				}

				$excel->setActiveSheetIndex(0);
				$objActSheet = $excel->getActiveSheet();
				$title = '分销商信息';
				$objActSheet->setTitle($title);

				foreach ($list as $k => $v) {
					$num = $k + 2;
					$excel->setActiveSheetIndex(0)->setCellValue('A' . $num, $v['id'])->setCellValue('B' . $num, $v['shop_name'])->setCellValue('C' . $num, $v['real_name'])->setCellValue('D' . $num, $v['mobile'])->setCellValue('E' . $num, date('Y-m-d H:i:s', $v['create_time']))->setCellValue('F' . $num, $v['audit'])->setCellValue('G' . $num, $v['status'])->setCellValue('H' . $num, $v['qq']);
				}

				$name = date('Y-m-d');
				header('Content-Type: application/force-download');
				header('Content-Type: application/octet-stream');
				header('Content-Type: application/download');
				header('Content-Transfer-Encoding:utf-8');
				header('Pragma: no-cache');
				header('Content-Type: application/vnd.ms-e xcel');
				header('Content-Disposition: attachment;filename="' . $title . '_' . urlencode($name) . '.xls"');
				header('Cache-Control: max-age=0');
				$objWriter = \PHPExcel_IOFactory::createWriter($excel, 'Excel5');
				$objWriter->save('php://output');
				exit();
			}
		}

		$this->redirect('shop');
	}
}

?>
