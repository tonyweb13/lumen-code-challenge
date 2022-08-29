# Lumen PHP Framework
Laravel Lumen is a stunningly fast PHP micro-framework for building web applications with expressive, elegant syntax. We believe development must be an enjoyable, creative experience to be truly fulfilling. Lumen attempts to take the pain out of development by easing common tasks used in the majority of web projects, such as routing, database abstraction, queueing, and caching.

# Description
This challenge requires you to create an API that will import data from a third party API and be able to display it. This challenge should demonstrate how you structure your code and apply any appropriate design patterns. Please read through everything before starting.


## Features ##

<ul>
    <li>Import customers from a 3rd party data provider and save to database. </li>
    <li>Display a list of customers from the database.</li>
    <li>Select and display details of a single customer from the database.</li>
</ul>

## Data Importer ##

<ul>
    <li>Fetch and store a minimum of 100 users from this data provider: <a href="https://randomuser.me/api">randomuser.me/api</a>.
    See official documentation for fetching multiple users API Documentation </li>
    <li>The user data retrieved from the data provider must be stored in a SQL Type database and must be called customers table.</li>
    <li>Only import customers that have the Australian nationality, Refer to API Documentation.</li>
    <li>The importer service should be constructed in a way that it can be used in any part of the Application -Services or Controllers such as API controllers, Command, Job, etc.</li>
    <li>The importer should be designed so the data provider could be replaced later with minimal impact on the codebase.</li>
    <li>Create a console command to be able to execute the importer.</li>
    <li>If the data provider returns customer that already exist by email - Update the customer. </li>
</ul>

## RESTful API ##

<b>GET /customers</b> - retrieve the list of all customers from the database. The response should
contain:
<br>
<ul>
    <li>full name (first name + last name)</li>
    <li>email</li>
    <li>country</li>
</ul>

<b>GET /customers/{customerId}</b> - retrieve more details of a single customer. The response should
contain:
<br>
<ul>
    <li>full name (first name + last name)</li>
    <li>email</li>
    <li>username</li>
    <li>gender</li>
    <li>country</li>
    <li>city</li>
    <li>phone</li>
</ul>

## Developer Notes ##
<ul>
    <li>The customer password should be hashed using the md5 algorithm.</li>
    <li>The database should only store the information that is needed for this task.</li>
    <li>In your tests make sure to not to request the real third party API.</li>
    <li>The database layer should be Doctrine, Laravel Doctrine</li>
</ul>

## License  ##
The Lumen framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
