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
- You can change the the app so it's viewable on the network using `python manage.py runserver 0.0.0.0:<port>`

# Build and eCommerce Website Step-By-Step
- Django apps allow for a specific function.
- They're like single purpose tools.
- You create a new app using `python manage.py startapp <project_name>`
- Models are
- To tell Django to use the app you're just created add `<project_name>` to **Installed Apps** subsection in *settings.py*
- You'll need to add the model to the database using `python manage.py makemigrations`.
- Then, run `python manage.py migrate`.
- Certain fields cannot be empty in the database.
- You can fix this by passing the parameter `null=True` to the field.
- Or, you can set a default by passing the parameter `default = 'text_inserted'`
- Url patterns are defined in *urls.py*
- To get the admin page to see your new app, you need to register it.
- To do that, you open *admin.py* in the app directory and add `from .models import <model_name>`.
- Add:
```python
class <app_name>Admin(admin.Modeladmin):
  class Meta:
    model = profile

admin.site.register(profile, profileAdmin)
```
- You can allow a field to be blank by passing the parameter `blank = True`.
- The pattern `url(r'^$', views.home, name='home')` will be called when the homepage is requested.
- To alter the output, you would modify *views.py* in your app directory.

```python
def home(request):
  context = locals()
  template = 'home.html'
  return render( request, template, context)
```
- But, to allow *urls.py* to see the view requires `from <app_name> import views`.




# Add a Contact Form

# User Authentication

# Charge Credit Cards with Stripe

# Deply Your Project Anywhere
