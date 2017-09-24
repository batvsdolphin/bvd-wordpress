wd="$(pwd)/*"
# echo $wd
rsync -avzrh --quiet --delete --exclude '.*' --exclude 'node_modules' --exclude 'deploy.sh' -e "ssh -i ~/.ssh/id_rsa" $wd root@198.199.104.48:/../var/www/batvsdolphin.com/wp-content/themes/batvsdolphin/
