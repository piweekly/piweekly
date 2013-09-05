<table border="0" cellpadding="0" cellspacing="0" width="100%" class="mcnTextBlock" style="border-collapse: collapse;mso-table-lspace: 0pt;mso-table-rspace: 0pt;">
    <tbody class="mcnTextBlockOuter">
        <tr>
            <td valign="top" class="mcnTextBlockInner" style="border-collapse: collapse;mso-table-lspace: 0pt;mso-table-rspace: 0pt;">
                <table align="left" border="0" cellpadding="0" cellspacing="0" width="600" class="mcnTextContentContainer" style="border-collapse: collapse;mso-table-lspace: 0pt;mso-table-rspace: 0pt;">
                    <tbody>
                        <tr>
                            <td valign="top" class="mcnTextContent" style="padding-top: 9px;padding-right: 18px;padding-bottom: 9px;padding-left: 18px;border-collapse: collapse;mso-table-lspace: 0pt;mso-table-rspace: 0pt;color: #606060;font-family: Arial, 'Helvetica Neue', Helvetica, sans-serif;font-size: 15px;line-height: 150%;text-align: left;">
                                <h2 style="display: block;font-family: Helvetica;font-size: 26px;font-style: normal;font-weight: bold;line-height: 125%;letter-spacing: -.75px;margin: 0;text-align: left;color: #404040 !important;"><?php echo $section_title; ?></h2>
                                <?php while (has_sub_field($section)): ?>
                                    <br><a href="<?php the_sub_field('url'); ?>"><?php the_sub_field('title'); ?></a> (<?php echo get_domain_from_url(get_sub_field('url')); ?>)<br><?php the_sub_field('summary'); ?><br>
                                <?php endwhile; ?>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </td>
        </tr>
    </tbody>
</table>
