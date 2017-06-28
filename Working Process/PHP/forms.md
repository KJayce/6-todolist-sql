#First things first
In the case of the QCM exercise, you have to know that
you the user is gonna have to register his informations
therefore you'll need to make a form in wich he can put his 
personal informations that part is gonna be shown in the html part
of your work like so : '<input type="text" name="name" value="name">'
you'll have to do the same as above for the E-mail or any other information.

so since there are informations entries, errors and mistypes can occur therefore in your php
you have to think of that so the first thing you'll have to do is think of the validation and the 
sanitization of your form's entries: '<?php $errorlog=" "; ...> ' 
so you create an empty variable wich will receive the errors that might slip into the form.
