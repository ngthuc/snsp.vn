<upgrade>
	<phrases>
		<phrase>
			<module_id>privacy</module_id>
			<version_id>2.1.0Beta1</version_id>
			<var_name>user_setting_can_view_all_items</var_name>
			<added>1293441281</added>
			<value>Can view all items regardless of privacy settings?</value>
		</phrase>
		<phrase>
			<module_id>privacy</module_id>
			<version_id>2.1.0Beta1</version_id>
			<var_name>user_setting_can_comment_on_all_items</var_name>
			<added>1293441385</added>
			<value>Can comment on all items regardless of privacy settings?</value>
		</phrase>
	</phrases>
	<user_group_settings>
		<setting>
			<is_admin_setting>0</is_admin_setting>
			<module_id>privacy</module_id>
			<type>boolean</type>
			<admin>1</admin>
			<user>0</user>
			<guest>0</guest>
			<staff>1</staff>
			<module>privacy</module>
			<ordering>0</ordering>
			<value>can_view_all_items</value>
		</setting>
		<setting>
			<is_admin_setting>0</is_admin_setting>
			<module_id>privacy</module_id>
			<type>boolean</type>
			<admin>1</admin>
			<user>0</user>
			<guest>0</guest>
			<staff>1</staff>
			<module>privacy</module>
			<ordering>0</ordering>
			<value>can_comment_on_all_items</value>
		</setting>
	</user_group_settings>
	<sql><![CDATA[a:4:{s:9:"ADD_FIELD";a:1:{s:14:"phpfox_privacy";a:3:{s:10:"privacy_id";a:4:{i:0;s:7:"UINT:10";i:1;N;i:2;s:14:"auto_increment";i:3;s:2:"NO";}s:9:"module_id";a:4:{i:0;s:8:"VCHAR:75";i:1;N;i:2;s:0:"";i:3;s:3:"YES";}s:14:"friend_list_id";a:4:{i:0;s:7:"UINT:10";i:1;s:1:"0";i:2;s:0:"";i:3;s:2:"NO";}}}s:11:"ALTER_FIELD";a:1:{s:14:"phpfox_privacy";a:2:{s:7:"item_id";a:4:{i:0;s:7:"UINT:10";i:1;s:1:"0";i:2;s:0:"";i:3;s:2:"NO";}s:7:"user_id";a:4:{i:0;s:7:"UINT:10";i:1;s:1:"0";i:2;s:0:"";i:3;s:2:"NO";}}}s:7:"ADD_KEY";a:1:{s:14:"phpfox_privacy";a:2:{s:9:"module_id";a:2:{i:0;s:5:"INDEX";i:1;a:2:{i:0;s:9:"module_id";i:1;s:7:"item_id";}}s:14:"friend_list_id";a:2:{i:0;s:5:"INDEX";i:1;s:14:"friend_list_id";}}}s:10:"REMOVE_KEY";a:1:{s:14:"phpfox_privacy";a:1:{i:0;a:2:{i:0;s:5:"INDEX";i:1;a:3:{i:0;s:7:"item_id";i:1;s:11:"category_id";i:2;s:7:"user_id";}}}}}]]></sql>
</upgrade>