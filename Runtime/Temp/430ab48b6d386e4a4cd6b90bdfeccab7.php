<?php
//000000000600a:4:{i:0;a:14:{s:2:"id";s:2:"29";s:5:"title";s:12:"大洼大洼";s:7:"content";s:19:"<p>大娃娃的</p>";s:10:"view_count";s:2:"15";s:8:"cover_id";s:1:"3";s:8:"issue_id";s:2:"14";s:3:"uid";s:1:"1";s:11:"reply_count";s:1:"0";s:11:"create_time";s:10:"1430704938";s:11:"update_time";s:10:"1459313399";s:6:"status";s:1:"1";s:3:"url";s:7:"http://";s:4:"user";a:11:{s:8:"nickname";s:5:"admin";s:2:"id";s:1:"1";s:13:"real_nickname";s:5:"admin";s:8:"avatar32";s:42:"/my/Public/images/default_avatar_32_32.jpg";s:8:"avatar64";s:42:"/my/Public/images/default_avatar_64_64.jpg";s:9:"avatar128";s:44:"/my/Public/images/default_avatar_128_128.jpg";s:9:"avatar256";s:44:"/my/Public/images/default_avatar_256_256.jpg";s:9:"avatar512";s:44:"/my/Public/images/default_avatar_512_512.jpg";s:9:"space_url";s:47:"/my/index.php?s=/ucenter/index/index/uid/1.html";s:10:"space_link";s:93:"<a ucard="1" target="_blank" href="/my/index.php?s=/ucenter/index/index/uid/1.html">admin</a>";s:13:"space_mob_url";s:42:"/my/index.php?s=/mob/user/index/uid/1.html";}s:5:"issue";a:2:{s:2:"id";s:2:"14";s:5:"title";s:12:"默认二级";}}i:1;a:14:{s:2:"id";s:2:"30";s:5:"title";s:18:"测试代码高亮";s:7:"content";s:795:"<pre class="brush:php;toolbar:false">public&nbsp;function&nbsp;reload()
{
&nbsp;&nbsp;&nbsp;&nbsp;$modules&nbsp;=&nbsp;$this-&gt;select();
&nbsp;&nbsp;&nbsp;&nbsp;foreach&nbsp;($modules&nbsp;as&nbsp;$m)&nbsp;{
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;if&nbsp;(file_exists(APP_PATH&nbsp;.&nbsp;&#39;/&#39;&nbsp;.&nbsp;$m[&#39;name&#39;]&nbsp;.&nbsp;&#39;/Info/info.php&#39;))&nbsp;{
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;$info&nbsp;=&nbsp;array_merge($m,&nbsp;$this-&gt;getInfo($m[&#39;name&#39;]));
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;$this-&gt;save($info);
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;}
&nbsp;&nbsp;&nbsp;&nbsp;}
&nbsp;&nbsp;&nbsp;&nbsp;$this-&gt;cleanModulesCache();
}</pre><p><br/></p>";s:10:"view_count";s:1:"5";s:8:"cover_id";s:1:"4";s:8:"issue_id";s:2:"14";s:3:"uid";s:1:"1";s:11:"reply_count";s:1:"0";s:11:"create_time";s:10:"1430705543";s:11:"update_time";s:10:"1459313426";s:6:"status";s:1:"1";s:3:"url";s:7:"http://";s:4:"user";a:11:{s:8:"avatar32";s:42:"/my/Public/images/default_avatar_32_32.jpg";s:8:"avatar64";s:42:"/my/Public/images/default_avatar_64_64.jpg";s:9:"avatar128";s:44:"/my/Public/images/default_avatar_128_128.jpg";s:9:"avatar256";s:44:"/my/Public/images/default_avatar_256_256.jpg";s:9:"avatar512";s:44:"/my/Public/images/default_avatar_512_512.jpg";s:9:"space_url";s:47:"/my/index.php?s=/ucenter/index/index/uid/1.html";s:10:"space_link";s:93:"<a ucard="1" target="_blank" href="/my/index.php?s=/ucenter/index/index/uid/1.html">admin</a>";s:13:"space_mob_url";s:42:"/my/index.php?s=/mob/user/index/uid/1.html";s:2:"id";s:1:"1";s:8:"nickname";s:5:"admin";s:13:"real_nickname";s:5:"admin";}s:5:"issue";a:2:{s:2:"id";s:2:"14";s:5:"title";s:12:"默认二级";}}i:2;a:14:{s:2:"id";s:2:"31";s:5:"title";s:10:"javascript";s:7:"content";s:13:"<p>fdsafs</p>";s:10:"view_count";s:1:"1";s:8:"cover_id";s:1:"5";s:8:"issue_id";s:2:"14";s:3:"uid";s:1:"1";s:11:"reply_count";s:1:"0";s:11:"create_time";s:10:"1459313504";s:11:"update_time";s:10:"1459313504";s:6:"status";s:1:"1";s:3:"url";s:7:"http://";s:4:"user";a:11:{s:8:"avatar32";s:42:"/my/Public/images/default_avatar_32_32.jpg";s:8:"avatar64";s:42:"/my/Public/images/default_avatar_64_64.jpg";s:9:"avatar128";s:44:"/my/Public/images/default_avatar_128_128.jpg";s:9:"avatar256";s:44:"/my/Public/images/default_avatar_256_256.jpg";s:9:"avatar512";s:44:"/my/Public/images/default_avatar_512_512.jpg";s:9:"space_url";s:47:"/my/index.php?s=/ucenter/index/index/uid/1.html";s:10:"space_link";s:93:"<a ucard="1" target="_blank" href="/my/index.php?s=/ucenter/index/index/uid/1.html">admin</a>";s:13:"space_mob_url";s:42:"/my/index.php?s=/mob/user/index/uid/1.html";s:2:"id";s:1:"1";s:8:"nickname";s:5:"admin";s:13:"real_nickname";s:5:"admin";}s:5:"issue";a:2:{s:2:"id";s:2:"14";s:5:"title";s:12:"默认二级";}}i:3;a:14:{s:2:"id";s:2:"32";s:5:"title";s:6:"fdsfsd";s:7:"content";s:16:"<p>fdsa<br/></p>";s:10:"view_count";s:1:"1";s:8:"cover_id";s:1:"6";s:8:"issue_id";s:2:"14";s:3:"uid";s:1:"1";s:11:"reply_count";s:1:"0";s:11:"create_time";s:10:"1459332881";s:11:"update_time";s:10:"1459332881";s:6:"status";s:1:"1";s:3:"url";s:7:"http://";s:4:"user";a:11:{s:8:"avatar32";s:42:"/my/Public/images/default_avatar_32_32.jpg";s:8:"avatar64";s:42:"/my/Public/images/default_avatar_64_64.jpg";s:9:"avatar128";s:44:"/my/Public/images/default_avatar_128_128.jpg";s:9:"avatar256";s:44:"/my/Public/images/default_avatar_256_256.jpg";s:9:"avatar512";s:44:"/my/Public/images/default_avatar_512_512.jpg";s:9:"space_url";s:47:"/my/index.php?s=/ucenter/index/index/uid/1.html";s:10:"space_link";s:93:"<a ucard="1" target="_blank" href="/my/index.php?s=/ucenter/index/index/uid/1.html">admin</a>";s:13:"space_mob_url";s:42:"/my/index.php?s=/mob/user/index/uid/1.html";s:2:"id";s:1:"1";s:8:"nickname";s:5:"admin";s:13:"real_nickname";s:5:"admin";}s:5:"issue";a:2:{s:2:"id";s:2:"14";s:5:"title";s:12:"默认二级";}}}
?>