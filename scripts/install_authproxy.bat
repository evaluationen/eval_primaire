C:
cd C:\wamp\www\
rem proxy authentifié (proxyuser, proxypwd, url_proxy et port à remplacer)
git config --global http.proxy http://proxyuser:proxypwd@url_proxy:port 
git clone https://github.com/evaluationen/eval_primaire.git/
git init