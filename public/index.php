<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;700&display=swap" rel="stylesheet">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="../assets/css/style.css">
  <title>Drug dispenser</title>
</head>

<body>
  <h2 class="title">Add patient</h2>
  <form method="post" action="../src/patients.php">
    <div class="input-group">
      <label for="ssn">SSN</label>
      <input required type="text" id="ssn" name="ssn" />
    </div>
    <div class="input-group">
      <label for="fname">First Name</label>
      <input required type="text" id="fName" name="fname" />
    </div>
    <div class="input-group">
      <label for="lname">Last Name</label>
      <input required type="text" id="lName" name="lname" />
    </div>
    <div class="input-group">
      <label for="age">Age</label>
      <input required type="text" id="age" name="age" />
    </div>
    <div class="input-group">
      <label for="address">Address</label>
      <input required type="text" id="address" name="address" />
    </div>
    <button type="submit" class="submit-btn">Submit</button>
  </form>
</body>

</html>