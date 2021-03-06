# DockerDevOpsDev
## Nick Janetakis

# Introduction
- *Art of Debugging Code*:
  1. Check what the error is.
  2. Check code against mentors.
  3. Google it, moron.
- Deploying a Web App can be percieved as a rite of passage.
- Mentor recommends Debian Linux.
- Virtual Machines allow you to run an OS inside an OS.
- Then, to **Docker**!


# Getting Setup
- Steps for setting up class:
  1. Install VirtualBox
  2. Download Xubuntu
  3. Select *New* in VirtualBox
  4. Name the machine.
  5. Select the drop down *Ubuntu*.
  6. Give the VM 4 GB of RAM; if you PC can handle it.
  7. Select *Create*
  8. Select *Settings*.
  9. In *General > Advanced Tabular* Enable Shared Clipboard and Drag 'n Drop.
  10. In *Network > Adapter 1* Select the drop down and set it to Bridged Adapter.
  11. Select *Start*.
  12. Browse to Xubuntu image and select the ISO.
  13. Setup the Linux distro as per installation instructions.
  14. Update software.
- **LTS** stands for *Long Term Support*
- Your **Host** is the OS you're running.
- The **Guest** is the OS that is virtualized.
- Adding Shared Folders can simplify life.
- To include more options, such as full screen:
  1. Select *Devices* in the VirtualBox Bar.
  2. Select *Insert Guest Additions CD image...*
  3. Right click and select *Open Terminal Here*.
  4. Type `sudo sh ./VBoxLinuxAdditions.run`.
  5. Restart the Guest OS
- Make sure to create a symlink using `sudo ln -s /media/<your_folder_name> ~/<your_folder_name>`
- Make sure that you can see hidden files in your File Manager.
- Just install it.
- To install using shell use `sudo dpkg -i <file_name>`.
- To check if it's installed, use `docker --version`.
- To make sure you don't get permission issues use `sudo usermod -aG docker nick`.
- Download **Docker Compose** and move it to */usr/local/bin*; make sure to allow execution.

# Docker Basics
- What does Docker do?:
  * Packages a service into a standardized unit.
  * Everything is included to make it run.
  * Runs teh same way on multiple machines.
- A **Docker Image** is what contains everything you'll need to run a service.
- A **Docker Container** is the actual instance of the service running.
- A virtual machine does something similar to what Docker does.
- The containers are based on Open Standards.
- Benefits:
  1. Scale up quickly.
  2. Expand your development team painlessly.
  3. Use Whatever technology fits best.
  4. Cross Environment consistency.
  5. Docker is also a framework.
- The classic hello world: `docker run --rm busybox:latest /bin/echo "Hello World"`.
- **Busybox** is a very tiny linux distro that's useful for demos.
- You can see all the commands in Docker using `docker --help`.
- You can check what images you have downloaded using `docker images`.
- You can check the running docker containers using `docker ps`.
- You can stop a container using `docker rm <docker_id_or_partial`.
- The flag `-rm` means remove after commands are completed.
- The flags `-it` will place you in *Interactive mode* where you're now inside the shell at the terminal.
- You can stop and delete an image using `docker -rmi <image_name>`.
- Make sure to create a Dockerhub account.
- You can download an image from the hub using `docker pull <image>:<version>`; version is optional.
- **Public Docker Images** require the *<user_acct>/<image>* format to pull them down.

# Building a Dockerized Web App
- Create a folder for you the project files.
- The name of the whale in the Docker logo is *Moby Dock*.

# Dockerized Flask App
- Creating the skeleton folder structure is a good tip.
- You're going to need the files:
  1. requirements.txt
  2. .gitignore
  3. Dockerfile
  4. docker-compose.yaml
  5. .dockerignore
  6. *<project_dir>*
  7. *<config_dir>*
  8. *<instance_dir>*
  9. *config/__init__.py*
  10. *config/settings.py*
  11. *instance/__init__.py*
  12. *instance/settings.py*
  13. *mobydock/app.py*
  14. *mobydock/__init__.py*
  15. *mobydock/templates*
  16. *mobydock/static*
  17. *mobydock/static/style.css*
- Download a Moby Dock image and place it in the static folder.
- The **Docker File** is a blue print or recipe list for the Docker image.
```
FROM python:2.7-slim                               # use the OS information and
                                                   # setup from this docker container
MAINTAINER Collin Mitchell  <email.addr@email.com> # Your name here

RUN apt-get update &&        # ensure update to date
    apt-get install -qq -y   # install in quiet mode with prompts
    build-essential          # ?
    libpq-dev                # communicate with postgres
    postgresql               # obv
    --fix-missing            # catch all
    --no-install-recommends

ENV INSTALL_PATH /mobydock   # set default dir
RUN mkdir -p $INSTALL_PATH    # create it.

WORKDIR $INSTALL_PATH                   # start here for cmds
COPY requirements.txt requirements.txt  # copy the necessary reqs for this
                                        # container from our work station
RUN pip install -r requirements.txt     # use the files in the file and install
COPY . .                                # copy everything into docker

VOLUME ["static"]                       # set folder this as a distinct volume

CMD gunicon -b 0.0.0.0:8000 "mobydock.app:create_app()"  # start server and listen on 8000
```
- Docker will only change thee container when lines are different.
- So keeping `COPY` lines separate can reduce compile time.
- The structure of lines in the *requirements.txt* is `<program_name>==<version_number>`.
- The *.dockerignore* file does the same thing as the *.gitignore* file.
- You would have a third party tool read the logs from docker.
- *Docker-Compose.yaml* defines all the different service configurations and images that your container will be using.
- To get the software you'll need to use `docker-compose up` and it will install Posgres, redis, python
- The `links:` section will define the names the other containers will be called at compilation.
- To run a command against a container, you use `docker exec`.
- Everything updates live when you makes changes to anything.
- Sometimes, if you hit **CTRL+C** it doesn't always exit correctly.
- You can use `docker-compose stop` to finish the job.

# Dockerized Rails App
- Just watching, but no notes.

# Spinning up a Staging Server
- The benefit of a staging server is to test for issues.
- Debian is very stable and most everyone supports it.
- CoreOS is newer and designed with the intent to run Containers.
- CentOS is the same as Debian, in features.
- Ubuntu Snappy and Red Hat Atomic are newer but not ready, as per this video's date.
- Create a new virtual machine to act as the staging server.
- Make sure SSH is installed during setup.
- `sudo` is not installed by default for Debian; you will need to install it.
- To do that, change to root and then type `apt-get install sudo`.
- To add yourself to the sudoer's list, enter `adduser <your_acct_name> sudo`.
- To allow the user to not require typing their password change the */etc/sudoers* file line to:
```bash
%sudo ALL=(ALL:ALL) NOPASSWD:ALL
```
- There is a risk that the network settings will change at each start up.
- To force it static in Debian, edit file */etc/network/interfaces*.
```
iface eth0 inet static
  address <ip_addr>
  netmask <netmask>
  gateway <gateway>
```
- To generate a public/private key pairing use `ssh-keygen -t rsa -b 4096`.
- Share the *.pub* but guard the other one.
- To add it to your keyring, type `ssh-add`.
- To ssh to it, you use `<acct_name>@<ip_addr>`.
- You can pass commands after the above to execute those commands on the remote server.
- Run `cat id_rsa.pub | ssh <acct_name>@<ip_addr> 'cat >> .ssh/authorized_keys'` to append your public key to the server.
- We're going to make the server more secure: `nano /etc/ssh/sshd_config`.
- Now change the line to `PasswordAuthentication no`.
- Install Docker on on the staging server.
- It is good practice to keep you deploy information separate from the application.
- You can set up multiple remote sites in git using `git remote add staging ssh://<ip_to_server>`.
- The first line of a firewall configuration file needs to be `*filter`.
- Lines starting with `#` are comments.
```
:INPUT DROP [0:0]     # for chain input, drop on all ports
:FORWARD DROP [0:0]   # for chain forward, drop on all ports
:OUTPUT ACCEPT [0:0]  # for chain output, allow all.
```
- You can see all current **iptables** rules using `sudo iptables -L`
- You can import the rules file using `sudo iptables-restore < /var/lib/iptables/rules-save`.

# Crash Course with systemd
- **Systemd** is a drop in replacement for systemV; also called init.d.
- Advantages:
  * Concise 'unit files'
  * Process dependencies
  * Unified toolset.
- Unit files are broken up into sections:
  1. Unit
  2. Service
  3. Install
- You can list all the unit files with `sudo systemctl list-unit-files`.
- **ExecStartPre** are commands to be run before the function.
- To see which unit files are run with *multi-user.target* then type `sudo systemctl show -p "Wants" multi-user.targer`.
- You can reload the unit files using `systemctl daemon-reload`.
- You can check the log files using `journalctl -u <service>`.
- You can pass parameter `--reverse` so that the newest log lines are on the top.

# Adding nginx Into the Mix
- **nginx** is a web server focused on concurrency and performance.
- It is defined as a **reverse proxy**.
- It is very effficient at serving static assets.
- It's also fantastic at handling SSL.
- It can also rewrite URLs.
- It also supports Virtual hosts so that it can handle multiple applications at once.
- Also can load balance well.
- nginx includes a default index file.
- In nginx, you can access certain variables using the `$` like normally in linux.
- The line `ENTRYPOINT ["/docker-entrypoint"]` controls allowing access to the application.
- Example Cert generation:
```
openssl req -newkey rsa:2048 # request RSA key of length 2048
 -nodes                      # don't require password to access.
 -sha256                     # encryption strength
 -keyout certs/productionexample.key`  # output file
 -x509                       # Certificate
 -days 365                   # no longer valid past a year
 -out certs/productionexample.crt      # certificate itself
 -subj "/C=US/ST=NewYork/L=NewYork/O=IT/CN=productionexample.com"
```
- `openssl dhparam -out certs/dhparam.pem 2048` is the command for generating the Difffie Helman Key.
- `-v` stands for volume in the unit file.

# Creating a Production Server
- We're going to be using *Digital Ocean* for our example.
- There is a reference code for Digital Ocean here.
- Creating a droplet:
  1. Select *Create Droplet*
  2. Name it.
  3. Select the size of the droplet.
  4. Select your region.
  5. Select your distribution to include.
  6. Enable *Private Networking*.
  7. Create and add an SSH Key.
- You can create a secure token in python using:
```python
import os
import binascii
binascii.b2a_hex(os.urandom(128))
```

# Registering a Domain Name
- You really want a domain name.
- Mentors prefered choice is [Internetbs](www.internetbs.net).
- They give you free whois protection.

# Obtaining an SSL Certificate
- I already know about Certificate Authorities.
- Options:
  1. StartSSL; free, but scammy.
  2. SSLMate; cheap, but awesome.
  3. Let's Encrypt; unknown.
- You can test you SSL setup using [ssllabs](www.ssllabs.com).

# Where to Go Next
- You can scale in two directions:
  1. Horizontal; multiple servers.
  2. Vertically Scaling; more computing power.
- You need to figure out where your bottlenecks are.
- Most of the time, it's IO.
- A **Canary Deploy** is when you mix in one new version to test it in production.
- Use the Docker Swarm.
- Kubernetes is done by Google.
- Mesos is done by Apache.
- Tutum is now been bought and integrated into Docker as its cloud service.
- Debugging a system helps you see errors.
- You can monitor a docker container using the built in `docker stats`.
- Google has written a program called **cadvisor** that will do something similar.
- A service that can monitor your services is **Datadog**.
- You can also use something simple like **Uptime Robot** to send alerts to you.
- CI stands for **Continuous Integration**.
- A great docker container for managing logs is **logspout**.
- The ELK stack is the best choice, I think.
- **Configuration Management** is configuration is defined in one place.
- Servers each have their own unique configuration.
- Configuration implementation is not duplicated.
- Ignore puppet of Chef since they're not up to the task anymore.
-

# Bonus Lectures
-


# Research:
- What is *Ansible*?
- What is gunicon?
- Flask Procfile?
- What is Vagrant?
- `shift` command?
- systemd unit files
- */lib/systemd/system/docker.service*?
- Floating IPs?
- Flask Celery?
- Rails Sidekick?
- Weave for Docker?
- Flannel for Docker?
- What is Deis; Platform as a Service?
- What is tutum?
- What is travisci?
- What is circleci?
- What is jenkins?
- What is gitlab?
- What is papertrail?
- What is loggly?
- What is kibana?
- What is Ansible?
- What is Saltstack?
- What is Terraform?

# Reference:
- [Internetbs](www.internetbs.net)
- [ssllabs](www.ssllabs.com)
