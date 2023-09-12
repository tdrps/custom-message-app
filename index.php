<?php

include 'app.php';

use Parts\TemplateParts;

?>
<html>

<head>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <link rel="stylesheet" href="style.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
  <script src="main.js"></script>
</head>

<body>
  <div class="container py-5">
    <div class="container header">
      <h1>
        Message Generator App
      </h1>
      <p>
        Welcome to the Message Generator App. 
        <ol>
          <li>
            First, choose the Guest you wish to message.
          </li>
          <li>
            Second, choose the company that the message will be sent on behalf of(eg. Thanks from all of us here at \<COMPANY>).
          </li>
          <li>
            Third, choose the message template you wish to use. If you choose Custom Message, the app will use the text from the text area below.
          </li>
          <li>
            If you've chosen to use a Custom Message, enter the custom message into the text area. Find the instructions for constructing a custom message below.
          </li>
          <li>
            Finally, click the submit button. An alert will pop up showing the message that has been sent.
          </li>
        </ol>
      </p>
      <h2>
        Instructions for custom message construction
      </h2>
      <p>
        When writing the message, use the following strings for the corresponding fields.
          <ul>
            <li>
              {$guest} : Will be replaced by the guest name chosen.
            </li>
            <li>
              {$roomNumber} : Will be replaced the guest's room number.
            </li>
            <li>
              {$company} : Will be replaced by the chosen company name.
            </li>
            <li>
              {$greeting} : Will be replaced with a time appropriate greeting.
            </li>
          </ul>
          <small>
            eg. Hello {$guest}! This is {$company} wishing you a {$greeting}. Enjoy your stay with us here in room {$roomNumber} and don't hesitate to reach out with any questions.
          </small>
      </p>
    </div>
    <div class="container">
      <form class="message-generator" id="message-form">
        <div class="row">

          <div class="col-sm-4">
            <div class="choose-option card | p-4 h-100">
              <?php TemplateParts::customSelect($guests, 'guest'); ?>
            </div>
          </div>

          <div class="col-sm-4">
            <div class="choose-option card | p-4 h-100">
              <?php TemplateParts::customSelect($companies, 'company'); ?>
            </div>
          </div>

          <div class="col-sm-4">
            <div class="choose-option card | p-4 h-100">
            <?php TemplateParts::customSelect($messageTemplates, 'template'); ?>
            <small>
              *Choose a template from this menu or choose "Custom Message" and type the message in the text area below.
            </small>
            </div>
          </div>

        </div>

        <div class="row d-flex justify-content-center">
          <div class="container">
            <?php TemplateParts::customTextArea('custom-message'); ?>
          </div>
        </div>

        <div class="row">
          <div class="container">
            <input type="submit" class="btn btn-primary" value="Submit">
          </div>
          
        </div>

      </form>
    </div>
</div>
</body>

</html>
