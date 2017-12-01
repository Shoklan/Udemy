# DockerDevOpsDev
## Nick Janetakis

# Introduction
- *Art of DDebugging Code*:
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
- To make sure you don't get permision issues use `sudo usermod -aG docker nick`.
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
  2. Expand your developmeent team painlessly.
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
RUN mdir -p $INSTALL_PATH    # create it.

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
- 

# Dockerized Rails App

# Spinning up a Staging Server

# Crash Course with SystemD

# Adding nginx Into the Mix

# Creating a Production Server

# Registering a Domain Name

# Obtaining an SSL Certificate

# Where to Go Next

# Bonus Lectures

# Research:
- What is *Ansible*?
- What is gunicon?

# Reference:
