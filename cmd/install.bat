C:
cd C:\wamp\www\
rem proxy anonymerem proxy anonyme
git config --global http.proxy http://proxy-etab1.in.ac-mayotte.fr:3128 
rem proxy authentifié (proxyuser : à remplacer l'identifiant de proxy et pareil pour le proxypwd)
rem git config --global http.proxy http://proxyuser:proxypwd@proxy-etab1.in.ac-mayotte.fr:3128 
rem si vous n'utilisez pas le proxy
rem git config --global --unset http.proxy 

git clone https://github.com/evaluationen/eval_primaire.git/
