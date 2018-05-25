<?php
/**
 * Email template.You can change the content of this template
 * @copyright  Copyright (c) 2018 Benjamin BALET
 * @license    http://opensource.org/licenses/AGPL-3.0 AGPL-3.0
 * @link       https://github.com/bbalet/skeleton
 * @since      0.1.0
 */
?>
<html lang="en">
    <head>
        <meta content="text/html; charset=utf-8" http-equiv="Content-Type">
        <meta charset="UTF-8">
        <style>
            table {width:50%;margin:5px;border-collapse:collapse;}
            table, th, td {border: 1px solid black;}
            th, td {padding: 20px;}
            h5 {color:red;}
        </style>
    </head>
    <body>
        <h3>{Title}</h3>
        <p>Dear {Firstname} {Lastname},</p>
        <p>Your Meeting Room Management application password has been changed. If you did not perform this operation, please contact your manager.</p>
        <p>Here is your password: <span style="color:red;">{password}</span></p>
    </body>
</html>
