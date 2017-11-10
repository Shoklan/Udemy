# Python and Django: Payment Processing
## Daniel Kalish

# Welcome to Learn Django Coding
- We're going to be using an account at [PythonAnywhere](www.PythonAnywhere.com) to host the app.
- I'll be using a local server though.
- We'll be using a virtual environment to manage the app.
- You can install this with `pip install virtualenv` after you install `pip`.
- You can make a new virtual environment using `mkvirtualenv <name> --python=/usr/bin/python`.
- The class is a little old; `mkvirtualenv` no longer exists.
- To activate the virtual environment, use `source <name>/bin/activate`.
- You can install django using `pip install django==1.10`.
- To make sure it's installed, run `python -c "import django; print(django.get_version())"`.
- You start a new project using `django-admin startproject <project_name>`.
- To migrate the database, use `python manage.py migrate`.
- To create a new super user user `python manage.py createsuperuser`.
- Make sure to follow the steps.
- You can login to your account using the super use by visiting `URLSITE.com/admin`.
- You'll want to create a file directory structure:
  * root/static/static
  * root/static/static/img
  * root/static/static/css
  * root/static/static/js
  * root/static/static-only
  * root/static/media.
- The projects static files and css will go in the static directory.
- You might need to adjust the static paths.
- You start the server with `python manage.py runserver`.


# Build and eCommerce Website Step-By-Step

# Add a Contact Form

# User Authentication

# Charge Credit Cards with Stripe

# Deply Your Project Anywhere
