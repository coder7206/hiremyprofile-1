<?php
session_start();
require_once("includes/db.php");
require_once("social-config.php");
?>
<!DOCTYPE html>
<html lang="en" class="ui-toolkit">

<head>
    <title><?= $site_name; ?> - Privacy Policy </title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="<?= $site_desc; ?>">
    <meta name="keywords" content="<?= $site_keywords; ?>">
    <meta name="author" content="<?= $site_author; ?>">
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,500,700,300,100" rel="stylesheet">
    <link href="styles/bootstrap.css" rel="stylesheet">
    <link href="styles/styles.css" rel="stylesheet">
    <link href="styles/categories_nav_styles.css" rel="stylesheet">
    <link href="font_awesome/css/font-awesome.css" rel="stylesheet">
    <link href="styles/owl.carousel.css" rel="stylesheet">
    <link href="styles/owl.theme.default.css" rel="stylesheet">
    <?php if (!empty($site_favicon)) { ?>
        <link rel="shortcut icon" href="<?= $site_favicon; ?>" type="image/x-icon">
    <?php } ?>
    <link href="styles/sweat_alert.css" rel="stylesheet">
    <!-- Optional: include a polyfill for ES6 Promises for IE11 and Android browser -->
    <script src="js/ie.js"></script>
    <script type="text/javascript" src="js/sweat_alert.js"></script>
    <script type="text/javascript" src="js/jquery.min.js"></script>
    <style>
        .termandconditiondivthird {
            /* border: 1px solid grey; */
            width: 85%;
            margin: auto;
        }

        .paragrapgh_privacy_policy {
            font-size: 1.3rem;
            line-height: 2.5rem;
            text-align: justify;
        }
        .list_privacy_policy{
            font-size: 1.3rem;
            line-height: 2.5rem;
            text-align: justify;
        }
        .address_privacy_policy{
            font-size: 1.1rem;
            line-height: 2rem;
            text-align: justify;
        }
    </style>
</head>

<body class="is-responsive">
    <?php require_once("includes/header.php"); ?>
    <div class="container mt-5 mb-5 pb-1 site-theme-color">
        <div class="row">
            <div class="col-md-12 text-center">
                <h1> Privacy Policy</h1>
                <p class="paragrapgh_privacy_policy lead pb-0 text-center"> Our privacy obligations </p>
                <hr>
            </div>
        </div>
        <div class="termandconditiondivthird">


            <p class="paragrapgh_privacy_policy mb-1">hiremyprofile.co ("hmp") is governed by the Indian Privacy Principles (APPs) under The India Digital Personal Data Protection Act 2023 (DPDPA). It regulate how personal information is handled by hiremyprofile.com.
            </p>
            <p class="paragrapgh_privacy_policy mb-1">Personal information' means information or an opinion about an identified individual, or an individual who is reasonably identifiable. HMP's Privacy Policy applies to personal information collected and/or held by HMP.
            </p>
            <p class="paragrapgh_privacy_policy mb-1">This Privacy Policy also explains how we process 'personal data' about people in the European Union (EU), as required under the General Data Protection Regulation (GDPR).
            </p>
            <p class="paragrapgh_privacy_policy mb-1">We will review this policy regularly, and we may update it from time to time.
            </p>

            <br>
            <h4>The types of personal information we collect and hold</h4>
            <p class="paragrapgh_privacy_policy "><b>1. </b> We collect personal information about our users in order provide our products, services, and customer support.
                Our products, services, and customer support are provided through many platforms including but not limited to: websites, phone apps, email, and telephone.
                The specific platform and product, service, or support you interact with may affect the personal data we collect.
            </p>
            <p class="paragrapgh_privacy_policy "><b>2. </b>Not all information requested, collected, and processed by us is "Personal Information" as it does not identify you as a specific natural person.
                This will include majority of "User Generated Content" that you provide us with the intention of sharing with other users. Such "Non-Personal Information" is not covered by this privacy policy.
                However, as non-personal information may be used in aggregate or be linked with existing personal information; when in this form it will be treated as personal information.
                As such, this privacy policy will list both types of information for the sake of transparency.
            </p>

            <p class="paragrapgh_privacy_policy "><b>3. </b>In some situation users may provide us with personal information without us asking for it, or through means not intended for the collection of particular types of information.
                Whilst we may take reasonable steps to protect this data, the user will have bypassed our systems, processes, and control and thus the information provided will not be governed by this privacy policy.
            </p>

            <p class="paragrapgh_privacy_policy "><b>4. </b>In some situations users may provide us personal information over platforms that are outside our control; for example through social media or forums.
                Whilst any information collected by us is governed by this Privacy Policy, the platform by which it was communicated will be governed by its own Privacy Policy.
            </p>

            <br>
            <h4>How we collect personal information</h4>
            <p class="paragrapgh_privacy_policy ">Information that you specifically give us - <br>
                While you use our products and services you may be asked to provide certain types of personal information.
                This might happen through our website, applications, online chat systems, telephone, paper forms, or in-person meetings.
                We will give you a Collection Notice at the time, to explain how we will use the personal information we are asking for.
                The notice may be written or verbal.
            </p>

            <br>
            <h4>We may request, collect, or process the following information:</h4>
            <ol style="list-style-type: none;">
                <li class="list_privacy_policy mb-2"><b>1. Account Details -</b> Username, password, profile picture.
                </li>
                <li class="list_privacy_policy mb-2"><b>2. Contact Details -</b> Email address, phone number.
                </li>
                <li class="list_privacy_policy mb-2"><b>3. Location Details -</b> Physical address, billing address, timezone.
                </li>
                <li class="list_privacy_policy mb-2"><b>4. Identity Details -</b> Full name, proof of identity (e.g. drivers licence, passport), proof of address (e.g. utility bill), photograph of the user.
                </li>
                <li class="list_privacy_policy mb-2"><b>5. Financial Information -</b> Credit card details, wire transfer details, payment processor details (e.g. skrill, paypal), tax numbers.
                </li>
                <li class="list_privacy_policy mb-2"><b>6. User Generated Content -</b> Project descriptions and attachments, bid description, user profiles, user reviews, contest descriptions and attachment, user messages etc.
                </li>
            </ol>

            <br>
            <h4>Information that we collect from others</h4>
            <ul>
                <li class="list_privacy_policy mb-2">Users can give permission for us to connect to their account on other platforms to collect personal information.
                </li>
                <li class="list_privacy_policy mb-2">This includes but is not limited to Facebook, LinkedIn, and Google.
                </li>
                <li class="list_privacy_policy mb-2">Information collected will be governed by this Privacy Policy.
                </li>
                <li class="list_privacy_policy mb-2">Users can stop us from collecting data from other platforms by removing our access on the other platform or by contacting our support team.
                </li>
                <li class="list_privacy_policy mb-2">Users have the ability to invite non-users to our platform by providing contact details such as email address.
                </li>
                <li class="list_privacy_policy mb-2">In these situations, the information will be collected and stored by us to contact the non-user and to prevent abuse of the invite systems.
                </li>
                <li class="list_privacy_policy mb-2">Your payment provider may transmit information about the payment that we may collect or process.
                </li>
            </ul>
            <p class="paragrapgh_privacy_policy ">In some situations, personal information of users may be collected from public sources.</p>



            <br>
            <h4>We may collect or process the following information:</h4>
            <ol style="list-style-type: none;">
                <li class="list_privacy_policy mb-2"><b>1. Basic Details -</b> username, profile picture.
                </li>
                <li class="list_privacy_policy mb-2"><b>2. Contact Details -</b> email address, phone number.
                </li>
                <li class="list_privacy_policy mb-2"><b>3. Location Details -</b> Physical Address, billing address, timezone.
                </li>
                <li class="list_privacy_policy mb-2"><b>4. Financial Information -</b> payment account details (e.g. paypal email address and physical address), and wire transfer details.
                </li>
                <li class="list_privacy_policy mb-2"><b>5. List of contacts -</b> email provider address book.
                </li>
                <li class="list_privacy_policy mb-2"><b>6. User Generated Content -</b> user profile.
                </li>
            </ol>

            <h4>Information we collect as you use our service</h4>
            <p class="paragrapgh_privacy_policy ">We maintain records of the interactions we have with our users, including the products, services and customer support we have provided.
                <br>This includes the interactions our users have with our platform such as when a user has viewed a page or clicked a button.
            </p>

            <p class="paragrapgh_privacy_policy ">In order to deliver certain products or services we may passively collect your GPS coordinates, where available from your device. <br>
                Most modern devices such as smartphones will display a permission request when our platform requests this data. </p>

            <p class="paragrapgh_privacy_policy ">When we are contacted we may collect personal information that is intrinsic to the communication. <br>
                <b>For example: </b> If we are contacted via email, we will collect the email address used.
            </p>

            <br>
            <h4>We may collect or process the following information:</h4>

            <ol style="list-style-type:none;">
                <li class="list_privacy_policy mb-2"><b>1. Metadata -</b> IP address, computer and connection information, referring web page, standard web log information, language settings, timezone, etc.
                </li>
                <li class="list_privacy_policy mb-2"><b>2. Device Information -</b> Device identifier, device type, device plugins, hardware capabilities, etc.
                </li>
                <li class="list_privacy_policy mb-2"><b>3. Location -</b> GPS position.
                </li>
                <li class="list_privacy_policy mb-2"><b>4. Actions -</b> Pages viewed, buttons clicked, time spent viewing, search keywords, etc.
                </li>
            </ol>

            <h4>Links to other sites</h4>
            <p class="paragrapgh_privacy_policy ">On our website, you will encounter links to third party websites. These links may be from us, or they may appear as content generated by other users. These linked sites are not under our control and thus we are not responsible for their actions.
            </p>
            <p class="paragrapgh_privacy_policy ">
                Before providing your personal information via any other website, we advise you to examine the terms and conditions of using that website and its privacy policy.
            </p>


            <br>
            <h4>How we use personal information</h4>
            <p class="paragrapgh_privacy_policy ">The information we request, collect, and process is primarily used to provide users with the product or service they have requested. More specifically, we may use your personal information for the following purposes:
            </p>




            <ul>
                <li class="list_privacy_policy mb-2">To provide the service or product you have requested;
                </li>
                <li class="list_privacy_policy mb-2">To facilitate the creation of a User Contract (see Terms of Service for more information);
                </li>
                <li class="list_privacy_policy mb-2">To provide technical or other support to you;
                </li>
                <li class="list_privacy_policy mb-2">To answer enquiries about our services, or to respond to a complaint;
                </li>
                <li class="list_privacy_policy mb-2">To promote our other programs, products or services which may be of interest to you (unless you have opted out from such communications);
                </li>
                <li class="list_privacy_policy mb-2">To allow for debugging, testing and otherwise operate our platforms;
                </li>
                <li class="list_privacy_policy mb-2">To conduct data analysis, research and otherwise build and improve our platforms;
                </li>
                <li class="list_privacy_policy mb-2">To comply with legal and regulatory obligations;
                </li>
                <li class="list_privacy_policy mb-2">If otherwise permitted or required by law; or
                </li>
                <li class="list_privacy_policy mb-2">For other purposes with your consent, unless you withdraw your consent for these purposes.
                </li>
            </ul>

            <p class="paragrapgh_privacy_policy ">The 'lawful processing' grounds on which we will use personal information about our users are (but are not limited to):
            </p>
            <ul>
                <li class="list_privacy_policy mb-2">When a user has given consent;
                </li>
                <li class="list_privacy_policy mb-2">When necessary for the performance of a contract to which the user is party;
                </li>
                <li class="list_privacy_policy mb-2">Processing is necessary for compliance with our legal obligations;
                </li>
                <li class="list_privacy_policy mb-2">Processing is necessary in order to protect the vital interests of our users or of another natural person.
                </li>
                <li class="list_privacy_policy mb-2">Processing is done in pursuing our legitimate interests, where these interests do not infringe on the rights of our users.
                </li>
            </ul>

            <p class="paragrapgh_privacy_policy ">We use automated decision when helping matching users to jobs.</p>
            <ul>
                <li class="list_privacy_policy mb-2">The primary way this occurs is through how we rank users.
                </li>
                <li class="list_privacy_policy mb-2">These rankings are produced by analysing user generated content, user activity and the outcome of jobs; in this context, user generated content will include reviews that users receive when completing jobs.
                </li>
                <li class="list_privacy_policy mb-2">More information on these ranking guides can be found in our community articles.
                </li>
                <li class="list_privacy_policy mb-2">Automated decision making is also used to recommend potential jobs to our users and as a part of our marketplace security systems.
                </li>
            </ul>
            <p class="paragrapgh_privacy_policy ">
                By signing up with us, you agree to receive messages from us via email on marketplace activity, safeguarding measures, identity confirmation, and additional updates. We will never provide your information to third parties for marketing purposes.
            </p>

            <ul style="list-style-type: lower-alpha;">
                <li class="list_privacy_policy mb-2">When we disclose personal information
                </li>
                <li class="list_privacy_policy mb-2">Our third party service providers
                </li>
                <li class="list_privacy_policy mb-2">The personal information of users may be held, transmitted to or processed on our behalf outside Australia, including 'in the cloud', by our third party service providers. Our third party service providers are bound by contract to only use your personal information on our behalf, under our instructions.
                </li>
            </ul>

            <br>
            <h4>Our third party service providers include:</h4>
            <ol>
                <li class="list_privacy_policy mb-2">Cloud hosting, storage, networking and related providers
                </li>
                <li class="list_privacy_policy mb-2">SMS providers
                </li>
                <li class="list_privacy_policy mb-2">Payment and banking providers
                </li>
                <li class="list_privacy_policy mb-2">Marketing and analytics providers
                </li>
                <li class="list_privacy_policy mb-2">Security providers
                </li>
            </ol>

            <br>
            <h4>Other disclosures and transfers</h4>
            <p class="paragrapgh_privacy_policy ">We may also disclose your personal information to third parties for the following purposes:
            </p>
            <ol>
                <li class="list_privacy_policy mb-2">If necessary to provide the service or product you have requested;
                </li>
                <li class="list_privacy_policy mb-2">We receive court orders, subpoenas or other requests for information by law enforcement;
                </li>
                <li class="list_privacy_policy mb-2">If otherwise permitted or required by law; or
                </li>
                <li class="list_privacy_policy mb-2">For other purposes with your consent.
                </li>
            </ol>

            <p class="paragrapgh_privacy_policy ">Accessing, correcting, or downloading your personal information</p>
            <ul>
                <li class="list_privacy_policy mb-2">You have the right to request access to the personal information HMP holds about you.
                </li>
                <li class="list_privacy_policy mb-2">Unless an exception applies, we must allow you to see the personal information we hold about you, within a reasonable time period, and without unreasonable expense for no charge.
                </li>
                <li class="list_privacy_policy mb-2">Most personal information can be accessed by logging into your account.
                </li>
                <li class="list_privacy_policy mb-2">If you wish to access information that is not accessible through the platform, or wish to download all personal information we hold on you in a portable data format, please contact our Privacy Officer.
                </li>
            </ul>

            <p class="paragrapgh_privacy_policy ">
                You also have the right to request the correction of the personal information we hold about you.
                All your personal information can be updated through the user settings pages.
                If you require assistance please contact our customer support.
            </p>

            <br>
            <h4>Exercising your other rights</h4>
            <p class="paragrapgh_privacy_policy ">You have a number of other rights in relation to the personal data HMP holds about you, however, there may be restrictions on how you may exercise the rights. This is largely due to the nature of the products and services we provide. Much of the data we collect is in order to facilitate contracts between users, facilitate payments, and provide protection for the legitimate users of our marketplace - these data uses are protected against the below rights.
            </p>
            <h4>You have the right to:</h4>
            <ol>
                <li class="list_privacy_policy mb-2">Human review of automated decision making / profiling - In the case of our ranking algorithms, it is not possible to exercise this right as this ranking is a fundamental part of the marketplace that users participate in, opting out would mean not being able to participate in the marketplace. Decisions affecting marketplace security are already reviewed by humans.
                </li>
                <li class="list_privacy_policy mb-2">Direct marketing and profiling - users can control what emails they receive through their settings page.
                </li>
                <li class="list_privacy_policy mb-2">Erasure - Most personal information and user generated content cannot be deleted as they are used to support contracts between users, document financial transactions, and are used in providing protecting other legitimate users of the marketplace. In the case of non-personal data that can be linked with personal data, it will either be erased or otherwise anonymised from the personal data.
                </li>
                <li class="list_privacy_policy mb-2">Temporary restriction to processing - under certain circumstances you may exercise this right, in particular if you believe that the personal data we have is not accurate, or you believe that we do not have legitimate grounds for processing your information. In either case you may exercise this right by contacting our privacy officer.
                </li>
                <li class="list_privacy_policy mb-2">Unless stated above, users may exercise any of the above rights by contacting our Privacy Officer.
                </li>
            </ol>

            <br>
            <h5>To contact our Privacy Officer</h5>
            <p class="paragrapgh_privacy_policy ">If you have an enquiry or a complaint about the way we handle your personal information, or to seek to exercise your privacy rights in relation to the personal information we hold about you, you may contact our Privacy Officer as follows:
            </p>

            <h5>By Email:</h5>
            <address class="address_privacy_policy">
                privacy-officer@hiremyprofile.com
            </address>

            <h5>By Mail:</h5>
            <address class="address_privacy_policy">
                Attn: Privacy Officer <br>
                126, FIRST FLOOR BANK ROAD <br>
                Ambala, Haryana , India 133001
            </address>

            <p class="paragrapgh_privacy_policy ">For the purposes of the GDPR, our Privacy Officer is also our <b>Data Protection Officer (DPO).</b>
            </p>
            <p class="paragrapgh_privacy_policy ">While we endeavour to resolve complaints quickly and informally, if you wish to proceed to a formal privacy complaint, we request that you make your complaint in writing to our Privacy Officer, by mail or email as above. We will acknowledge your formal complaint within 10 working days of receipt.
            </p>
            <p class="paragrapgh_privacy_policy ">If you are in the European Union, you can choose to instead lodge a complaint with your local Data Protection Authority (DPA). The list of DPAs is at http://ec.europa.eu/justice/article-29/structure/data-protection-authorities/index_en.htm.
            </p>





        </div>
    </div>
    <?php require_once("includes/footer.php"); ?>
</body>

</html>