Create Client Command

php bin/console acme:oauth-server:client:create --redirect-uri="a:0:{}" --grant-type='a:1:{i:0;s:8:"password";}'

Creating a super user:

php bin/console fos:user:create
Please choose a username:admin
Please choose an email:admin@example.loc
Please choose a password:admin

php bin/console debug:route
 -------------------------- ---------- -------- ------ -----------------------------------
  Name                       Method     Scheme   Host   Path
 -------------------------- ---------- -------- ------ -----------------------------------
  get_hello                  GET        ANY      ANY    /api/v1/hello
  homepage                   ANY        ANY      ANY    /
  fos_oauth_server_token     GET|POST   ANY      ANY    /oauth/v2/token

Get a token
http://www.sapi.loc/app_dev.php/oauth/v2/token?client_id=1_51e8r1hsqcws0cck4gssko480kgwwk80c84kwock0o8wcg0wo0&client_secret=1qcidei6uw74s0ckogoc8kckcskssc8so8goc8s48080okwc88&grant_type=password&username=admin&password=admin

Test API
http://www.sapi.loc/app_dev.php/api/v1/hello
Authorization: Bearer OWViY...

{"hello":"there","user":"admin","isAdmin":true}