<?php
/**
 * Footer
 *
 * @package MLAStyleCenter
 */

namespace MLA\Commons\Theme\MLAStyleCenter;

?>
		</main>

		<?php do_action( 'get_footer' ); ?>

		<div class="mailing-list">

			<div class="mailing-list-inner">

				<h2 class="icon-inline-tag icon-mail">Get MLA Style News from <em>The Source</em></h2>
				<p>Be the first to read new posts and updates about MLA style.</p>

				<!-- Source sign-up -->
				<!-- FORM: HEAD SECTION -->

				    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
				                        <style>
				                    .captcha {
				                        padding-bottom: 1em !important;
				                    }
				                    .wForm .captcha .oneField {
				                        margin: 0;
				                        padding: 0;
				                    }
				                </style>
				                <script type="text/javascript">
				                    // initialize our variables
				                    var captchaReady = 0;
				                    var wFORMSReady = 0;

				                    // when wForms is loaded call this
				                    var wformsReadyCallback = function () {
				                        // using this var to denote if wForms is loaded
				                        wFORMSReady = 1;
				                        // call our recaptcha function which is dependent on both
				                        // wForms and an async call to google
				                        // note the meat of this function wont fire until both
				                        // wFORMSReady = 1 and captchaReady = 1
				                        onloadCallback();
				                    }
				                    var gCaptchaReadyCallback = function() {
				                        // using this var to denote if captcha is loaded
				                        captchaReady = 1;
				                        // call our recaptcha function which is dependent on both
				                        // wForms and an async call to google
				                        // note the meat of this function wont fire until both
				                        // wFORMSReady = 1 and captchaReady = 1
				                        onloadCallback();
				                    };

				                    // add event listener to fire when wForms is fully loaded
				                    document.addEventListener("wFORMSLoaded", wformsReadyCallback);

				                    var enableSubmitButton = function() {
				                        var submitButton = document.getElementById('submit_button');
				                        var explanation = document.getElementById('disabled-explanation');
				                        if (submitButton != null) {
				                            submitButton.removeAttribute('disabled');
				                            if (explanation != null) {
				                                explanation.style.display = 'none';
				                            }
				                        }
				                    };
				                    var disableSubmitButton = function() {
				                        var submitButton = document.getElementById('submit_button');
				                        var explanation = document.getElementById('disabled-explanation');
				                        if (submitButton != null) {
				                            submitButton.disabled = true;
				                            if (explanation != null) {
				                                explanation.style.display = 'block';
				                            }
				                        }
				                    };

				                    // call this on both captcha async complete and wforms fully
				                    // initialized since we can't be sure which will complete first
				                    // and we need both done for this to function just check that they are
				                    // done to fire the functionality
				                    var onloadCallback = function () {
				                        // if our captcha is ready (async call completed)
				                        // and wFORMS is completely loaded then we are ready to add
				                        // the captcha to the page
				                        if (captchaReady && wFORMSReady) {
				                            grecaptcha.render('g-recaptcha-render-div', {
				                                'sitekey': '6LeISQ8UAAAAAL-Qe-lDcy4OIElnii__H_cEGV0C',
				                                'theme': 'light',
				                                'size': 'normal',
				                                'callback': 'enableSubmitButton',
				                                'expired-callback': 'disableSubmitButton'
				                            });
				                            var oldRecaptchaCheck = parseInt('1');
				                            if (oldRecaptchaCheck === -1) {
				                                var standardCaptcha = document.getElementById("tfa_captcha_text");
				                                standardCaptcha = standardCaptcha.parentNode.parentNode.parentNode;
				                                standardCaptcha.parentNode.removeChild(standardCaptcha);
				                            }

				                            if (!wFORMS.instances['paging']) {
				                                document.getElementById("g-recaptcha-render-div").parentNode.parentNode.parentNode.style.display = "block";
				                                //document.getElementById("g-recaptcha-render-div").parentNode.parentNode.parentNode.removeAttribute("hidden");
				                            }
				                            document.getElementById("g-recaptcha-render-div").getAttributeNode('id').value = 'tfa_captcha_text';

				                            var captchaError = '';
				                            if (captchaError == '1') {
				                                var errMsgText = 'The CAPTCHA was not completed successfully.';
				                                var errMsgDiv = document.createElement('div');
				                                errMsgDiv.id = "tfa_captcha_text-E";
				                                errMsgDiv.className = "err errMsg";
				                                errMsgDiv.innerText = errMsgText;
				                                var loc = document.querySelector('.g-captcha-error');
				                                loc.insertBefore(errMsgDiv, loc.childNodes[0]);

				                                /* See wFORMS.behaviors.paging.applyTo for origin of this code */
				                                if (wFORMS.instances['paging']) {
				                                    var b = wFORMS.instances['paging'][0];
				                                    var pp = base2.DOM.Element.querySelector(document, wFORMS.behaviors.paging.CAPTCHA_ERROR);
				                                    if (pp) {
				                                        var lastPage = 1;
				                                        for (var i = 1; i < 100; i++) {
				                                            if (b.behavior.isLastPageIndex(i)) {
				                                                lastPage = i;
				                                                break;
				                                            }
				                                        }
				                                        b.jumpTo(lastPage);
				                                    }
				                                }
				                            }
				                        }
				                    };
				                </script>
				                                <script src='https://www.google.com/recaptcha/api.js?onload=gCaptchaReadyCallback&render=explicit&hl=en_US' async
				                        defer></script>
				                <script type="text/javascript">
				                    document.addEventListener("DOMContentLoaded", function() {
				                        var warning = document.getElementById("javascript-warning");
				                        if (warning != null) {
				                            warning.parentNode.removeChild(warning);
				                        }
				                        var oldRecaptchaCheck = parseInt('1');
				                        if (oldRecaptchaCheck !== -1) {
				                            var explanation = document.getElementById('disabled-explanation');
				                            var submitButton = document.getElementById('submit_button');
				                            if (submitButton != null) {
				                                submitButton.disabled = true;
				                                if (explanation != null) {
				                                    explanation.style.display = 'block';
				                                }
				                            }
				                        }
				                    });
				                </script>
				                <script type="text/javascript">
				        document.addEventListener("DOMContentLoaded", function(){
				            const FORM_TIME_START = Math.floor((new Date).getTime()/1000);
				            let formElement = document.getElementById("tfa_0");
				            if (null === formElement) {
				                formElement = document.getElementById("0");
				            }
				            let appendJsTimerElement = function(){
				                let formTimeDiff = Math.floor((new Date).getTime()/1000) - FORM_TIME_START;
				                let cumulatedTimeElement = document.getElementById("tfa_dbCumulatedTime");
				                if (null !== cumulatedTimeElement) {
				                    let cumulatedTime = parseInt(cumulatedTimeElement.value);
				                    if (null !== cumulatedTime && cumulatedTime > 0) {
				                        formTimeDiff += cumulatedTime;
				                    }
				                }
				                let jsTimeInput = document.createElement("input");
				                jsTimeInput.setAttribute("type", "hidden");
				                jsTimeInput.setAttribute("value", formTimeDiff.toString());
				                jsTimeInput.setAttribute("name", "tfa_dbElapsedJsTime");
				                jsTimeInput.setAttribute("id", "tfa_dbElapsedJsTime");
				                jsTimeInput.setAttribute("autocomplete", "off");
				                if (null !== formElement) {
				                    formElement.appendChild(jsTimeInput);
				                }
				            };
				            if (null !== formElement) {
				                if(formElement.addEventListener){
				                    formElement.addEventListener('submit', appendJsTimerElement, false);
				                } else if(formElement.attachEvent){
				                    formElement.attachEvent('onsubmit', appendJsTimerElement);
				                }
				            }
				        });
				    </script>

				    <link href="https://www.tfaforms.com/dist/form-builder/5.0.0/wforms-layout.css?v=0246591584232a6325b1af88966a271ab79612dc" rel="stylesheet" type="text/css" />

				    <link href="https://www.tfaforms.com/themes/get/default" rel="stylesheet" type="text/css" />
				    <link href="https://www.tfaforms.com/dist/form-builder/5.0.0/wforms-jsonly.css?v=0246591584232a6325b1af88966a271ab79612dc" rel="alternate stylesheet" title="This stylesheet activated by javascript" type="text/css" />
				    <script type="text/javascript" src="https://www.tfaforms.com/wForms/3.11/js/wforms.js?v=0246591584232a6325b1af88966a271ab79612dc"></script>
				    <script type="text/javascript">
				        wFORMS.behaviors.prefill.skip = false;
				    </script>
				        <script type="text/javascript" src="https://www.tfaforms.com/wForms/3.11/js/localization-en_US.js?v=0246591584232a6325b1af88966a271ab79612dc"></script>

				<!-- FORM: BODY SECTION -->
				<div class="wFormContainer" style="max-width: 100%; width:auto;">
				    <div class="wFormHeader"></div>
				    <style type="text/css"></style><div class=""><div class="wForm" id="4649903-WRPR" dir="ltr">
				<div class="codesection" id="code-4649903"><style>
				.wFormContainer {
				  border:none !important;
				}
				#google-captcha {
				 display: inline-block !important;
				  width: 35%;
				    vertical-align: middle;
				  }

				.wForm div.actions {
				  width: 100% !important;
				  }

				  .captchaHelp, #tfa-5 {
				display: none !important;
				  }


				  .mailing-list .wForm {
				    font-family: 'Proxima Nova', proxima-nova, Helvetica, sans-serif;
				    /*background: orange;*/
				  }

				  .mailing-list .wForm .oneField {
				    width: 236px;
						padding: 0;
						margin-right: 12px;
				  }

				  .mailing-list h3.wFormTitle {
				    display: none;
				  }

				  .mailing-list .wForm .oneField input {
				    border-radius: 3px;
				    margin: 8px 10px 0;
				    padding: 20px;
				    width: 200px;
				    border: 0;
				    background-image: none;
				  }

				  .mailing-list .wForm label.preField {
				    color: #ffffff;
				    font-weight: bold;
				    margin-left: 10px;
				    font-size: 18px;
				  }

				  .mailing-list .wForm input#submit_button {
				    padding: .25em .7em;
				    background: #2b2b81;
				    border-radius: 8px;
				    margin-right: 0.5em;
				    border: 3px solid #ffffff;
				    color: #ffffff;
				    font-size: 18px;
				    font-weight: bold;
				  }

				  .mailing-list #tfa_3 {
				    display: inline-block;
				    width: auto;
				  }
				  .mailing-list .wForm div.actions {
				    width: auto;
				    display: inline-block;
				    margin-bottom: 0;
				    padding-bottom: 3px;
				    vertical-align: top;
				  }

				  .mailing-list p.supportInfo {
				    display: none;
				  }

				  .mailing-list .wForm form .errFld {
				    border: none;
				  }

				  .mailing-list .wForm form .errMsg {
				    color: #fff;
				    padding-left: 12px;
				  }


				  @media screen and (max-width: 992px) {
				    .mailing-list .wForm .oneField {
				    width: 32%;
				      box-sizing: border-box;

				  }

				   .mailing-list .wForm .inputWrapper {
				      width: 90%;
				    }

				    .mailing-list .wForm .oneField input {
				      width: 100%;
				    }

				    .mailing-list .wForm div.actions {
				      display: block;
				      width: 32%;
				      margin: 0 auto;
				    }

				    .mailing-list .wForm input#submit_button {
				      width: 100%;
				  }

				  }

				  @media screen and (max-width: 767px) {
				    .mailing-list .wForm .oneField {
				    width: 100%;

				  }

				    .mailing-list .wForm .inputWrapper {
				      width: 90%;
				    }

				    .mailing-list .wForm .oneField input {
				      width: 100%;
				    }

				  }
				</style></div>
				<h3 class="wFormTitle" id="4649903-T">The Source Sign-up - Style Center Footer</h3>
				<form method="post" action="https://www.tfaforms.com/responses/processor" class="hintsBelow labelsAbove" id="4649903" role="form">
				<div id="tfa_3" class="section inline group">
				<div class="oneField field-container-D  labelsRemoved  " id="tfa_1-D"><div class="inputWrapper"><input type="text" id="tfa_1" name="tfa_1" value="" placeholder="First name" title="First name:" class=""></div></div>
				<input type="hidden" id="tfa_5" name="tfa_5" value="" class=""><div class="oneField field-container-D  labelsRemoved  " id="tfa_2-D"><div class="inputWrapper"><input type="text" id="tfa_2" name="tfa_2" value="" placeholder="Last name" title="Last name:" class=""></div></div>
				<div class="oneField field-container-D  labelsRemoved  " id="tfa_4-D"><div class="inputWrapper"><input type="text" id="tfa_4" name="tfa_4" value="" placeholder="E-mail address" aria-required="true" title="E-mail address:" class="validate-email required"></div></div>
				</div>
				<div class="actions" id="4649903-A">
				<div id="google-captcha" style="display: none">
				<br><div class="captcha">
				<div class="oneField">
				<div class="g-recaptcha" id="g-recaptcha-render-div"></div>
				<div class="g-captcha-error"></div>
				<br>
				</div>
				<div class="captchaHelp">reCAPTCHA helps prevent automated form spam.<br>
				</div>
				<div id="disabled-explanation" class="captchaHelp" style="display: none">The submit button will be disabled until you complete the CAPTCHA.</div>
				</div>
				</div>
				<input type="submit" data-label="Submit" class="primaryAction" id="submit_button" value="Submit">
				</div>
				<div style="clear:both"></div>
				<input type="hidden" value="4649903" name="tfa_dbFormId" id="tfa_dbFormId"><input type="hidden" value="" name="tfa_dbResponseId" id="tfa_dbResponseId"><input type="hidden" value="fa7b83444a95de8775976d0d0ed63a1b" name="tfa_dbControl" id="tfa_dbControl"><input type="hidden" value="59" name="tfa_dbVersionId" id="tfa_dbVersionId"><input type="hidden" value="" name="tfa_switchedoff" id="tfa_switchedoff">
				</form>
				</div></div><div class="wFormFooter"><p class="supportInfo"><a target="new" class="contactInfoLink" href="https://www.tfaforms.com/forms/help/4649903">Contact Information</a><br></p></div>

				 </div>

				<!-- End Source sign-up -->

			</div>

		</div>

		<footer>

			<ul class="nav nav-pills">
				<li><a href="/about-the-mla-style-center" id="footer-about-link">About The MLA Style Center</a></li>
				<li><a href="https://www.mla.org/About-Us/Support/Donate-to-the-MLA" id="footer-donate-link">Donate</a></li>
				<li><a href="/contact-us" id="footer-contact-link">Contact</a></li>
			</ul>

			<ul class="nav nav-social">
				<li class="item-1"><a class="social-pill-facebook" href="https://www.facebook.com/modernlanguageassociation/"></a></li>
				<li class="item-2"><a class="social-pill-linkedin" href="https://www.linkedin.com/company/modern-language-association"></a></li>
				<li class="item-3"><a class="social-pill-twitter" href="https://twitter.com/mlastyle"></a></li>
			</ul>

			<p><span class="print-remove"><a href="/terms/">Terms of Service</a> ● </span>© <?php echo date("Y"); ?> Modern Language Association of America</p>

		</footer>

		<?php wp_footer(); ?>

		<script type="text/javascript">
    window._mfq = window._mfq || [];
    (function() {
        var mf = document.createElement("script");
        mf.type = "text/javascript"; mf.async = true;
        mf.src = "//cdn.mouseflow.com/projects/3cf9cbf9-c52b-40c8-b1fd-4f8fb870d1a4.js";
        document.getElementsByTagName("head")[0].appendChild(mf);
    })();
</script>

	</body>

</html>
