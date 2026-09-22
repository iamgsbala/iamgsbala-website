# Project enquiry form

Install and activate Contact Form 7. In Contact > Contact Forms, create or edit the project enquiry form and paste the contents of contact-form.txt into the Form tab.

Mail tab:
- To: iamgsbala@gmail.com
- From on the production domain: iamgsbala <wordpress@iamgsbala.com>
- Subject: New project enquiry: [your-service]
- Additional headers: Reply-To: [your-email]
- Plain-text message body:

    Name: [your-name]
    Email: [your-email]
    Service: [your-service]
    Website: [your-website]

    Project details:
    [your-message]

    Consent: [enquiry-consent]
    Submitted through [_site_title] ([_site_url]).

Leave attachments empty and Mail (2) disabled. Choose the new form in Appearance > Customize > iamgsbala Profile > Contact Form 7 form. Set Public contact email to iamgsbala@gmail.com.

Use a domain sender supported by your hosting/mail provider and verify authentication/delivery before public launch. If the provider requires a specific existing sender mailbox, use that address rather than assuming wordpress@iamgsbala.com is provisioned. Keep Reply-To set to the visitor's validated email. The local setup uses wordpress@iamgsbala.local, which must be replaced for production. Local validation tests do not prove delivery to Gmail.

The required consent applies only to replying to the enquiry, not marketing. No autoresponder, file upload or mailing-list subscription is configured. Contact Form 7 mail transport depends on the WordPress site's mail setup.

Local installation already has form ID 1094 configured. IDs differ on another WordPress installation: select its form rather than copying the local ID.

Official reference: https://contactform7.com/best-practice-to-set-up-mail/
