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
-





# Building a Dockerized Web App

# Dockerized Flask App

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


# Reference:
