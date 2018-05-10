# Project 4
+ By: Jonathon Brown
+ Production URL: <http://p4.jonbrowndeveloper.me>

Primary tables:
  + `songs`
  + `genres`

  
Pivot table(s):
  + `genre_song`


## CRUD

__Create__
  + Visit <http://p4.jonbrowndeveloper.me/add>
  + Fill out form
  + Click *Add Song*
  + Page will direct back to library with a message saying the song has been added
  
__Read__
  + Visit <http://p4.jonbrowndeveloper.me/> or <http://p4.jonbrowndeveloper.me/library> to see all of the songs that are in the database
  
__Update__
  + Visit <http://p4.jonbrowndeveloper.me/library> and hit the Edit button next to one of the songs
  + Make some edit to form
  + Click *Update Song*
  + Observe confirmation message
  + See my notes below regarding the Genres table and updating it
  
__Delete__
  + Visit <http://p4.jonbrowndeveloper.me/library>; choose the Delete button next to one of the songs
  + The page will move to a confirmation view
  + Confirm deletion
  + Observe confirmation message on the Library page


## Outside resources
used [Twitter Bootstrap 2.3.2](http://getbootstrap.com/2.3.2/)

also went through the [PHP Documentation](http://php.net/manual/en) for things like [Preg-Match](http://us3.php.net/manual/en/function.preg-match.php)


I checked out a few Stack Overflow posts for this project...

+ <https://stackoverflow.com/questions/34099777/laravel-5-1-validation-rule-alpha-cannot-take-whitespace>
+ <https://stackoverflow.com/questions/29189311/laravel-5-integrity-constraint-violation-1452-cannot-add-or-update-a-child-row>
+ <https://stackoverflow.com/questions/10887893/twitter-bootstrap-checkbox-columns-columns-within-form>
+ <https://stackoverflow.com/questions/6618967/php-how-to-check-whether-the-url-is-youtubes-or-vimeos>
+ <https://stackoverflow.com/questions/16957861/how-to-embed-video-in-laravel-code>

## Code style divergences
- there are not any code style divergences

## Notes for instructor

I will give a little background. I wanted to create a web application that used microphone input to then record and be saved to the web server. Sounded simple enough. However, I sunk around 15+ hours in this last week going through various forums and quasi walkthroughs to try and get it working. Unfortunately, I was not able to get all the javascript to work with laravel. So, around a day ago I scrapped the whole project and came up with this idea. While it isn't exactly what I was originally wanting to do, it gets the job done. 
