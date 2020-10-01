# !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
# NOTE: DO *NOT* EDIT THIS FILE.  IT IS GENERATED.
# PLEASE UPDATE Dockerfile.txt INSTEAD OF THIS FILE
# !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
FROM selenium/node-chrome:4.0.0-alpha-7-prerelease-20200921
LABEL authors=SeleniumHQ

USER 1200

#====================================
# Scripts to run Selenium Standalone
#====================================
COPY ./docker/selenium/conf/start-selenium-standalone.sh /opt/bin/start-selenium-standalone.sh

#==============================
# Supervisor configuration file
#==============================
COPY ./docker/selenium/conf/selenium.conf /etc/supervisor/conf.d/


EXPOSE 4444

FROM ubuntu
RUN apt-get update && apt-get install -y iputils-ping
CMD bash