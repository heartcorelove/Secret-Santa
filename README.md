# Secret-Santa
A small program written in php to do secret santa with x-amount of people, this is cocreated with Tich Showers!
You should change the values between ** ** for best results.
First you make a db with one table. This table needs 4 columns: id, name, cost and santaFor.
This way it's clear for everyone who got who.

First you need everyone to input their name and the value they want to spend.
This gets inputted through inputDataToDb.php file into your freshly created database.
The index.php file is just to give it a nice look.

The shuffleTheSanta's file is basically to give everyone their own santa. Everytime you get a different set.
This is also generic, so you can use it with 3 or with 100 people or even more.
