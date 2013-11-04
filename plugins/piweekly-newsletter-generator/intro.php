<table border="0" cellpadding="0" cellspacing="0" width="100%" class="mcnTextBlock" style="border-collapse: collapse;mso-table-lspace: 0pt;mso-table-rspace: 0pt;">
    <tbody class="mcnTextBlockOuter">
        <tr>
            <td valign="top" class="mcnTextBlockInner" style="border-collapse: collapse;mso-table-lspace: 0pt;mso-table-rspace: 0pt;">
                <table align="left" border="0" cellpadding="0" cellspacing="0" width="600" class="mcnTextContentContainer" style="border-collapse: collapse;mso-table-lspace: 0pt;mso-table-rspace: 0pt;">
                    <tbody>
                        <tr>
                            <td valign="top" class="mcnTextContent" style="padding-top: 9px;padding-right: 18px;padding-bottom: 9px;padding-left: 18px;border-collapse: collapse;mso-table-lspace: 0pt;mso-table-rspace: 0pt;color: #606060;font-family: Arial, 'Helvetica Neue', Helvetica, sans-serif;font-size: 15px;line-height: 150%;text-align: left;">
                                <h1 style="display: block;font-family: Arial, 'Helvetica Neue', Helvetica, sans-serif;font-size: 40px;font-style: normal;font-weight: bold;line-height: 125%;letter-spacing: -1px;margin: 0;text-align: left;color: #606060 !important;">
                                Issue #<?php the_field('issue_number'); ?> - <?php the_title(); ?></h1>
                                <em><?php the_date('l j F Y'); ?></em><br><br>
                                <?php echo nl2br(get_the_content()); ?>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </td>
        </tr>
    </tbody>
</table>
