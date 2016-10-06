# _{Hair Salon}_
https://jontoler.github.io/phpSalon/

#### _{An application for a hair Salon. The owner can add Stylist, and clients for each stylist, {Date of current version}_

#### By _**Jon Toler**_

## Description

_{An application for a hair Salon. The owner can add Stylist, and clients for each stylist.Using a Database to add stylist and clients. }_

## Setup/Installation Requirements

* _Clone this repository to your desktop_
* _Run composer install in Terminal_
* _start a server in web directory (php -S localhost:8000)_
* _change name of src file_
* _change name of tests file_
* _change name of src file_
* _change sourcing to tests_

_You must host this webpage locally_

## Behavior Driven Development SPECS

* _### add a stylist
The User can add a stylist to the days Roster.
    * input: stylist name "Miss Prisim"
    * output: The stylist Miss Prisim with an assigned stylist id

* _### get a stylist_id
An Id is assigned to a Stylist when they are added to the days roster.
    * input: stylist name, id
    * output: The stylist name with a stylist id

* _### get all list of stylist
The Stylist will display in a list called "Our Roster of Amazing Stylist"
    * input: a list of all the salon's stylist
    * output: The stylist name with a stylist id and  a link to view clients

* _### delete a stylist
The User can remove a Stylist from the roster for the day.
    * input: The User navigates to the edit page an clicks the green "Remove this Stylist form the roster for the day" button
    * output: will delete a stylist name with a stylist id, along with any attached clients.

* _### Update a Stylist name
A Stylist name can be updated
    * input: The user can use the Green "Update Client" button.
    * output: will change the clients name if inputted into the field.    

* _### add a client name
Clients can be assigned to a stylists for the day.
    * input: client name "Florence Farr"
    * output: The client "Florence Farr" will be created and assigned id

* _### delete a client name
A Clients can be removed from Stylists the schedule.
  * input: The user can use the Green "Remove Stylists for the day" button.
  * output: will delete all client names, and Client ids.    

* _### delete all client names
All Clients can be cleared from Stylists schedule of Clients.
    * input: The user can use the Green "Clear all Clients for the day" button.
    * output: will delete all client names, and Client ids.

* _### delete all Stylists names
All Clients can be cleared from Stylists schedule of Clients.
    * input: The user can use the Orange "Clear out all Stylists, and Clients for the day" button.
    * output: will delete all Stylists and client names, and ids as well.

* _### Update a clients name
A Clients name can be updated
    * input: The user can use the Green "Update Client" button.
    * output: will change the clients name if inputted into the field.    


###One to list all stylists at the salon, including a form to add new stylists.
Another to display all clients a particular stylist has, including a form to add more clients to a stylist.
Include edit and delete functionality for both classes in Silex. Each class will require one additional page for the edit form.



## Known Bugs

_NA_

## Support and contact details

_Jon Toler: tolerjonathan@gmail.com._

## Technologies Used

_HTML,
PHP,
TWIG 1.0,
SILEX 1.1_

### License

*This webpage is licensed under the GPL license.*

Copyright (c) 2016 **_Jon Toler_**
