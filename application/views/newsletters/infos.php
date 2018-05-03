<section class="l-annonces-section l-annonces-search apparitionright l-campaignsinfos">
    <div class="clearfix">
        <h3 class="maintitle">Campaign infos</h3>
        <a href="<?php echo site_url('newsletters'); ?>" class="btn-back">Back</a>
    </div>

    <form action="" method="POST">
        <div class="l-annonces-form l-form">

         <fieldset class="inputstyle">
                        <label for="name"><?php echo $this->lang->line('campaign_name'); ?></label>
                        <input type="text" id="name" name="name" value="<?php echo $this->lang->line('campaign_name'); ?>" required>
                    </fieldset>

                    <fieldset class="inputstyle">
                        <label for="email_subject"><?php echo $this->lang->line('email_subject'); ?></label>
                        <input type="text" id="email_subject" name="email_subject" value="<?php echo $this->lang->line('email_subject'); ?>" required>  
                    </fieldset>
                    <?php /*
                     <fieldset class="inputstyle">
                        <label for="preview_text"><?php echo $this->lang->line('preview_text'); ?></label>
                        <input type="text" id="preview_text" name="preview_text" value='<?php echo $this->lang->line('preview_text'); ?>' required>
                        <p class="form-legend">The snippet will appear in the inbox after the subject line</p>
                    </fieldset> */ ?>

                    <fieldset class="inputstyle">
                        <label for="from_name"><?php echo $this->lang->line('from_name'); ?></label>
                        <input type="text" id="from_name" name="from_name" value="<?php echo $this->lang->line('from_name'); ?>" required>
                    </fieldset>

                     <fieldset class="inputstyle">
                        <label for="from_email_adress"><?php echo $this->lang->line('from_email_adress'); ?></label>
                        <input type="text" id="from_email_adress" name="from_email_adress" value="<?php echo $this->lang->line('from_email_adress'); ?>" required>
                    </fieldset>


            <?php /*
             <div class="separation-form clearfix">
                <div class="float-middle input-separation">
                    <fieldset class="inputstyle">
                        <label for="name"><?php echo $this->lang->line('campaign_name'); ?></label>
                        <input type="text" id="name" name="name" value='<?php echo $this->lang->line('campaign_name'); ?>' required>
                        <p class="form-legend">Internal use only. Ex:"Newsletter Test#4"</p>
                    </fieldset>

                    <fieldset class="inputstyle">
                        <label for="email_subject"><?php echo $this->lang->line('email_subject'); ?></label>
                        <input type="text" id="email_subject" name="email_subject" value='<?php echo $this->lang->line('email_subject'); ?>' required>
                        <p class="form-legend"><a target="_blank" href="https://kb.mailchimp.com/campaigns/previews-and-tests/best-practices-for-email-subject-lines?&_ga=2.84929881.1988746597.1511346594-1467091953.1511346594&_gac=1.48781780.1511351715.Cj0KCQiA3dTQBRDnARIsAGKSfllQYZqRBeeITyIGpLHqTb5Vge1zaSq1-9K-GWf0fa4u1FBiudMacscaArTtEALw_wcB" >How do I write a good subject line?</a>-<a href="#" data-featherlight="#emojis" class="btn-lightbox"> Emoji supported</a></p>
                        
                    </fieldset>
                    <?php /*
                     <fieldset class="inputstyle">
                        <label for="preview_text"><?php echo $this->lang->line('preview_text'); ?></label>
                        <input type="text" id="preview_text" name="preview_text" value='<?php echo $this->lang->line('preview_text'); ?>' required>
                        <p class="form-legend">The snippet will appear in the inbox after the subject line</p>
                    </fieldset> 

                    <fieldset class="inputstyle">
                        <label for="from_name"><?php echo $this->lang->line('from_name'); ?></label>
                        <input type="text" id="from_name" name="from_name" value='<?php echo $this->lang->line('from_name'); ?>' required>
                        <p class="form-legend">Use something subscribers will instantly recognize, like your company name.</p>
                    </fieldset>

                     <fieldset class="inputstyle">
                        <label for="from_email_adress"><?php echo $this->lang->line('from_email_adress'); ?></label>
                        <input type="text" id="from_email_adress" name="from_email_adress" value='<?php echo $this->lang->line('from_email_adress'); ?>' required>
                    </fieldset>
                    <?php /*<fieldset class="inputstyle">
                        <label for="campaign_url"><?php echo $this->lang->line('campaign_url'); ?></label>
                        <input type="text" id="campaign_url" name="campaign_url" value='<?php echo $this->lang->line('campaign_url'); ?>' required> 
                    </fieldset>
                </div>
                <div class="float-middle input-separation">
                    <fieldset class="checkbox-outside">
                        <div>
                            <input name="managereplies" type="checkbox" value="managereplies" id="managereplies">
                            <label for="managereplies">Use conversation to manage replies</label>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                            tempor incididunt ut labore et dolore magna aliqua.</p>
                        </div>
                    </fieldset>
                     <fieldset class="checkbox-outside">
                        <div>
                            <input name="personnalizetofield" type="checkbox" class="inputwithsecondary" data-secondary="personnalizesecondary" value="personnalizetofield" id="personnalizetofield">
                            <label for="personnalizetofield">Personnalize the TO field</label>
                            <p>Include the recipient’s name in the message using merge tags to make it more personal and help avoid spam filters. For example, *|FNAME|* *|LNAME|* will show "To: Bob Smith" in the email instead of "To: bob@example.com". This is more personal and may help avoid spam filters.</p>
                        </div>
                    </fieldset>
                    <fieldset class="inputstyle personnalizesecondary hidden">
                        <label for="recipientname">Specify *|MERGETAGS|* for recipient name</label>
                        <input type="text" id="recipientname" name="recipientname" value='Recipient name'>
                    </fieldset>
                </div>
            </div>
            <?php /*
            <div class="separation-form">
                <h3>Tracking</h3>
                <div class="clearfix">
                    <div class="float-middle">
                        <fieldset class="checkbox-outside">
                            <div>
                                <input name="track_opens" type="checkbox" value="track_opens" id="track_opens">
                                <label for="track_opens">Track opens</label>
                                <p>Discover who opens your campaigns by tracking the number of times an invisible web beacon embedded in the campaign is downloaded. <a href="https://kb.mailchimp.com/reports/about-open-tracking?&_ga=2.44403172.1988746597.1511346594-1467091953.1511346594&_gac=1.26563023.1511351715.Cj0KCQiA3dTQBRDnARIsAGKSfllQYZqRBeeITyIGpLHqTb5Vge1zaSq1-9K-GWf0fa4u1FBiudMacscaArTtEALw_wcB" target="_blank">Learn more</a></p>
                            </div>
                        </fieldset>
                        <fieldset class="checkbox-outside">
                            <div>
                                <input name="track_clicks" type="checkbox" value="track_clicks" id="track_clicks" checked disabled>
                                <label for="track_clicks">Track clicks (required on free accounts)</label>
                                <p>Discover which campaign links were clicked, how many times they were clicked, and who did the clicking.</p>
                            </div>
                        </fieldset>
                        <fieldset class="checkbox-outside">
                            <div>
                                <input name="track_plain-text_clicks" type="checkbox" value="track_plain-text_clicks" id="track_plain-text_clicks" checked disabled>
                                <label for="track_plain-text_clicks">Track plain-text clicks (required on free accounts)</label>
                                <p>Track clicks in the plain-text version of your email by replacing all links with tracking URLs. <a target="_blank" href="https://kb.mailchimp.com/reports/enable-and-view-click-tracking?&_ga=2.26128125.1988746597.1511346594-1467091953.1511346594&_gac=1.19304522.1511351715.Cj0KCQiA3dTQBRDnARIsAGKSfllQYZqRBeeITyIGpLHqTb5Vge1zaSq1-9K-GWf0fa4u1FBiudMacscaArTtEALw_wcB#Click-Tracking-in-Plain-Text-Campaigns">Learn more</a></p>
                            </div>
                        </fieldset>
                        <fieldset class="checkbox-outside">
                            <div>
                                <input name="google_analytics_link_tracking" type="checkbox" value="google_analytics_link_tracking" id="google_analytics_link_tracking" disabled>
                                <label for="google_analytics_link_tracking">Google analytics link tracking (Google Integration or Shopify must be enabled)</label>
                                <p>Track clicks from your campaigns all the way to purchases on your website. <br/>Requires <a href="https://www.google.com/analytics/#?modal_active=none" target="_blank">Google Analytics</a> on your website or <a href="https://apps.shopify.com/mailchimp" target="_blank">Shopify Integration</a>.</p>
                            </div>
                        </fieldset>
                    </div>
                    <div class="float-middle">
                        <fieldset class="checkbox-outside">
                            <div>
                                <input name="e-commerce_link_tracking" type="checkbox" value="e-commerce_link_tracking" id="e-commerce_link_tracking">
                                <label for="e-commerce_link_tracking">E-commerce link tracking </label>
                                <p>Track visitors to your website from your MailChimp campaigns, capture order information, and pass that information back to MailChimp. Then you can view purchase details, conversions, and total sales on the reports page. You can also set up segments based on your subscribers’ purchase activity.<a href="http://kb.mailchimp.com/integrations/e-commerce/how-to-use-mailchimp-for-e-commerce?&_ga=2.26641021.1988746597.1511346594-1467091953.1511346594&_gac=1.87013866.1511351715.Cj0KCQiA3dTQBRDnARIsAGKSfllQYZqRBeeITyIGpLHqTb5Vge1zaSq1-9K-GWf0fa4u1FBiudMacscaArTtEALw_wcB" target="_blank"> Learn more</a></p>
                            </div>
                        </fieldset>
                        <fieldset class="checkbox-outside">
                            <div>
                                <input name="clickTale_link_tracking" type="checkbox" value="clickTale_link_tracking" id="clickTale_link_tracking" class="inputwithsecondary" data-secondary="clicktalesecondary" >
                                <label for="clickTale_link_tracking">ClickTale link tracking </label>
                                <p>Gain insight to how subscribers interact with your email content.<br/>Requires <a href="https://www.clicktale.com/" target="_blank">ClickTale</a> on your website.</p>
                            </div>
                        </fieldset>
                        <fieldset class="inputstyle clicktalesecondary hidden">
                            <label for="clicktale_stats">ClickTale tag (you’ll see this in your ClickTale stats)</label>
                            <input type="text" id="clicktale_stats" name="clicktale_stats" value=''>
                        </fieldset>
                        <fieldset class="checkbox-outside">
                            <div>
                                <input name="track_stats_in_salesforce" type="checkbox" value="track_stats_in_salesforce" id="track_stats_in_salesforce" disabled>
                                <label for="track_stats_in_salesforce">Track stats in Salesforce</label>
                                <p>First, <a href="https://us13.admin.mailchimp.com/account/integrations/" target="_blank">enable Salesforce in Account</a> > Integrations.</p>
                            </div>
                        </fieldset>
                    </div>
                </div>
            </div>
            <div class="separation-form">
                <h3>Social Media</h3>
                <div class="clearfix">
                    <div class="float-middle">
                        <fieldset class="checkbox-outside">
                            <div>
                                <input name="auto-tweet_after_sending" type="checkbox" value="auto-tweet_after_sending" id="auto-tweet_after_sending">
                                <label for="auto-tweet_after_sending">Auto-tweet after sending</label>
                                <p><a href="https://www.twitter.com" class="btn">Connect to Twitter</a></p>
                            </div>
                        </fieldset>
                    </div>
                    <div class="float-middle">
                        <fieldset class="checkbox-outside">
                            <div>
                                <input name="auto-post_to_facebook_after_sending" type="checkbox" value="auto-post_to_facebook_after_sending" id="auto-post_to_facebook_after_sending">
                                <label for="auto-post_to_facebook_after_sending">Auto-post to Facebook after sending</label>
                                <p><a href="https://www.facebook.com" class="btn">Connect to Facebook</a></p>
                            </div>
                        </fieldset>
                    </div>
                </div>
            </div>
            <div class="separation-form">
                <h3>More Options</h3>
                <div class="clearfix">
                    <div class="float-middle">
                        <fieldset class="checkbox-outside">
                            <div>
                                <input name="auto-convert_video" type="checkbox" value="auto-convert_video" id="auto-convert_video">
                                <label for="auto-convert_video">Auto-convert video</label>
                                <p>Turn this on, and we’ll scan your content for embedded videos (which don’t always render properly in email apps), then auto-convert them to use our email-friendly <a href="https://kb.mailchimp.com/campaigns/images-videos-files/add-video-to-a-campaign?&_ga=2.18804217.1988746597.1511346594-1467091953.1511346594&_gac=1.128480638.1511351715.Cj0KCQiA3dTQBRDnARIsAGKSfllQYZqRBeeITyIGpLHqTb5Vge1zaSq1-9K-GWf0fa4u1FBiudMacscaArTtEALw_wcB#Video-Merge-Tags" target="_blank">video merge tags instead.</a></p>
                            </div>
                        </fieldset>
                    </div>
                </div>
            </div>
            */ ?>
            <fieldset>
                <!--<button name="save" class="btn" value="save" type="submit"><?php echo $this->lang->line('next'); ?></button>-->
                <button name="save" value="save" class="btn btn-choice"><?php echo $this->lang->line('next'); ?></button>
             </fieldset>
         </div>
    </form>
</section>

<div id="emojis" class="lightbox"><p>Emoji Characters are well supported in many client emails (specially on mobile) but they don't show up everywhere. Make sure your message is conveyd without them.</p></div>
