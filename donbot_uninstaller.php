<!DOCTYPE HTML>
<html>
    <head>
        <title>�������� ������ DonBot</title>
        <link rel="stylesheet" type="text/css" href="http://store.alaev.info/style.css" />
        <style type="text/css">
            #header {width: 100%; text-align: center;}
            .box-cnt{width: 100%; overflow: hidden;}
        </style>
    </head>

    <body>
        <div class="wrap">
            <div id="header">
                <h1>DonBot</h1>
            </div>
            <div class="box">
                <div class="box-t">&nbsp;</div>
                <div class="box-c">
                    <div class="box-cnt">
                        <?php

                            $output = module_uninstaller();
                            echo $output;

                        ?>
                    </div>
                </div>
                <div class="box-b">&nbsp;</div>
            </div>
        </div>
    </body>
</html>

<?php

    function module_uninstaller()
    {
        // ����������� �����
        $output = '<h2>����� ���������� � ������ ��� �������� ������ DonBot!</h2>';
        $output .= '<p><strong>��������!</strong> ����� �������� ������ <strong>�����������</strong> ������� ���� <strong>donbot_uninstaller.php</strong> � ������ �������!</p>';
        $output .= '<p>';
        $output .= '<strong>����� ����, ���������� ������� ��������� ����� � �����:</strong>';
        $output .= '<ul>';
            $output .= '<li>/engine/modules/<strong>donbot.php</strong></li>';
            $output .= '<li>/engine/inc/<strong>donbot.php</strong></li>';
            $output .= '<li>/engine/skins/images/<strong>donbot.png</strong></li>';
            $output .= '<li>/engine/skins/<strong>donbot</strong>/</li>';
        $output .= '</ul>';
        $output .= '</p>';

        // ���� ����� $_POST ��������� �������� donbot_uninstall, ���������� �����������, �������� ����������
        if(!empty($_POST['donbot_uninstall']))
        {
            // ���������� config
            include_once ('engine/data/config.php');

            // ���������� DLE API
            include ('engine/api/api.class.php');

            // ������� ������ �� �������
            $dle_api->uninstall_admin_module('donbot');

            // �����
            $output .= '<p>';
            $output .= '������ ������� �����!';
            $output .= '</p>';
        }

        // ���� ����� $_POST ������ �� ���������, ������� ����� ��� �������� ������
        else
        {
            // �����
            $output .= '<p>';
            $output .= '<form method="POST" action="donbot_uninstaller.php">';
            $output .= '<input type="hidden" name="donbot_uninstall" value="1" />';
            $output .= '<input type="submit" value="������� ������" />';
            $output .= '</form>';
            $output .= '</p>';
        }
        
        $output .= '<p>';
        $output .= '<a href="http://alaev.info/blog/post/4481?from=DonBot">���������� � ��������� ������</a>';
        $output .= '</p>';

        // ������� ���������� ��, ��� ������ ���� ��������
        return $output;
    }

?>
