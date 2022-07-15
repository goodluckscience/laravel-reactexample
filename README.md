
### LaravelReactExample repository
**properties, property jobs, users:**
tested on localhost with MySQL database.


### Initialisation
Basic factory/seeder is provided, not fully random due to the fact 
that initial data should follow some common sense rules and relations 
between user id, property job id and property id.

*php artisan migrate:fresh --seed*

### Code still requires refactoring/optimisation in some places

### Validation limited to basics
Correct validation with regex requires detailed information what job description
and job summary can be expected (with links or special characters allowed or not), also we have to assume that 
users can copy and paste text from text editors, etc etc etc. Except that it is possible that
some properties can have set of fixed jobs, so better to use drop down select list where possible, 
than let user mess with form fields.

### Name "Job" was changed to "Propertyjob"
Laravel uses word "Job", so it is better to stay away from that word in 
Laravel ecosystem. The word "Job" can be used on user interface, as a text, but 
for all back end stuff has to be replaced with something a bit different, 
to avoid confusion.

### Basic Bootstrap and basic REACT routing
The example in the repository provides basic Bootstrap layout and basic REACT routing, limited 
to 2 pages (Index.js and Create.js), one for listing property jobs, and another one for 
creating property jobs. REACT interface communicates with back end via API.

### The example - temporary status
The example contains a bit more functionality than needed, 
because it will be refactored/rebuild soon, and at the present shape 
the example is - obviously - not perfect.

