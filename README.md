# My Custom Message App - Thomas Schmidt

## To run the application

### Option A: Docker

1. Navigate to the root of the project: custom-message-app/
2. Run 'docker compose up -d' from the command line
3. Go to http://localhost/8080
4. Follow the prompts on the webpage

### Option B: Use PHP cli

1. Navigate to root of the project: custom-message-app/
2. Run 'php -S localhost:8000 -t ./'
3. Go to http://localhost/8000
4. Follow the prompts on the webpage

## Overview of Design Decisions

I wanted to have a ui for ease of use and implementing the ui using PHP was not much more work. With that in mind, I decided to include the basic index.php file for the ui but include all of the code logic in an app.php file.

I created classes for each of the entities, Guest, Company, MessageTemplate, as well as for Greetings (the time-specific salutation), and the JSON Import process (JSONImporter Class). For the JSON Importer Class, I created sub-classes for each of the data types. Doing this let me treat all of the data files in the same way while handling the datashapes for the different objects better. For example, the CompanyJsonImporter returns Company objects. These JSONImporter sub-classes also helped me reduce the amount of code I had to write.

I also created a ISelectable interface so that I could more easily handle the presentation of form fields. Objects that implement this interface can be easily transformed into select options so it came in handy when creating the UI. Guest, Company, and Greeting all implement this interface and I was able to create a TemplatePart\CustomSelect so that I wouldn't have to keep writing the select objects.

## Language and Why

I chose PHP for a few reasons. 

- I work a lot in php lately and so I feel very fresh on the syntax and I felt like I could do a really good job of it in PHP.
- I wanted to show that I am comfortable in php because I know that this company primarily uses php
- I wanted to show that I am disciplined in my php code. I like to make use of php's type hinting and I like the way that I can manage code in many different files in php. I believe this makes code very readable and clean.

## Process for verifying the correctness of the program.

Once the application was running, I just messed around with lots of different message templates. Because I had created a UI, I was able to click through all of the options and test combinations of options. The UI also prevents some input errors but the app does include some error handling if the user were to mess with the url parameters.

## Things I didn't get to

- Make the Greeting Class accept a timezone and then do the calculation for time appropriate greeting
 - Was just getting a little long on time and didn't do this yet.

- From OO Perspective
 - Improve handling of messages with varying used fields. Hide the list of possible replacement variables from the MessageTemplate class and just have the render method accept the $var array and perform the replacement.
 - Add a Reservation class

- Add Form Validation

- Add some kind of state based tool so we don't have to keep reading the data in every page load.

## More General Things to improve: 

- Use an actual framework
 - Using a framework like Flask or Symfony may have taken me a little longer but I could have handled the routing better and I'd have access to some more tools for structuring the application
 - Also use a front end framework if the ui needed more improvements or to help handle the loading of data to the front end so it doesn't happen every page load.

- Add DB
 - Architecture for the app would be better with central data storage ie. DB. We could still implement the json loading as a way for the user to transfer/update the database. This would mean we're reading from the db to populate choices for Guests/Companies/Templates/etc. instead of reading the json file each time.
 - Docker construction really lends itself to this. I actually started this and had begun to work on it but I didn't want to spend too much time on it yet. I'll probably revisit this though.

- Security
 - Improve error checking from JSON. 
 - Web app could use something less transparent than GET request.
 - Form validation

