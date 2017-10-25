<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>Register | Komplete Care</title>
    <!-- Favicon-->
    <link rel="icon" href="public/img/logo1.png" type="image/x-icon">

    <!-- Bootstrap Core Css -->
    <link href="public/admin/plugins/bootstrap/css/bootstrap.css" rel="stylesheet">

    <!-- Bootstrap Select Css -->
    <link href="public/admin/plugins/bootstrap-select/css/bootstrap-select.css" rel="stylesheet" />

    <!-- Waves Effect Css -->
    <link href="public/admin/plugins/node-waves/waves.css" rel="stylesheet" />

    <!-- Animation Css -->
    <link href="public/admin/plugins/animate-css/animate.css" rel="stylesheet" />

    <!-- Custom Css -->
    <link href="public/admin/css/style.css" rel="stylesheet">
    <style type="text/css">

@font-face {
  font-family: 'Material Icons';
  font-style: normal;
  font-weight: 400;
  src: local('Material Icons'), local('MaterialIcons-Regular'), url(public/fonts/fonts.woff2) format('woff2');
}

.material-icons {
  font-family: 'Material Icons';
  font-weight: normal;
  font-style: normal;
  font-size: 24px;
  line-height: 1;
  letter-spacing: normal;
  text-transform: none;
  display: inline-block;
  white-space: nowrap;
  word-wrap: normal;
  direction: ltr;
  -moz-font-feature-settings: 'liga';
  -moz-osx-font-smoothing: grayscale;
}
</style>
</head>

<body class="signup-page">
    <div class="signup-box">
        <div class="logo">
            <a href="javascript:void(0);">Patient<b> Registration</b></a>
            <small><img src="public/img/logo1.png" height="45px" width="200px"></small>
        </div>
        <div class="card">
            <div class="body">
                <form id="sign_up" action="patient_registration/register" method="POST" enctype="multipart/form-data">
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">face</i>
                        </span>
                        <div class="form-line">
                            <input type="text" class="form-control" name="fullname" placeholder="Fullname" required autofocus>
                        </div>
                    </div>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">person</i>
                        </span>
                        <div class="form-line">
                            <input type="text" class="form-control" name="username" placeholder="Username" required>
                        </div>
                    </div>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">lock</i>
                        </span>
                        <div class="form-line">
                            <input type="password" class="form-control" name="password" placeholder="Password" required autofocus>
                        </div>
                    </div>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">lock</i>
                        </span>
                        <div class="form-line">
                            <input type="password" class="form-control" name="confirm" minlength="6" placeholder="Confirm Password" required>
                        </div>
                    </div>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">mail</i>
                        </span>
                        <div class="form-line">
                            <input type="email" class="form-control" name="email" placeholder="Email Address" required>
                        </div>
                    </div>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">phone</i>
                        </span>
                        <div class="form-line">
                            <input type="text" class="form-control" name="phone" placeholder="Phone Number" required>
                        </div>
                    </div>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">accessibility</i>
                        </span>
                            <select class="form-control show-tick" name="gender" required>
                                        <option value="">-- Gender --</option>
                            <option value="male">Male</option>
                            <option value="female">Female</option>
                            </select>
                    </div>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">info</i>
                        </span>
                            <select class="form-control show-tick" name="religion" required>
                                        <option value="">-- Religion --</option>
                            <option value="CHRISTIANITY">Christianity</option>
                            <option value="ISLAM">Islam</option>
                            <option value="OTHER">Other</option>
                            </select>
                    </div>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">people</i>
                        </span>
                            <select class="form-control show-tick" name="marital_status" required>
                                        <option value="">-- Marital Status --</option>
                            <option value="SINGLE">Single</option>
                            <option value="MARRIED">Married</option>
                            <option value="DIVORCED">Divorced</option>
                            <option value="SEPARATED">Separated</option>
                            <option value="WIDOWED">Widowed</option>
                            <option value="OTHER">Other</option>
                            </select>
                    </div>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">home</i>
                        </span>
                        <div class="form-line">
                            <input type="text" class="form-control" name="home_address" placeholder="Address" required>
                        </div>
                    </div>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">business</i>
                        </span>
                        <div class="form-line">
                            <input type="text" class="form-control" name="occupation" placeholder="Occupation" required>
                        </div>
                    </div>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">help</i>
                        </span>
                            <select class="form-control show-tick" name="password_recovery_question" placeholder="Password Recovery Question" required>
                                        <option value="">-- Password Recovery Question --</option>
                            <option value="What is the name of your first pet">What is the name of your first pet</option>
                            <option value="What is the name of your closest sibling">What is the name of your closest sibling</option>
                            <option value="What was your childhood nickname">What was your childhood nickname</option>
                            </select>
                    </div>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">vpn_key</i>
                        </span>
                        <div class="form-line">
                            <input type="text" class="form-control" name="password_recovery_answer" placeholder="Password Recovery Answer" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <input type="checkbox" name="terms" id="terms" class="filled-in chk-col-red">
                        <label for="terms">I read and agree to the 
                            <a class="m-r-20" data-toggle="modal" data-target="#largeModal">Terms Of Use</a></label>
                    </div>

                    <input class="btn btn-block btn-lg bg-red waves-effect" id="submit" name="submit" value="REGISTER" type="submit">
                    
                    <div class="m-t-25 m-b--5 align-center">
                        <a href="<?php echo URL?>patient_login" style="color: red">Already have an account?
                            Login</a><br>
                        <a href="<?php echo URL?>index">Back To Home</a>
                    </div>
                </form>
            </div>
        </div>
    </div>

            <div class="modal fade" id="largeModal" tabindex="-1" role="dialog">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title" id="largeModalLabel"><center>KompleteCare&trade; - Terms Of Use</center></h4>
                        </div>
                        <div class="modal-body"><p>
            <span style="font-size: 1.07rem; line-height: 1.5;">
            This platform is owned and operated by Sevenz Healthcare Services Limited.</span>
            <br></p>
            <p>Please read these Terms carefully. By using www.kompletecare.com or signing up for an account, or using the Kompletecare platform, you agree and accept these Terms of Use.</p>
            <p>The Terms begins when you sign up for kompletecare.com and continues as long as you use the Service. Clicking the button and entering your username means that you've officially "signed" the Terms. If you sign up on kompletecare.com platform on behalf of a company or other entity, you represent and warrant that you have the authority to accept these Terms on their behalf.</p>
            <p>If you do not accept these terms of use, you are not authorized to use this platform.&nbsp;</p>
            <p>These terms of use govern your use of the platform, any content (such as text, data, information, software, graphics, logo, slogan, byline or photographs) that Sevenz Healthcare Services Limited may make available through the platform and any services that www.kompletecare.com   may provide through the platform. The platform, materials, and services are referred to in these terms of use collectively as "www.kompletecare.com" products.</p>
            <p>Your use of the www.kompletecare.com platform forms a legal agreement between you and Sevenz Healthcare Services and is subject to the terms of the legal agreement as stated in these Terms of Use. You acknowledge and agree that www.kompletecare.com may stop (temporarily or permanently) providing www.kompletecare.com platform to you or to users generally, Sevenz Healthcare Services Limited's sole discretion, without prior notice to you. You may stop using the www.kompletecare.com platform at any time. You do not need to specifically inform www.kompletecare.com when you stop using the platform.&nbsp;</p>
            <p>In order to access certain products or services, you may be required to provide information about yourself (such as identification or contact details) as part of the registration process for the Service, or as part of your continued use of the Services. You agree that any registration information you give to www.kompletecare.com will always be accurate, correct and up to date.</p>
            <p>Content of, and/or opinions expressed on www.kompletecare.com or and in any corresponding comments are the personal opinions of the original authors, not of Sevenz Healthcare Services Limited. The content is provided for informational purposes only and is not meant to be an endorsement or representation by Sevenz Healthcare Services Limited   . You understand that all information (such as data files, written text, computer software, music, audio files or other sounds, photographs, videos or other images) which you may have access to as part of, or through your use of the www.kompletecare.com platform are the sole responsibility of the person from which such content originated. You understand and acknowledge that www.kompletecare.com    is protected by intellectual property rights which are owned by Sevenz Healthcare Services Limited or by other entities. You may not modify, rent, lease, loan, sell, distribute or create derivative works based on the www.kompletecare.com platform, either in whole or in part, unless you have been specifically told that you may do so by Sevenz Healthcare Services Limited or by the owners of rights to content of the www.kompletecare.com platform, in a separate agreement.</p><br>
            <p><font color="#e25041">Use of www.kompletecare.com platform</font></p><p>www.kompletecare.com authorizes you to use its platform only for your own personal, non-commercial purposes. Use of the www.kompletecare.com for any public or commercial purpose (including, without limitation, on another platform or through a networked computer environment), without another express written agreement with Sevenz Healthcare Services Limited   is strictly prohibited. If you make copies of any of the materials, you must retain on any such copies all copyright and other proprietary notices contained in the original materials. You may not modify, publicly display, publicly perform, or distribute the Materials.</p>
            <p>The www.kompletecare.com platformare protected under Nigerian and international copyright laws. Any unauthorized use of the www.kompletecare.com platforms may violate copyright, trademark, and other laws.</p>
            <p>You agree to use the www.kompletecare.com platform only for purposes that are permitted by (a) the Terms of Use and (b) any applicable law, regulation or generally accepted practices or guidelines in the relevant jurisdictions. You agree not to access (or attempt to access) any of the www.kompletecare.com platform by any means other than through the interface that is provided by  Sevenz Healthcare Services Limited unless you have been specifically allowed to do so in a separate written agreement with Sevenz Healthcare Services Limited. You specifically agree not to access (or attempt to access) any of the www.kompletecare.com platform through any automated means (including use of scripts or web crawlers). You agree that you will not engage in any activity that interferes with or disrupts the Services (or the servers and networks which are connected to the Services). Unless you have been specifically permitted to do so in a separate agreement with Sevenz Healthcare Services Limited   , you agree that you will not reproduce, duplicate, copy, sell, trade or resell the Materials or Services for any purpose. You agree that you are solely responsible for (and that www.kompletecare.com has no responsibility to you or to any third party for) any breach of your obligations under the Terms of Use and for the consequences (including any loss or damage which v may suffer) of any such breach.</p>
            <p>www.kompletecare.com reserves the right (but shall have no obligation) to pre-screen, review, flag, filter, modify, refuse or remove any or all inappropriate content from the www.kompletecare.com platform.</p>
            <p><br></p>
            <p><font color="#e25041">Access</font></p>
            <p>You are responsible for obtaining and maintaining all equipment and services needed for access to and use of the www.kompletecare.com platform. You are responsible for maintaining the confidentiality of your www.kompletecare.com password and you are solely responsible for all activities that occur under your password. You agree to notify www.kompletecare.com immediately of any unauthorized use of your password or any other breach of security related to the www.kompletecare.com platform. We do not have access to your current password, and for security reasons, we may only reset your password. www.kompletecare.com reserves the right to require you to change your password if www.kompletecare.com believes that your password is no longer is secure.</p>
            <p><br></p>
            <p><font color="#e25041">Prohibited uses</font></p>
            <p>You agree not to use the www.kompletecare.com platform;</p><p>(a) in a manner that violates any local, state, national, foreign, or international statute, regulation, rule, order, treaty, or other law;&nbsp;</p>
            <p>(b) to stalk, harass, or harm another individual;</p>
            <p>(c) to impersonate any person or entity or otherwise misrepresent your affiliation with a person or entity; or&nbsp;</p>
            <p>(d) to interfere with or disrupt the www.kompletecare.com platform or servers or networks connected to www.kompletecare.com&nbsp;</p>
            <p>You further agree not to (i) use any data mining, robots, or similar data gathering or extraction methods in connection with the www.kompletecare.com; or (ii) attempt to gain unauthorized access to any portion of the www.kompletecare.com platform or any other accounts, computer systems, or networks connected to www.kompletecare.com whether through hacking, password mining, or any other means.</p>
            <p><br></p><p><font color="#e25041">Account Disputes</font></p><p>We do not know the inner workings of your organization or the nature of your personal relationships, and we do not resolve disputes over who owns an account. You would not request access to or information about an account that is not yours; and you would resolve any account-related disputes directly with the other party.&nbsp;</p><p>Termination</p><p>www.kompletecare.com may terminate, suspend, or modify your registration with, or access to, all or part of the www.kompletecare.com platform, without notice, at any time and for any reason. You may discontinue your participation in and access to the www.kompletecare.com platform at any time. If you breach any of these Terms of Use, your authorization to use the www.kompletecare.com platform automatically terminates and you agree to immediately destroy any downloaded or printed content obtained from the www.kompletecare.com platform (and any copies thereof).</p><br><p><font color="#e25041">Disclaimers</font></p><p>The www.kompletecare.com platform are provided "as is" and "with all faults" and the entire risk as to the quality and performance of the www.kompletecare.com platform is with you, including, without limitation, risks associated with the presence of adware, viruses, spyware, and/or worms, etc. should the materials or services prove defective, you, and not Sevenz Healthcare Services Limited   , assume the entire cost of all necessary servicing and repair.&nbsp;</p><p>www.kompletecare.com    expressly disclaims all warranties of any kind, whether express, implied, or statutory, with respect to www.kompletecare.com (including, but not limited to, any implied or statutory warranties of merchantability, fitness for a particular use or purpose, title, and non-infringement of intellectual property rights).</p><p>Without limiting the generality of the foregoing, www.kompletecare.com makes no warranty that the www.kompletecare.com will meet your requirements or that the www.kompletecare.com will be uninterrupted, timely, secure, or error free or that defects in the www.kompletecare.com platform will be corrected.&nbsp;</p><p>www.kompletecare.com makes no warranty as to the results that may be obtained from the use of the www.kompletecare.com or as to the accuracy or reliability of any information obtained through the www.kompletecare.com platforms. No advice or information, whether oral or written, obtained by you through the www.kompletecare.com platform or from Sevenz Healthcare Services Limited, its parents, subsidiaries, or other affiliated companies, or its or their suppliers (or the respective officers, directors, employees, or agents of any such entities) (collectively, "the www.kompletecare.com parties") shall create any warranty.</p><p>www.kompletecare.com disclaims all equitable indemnities.</p><p><br></p>
            <p><br></p><p><font color="#e25041">Limitation of liability&nbsp;</font></p><p>In no event will any of the www.kompletecare.com parties be liable for (a) any indirect, special, consequential, punitive, or exemplary damages or (b) any damages whatsoever (including, without limitation, those resulting from loss of revenues, lost profits, loss of goodwill, loss of use, business interruption, or other intangible losses), arising out of or in connection with the www.kompletecare.com platform (including, without limitation, use, inability to use, or the results of use of the www.kompletecare.com platform), whether such damages are based on warranty, contract, tort, statute, or any other legal theory.&nbsp;</p><p><br></p>
            <p><font color="#e25041">Exclusions and limitations</font></p><p>Some jurisdictions do not allow the exclusion of certain warranties or the limitation or exclusion of liability for certain damages. Accordingly, some of the above disclaimers and limitations of liability may not apply to you. To the extent that any www.kompletecare.com. Party may not, as a matter of applicable law, disclaim any implied warranty or limit its liabilities, the scope and duration of such warranty and the extent of the www.kompletecare.com party's liability shall be the minimum permitted under such applicable law.</p><p><br></p><p><font color="#e25041">Modifications to sevenzhealthcareservices.com platform</font></p><p>www.kompletecare.com reserves the right to modify, suspend, or discontinue the www.kompletecare.com platform or any of its features at any time without notice to you.</p><p>We may change any of the Terms by posting revised Terms of Use on our website and platform and/or by sending an email to the last email address provided to us.&nbsp;</p><p><br></p><p><font color="#e25041">User submissions</font></p><p>Certain areas of the www.kompletecare.com platform may permit you to submit feedback, information, data, text, software, music, sound, photographs, graphics, video, messages, or other materials (each, a "User Submission"). By submitting a User Submission; whether blog posts contributed via RSS, blog posts written directly on the platform, or comments, the contributor agrees to give www.kompletecare.com a perpetual, non-exclusive license to the content that sevenzhealthcareservices.com publishes; you grant to www.kompletecare.com an irrevocable, perpetual, transferable, non-exclusive, fully-paid, worldwide, license (sub-licensable through multiple tiers) to (a) use, distribute, reproduce, modify, adapt, publish, translate, publicly perform, and publicly display your User Submissions (or any modification thereto), in whole or in part, in any format or medium now known or later developed and (b) use (and permit others to use) your User Submission in any manner and for any purpose (including, without limitation, commercial purposes) that www.kompletecare.com deems appropriate in its sole discretion (including, without limitation, to incorporate your User Submission or any modification thereto, in whole or in part, into any technology, product, or service).&nbsp;</p><p>www.kompletecare.com reserves the right to display advertisements in connection with User Submissions and to use User Submissions for advertising and promotional purposes. www.kompletecare.com may, but is not obligated to, pre-screen User Submissions or monitor any area of the www.kompletecare.com platform through which User Submissions may be submitted. You agree that you are solely responsible for all of your User Submissions. www.kompletecare.com is not required to host, display, or distribute any User Submissions on or through the www.kompletecare.com platform and may remove at any time or refuse any User Submissions for any reason. www.kompletecare.com is not responsible for any loss, theft, or damage of any kind to any User Submissions. www.kompletecare.com does not want to receive any User Submission that is confidential. You understand and agree that any User Submission will be considered non-confidential and non-proprietary and that sevenzhealthcareservices.com will be free to disclose your User Submission to any third party (absent) without any obligation of confidence on the part of the recipient. www.kompletecare.com does not guarantee that you will have any recourse through www.kompletecare.com or any third party to edit or delete any User Submission you have submitted. By posting you agree to be solely responsible for the content of all information you contribute, link to, or otherwise upload to the platform and release Sevenz Healthcare Services Limited and its partners, affiliates and successors from any liability related to your use of the platform.</p><br><p>By submitting any User Submission, you represent and warrant that:</p>
            <p>You are over 18 years old;</p><p>You own all rights in your User Submissions or, alternatively, you have acquired all necessary rights in your User Submissions to enable you to grant to www.kompletecare.com the rights in your User Submissions described herein;</p><p>You are the individual pictured and/or heard in your User Submissions or, alternatively, you have obtained permission from each person (including consent from parents or guardians for any individual under the age of eighteen (18)) who appears and/or is heard in your User Submissions to grant the rights to www.kompletecare.com described herein;</p><p>Your User Submissions do not infringe the copyright, trademark, patent, trade secret, or other intellectual property rights, privacy rights, or any other legal or moral rights of any third party;</p><p>Any information contained in your User Submission is not known by you to be false, inaccurate, or misleading;</p><p>Your User Submission does not violate any law (including, but not limited to, those governing export control, consumer protection, unfair competition, anti-discrimination, or false advertising);</p><p>Your User Submission is not, and may not reasonably be considered to be, defamatory, libelous, hateful, racially, ethnically, religiously, or otherwise biased or offensive, unlawfully threatening, or unlawfully harassing to any individual, partnership, or corporation, vulgar, pornographic, obscene, or invasive of another's privacy;</p><p>You were not and will not be compensated or granted any consideration by any third party for submitting your User Submission;</p><p>Your User Submission does not incorporate materials from a third party web or platform, or addresses, email addresses, contact information, or phone numbers (other than your own);</p><p>Your User Submission does not contain any viruses, worms, spyware, adware, or other potentially damaging programs or files;</p>
            <p>Your User Submission does not contain any information that you consider confidential, proprietary, or personal;</p><p>Your User Submission does not contain or constitute any unsolicited or unauthorized advertising, promotional materials, junk mail, spam, chain letters, pyramid schemes, or any other form of solicitation;</p><p>You are solely responsible for the content of all information you contribute, link to, or otherwise upload to www.kompletecare.com platform; and</p><p>You release and indemnify www.kompletecare.com and sponsors of www.kompletecare.com platform from any claims and/or liability related to your use of the platform.</p><br><p><font color="#e25041">Content Contributors</font></p><p>www.kompletecare.com publishes user contributed content in the form of Status Updates, Blog posts, webinars, news, stories and Comments. By providing any of the above user content either via RSS feed or directly on the platform, contributors agree to the following:</p><p>1.  Subject to such other terms as contained by agreements with Sevenz Healthcare Services Limited, Contributors may cease contributing new content at any time by emailing the platform editorial team.&nbsp;</p><p>2. Sevenz Healthcare Services Limited reserves the right to not publish contributed content at www.kompletecare.com's discretion.</p><p>3.  www.kompletecare.com will attribute content to the author (user).</p><p>4.  www.kompletecare.com reserves the right to syndicate all contributed content in summary form via RSS to third parties.</p><p>5. www.kompletecare.com has a zero-tolerance policy for plagiarism. www.kompletecare.com recognizes that blogging is a heavily referential medium and that bloggers frequently cite and quote from each other's work. Such citations might be protected under the legal doctrine of fair use. However, www.kompletecare.com reserves the sole discretion to remove any post that crosses the line from fair use (referencing) to plagiarism. Users/authors who knowingly submit plagiarized work may be banned from www.kompletecare.com platform.</p><p>6.  www.kompletecare.com reserves the right to remove any sharing links or advertising accompanying contributed posts.</p><p>7. www.kompletecare.com reserves the right to edit post headlines for clarity or search engine optimization (keyword inclusion)</p><p>8. www.kompletecare.com reserves the right to make corrections for spelling and grammar.</p><br><p><font color="#e25041">Visitors</font></p><p>www.kompletecare.com communities are intended to enable lively but civil interaction. Use of language that is abusive, off-topic, uses excessive foul language, or includes ad hominem attacks will not be tolerated. www.kompletecare.com reserves the right to determine what constitutes inappropriate behavior and to bar offenders at its sole discretion. Unless expressly permitted, you may not publish or reproduce the content that appears on any part of this platform. www.kompletecare.com reserves the right to block or remove postings or communications at any time at its' sole discretion.</p><br><p><font color="#e25041">Links to third-party platforms</font></p><p>Some links on www.kompletecare.com platform may link to third-party platforms or websites. Such links are provided solely as a convenience to you. Upon your use of these third party links, you have automatically left the www.kompletecare.com platform. www.kompletecare.com is not obligated to review such third-party platforms, does not control such third-party websites or platforms, and is not responsible for any such third-party platforms or their website content (or the products, services, or content available through same). Thus, www.kompletecare.com does not endorse or make any representations about such third-party websites and platforms, any information, software, products, services, or materials found there or any results that may be obtained from using them. If you decide to access any of the third-party website and platforms linked to from the www.kompletecare.com network, or platform, you do so entirely at your own risk. Third party referred herein includes individual and corporate product/services promoters&nbsp;</p><br><p><font color="#e25041">Linking to this Platform</font></p><p>You may create links to this platform from other sites but only in accordance with the following terms and in compliance with all applicable laws. Without www.kompletecare.com's written authorization otherwise, a website that links to this platform: may link to, but shall not replicate, any content of the www.kompletecare.com platform and shall not create a browser or border environment around any content of the platform. links shall not imply that www.kompletecare.com endorses such platform or any products, services, or content available through such website and or platform; shall not misrepresent its relationship with www.kompletecare.com  ; shall not present false or misleading information about www.kompletecare.com, its products, or its services; shall not contain content that could be construed as distasteful, offensive, or controversial; and shall contain only content that is appropriate for all age groups.</p><p><br></p><p><font color="#e25041">Contests</font></p><p>We may, from time to time, offer surveys or other promotions on our Website and platforms. Participation in our promotions if any is completely voluntary. Information requested for entry may include personal contact information such as your name, address, date of birth, phone number, email address, username, and similar details. We use the information you provide to administer our surveys and promotions. We may share this information with our affiliates and other organizations or Service Providers in line with these Terms and the Nigerian law.</p><br><p><font color="#e25041">Advertising partners</font></p><p>We may partner with third parties to display adverts on our website and platform or to manage our adverts on other platforms and may share personal Information with them for this purpose. All third parties we share this information enter into a contract with us that requires them to use your personal Information in a manner that is consistent with these terms and policy. We or our third party partners may use technologies, such as cookies, to gather information about your activities on our website and or our platform and other platforms in order to provide you with adverts based on your browsing activities and interests.&nbsp;</p><p><br></p><p><font color="#e25041">Billing Changes</font></p><p>We may change our fees at any time by posting a new pricing structure to our Website and platform and/or sending you a notification by email.</p><p>Trademarks</p><p>www.kompletecare.com and any other product or service name or slogan or logo contained in the www.kompletecare.com platform are trademarks and copyrights of www.kompletecare.com or its suppliers or licensors and may not be copied, imitated, or used, in whole or in part, without the prior written permission of Sevenz Healthcare Services Limited or the applicable right holder. Ownership of all such rights and the goodwill associated therewith remains with Sevenz Healthcare Services Limited or the applicable right holder. You may not use any meta tags or any other "hidden text" utilizing any name, trademark, copyright or product or service name of Sevenz Healthcare Services Limited without www.kompletecare.com's prior written permission. In addition, the look and feel of the Platform (including all page headers, custom graphics, button icons, and scripts) is the copyright, service mark, trademark, and/or trade dress of Sevenz Healthcare Services Limited and may not be copied, imitated, or used (in whole or in part) without Sevenz Healthcare Services Limited's prior written permission. Reference to any products, services, processes, or other information, by trade name, trademark, or otherwise does not constitute or imply endorsement, sponsorship, or recommendation thereof by Sevenz Healthcare Services Limited.&nbsp;</p><br><p><font color="#e25041">Procedure for making claims of infringement</font></p><p>Sevenz Healthcare Services Limited respects the intellectual property rights of others. Accordingly, Sevenz Healthcare Services Limited has a policy of removing User Submissions that violate copyright law, suspending access to the www.kompletecare.com platform (or any portion thereof) to any user who uses the www.kompletecare.com platform in violation of copyright law and/or terminating in appropriate circumstances the account of any user who uses the www.kompletecare.com platform in violation of copyright law.</p><p>Sevenz Healthcare Services Limited has implemented procedures for receiving written notification of claimed copyright infringement and for processing such claims in accordance with such law. If you believe your copyright or other intellectual property right is being infringed by a user of the www.kompletecare.com platform, please provide written notice to the following Sevenz agent for notice of claims of infringement:copyrightinfringement@kompletecare.com&nbsp;</p><p><br></p><p><font color="#e25041">Sevenz Healthcare Services Limited</font></p><p><font color="#e25041">Email:&nbsp;</font></p><p>Your written notice must: (a) contain your physical or electronic signature; (b) identify the copyrighted work or other intellectual property alleged to have been infringed; (c) identify the allegedly infringing material in a sufficiently precise manner to allow www.kompletecare.com to locate the material; (d) contain adequate information by which www.kompletecare.com can contact you (including postal address, telephone number, and e-mail address); (e) contain a statement that you have a good faith belief that use of the copyrighted material or other intellectual property is not authorized by the owner, the owner's agent or the law; (f) contain a statement that the information in the written notice is accurate; and (g) contain a statement, under penalty of perjury, that you are authorized to act on behalf of the copyright or other intellectual property right owner.</p><br><p><font color="#e25041">International and export issues</font></p>
            <p>Sevenz Healthcare Services Limited makes no representation that the www.kompletecare.com platform is appropriate or available for use outside the Federal Republic of Nigeria and access to the www.kompletecare.com platform from territories where its contents are illegal or restricted is prohibited. If you choose to access the sevenzhealthcareservices.com platform from outside the Federal Republic of Nigeria, you do so, on your own initiative and are responsible for compliance with applicable Laws.</p><br><p><font color="#e25041">Indemnification</font></p><p>You agree to indemnify, defend, and hold harmless the sevenzhealthcareservices.com parties from and against any and all claims, liabilities, damages, losses, costs, expenses, or fees (including reasonable attorneys' fees) that such parties may incur as a result of or arising from your (or anyone using your account's) violation of these Terms of Use. sevenzhealthcareservices.com reserves the right to assume the exclusive defense and control of any matter otherwise subject to indemnification by you and, in such a case, you agree to cooperate fully with sevenzhealthcareservices.com 's defense of such claim as determined by Sevenz Healthcare Services Limited. &nbsp; &nbsp;</p><br>
            <p><font color="#e25041">Electronic communications</font></p><p>When you visit the Platform or send e-mails to kompletecare.com, you are communicating with kompletecare.com electronically. kompletecare.com may respond to you by e-mail or by posting notices on the Platform. You agree that all such notices, disclosures, and other communications that kompletecare.com provides to you electronically satisfy any legal requirement that such communications be in writing.</p><p><br></p><p><font color="#e25041">Force Majeure</font></p><p>We would not be held liable for any delays or failure in performance of any of the features on our platform, from any cause beyond our control. This includes, however is not limited to, acts of God, changes to law or regulations, embargoes, war, terrorist acts, riots, fires, earthquakes, nuclear accidents, floods, strikes, power blackouts, volcanic action, unusually severe weather conditions, and acts of hackers or third-party internet service providers.</p><br>
            <p><font color="#e25041">General</font></p><p>These Terms of Use constitute the entire and exclusive and final statement of the agreement between you and www.kompletecare.com  with respect to the subject matter hereof, superseding any prior agreements or negotiations between you and www.kompletecare.com  with respect to such subject matter. The law in force in Nigeria shall be used to govern, construe and enforce all rights and duties of the parties arising from or in any way relating to the subject matter of these Terms of Use including, without limitation, the performance, construction interpretation and enforcement thereof.</p>
            <p>All lawsuits arising from or relating to these Terms of Use shall be brought in the High courts in Nigeria and you hereby irrevocably submit to the exclusive jurisdiction of such courts for such purpose. The failure of www.kompletecare.com to exercise or enforce any right or provision of these Terms of Use shall not constitute a waiver of such right or provision. If any provision of these Terms of Use is found by a court of competent jurisdiction to be invalid, you nevertheless agree that the court should endeavor to give effect to the intentions of www.kompletecare.com  and you as reflected in the provision, and that the other provisions of these Terms of Use remain in full force and effect. The section titles in these Terms of Use are for convenience only and have no legal or contractual effect. These Terms of Use shall remain in full force and effect notwithstanding any termination of your use of the www.kompletecare.com platform. These Terms of Use will be interpreted without application of any strict construction in favor of or against you or www.kompletecare.com. These Terms of Use, and any rights and licenses granted hereunder, may not be transferred or assigned by you, but may be assigned by www.kompletecare.com  without restriction.</p><br><p><font color="#e25041">Modifications to these Terms of Use</font></p>
            <p>www.kompletecare.com may, in its sole and absolute discretion, change these Terms of Use periodically. www.kompletecare.com  will post notice of such changes on the applicable Platform. If you object to any such changes, your sole recourse shall be to cease using the www.kompletecare.com   platform. Continued use of the www.kompletecare.com  platform following notice of any such changes shall indicate your acknowledgement of such changes and agreement to be bound by the terms and conditions of such changes. Certain provisions of these Terms of Use may be superseded by expressly-designated legal notices or terms located on particular pages of the www.kompletecare.com  platform and, in such circumstances, the expressly-designated legal notice or term shall be deemed to be incorporated into these Terms of Use and to supersede the provision(s) of these Terms of Use that are designated as being superseded.</p>
                        </div>
                        <div class="modal-footer" style="background-color: #2196F3;">
                            <button type="button" class="btn btn-link waves-effect" data-dismiss="modal">CLOSE</button>
                        </div>
                    </div>
                </div>
            </div>
    <!-- Jquery Core Js -->
    <script src="public/admin/plugins/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core Js -->
    <script src="public/admin/plugins/bootstrap/js/bootstrap.js"></script>

    <!-- Waves Effect Plugin Js -->
    <script src="public/admin/plugins/node-waves/waves.js"></script>

    <!-- Select Plugin Js -->
    <script src="public/admin/plugins/bootstrap-select/js/bootstrap-select.js"></script>

    <!-- Validation Plugin Js -->
    <script src="public/admin/plugins/jquery-validation/jquery.validate.js"></script>

    <!-- Bootstrap Notify Plugin Js -->
    <script src="public/admin/plugins/bootstrap-notify/bootstrap-notify.js"></script>

    <script src="public/admin/js/pages/ui/modals.js"></script>

    <!-- Custom Js -->
    <script src="public/admin/js/admin.js"></script>
    <script src="public/admin/js/pages/examples/sign-up.js"></script>

    <script type="text/javascript">
$( document ).ready(function() {
        $('#submit').hide();

            $('input[type="checkbox"]').click(function(){
            if($(this).prop("checked") == true){
        $('#submit').show();
    }            else if($(this).prop("checked") == false){
        $('#submit').hide();

            }
});
});
    </script>
</body>

</html>