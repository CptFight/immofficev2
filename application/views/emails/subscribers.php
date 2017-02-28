<head>
    <meta name="viewport" content="width=device-width" />
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <title><?php echo $this->lang->line('mail_subscribers_title'); ?> </title>
</head>

<body>

<table class="body-wrap">
    <tr>
        <td></td>
        <td class="container" width="600">
            <div class="content">
                <table class="main" width="100%" cellpadding="0" cellspacing="0">
                    <tr>
                        <td class="alert alert-good">
                            <?php echo sprintf($this->lang->line('mail_subscribers_message'),count($annonces) ); ?> 
                        </td>
                    </tr>
                    <tr>
                        <td class="content-wrap">
                            <table width="100%" cellpadding="0" cellspacing="0">
                                <tr>
                                    <td class="content-block">
                                        <ul>
                                            <li><?php echo $this->lang->line('province') ; ?>  : <?php echo $subscriber->search_provinces; ?></li>
                                            <li><?php echo $this->lang->line('min_price') ; ?>  : <?php echo $subscriber->search_price_min; ?></li>
                                            <li><?php echo $this->lang->line('max_price') ; ?>  : <?php echo $subscriber->search_price_max; ?></li>
                                            <li><?php echo $this->lang->line('zip_codes') ; ?>  : <?php echo $subscriber->search_zipcodes; ?></li>
                                            <li><?php echo $this->lang->line('lang_word') ; ?> : <?php echo $subscriber->search_lang; ?></li>
                                            <li><?php echo $this->lang->line('sell') ; ?> : <?php echo $subscriber->search_sell; ?></li>
                                        </ul>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <table class="invoice-items" cellpadding="0" cellspacing="0">
                                            <?php foreach($annonces as $key => $annonce){ ?>
                                                <tr><td><a href="<?php echo $annonce->url; ?>"><?php echo $annonce->title; ?></a></td></tr>
                                                <tr><td>&nbsp;</td></tr>
                                            <?php } ?>
                                        </table>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                </table>
                <div class="footer">
                    <table width="100%">
                        <tr>
                            <td class="aligncenter content-block">From <a href="<?php echo $host; ?>">@Immoffice</a> .</td>
                        </tr>
                    </table>
                </div></div>
        </td>
        <td></td>
    </tr>
</table>

</body>

