## Server-Info ##

### Motivation ###

I searched a very small web application to saw some information over my server (like a Plex-Media Server or a Fileserver or Raspberry Pi's).
All the Web GUI's I found were to large for my mind, like Webmin or Ajenti.


> Please note: Over this small tool you can't manage your server, you are only see sensor data or some CPU data of your server.

The server side has an PHP part with [Slim PHP](http://slimframework.com). So the server is with the REST API very expandable and the frontend is flexible.

The frontend is developed with [AngularJS](https://angularjs.org).

### Installation ###

You need an Apache Webserver:

	apt-get install apache2
	apt-get install php5

Then clone this repository and install the dependencys:

	npm install

Copy the complete folder into the root of the webserver:

	/var/www (normaly)

Thats it.

> This application is only for internal usage. The application has no authentication or something else, so don't publish your server into the internet or NAT your IP to the :80 default port of your Apache Webserer. If you have a exist webapplication on the port 80 or 443 deploy server-info on an other subdomain or port!

### API Documentation ###

The REST API Documentation is generated with [apidoc](https://github.com/apidoc/apidoc). You will found the actual version under the folder "doc".

### Screenshots ###

![](http://i.imgur.com/b199o6N.png)

### Licenced under MIT licence ###

Copyright (c) 2015 secanis.ch



Permission is hereby granted, free of charge, to any person obtaining a copy
of this software and associated documentation files (the "Software"), to deal
in the Software without restriction, including without limitation the rights
to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
copies of the Software, and to permit persons to whom the Software is
furnished to do so, subject to the following conditions:



The above copyright notice and this permission notice shall be included in
all copies or substantial portions of the Software.



THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT.  IN NO EVENT SHALL THE
AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN
THE SOFTWARE.

### About ###

webdesign - developed in switzerland @ [secanis.ch](https://secanis.ch)