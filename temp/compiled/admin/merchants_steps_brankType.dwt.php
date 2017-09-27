<!--申请品牌信息-->
<div class="step">
	<div class="tit"><h4><?php echo $this->_var['lang']['brand_list']; ?></h4><div class="notic red_notic ml10"><?php echo $this->_var['title']['titles_annotation']; ?></div></div>
	<div class="items">
		<div class="item" id="brandId">
			<div class="label">
				<a id="saveBrandQualificationBtn" onclick="saveBrandQualificationBtn(this)" class="btn btn30 blue_btn" href="javascript:void(0);" data-title="<?php echo $this->_var['lang']['add_brand']; ?>"><span><?php echo $this->_var['lang']['add_brand']; ?></span></a>
				<input type="hidden" name="brand_id" id="brand_id" value="<?php echo $this->_var['brand_id']; ?>"/>
			</div>
			<div class="value">
				<div class="list-div">
					<table class="m-table">
						<thead>
							<tr>
								<th width="5%"><?php echo $this->_var['lang']['snumber']; ?></th>
								<th width="15%"><?php echo $this->_var['lang']['brand_name_cn']; ?></th>
								<th width="15%"><?php echo $this->_var['lang']['brand_name_en']; ?></th>
								<th width="10%"><?php echo $this->_var['lang']['brand_name_frist']; ?></th>
								<th width="10%"><?php echo $this->_var['lang']['brand_logo']; ?></th>
								<th width="15%"><?php echo $this->_var['lang']['brand_type']; ?></th>
								<th width="15%"><?php echo $this->_var['lang']['management_type']; ?></th>
								<th width="15%"><?php echo $this->_var['lang']['handler']; ?></th>
							</tr>
						</thead>
						<tbody>
						<?php $_from = $this->_var['title']['brand_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('key', 'brand');if (count($_from)):
    foreach ($_from AS $this->_var['key'] => $this->_var['brand']):
?>
							<tr id="brand_<?php echo $this->_var['brand']['bid']; ?>">
								<td><?php echo $this->_var['key']; ?></td>
								<td><?php echo $this->_var['brand']['brandName']; ?></td>
								<td><?php echo $this->_var['brand']['bank_name_letter']; ?></td>
								<td><?php echo $this->_var['brand']['brandFirstChar']; ?></td>
								<td><?php if ($this->_var['brand']['brandLogo'] != ''): ?><a href="../<?php echo $this->_var['brand']['brandLogo']; ?>" class="nyroModal"><i class="icon icon-picture" onmouseover="toolTip('<img src=../<?php echo $this->_var['brand']['brandLogo']; ?>>')" onmouseout="toolTip()"></i></a><?php endif; ?></td>
								<td><?php if ($this->_var['brand']['brandType'] == 1): ?><?php echo $this->_var['lang']['brand_domestict']; ?><?php elseif ($this->_var['brand']['brandType'] == 2): ?><?php echo $this->_var['lang']['brand_abroad']; ?><?php endif; ?></td>
								<td><?php if ($this->_var['brand']['brand_operateType'] == 1): ?><?php echo $this->_var['lang']['brand_have']; ?><?php elseif ($this->_var['brand']['brand_operateType'] == 2): ?><?php echo $this->_var['lang']['brand_agent']; ?><?php endif; ?></td>
								<td class="handle">
									<div class="tDiv a2">
										<a id="editBrandQualificationBtn" href="javascript:void(0);"  class="btn_edit" onclick="saveBrandQualificationBtn(<?php echo $this->_var['brand']['bid']; ?>)" data-title="<?php echo $this->_var['lang']['add_brand']; ?>"><i class="icon icon-edit"></i><?php echo $this->_var['lang']['modify']; ?></a>
										<a href="javascript:get_deleteBrand(<?php echo $this->_var['brand']['bid']; ?>);" class="btn_trash"><i class="icon icon-trash"></i><?php echo $this->_var['lang']['drop']; ?></a>
									</div>
								</td>
							</tr>
						<?php endforeach; else: ?>
							<tr><td class="no-records" colspan="10"><?php echo $this->_var['lang']['no_records']; ?></td></tr>
						<?php endif; unset($_from); ?><?php $this->pop_vars();; ?>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>  
