<table border="0" cellpadding="0" cellspacing="0" width="600" style="border-collapse: collapse;mso-table-lspace: 0pt;mso-table-rspace: 0pt;background-color: #FFFFFF;border-top: 0;">
    <tr>
        <td valign="top" class="headerContainer" style="border-collapse: collapse;mso-table-lspace: 0pt;mso-table-rspace: 0pt;">
            <table border="0" cellpadding="0" cellspacing="0" width="100%" class="mcnImageBlock" style="border-collapse: collapse;mso-table-lspace: 0pt;mso-table-rspace: 0pt;">
                <tbody class="mcnImageBlockOuter">
                    <tr>
                        <td valign="top" style="padding: 0px;border-collapse: collapse;mso-table-lspace: 0pt;mso-table-rspace: 0pt;" class="mcnImageBlockInner">
                            <table align="left" width="100%" border="0" cellpadding="0" cellspacing="0" class="mcnImageContentContainer" style="border-collapse: collapse;mso-table-lspace: 0pt;mso-table-rspace: 0pt;">
                                <tbody>
                                    <tr>
                                        <td valign="top" class="mcnTextContent" style="padding-top: 9px;padding-right: 18px;padding-bottom: 9px;padding-left: 18px;border-collapse: collapse;mso-table-lspace: 0pt;mso-table-rspace: 0pt;color: #606060;font-family: Arial, 'Helvetica Neue', Helvetica, sans-serif;font-size: 15px;line-height: 150%;text-align: left;">
                                            <h2 style="display: block;font-family: Helvetica;font-size: 26px;font-style: normal;font-weight: bold;line-height: 125%;letter-spacing: -.75px;margin: 0;text-align: left;color: #404040 !important;">Picture of the week</h2><br />
                                            <a href="<?php the_field('picture_link'); ?>" target="_blank">
                                                <?php the_post_thumbnail('email', array('class' => 'mcnImage')); ?>
                                            </a><br /><br />
                                            <?php echo nl2br(strip_paragraphs(get_field('picture_description'))); ?>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </td>
                    </tr>
                </tbody>
            </table>
        </td>
    </tr>
</table>
