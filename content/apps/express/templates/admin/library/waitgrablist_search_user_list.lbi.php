<?php defined('IN_ECJIA') or exit('No permission resources.');?> 
<div class="right-bar move-mod" style="height:580px;border:1px solid #dcdcdc;border-radius:4px;">
	<div class="foldable-list move-mod-group">
		<div class="accordion-group">
			<div class="accordion-heading">
				<a class="accordion-toggle move-mod-head"><strong>配送员列表</strong></a>
			</div>
			<div class="accordion-body">
				<div class="accordion-inner right-scroll">
					<div class="control-group control-group-small">
						<div class="margin-label">
						     <form id="form-privilege" class="form-horizontal" name="express_searchForm" action="{$search_action}" method="post" >
								 {if $express_count.online or $express_count.offline}
									 <input name="keywords" class="span9" type="text" placeholder="请输入配送员名称" value="{$smarty.get.keywords}" />
									 <button class="btn btn-gebo express-search-btn" style="background:#058DC7;padding:4px 7px;" type="button">搜索</button>
							 	 {/if}
							 	 <input id="start" class="span9" type="hidden" value="{$start}"/>
								 <input id="end" class="span9" type="hidden" value="{$end}"/>
								 <input id="policy" class="span9" type="hidden" value="LEAST_TIME"/>
								 <input id="routes" class="span9" type="hidden" ></input>
							 </form>
						</div>
					</div>
					{if $express_count.online or $express_count.offline}
						{if $express_count.online}
							<div class="control-group control-group-small press-list" style="margin-bottom:0px;">
								<div class="margin-label online-list" style="margin-top:5px;margin-bottom: 5px;">在线 （{if $express_count.online}{$express_count.online}{else}0{/if}）<a class="accordion-toggle acc-in move-mod-head online-triangle" data-toggle="collapse" data-target="#online"><b class="triangle on-tran"></b></a></div>
								<div class="online open">
									<div class="express-user-list accordion-body in in_visable collapse" id="online">
										<!-- {foreach from=$express_user_list.list item=list} -->
											{if $list.online_status eq '1'}
												<div class="express-user-info ex-user-div{$list.user_id}" staff_user_id="{$list.user_id}" online_status ="{$list.online_status}">
													<div class="{if $express_order_count.wait_grab} exuser_div {/if} " longitude="{$list.longitude}" latitude="{$list.latitude}" name="{$list.name}" mobile="{$list.mobile}" >
														<div class="imginfo-div">
				        		                			<div class="express-img">{if $list.avatar}<img src="{$list.avatar}">{else}<img src="{$app_url}/touxiang.png">{/if}</div>
				        		                			<div class="expressinfo">{$list.name}</div>
														</div>
														<div class="express-order-div">
															<div class="waitfor-pickup">
																待取货<span class="ecjia-red">{if $list.wait_pickup_count}{$list.wait_pickup_count}{else}0{/if}单</span>
															</div>
															<div class="wait-sending">
																待配送<span class="ecjia-red">{if $list.sending_count}{$list.sending_count}{else}0{/if}单</span>
															</div>
														</div>
													</div>
													<div class="assign-div">
														 <a class="{if $express_order_count.wait_grab} assign {/if}"  data-msg="是否确定让  【{$list.name}】  去配送？" data-href='{url path="express/admin/assign_express_order" args="staff_id={$list.user_id}&type={$type}"}'>
							                       			{if $express_order_count.wait_grab}
							                       				<button class="btn btn-warning" type="button"><span style="color:#fff;">指派给他</span></button>  
							                       			{else}
							                       				<button class="btn" type="button" disabled="disabled"><span>指派给他</span></button>  
							                       			{/if}
			               								 </a> 
														 <input type="hidden" class="selected-express-id" value="{$first_express_order.express_id}"/>
														 <input type="hidden" class="ex-u-id" value=""/>
													</div>
												</div>
											{/if}
										<!-- {/foreach} -->
									</div>
								</div>
							</div>
						{/if}
						{if $express_count.offline}
							<div class="control-group control-group-small press-list" style="margin-bottom:0px;">
								<div class="margin-label online-list" style="margin-top:5px;margin-bottom: 5px;">离线 （{if $express_count.offline}{$express_count.offline}{else}0{/if}）<a class="accordion-toggle acc-in  move-mod-head collapsed leave-trangle" data-toggle="collapse" data-target="#leave"><b class="triangle1 leaveline"></b></a></div>
								<div class="leaveline-express">
									<div class="express-user-list-leave accordion-body collapse" id="leave">
										<!-- {foreach from=$express_user_list.list item=list} -->
											{if $list.online_status eq '4'}
												<div class="express-user-info" online_status ="{$list.online_status}">
													<div longitude="{$list.longitude}" latitude="{$list.latitude}" name="{$list.name}" mobile="{$list.mobile}">
														<div class="imginfo-div">
				        		                			<div class="express-img">{if $list.avatar}<img src="{$list.avatar}">{else}<img src="{$app_url}/touxiang.png">{/if}</div>
				        		                			<div class="expressinfo">{$list.name}</div>
														</div>
														<div class="express-order-div">
															<div class="waitfor-pickup">
																待取货<span class="ecjia-red">{if $list.wait_pickup_count}{$list.wait_pickup_count}{else}0{/if}单</span>
															</div>
															<div class="wait-sending">
																待配送<span class="ecjia-red">{if $list.sending_count}{$list.sending_count}{else}0{/if}单</span>
															</div>
														</div>
													</div>
													<div class="assign-div">
														 <a data-msg="你确定让  【{$list.name}】  去配送？" data-href='{url path="express/admin/assign_express_order" args="staff_id={$list.user_id}&type={$type}"}'  >
															<button class="btn" type="button" disabled="disabled"><span>指派给他</span></button>  
			               								 </a> 
													</div>
												</div>
											{/if}
										<!-- {/foreach} -->
									</div>
								</div>
							</div>
						{/if}
					{else}
						<div class="norecord">还未添加配送员!</div>
					{/if}
				</div>
			</div>
		</div>
	</div>
</div>