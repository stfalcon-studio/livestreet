{**
 * Список топиков только из коллективных блогов
 *}

{extends file='layouts/layout.base.tpl'}

{block name='layout_options'}
	{$sNav = 'topics'}
	{$sNavContent = 'topics'}
{/block}

{block name='layout_content'}
	{include file='topics/topic_list.tpl'}
{/block}