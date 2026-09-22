# Theme deployment

Repository: https://github.com/iamgsbala/iamgsbala-website

The local Git repository is inside `wp-content/themes/iamgsbala`. Open this
folder in VS Code to manage changes. Only this theme is versioned here.

## Push an update

Run these commands from the theme folder after testing locally:

```sh
git status
git diff
git add -p
# Add any intended new files individually with git add path/to/file.
git diff --cached
git commit -m "Describe the theme update"
git push origin main
```

## Hostinger

Back up the live files and database before the first deployment. Connect this
repository in Advanced > Git and select `main`. Set the destination to
`public_html/wp-content/themes/iamgsbala` within the correct site's document root.
Do not deploy this theme repository to the WordPress root `public_html`.
Use Redeploy for manual updates, or enable automatic deployment after verifying
the initial release. A push may deploy immediately if auto-deployment is enabled.

Activate the theme in WordPress and configure the homepage, logo, profile and
Contact Form 7 selection. See contact-setup.md for form configuration. Database
settings, media uploads, WordPress core and plugins are not included in this repo.
Set product URLs only when the corresponding subdomain sites are live.

After deploying, clear caches and check the homepage, mobile navigation, product
links and contact-form delivery. To undo a code change, revert the relevant
commit, push the revert and redeploy. Restore the backup if the initial setup fails.
