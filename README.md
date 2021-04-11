#MONTAGEM DE IMAGEM
##MYSQL
sudo docker build -t mysql-image -f api/db/Dockerfile .
##NODE
sudo docker build -t node-image -f api/node/Dockerfile .

#EXECUCAOl
##MYSQL
sudo docker run -d -v $(pwd)/api/db/data:var/lib/mysql --rm --name mysql-container mysql-image
##NODE
sudo docker run -d -v /home/node/app -p 9001:9001 --rm --name node-container node-image
