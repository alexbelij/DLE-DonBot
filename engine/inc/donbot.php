<?php

/*
=============================================================================
 ����: donbot.php (backend) ������ 1.1
-----------------------------------------------------------------------------
 �����: ����� ��������� ����������, mail@mithrandir.ru
-----------------------------------------------------------------------------
 ���� ���������: http://alaev.info/blog/post/4481
-----------------------------------------------------------------------------
 ����������: ��������� ���� ��� ������� ������ � ������ main.tpl ����� <head>
=============================================================================
*/

    // ���������
    if( !defined( 'DATALIFEENGINE' ) OR !defined( 'LOGGED_IN' ) ) {
            die( "Hacking attempt!" );
    }

    echoheader('DonBot', '������ ���������� ����������� �����');

if ( $config['version_id'] >= 10.2 ) {
        echo '<style>.uniform, div.selector {min-width: 250px;} input[type="checkbox"] {width:17px;height:17px;}
		ul {padding:3px 0 0 20px;}</style>';
} else {
        echo '<style>
@import url("engine/skins/application.css");

.box {
margin:10px;
}
.uniform {
position: relative;
padding-left: 5px;
overflow: hidden;
min-width: 250px;
font-size: 12px;
-webkit-border-radius: 0;
-moz-border-radius: 0;
-ms-border-radius: 0;
-o-border-radius: 0;
border-radius: 0;
background: whitesmoke;
background-image: url("data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0idXRmLTgi�pZHRoPSIxMDAlIiBoZWlnaHQ9IjEwMCUiIGZpbGw9InVybCgjZ3JhZCkiIC8+PC9zdmc+IA==");
background-size: 100%;
background-image: -webkit-gradient(linear, 50% 0%, 50% 100%, color-stop(0%, #ffffff), color-stop(100%, #f5f5f5));
background-image: -webkit-linear-gradient(top, #ffffff, #f5f5f5);
background-image: -moz-linear-gradient(top, #ffffff, #f5f5f5);
background-image: -o-linear-gradient(top, #ffffff, #f5f5f5);
background-image: linear-gradient(top, #ffffff, #f5f5f5);
-webkit-box-shadow: 0 1px 0 rgba(255, 255, 255, 0.5);
-moz-box-shadow: 0 1px 0 rgba(255, 255, 255, 0.5);
box-shadow: 0 1px 0 rgba(255, 255, 255, 0.5);
border: 1px solid #ccc;
font-size: 12px;
height: 28px;
line-height: 28px;
color: #666;
}
input[type="checkbox"] {
width: 17px;
height: 17px;
}
</style>';
}

?>

<div class="box">

	<div class="box-header">
		<div class="title">��������� ���� ��� ������� ������</div>
		<ul class="box-toolbar">
			<li class="toolbar-link">
			<a target="_blank" href="http://alaev.info/blog/post/4481?from=DonBot">DonBot v.1.1 � 2014 ���� ������'� - ���������� � ��������� ������</a>
			</li>
		</ul>
	</div>

	<div class="box-content">
	<table class="table table-normal">
	<tbody>
		<tr>
		<td class="col-xs-6"><h5>����� ��� �������� � ������?</h5><span class="note large">���, ��������� �� ����� ������� ������ � ������.<br /><strong>noindex,nofollow</strong> - ����� ��������� ���������� ��������, � ��� �� ������ ��������� ������� �� ������� �� ���� ��������.<br /><strong>noindex,follow</strong> - ����� ��������� ���������� ��������, �� �������� ������ ��������� ������� �� ������� �� ���� ��������.</span></td>
		<td class="col-xs-6 settingstd">
			<select class="uniform" name="date" id="donbot_tag">
			<option value="nofollow">noindex,nofollow</option>
			<option value="follow">noindex,follow</option>
			</select>
		</td>
		</tr><tr>
		<td class="col-xs-6"><h5>����������� ��������</h5><span class="note large">��� ������ ������ ����� ����� ��������� ���������� �� ���������: <ul><li>���������� ������� � �����</li><li>����� �������� �����</li><li>�������������� ������</li><li>����������� ������ ������������</li><li>������ �����</li><li>���������� �����</li><li>������ � ����������� ������</li><li>������ ��������� �������������</li><li>�������� �������������</li><li>������������� �������� ��� ������������</li><li>��������� ���� ��������� ������������ �� �����</li><li>� �.�. ������������ ���������� ������������</li><li>��������� ���� ��������� ��������</li><li>������ �������� �� ���/�����/����</li></ul></span></td>
		<td class="col-xs-6 settingstd"><input type="checkbox" name="tech_template" id="donbot_tech_template" /></td>
        </tr><tr>
		<td class="col-xs-6"><h5>������������</h5><span class="note large">��� ������ ������ ����� ����� ��������� ���������� �� ���������: <ul><li>������� ������������</li><li>��������� ���� �������� ������������</li></ul></span></td>
		<td class="col-xs-6 settingstd"><input type="checkbox" name="user_template" id="donbot_user_template" /></td>
		</tr><tr>
		<td class="col-xs-6"><h5>����</h5><span class="note large">��� ������ ������ ����� ����� ��������� ���������� �� ���������: <ul><li>��������� ������ �����</li><li>��������� �������� �� ����</li></ul></span></td>
		<td class="col-xs-6 settingstd"><input type="checkbox" name="tag_template" id="donbot_tag_template" /></td>
		</tr><tr>
		<td class="col-xs-6"><h5>��� ��� ������� � <strong>main.tpl</strong></h5><span class="note large"></span></td>
		<td class="col-xs-6 settingstd">
			<textarea type="text" style="width:100%;height:100px;" name="code" id="donbot_code">{include file='engine/modules/donbot.php?tag=nofollow&pages=addnews,feedback,lostpassword,register,rules,stats,search,pm,favorites,newposts,lastnews,lastcomments,date,userinfo,allnews'}</textarea>
		</td>
		</tr>
	</tbody>
	</table>
	<table class="table table-normal">
	<tbody>
		<tr>
		<td colspan="4" style="background: lightgoldenrodyellow; padding: 5px; text-align: center;">
		<strong>����� ������� ������������ ����������� �������������!!!</strong>
		<div>������� ���� ����� ������������ ������ � ��� ������, ���� �� �� 100% ������� � ���, ��� �� �������, � ����� ��������� �� ������ ��������. ����������� �� ���� ����� � ����.</div>
		</td>
		</tr>
		<tr>
		<td>
		<input type="checkbox" name="all" id="donbot_all" />
		<label for="donbot_all">������� ���</label>
		</td><td>
		<input class="donbot_tech_template" type="checkbox" name="addnews" id="donbot_addnews" />
		<label for="donbot_addnews">���������� ��������</label>
		</td><td>
		<input class="donbot_tech_template" type="checkbox" name="feedback" id="donbot_feedback" />
		<label for="donbot_feedback">�������� �����</label>
		</td><td>
		<input class="donbot_tech_template" type="checkbox" name="lostpassword" id="donbot_lostpassword" />
		<label for="donbot_lostpassword">�������������� ������</label>
		</td>
		</tr><tr>
		<td>
		<input class="donbot_tech_template" type="checkbox" name="register" id="donbot_register" />
		<label for="donbot_register">�����������</label>
		</td><td>
		<input class="donbot_tech_template" type="checkbox" name="rules" id="donbot_rules" />
		<label for="donbot_rules">������� �����</label>
		</td><td>
		<input class="donbot_tech_template" type="checkbox" name="stats" id="donbot_stats" />
		<label for="donbot_stats">���������� �����</label>
		</td><td>
		<input class="donbot_tech_template" type="checkbox" name="search" id="donbot_search" />
		<label for="donbot_search">����� � ���������� ������</label>
		</td>
		</tr><tr>
		<td>
		<input class="donbot_tech_template" type="checkbox" name="pm" id="donbot_pm" />
		<label for="donbot_pm">������ ���������</label>
		</td><td>
		<input class="donbot_tech_template" type="checkbox" name="favorites" id="donbot_favorites" />
		<label for="donbot_favorites">��������</label>
		</td><td>
		<input class="donbot_tech_template" type="checkbox" name="newposts" id="donbot_newposts" />
		<label for="donbot_newposts">�������� ������������� ��������</label>
		</td><td>
		<input class="donbot_tech_template" type="checkbox" name="lastnews" id="donbot_lastnews" />
		<label for="donbot_lastnews">�������� ���� ��������� ��������</label>
		</td>
		</tr><tr>
		<td>
		<input class="donbot_tech_template" type="checkbox" name="lastcomments" id="donbot_lastcomments" />
		<label for="donbot_lastcomments">�������� ��������� ������������</label>
		</td><td>
		<input class="donbot_tech_template" type="checkbox" name="date" id="donbot_date" />
		<label for="donbot_date">�������� ������ �������� �� ����</label>
		</td><td>
		<input class="donbot_user_template" type="checkbox" name="userinfo" id="donbot_userinfo" />
		<label for="donbot_userinfo">������� ������������</label>
		</td><td>
		<input class="donbot_user_template" type="checkbox" name="allnews" id="donbot_allnews" />
		<label for="donbot_allnews">�������� ���� �������� ������������</label>
		</td>
		</tr><tr>
		<td>
		<input class="donbot_tag_template" type="checkbox" name="alltags" id="donbot_alltags" />
		<label for="donbot_alltags">�������� ������ �����</label>
		</td><td>
		<input class="donbot_tag_template" type="checkbox" name="tags" id="donbot_tags" />
		<label for="donbot_tags">�������� �������� �� ����������� ����</label>
		</td><td>
		<input class="donbot_extended_template" type="checkbox" name="xfsearch" id="donbot_xfsearch" />
		<label for="donbot_xfsearch">�������� �������� �� ���. �����</label>
		</td><td>
		<input class="donbot_extended_template" type="checkbox" name="catalog" id="donbot_catalog" />
		<label for="donbot_catalog">�������� �������� �� �����</label>
		</td>
		</tr><tr>
		<td>
		<input class="donbot_extended_template" type="checkbox" name="pages" id="donbot_pages" />
		<label for="donbot_pages">����� �������� ���������</label>
		</td><td>
		<input class="donbot_extended_template" type="checkbox" name="mainp" id="donbot_mainp" />
		<label for="donbot_mainp">�������� ��������� ��� �������</label>
		</td><td>
		<input class="donbot_extended_template" type="checkbox" name="catp" id="donbot_catp" />
		<label for="donbot_catp">�������� ��������� ��� ���������</label>
		</td><td>
		<input class="donbot_extended_template" type="checkbox" name="showfull" id="donbot_showfull" />
		<label for="donbot_showfull">������ �������� ������</label>
		</td>
		</tr>
	</tbody>
	</table>
	</div>
</div>
            <script type="text/javascript">
                var donbot_templates = [
                    "tech",
                    "user",
                    "tag"
                ];

                var donbot_options = [
                    "addnews",
                    "feedback",
                    "lostpassword",
                    "register",
                    "rules",
                    "stats",
                    "search",
                    "pm",
                    "favorites",
                    "newposts",
                    "lastnews",
                    "lastcomments",
                    "date",
                    "userinfo",
                    "allnews",
                    "alltags",
                    "tags",
                    "xfsearch",
                    "catalog",
                    "pages",
                    "mainp",
                    "catp",
                    "showfull"
                ];

                // ��������� ��������
                for(var i = 0; i < donbot_templates.length; i = i+1)
                {
                    document.getElementById("donbot_" + donbot_templates[i] + "_template").onchange = function(event){
                        event = event || window.event
                        var template = event.target || event.srcElement
                        var inps = document.getElementsByTagName('input');
                        for(var f = 0; f<inps.length; f++)
                        {
                            if(inps[f].type=="checkbox" && inps[f].className==template.id)
                            {
                                inps[f].checked = template.checked;
                            }
                        }
                        recalculate_code();
                    };
                }

                // ��������� �����
                for(i = 0; i < donbot_options.length; i = i+1)
                {
                    document.getElementById("donbot_" + donbot_options[i]).onchange = function(event){
                        recalculate_code();
                    };
                }

                // ��������� ������ ����
                document.getElementById("donbot_tag").onchange = function(event){
                    recalculate_code();
                };

                // ����� "�������� ���"
                document.getElementById("donbot_all").onchange = function(event){
                    event = event || window.event
                    var option = event.target || event.srcElement;

                    for(i = 0; i < donbot_options.length; i = i+1)
                    {
                        document.getElementById("donbot_" + donbot_options[i]).checked = option.checked;
                    }
                    recalculate_code();
                };

                // ��������� ��� ��������� �������
                document.getElementById("donbot_code").onfocus = function(event){
                    event = event || window.event
                    var code = event.target || event.srcElement;
                    code.select();
                };

                // �������� ��������� ����
                function recalculate_code()
                {
                    var tag = document.getElementById('donbot_tag').value;
                    var pages = [];

                    document.getElementById("donbot_code").value = "{include file='engine/modules/donbot.php?tag="+tag+"&pages=";

                    for(var i = 0; i < donbot_options.length; i = i+1)
                    {
                        if(document.getElementById("donbot_" + donbot_options[i]).checked)
                        {
                            pages[pages.length] = document.getElementById("donbot_" + donbot_options[i]).name;
                        }
                    }

                    document.getElementById("donbot_code").value = document.getElementById("donbot_code").value + pages.join(',') + "'}";
                }
            </script>
<?php

        // ����������� ������� ���������� ����������
        echofooter();

?>