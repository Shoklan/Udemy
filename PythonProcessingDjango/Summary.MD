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
- Static files can be images, css, or javascript
- You're add the paths to the *settings.py* file.
- Afterwards, you need to tell Django how to find them in the *urls.py* file.
- Add:
```python
from django.conf import settings
from django.conf.urls.static import static
# ...

if settings.DEBUG:
  urlpatterns += static(settings.STATIC_URL, document_root=settings.STATIC_ROOT)
  urlpatterns += static(settings.MEDIA_URL, documentt_root=settings.MEDIA_ROOT)
```
- `{% load staticfiles %}` must be included at the top of the html page to include static content.
- As always, you'll need to run `python manage.py collectstatic` after changes.
- The correct way to build sites is to have a *base.html* that all pages will need and inherit from that.
- You'll want to pull in the *base.html* contents with `{% extends 'base.html' %}`.
- Adding pages usually is of the format: `url(r'^<page>/$', views.<page>, name='<page>')`.
- We're going to use Bootstrap to help manage mobile usage.
- I'm not going to copy over and re-do Bootstrap for the 6th time.
- You can conditionally insert html with `{% if request.path == home %} class = "active" {% endif %}`

# Add a Contact Form
- You can include form fields in your projects and are already built into Django.
- To create them, you will need *forms.py* file in your app directory.
```
from django import forms

class contactForm(forms.Form):
  name = forms.CharField(required=False, max_length=100, help_text='100 characters max.')
  email = forms.EmailField(required=True)
  comment = forms.CharField(required=True, widget=forms.Textarea)
```
- Once the form is defined, you will need to import it into the *views.py* file.
- `from .forms import contactForm` should be added.
- Then, add `form = contactForm(request.POST or None)`.
- You'll want to check if the input is valid using:
```
if form.is_valid():
  print request.POST
```

```
<form method='POST' action =''> {% csrf_token %}
{{ form.as_p }}
<input type="submit" value="submit form" class ='btn btn-default' />
</form>
```
- You can print the contents of a form cleanly using `form.cleaned_data['email']`.
- To send emails, you will need to configure the email settings in `settings.py`.
```
EMAIL_HOST = 'smtp.gmail.com'
EMAIL_HOST_USER = 'target_email@gmail.com'
EMAIL_HOST_PASSWORD = 'GOOD TRY BOYO'.
EMAIL_USE_TLS = True
```
- You'll want to add the next block of code in *views.py*
```
from django.core.mail import send_mail
from django.conf import settings

name = form.cleaned_data['name']
comment = form.cleaned_data['comment']
subject='Messgae from MySite.com'
message='%s %s' % (comment, name)
emailFrom= form.cleaned_data['email']
emailTo = [settings.EMAIL_HOST_USER]
send_mail( subject, message, emailFrom, emailTo, fail_silently=True)
```
- You can create a context for a form using `title = 'Context'; context = {'title': title, 'form': form, }`
- A passed empty context does not harm a page without a context.
- To install **crispy-forms** use `pip install --upgrade django-crispy-forms`.
- Then, make sure to add `crispy_forms` to *INSTALLED_APPS* in *settings.py*
- Add `CRISPY_TEMPLATE_PACK = 'bootstrap3` to *setings.py*
- Add `{% laod crispy_forms_tags %}` to templates that will be using the forms.
- This is an odd way to add Bootstrap to forms.

# User Authentication
- we're going to be using **django-allauth** to manage users.
- You'll install it using `pip install django-allauth`.
- Add to *settings.py*:
```
AUTHENTICATION_BACKENDS = (
    # Needed to login by username in Django admin, regardless of `allauth`
    'django.contrib.auth.backends.ModelBackend',

    # `allauth` specific authentication methods, such as login by e-mail
    'allauth.account.auth_backends.AuthenticationBackend',
)
```
- You'll also want to install the apps:
 * 'django.contrib.auth'
 * 'django.contrib.sites'
 * 'allauth'
 * 'allauth.account'
 * 'allauth.socialaccount'
- Don't forget the `SITE_ID = 1` at the bottom.
- You'll want to include in *urls.py* `url(r'^acccounts/', include('allauth.urls'))`.
- The *Configuration* section has a lot of configuration settings you'll want to copy over.
- Copy those settings and configure to your needs.
- Add those copied settings and the below to the bottom of *settings.py*:
```
LOGIN_URL = '/accounts/login/'
LOGIN_REDIRECT_URL = '/'
```
- You'll get the default page from the *AllAuth Github* page.
- To check if a user is login or not, use `if not request.user.is_authenticated %}`
- Django uses the login decorator like **Flask** does.
- You will need to import `from django.contrib.auth.decorators import login_required`.
- Tag views with `@login_required` when you want to force people to be logged in.


# Charge Credit Cards with Stripe
-


# Deply Your Project Anywhere
- Fin.

# Research:

# Reference:
- [AllAuth](http://django-allauth.readthedocs.io/en/latest/)
-
