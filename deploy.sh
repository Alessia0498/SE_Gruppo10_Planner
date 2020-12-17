#!/bin/bash

SERVER_ADDRESS="167.99.254.2"
ssh -t root@${SERVER_ADDRESS} "su - arma -c 'cd /var/www/app/SE_Gruppo10_Planner && git fetch --all && git pull --force && git checkout develop'"
