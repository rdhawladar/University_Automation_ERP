<div class="row">
    <div class="col-md-12">
        <div id="content">


            <div class="box twoColumn">

                <div class="head">
                    <h1>Mail Configuration</h1>
                </div>

                <div class="inner">






                    <form action="/hrm/symfony/web/index.php/admin/listMailConfiguration" method="post" id="frmSave" name="frmSave" class="longLabels" novalidate="novalidate">

                        <input type="hidden" name="emailConfigurationForm[_csrf_token]" value="ebc14e5b200fbaf55245732229fd898d" id="emailConfigurationForm__csrf_token" disabled="disabled">
                        <fieldset>

                            <ol>
                                <li>
                                    <label for="emailConfigurationForm_txtMailAddress">Mail Sent As <em>*</em></label>                        <input type="text" name="emailConfigurationForm[txtMailAddress]" maxlength="100" id="emailConfigurationForm_txtMailAddress" disabled="disabled">
                                </li>
                                <li>
                                    <label for="emailConfigurationForm_cmbMailSendingMethod">Sending Method</label>                        <select name="emailConfigurationForm[cmbMailSendingMethod]" id="emailConfigurationForm_cmbMailSendingMethod" disabled="disabled">
                                        <option value="sendmail">Sendmail</option>
                                        <option value="smtp">SMTP</option>
                                    </select>                    </li>
                                <li id="divsendmailControls" class="toggleDiv" style="display: list-item;">
                                    <label for="emailConfigurationForm_txtSendmailPath">Path to Sendmail</label>                        <input type="text" name="emailConfigurationForm[txtSendmailPath]" maxlength="100" id="emailConfigurationForm_txtSendmailPath" disabled="disabled">                    </li>
                            </ol>

                            <ol id="divsmtpControls" class="toggleDiv" style="display: none;">
                                <li>
                                    <label for="emailConfigurationForm_txtSmtpHost">SMTP Host</label>                        <input type="text" name="emailConfigurationForm[txtSmtpHost]" maxlength="100" id="emailConfigurationForm_txtSmtpHost" disabled="disabled">                    </li>
                                <li>
                                    <label for="emailConfigurationForm_txtSmtpPort">SMTP Port</label>                        <input type="text" name="emailConfigurationForm[txtSmtpPort]" maxlength="100" id="emailConfigurationForm_txtSmtpPort" disabled="disabled">                    </li>
                                <li class="line radio">
                                    <label for="emailConfigurationForm_optAuth">Use SMTP Authentication</label>                        <ul class="radio_list"><li><input name="emailConfigurationForm[optAuth]" type="radio" value="none" id="emailConfigurationForm_optAuth_none" disabled="disabled">&nbsp;<label for="emailConfigurationForm_optAuth_none">No</label></li>
                                        <li><input name="emailConfigurationForm[optAuth]" type="radio" value="login" id="emailConfigurationForm_optAuth_login" disabled="disabled">&nbsp;<label for="emailConfigurationForm_optAuth_login">Yes</label></li></ul>                    </li>
                                <li>
                                    <label for="emailConfigurationForm_txtSmtpUser">SMTP User</label>                        <input type="text" name="emailConfigurationForm[txtSmtpUser]" maxlength="100" id="emailConfigurationForm_txtSmtpUser" disabled="disabled">                    </li>
                                <li>
                                    <label for="emailConfigurationForm_txtSmtpPass">SMTP Password</label>                        <input type="password" name="emailConfigurationForm[txtSmtpPass]" maxlength="100" id="emailConfigurationForm_txtSmtpPass" disabled="disabled">                    </li>
                                <li class="line radio">
                                    <label for="emailConfigurationForm_optSecurity">User Secure Connection</label>                        <ul class="radio_list"><li><input name="emailConfigurationForm[optSecurity]" type="radio" value="none" id="emailConfigurationForm_optSecurity_none" maxlength="100" disabled="disabled">&nbsp;<label for="emailConfigurationForm_optSecurity_none">No</label></li>
                                        <li><input name="emailConfigurationForm[optSecurity]" type="radio" value="ssl" id="emailConfigurationForm_optSecurity_ssl" maxlength="100" disabled="disabled">&nbsp;<label for="emailConfigurationForm_optSecurity_ssl">SSL</label></li>
                                        <li><input name="emailConfigurationForm[optSecurity]" type="radio" value="tls" id="emailConfigurationForm_optSecurity_tls" maxlength="100" disabled="disabled">&nbsp;<label for="emailConfigurationForm_optSecurity_tls">TLS</label></li></ul>                    </li>
                            </ol>

                            <ol>
                                <li>
                                    <label for="emailConfigurationForm_chkSendTestEmail">Send Test Email</label>                        <input type="checkbox" name="emailConfigurationForm[chkSendTestEmail]" maxlength="100" id="emailConfigurationForm_chkSendTestEmail" disabled="disabled">                    </li>
                                <li>
                                    <label for="emailConfigurationForm_txtTestEmail">Test Email Address</label>                        <input type="text" name="emailConfigurationForm[txtTestEmail]" value="" maxlength="100" id="emailConfigurationForm_txtTestEmail" disabled="disabled">                    </li>
                                <li class="required">
                                    <em>*</em> Required field                    </li>
                            </ol>
                            <p>
                                <input type="button" value="Edit" id="editBtn" class="">
                                <input type="button" value="Reset" id="resetBtn" tabindex="3" class="reset" disabled="disabled">
                            </p>

                        </fieldset>

                    </form>

                </div>

            </div>
        </div>
    </div>
</div>