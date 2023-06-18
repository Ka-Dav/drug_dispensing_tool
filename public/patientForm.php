<!DOCTYPE html>
<html>
  <head>
    <title>Patients</title>
  </head>
  <body>
    <h1>Patient Registration Form</h1>
    <form action="../src/patients.php" method="POST">
      <label for="ssn">SSN:</label>
      <input type="text" id="ssn" name="ssn" required><br><br>
      
      <label for="firstName">First Name:</label>
      <input type="text" id="firstName" name="fName" required><br><br>
      
      <label for="lastName">Last Name:</label>
      <input type="text" id="lastName" name="lName" required><br><br>
      
      <label for="address">Address:</label>
      <input type="text" id="address" name="address" required><br><br>
      
      <label for="age">Age:</label>
      <input type="number" id="age" name="age" required><br><br>
      
      <label for="emailAddress">Email Address:</label>
      <input type="email" id="emailAddress" name="emailAddress" required><br><br>
      
      <input type="submit" value="Submit">
    </form>
  </body>
</html>